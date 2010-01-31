<?php
define('EZGP', 1);
require 'config.php';
require 'includes/functions.php';

$_sys['base_path'] = dirname(__FILE__);

$_sys['self'] = pathinfo(__FILE__, PATHINFO_BASENAME);

$_sys['base_url'] = dirname($_SERVER['SCRIPT_NAME']);
if (strlen($_sys['base_url']) <= 1) $_sys['base_url'] = '';
$_sys['dispatcher'] = $config['use_rewrite'] ? $_sys['base_url'] : $_SERVER['SCRIPT_NAME'];

$_sys['script_url'] = $config['use_rewrite'] ? $_sys['base_url'] : $_sys['base_url'].'/'.$_sys['self'];

$_sys['uri_string'] = _fetch_uri_string();

$_sys['segments'] = array_slice(split('/', _fetch_uri_string()), 1);
if (count($_sys['segments']) == 0) $_sys['segments'][0] = 'index';

if (in_array($_sys['segments'][0], $config['pages'])) {
  require 'controllers/'. $_sys['segments'][0] .'.php';
}

//require 'pages/_template.php';

//echo '<pre>', print_r($config, TRUE), '</pre>';
//echo '<pre>', print_r($_sys, TRUE), '</pre>';
/*
Array
(
  [base_path] => D:\Server\AppServ\www\vlab.info\ohsy\www
  [self] => index.php
  [base_url] => /vlab.info/ohsy/www
  [script_url] => /vlab.info/ohsy/www/index.php
  [uri_string] =>
  [segments] => Array
    (
      [0] => index
    )

)
*/
?>