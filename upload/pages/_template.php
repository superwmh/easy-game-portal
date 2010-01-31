<?php
if (!isset($page['selected_menu'])) {
  $page['selected_menu'] = get_default_menu();
}
if (!isset($page['title'])) {
  $page['title'] = 'Free flash games - '.$config['site_name'];
}
if (!isset($page['keywords'])) {
  $page['keywords'] = $config['meta_keywords'];
}
if (!isset($page['description'])) {
  $page['description'] = $config['meta_description'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  <meta name="keywords" content="<?php echo htmlspecialchars($page['keywords']); ?>" />
  <meta name="description" content="<?php echo htmlspecialchars($page['description']); ?>" />
  <title><?php echo htmlspecialchars($page['title']); ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo $_sys['base_url']; ?>/css/html.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_sys['base_url']; ?>/css/layout.css" />
</head>
<body class="homepage">

<div id="content">

  <div id="header">
    <div id="title">
      <h1><?php echo htmlspecialchars($config['site_name']); ?></h1>
      <h2><?php echo htmlspecialchars($config['site_slogan']); ?></h2>
    </div>
    <img src="<?php echo $_sys['base_url']; ?>/images/bg/balloons.gif" alt="balloons" class="balloons" />
    <img src="<?php echo $_sys['base_url']; ?>/images/bg/header_left.jpg" alt="left slice" class="left" />
    <img src="<?php echo $_sys['base_url']; ?>/images/bg/header_right.jpg" alt="right slice" class="right" />
  </div>

  <div id="mainMenu">
    <ul>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/" title="Back to Homepage"<?php echo toggle_selected_menu('index', $page['selected_menu']); ?>>Home</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/action" title="Action Games"<?php echo toggle_selected_menu('action', $page['selected_menu']); ?>>Action</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/adventure" title="Adventure Games"<?php echo toggle_selected_menu('adventure', $page['selected_menu']); ?>>Adventure</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/board_game" title="Board Games"<?php echo toggle_selected_menu('board_game', $page['selected_menu']); ?>>Board</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/driving" title="Driving Games"<?php echo toggle_selected_menu('driving', $page['selected_menu']); ?>>Driving</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/puzzles" title="Puzzle Games"<?php echo toggle_selected_menu('puzzles', $page['selected_menu']); ?>>Puzzles</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/shooting" title="Shooting Games"<?php echo toggle_selected_menu('shooting', $page['selected_menu']); ?>>Shooting</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/sports" title="Sports Games"<?php echo toggle_selected_menu('sports', $page['selected_menu']); ?>>Sports</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/strategy" title="Strategy Games"<?php echo toggle_selected_menu('strategy', $page['selected_menu']); ?>>Strategy</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/games/others" title="Other Games"<?php echo toggle_selected_menu('others', $page['selected_menu']); ?>>Others</a></li>
      <li><a href="<?php echo $_sys['dispatcher']; ?>/random" title="Pick a Random Game">Random</a></li>
    </ul>
  </div>

  <div id="page">
    <?php echo $page['contents']; ?>
  </div>

</div>


<div id="footer">

  <div id="width">
    <span class="floatLeft">
      Powered by <a href="http://code.google.com/p/easy-game-portal/">Easy Game Portal</a> <span class="grey">|</span>
      Theme design <a href="http://fullahead.org" title="Goto Fullahead">Fullahead</a>
    </span>

    <span class="floatRight">
      <a href="mailto:<?php echo htmlspecialchars($config['contact_email']); ?>" title="Get in touch">Contact</a>
    </span>
  </div>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php
if (isset($page['script'])) {
  foreach ($page['script'] as $script) {
    echo '<script type="text/javascript" src="', $script, '"></script>';
  }
}
echo $page['custom_footer'];
?>

</body>
</html>