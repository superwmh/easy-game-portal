<?php
if (!defined('EZGP')) die('Access denied.');

if (empty($_sys['segments'][2])) {
  header('Location: '. $_sys['dispatcher']);
  exit;
}
$gameid = any2dec($_sys['segments'][2]);

connsql();
$sql = 'SELECT * FROM '. $config['db_table_name'] .' WHERE id='. $gameid;
$result = mysql_query($sql);
$game = mysql_fetch_assoc($result);
if (!empty($config['swf_domain_name'])) {
  $game['swf_url'] = get_swf_url($config['swf_domain_name'], $game['swf_url']);
}
$data['game'] = $game;

$page['contents'] = load_view('game', $data);
$page['script'][] = 'http://static.flowplayer.org/js/tools/tools.flashembed-1.0.4.min.js';
$page['script'][] = 'js/game.js';
$page['custom_footer']= '<script type="text/javascript">
  flashembed("game_swf", {src: "'. $game['swf_url'] .'", width: '. $game['width'] .', height: '. $game['height'] .'});
</script>';

$page['title'] = $game['name'] .' - '. $game['category'] .' - '. $config['site_name'];
$page['description'] = mb_substr($game['description'], 0, 80, 'UTF-8');
$page['selected_menu'] = get_default_menu('game', strtolower($game['category']));
require $_sys['base_path'] .'/pages/_template.php';
?>