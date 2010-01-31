<?php
if (!defined('EZGP')) die('Access denied.');
$pagesize = 30;
//games/action/newest/1

if (empty($_sys['segments'][1])) {
  header('Location: '. $_sys['dispatcher']);
  exit;
}
$cat = $_sys['segments'][1];
switch ($cat) {
  case 'action':
  case 'adventure':
  case 'driving':
  case 'puzzles':
  case 'shooting':
  case 'sports':
  case 'strategy':
    $cat_sql = $cat;
    $where_sql = " WHERE category='{$cat_sql}'";
    break;

  case 'board_game':
    $cat_sql = 'board game';
    $where_sql = " WHERE category='{$cat_sql}'";
    break;

  default:
    $cat_sql = $cat;
    $where_sql = " WHERE category NOT IN ('action', 'adventure', 'driving', 'puzzles', 'shooting', 'sports', 'strategy', 'board game')";
}

$order = !isset($_sys['segments'][2]) ? 'newest' : ($_sys['segments'][2] == 'popular' ? 'popular' : 'newest');
$order_sql = $order == 'newest' ? ' ORDER BY updated DESC' : ' ORDER BY recommendation DESC, updated DESC';

$p = isset($_sys['segments'][3]) ? max(1, (int)$_sys['segments'][3]) : 1;
$row_start = ($p - 1) * $pagesize;

connsql();
$sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM '. $config['db_table_name'] . $where_sql . $order_sql . ' LIMIT '. $row_start .', '. $pagesize;
$result = mysql_query($sql);
$games = array();
while ($game = mysql_fetch_assoc($result)) {
  $games[] = $game;
}
$rows_result = mysql_fetch_row(mysql_query('SELECT FOUND_ROWS()'));
$rows = $rows_result[0];

$data['pagesize'] = $pagesize;
$data['rows'] = $rows;
$data['p'] = $p;
$data['cat'] = $cat;
$data['order'] = $order;
$data['games'] = $games;
$page['contents'] = load_view('games', $data);

$page['title'] = ucfirst($order) .' '. str_replace('_game', '', ucfirst($cat)) .' Games - '. ($p > 1 ? 'Page '. $p .' - ' : ''). $config['site_name'];
require $_sys['base_path'] .'/pages/_template.php';
?>