<?php
if (!defined('EZGP')) die('Access denied.');

$config = array(
  'use_rewrite'     => TRUE,
  'site_name'       => 'ohsy.com',
  'site_slogan'     => 'flash game city',
  'meta_keywords'   => 'Flash games,Free games,Online games',
  'meta_description'=> 'We have more than 15,000+ free flash games for you. Please enjoy your self and have fun.',
  'welcome_message' => 'Welcome to the playground, we have more than 15,000+ free flash games for you. Please enjoy your self.',
  'contact_email'   => 'support@vlab.info',
  'swf_domain_name' => 'ohsy.com',
  'db_host'         => 'localhost',
  'db_encoding'     => 'utf8',
  'db_user'         => 'YOUR_DB_USER',
  'db_pass'         => 'YOUR_DB_PASSWORD',
  'db_name'         => 'YOUR_DB_NAME',
  'db_table_name'   => 'ezgames',
);


/**********************
 * Don't modify below *
 **********************/

$config['pages'] = array('index', 'games', 'game', 'random');

?>