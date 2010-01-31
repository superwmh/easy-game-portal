<?php
if (!defined('EZGP')) die('Access denied.');

load_cache('newest');
load_cache('popular', 86400);
load_cache('index_top', 86400);

//order by games amount
load_cache('index_puzzles', 4600);
load_cache('index_action', 5600);
load_cache('index_shooting', 6600);
load_cache('index_dressup', 7600);
load_cache('index_other', 8600);
load_cache('index_board', 9600);
load_cache('index_adventure', 10600);
load_cache('index_customize', 11600);
load_cache('index_sports', 12600);
load_cache('index_driving', 13600);
load_cache('index_casino', 14600);
load_cache('index_fighting', 15600);
load_cache('index_strategy', 16600);
load_cache('index_education', 17600);
load_cache('index_rhythm', 18600);

$data['newest'] = $newest;
$data['popular'] = $popular;
$data['index_action'] = $index_action;
$data['index_adventure'] = $index_adventure;
$data['index_board'] = $index_board;
$data['index_casino'] = $index_casino;
$data['index_customize'] = $index_customize;
$data['index_dressup'] = $index_dressup;
$data['index_driving'] = $index_driving;
$data['index_education'] = $index_education;
$data['index_fighting'] = $index_fighting;
$data['index_puzzles'] = $index_puzzles;
$data['index_rhythm'] = $index_rhythm;
$data['index_shooting'] = $index_shooting;
$data['index_sports'] = $index_sports;
$data['index_strategy'] = $index_strategy;
$data['index_other'] = $index_other;
$data['index_top'] = $index_top;

$page['contents'] = load_view('index', $data);
$page['custom_footer']= '<script type="text/javascript" src="http://jquery-scrollbox.googlecode.com/svn/trunk/jquery.scrollbox.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>';

require $_sys['base_path'] .'/pages/_template.php';
?>