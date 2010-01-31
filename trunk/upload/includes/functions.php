<?php
if (!defined('EZGP')) die('Access denied.');

function _fetch_uri_string() {
  if (is_array($_GET) && count($_GET) == 1 && trim(key($_GET), '/') != '') {
    return key($_GET);
  }

  $path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');
  if (trim($path, '/') != '' && $path != "/".SELF) {
    return $path;
  }

  $path =  (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : @getenv('QUERY_STRING');
  if (trim($path, '/') != '') {
    return $path;
  }

  $path = str_replace($_SERVER['SCRIPT_NAME'], '', (isset($_SERVER['ORIG_PATH_INFO'])) ? $_SERVER['ORIG_PATH_INFO'] : @getenv('ORIG_PATH_INFO'));
  if (trim($path, '/') != '' && $path != "/".SELF) {
    return $path;
  }

  return '';
}

function load_cache($cache_file, $expires = 3600) {
  global $_sys, $config;
  $fullentry = $_sys['base_path'] .'/caches/'. $cache_file .'.php';
  $renew = TRUE;
  if (file_exists($fullentry)) {
    $mtime = filemtime($fullentry);
    if ($mtime > (time() - $expires)) {
      $renew = FALSE;
    }
  }

  if ($renew) {
    //echo $cache_file, " renew!\n";
    connsql();
    switch ($cache_file) {
      case 'newest':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=2 ORDER BY updated DESC LIMIT 60';
        break;
      case 'popular':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=4 ORDER BY updated DESC LIMIT 60';
        break;
      case 'index_top':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=5 ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_action':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Action" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_adventure':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Adventure" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_board':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Board Game" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_casino':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Casino" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_customize':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Customize" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_dressup':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Dress-Up" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_driving':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Driving" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_education':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Education" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_fighting':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Fighting" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_puzzles':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Puzzles" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_rhythm':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Rhythm" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_shooting':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Shooting" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_sports':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Sports" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_strategy':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Strategy" ORDER BY updated DESC LIMIT 30';
        break;
      case 'index_other':
        $sql = 'SELECT id, name, slug, thumbnail_url, swf_url FROM '. $config['db_table_name'] .' WHERE recommendation>=1 AND category="Other" ORDER BY updated DESC LIMIT 30';
        break;
    }
    $result = mysql_query($sql);
    $data = array();
    while ($row = mysql_fetch_assoc($result)) {
      $data[] = $row;
    }

    file_put_contents($fullentry,
      "<?php\n".
      "global \$$cache_file;\n".
      "\$$cache_file = ". var_export($data, TRUE) .";\n".
      "?>"
    );
  }

  require $fullentry;
}

function load_view($page_file, $data) {
  global $_sys;
  $fullentry = $_sys['base_path'] .'/pages/'. $page_file .'.php';

  ob_start();
  require $fullentry;
  $buffer = ob_get_contents();
  @ob_end_clean();
  return $buffer;
}

function get_swf_url($domain, $swf_url) {
  $swf_file = str_replace(' ', '_', urldecode(basename($swf_url)));
  $local_path = 'swf/'. strtolower(substr($swf_file, 0, 1)) .'/'. strtolower(substr($swf_file, 1, 1)) .'/'. $swf_file;
  return 'http://'.$domain.'/'.$local_path;
}

function connsql() {
  global $config;
  $db = mysql_connect($config['db_host'], $config['db_user'], $config['db_pass']);
  if (!$db) {
    return FALSE;
  }
  mysql_query('SET NAMES '. $config['db_encoding'], $db);
  mysql_select_db($config['db_name'], $db);
  return $db;
}

function get_default_menu($s0 = '', $s1 = '') {
  global $_sys;

  if ($s0 === '') {
    $s0 = isset($_sys['segments'][0]) ? $_sys['segments'][0] : '';
  }
  if ($s1 === '') {
    $s1 = isset($_sys['segments'][1]) ? $_sys['segments'][1] : '';
  }

  if ($s0 == 'games' || $s0 == 'game') {
    switch ($s1) {
      case 'action':
      case 'adventure':
      case 'board_game':
      case 'board game':
      case 'driving':
      case 'puzzles':
      case 'shooting':
      case 'sports':
      case 'strategy':
        return $s1; break;

      default: return 'others';
    }
  }
  return 'index';
}

function toggle_selected_menu($current, $selected) {
  return ($current == $selected) ? ' class="here"' : '';
}

function update_desc($ts) {
  $duration = max(1, time() - $ts);
  if ($duration < 60 * 60 * 24) {
    $val = floor($duration / 60 / 60);
    return  $val.' hour'. ($val > 1 ? 's' : '') .' ago';

  } else {
    $val = floor($duration / 60 / 60 / 24);
    return  $val.' day'. ($val > 1 ? 's' : '') .' ago';
  }
}

/*
 * Decimal > Custom
 *
 * Parameters:
 * $num - your decimal integer
 * $base - base to which you wish to convert $num (leave it 0 if you are providing $index or omit if you're using default (62))
 * $index - if you wish to use the default list of digits (0-1a-zA-Z), omit this option, otherwise provide a string (ex.: "zyxwvu")
 */
function dec2any($num, $base=62, $index=FALSE) {
  if (!$base) {
    $base = strlen($index);
  } else if (!$index) {
    $index = substr("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 0, $base);
  }
  $out = "";
  for ($t = floor( log10( $num ) / log10( $base ) ); $t >= 0; $t--) {
    $a = floor( $num / pow( $base, $t ) );
    $out = $out . substr( $index, $a, 1 );
    $num = $num - ( $a * pow( $base, $t ) );
  }
  return $out;
}

/*
 * Custom > Decimal
 *
 * Parameters:
 * $num - your custom-based number (string) (ex.: "11011101")
 * $base - base with which $num was encoded (leave it 0 if you are providing $index or omit if you're using default (62))
 * $index - if you wish to use the default list of digits (0-1a-zA-Z), omit this option, otherwise provide a string (ex.: "abcdef")
 */
function any2dec($num, $base=62, $index=FALSE) {
  if (!$base) {
    $base = strlen($index);
  } else if (!$index) {
    $index = substr("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 0, $base);
  }
  $out = 0;
  $len = strlen($num) - 1;
  for ($t = 0; $t <= $len; $t++) {
    $out = $out + strpos( $index, substr( $num, $t, 1 ) ) * pow( $base, $len - $t );
  }
  return $out;
}

?>