<?php
if (!defined('EZGP')) die('Access denied.');

$caches = array('newest',
    'popular', 'popular', 'popular', 'popular', 'popular', 'popular', 'popular',
    'index_top', 'index_top', 'index_top', 'index_top', 'index_top', 'index_top',
    'index_puzzles', 'index_action', 'index_shooting', 'index_dressup', 'index_other',
    'index_board', 'index_adventure', 'index_customize', 'index_sports', 'index_driving',
    'index_casino', 'index_fighting', 'index_strategy', 'index_education', 'index_rhythm',);
shuffle($caches);

$file = $caches[0];
load_cache($file, 86400);
$games = $$file;
shuffle($games);

$game = $games[0];
header('Location: '. $_sys['dispatcher'] .'/game/'. $game['slug'] .'/'. dec2any($game['id']) .'#mainMenu');

?>