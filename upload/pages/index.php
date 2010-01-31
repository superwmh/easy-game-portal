<?php
if (!defined('EZGP')) die('Access denied.');
global $config;
?>
<div class="width100 gradient">
  <h2>Newest Games</h2>
  <div class="top_game_list" id="newest_games">
    <ul>
      <?php
      shuffle($data['newest']);
      for ($i = 0; $i < 12; ++$i) {
        $game = $data['newest'][$i];
        echo '<li><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
            '<span><img src="', $game['thumbnail_url'], '" width="100" height="100" /></span><em>', htmlspecialchars($game['name']), '</em></a></li>';
      }
      ?>
    </ul>
  </div>
  <!--TODO a class="floatRight">More...</a-->
</div>

<div class="width100 gradient clear">
  <h2>Popular Games</h2>
  <div class="top_game_list">
    <ul>
      <?php
      shuffle($data['newest']);
      for ($i = 0; $i < 6; ++$i) {
        $game = $data['newest'][$i];
        echo '<li><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
            '<span><img src="', $game['thumbnail_url'], '" width="100" height="100" /></span><em>', htmlspecialchars($game['name']), '</em></a></li>';
      }
      ?>
    </ul>
  </div>
  <!--TODO a class="floatRight">More...</a-->
</div>

<div class="gradient clear" id="home_cat">
  <?php
    if (isset($config['welcome_message']) && $config['welcome_message'] !== '') {
  ?>
  <h2>Welcome</h2>
  <blockquote>
    <p><?php echo htmlspecialchars($config['welcome_message']); ?></p>
  </blockquote>
  <?php
    }
  ?>

  <h2>Categories</h2>

  <!------------------------- line ------------------------------->
  <dl>
    <dt>Action</dt>
    <?php
    shuffle($data['index_action']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_action'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/action">more...</a></dd>
  </dl>

  <dl>
    <dt>Adventure</dt>
    <?php
    shuffle($data['index_adventure']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_adventure'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/adventure">more...</a></dd>
  </dl>

  <dl>
    <dt>Board Game</dt>
    <?php
    shuffle($data['index_board']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_board'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/board">more...</a></dd>
  </dl>

  <dl>
    <dt>Casino</dt>
    <?php
    shuffle($data['index_casino']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_casino'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <!------------------------- line ------------------------------->
  <dl>
    <dt>Customize</dt>
    <?php
    shuffle($data['index_customize']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_customize'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <dl>
    <dt>Dress-up</dt>
    <?php
    shuffle($data['index_dressup']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_dressup'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <dl>
    <dt>Driving</dt>
    <?php
    shuffle($data['index_driving']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_driving'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/driving">more...</a></dd>
  </dl>

  <dl>
    <dt>Education</dt>
    <?php
    shuffle($data['index_education']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_education'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <!------------------------- line ------------------------------->
  <dl>
    <dt>Fighting</dt>
    <?php
    shuffle($data['index_fighting']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_fighting'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <dl>
    <dt>Puzzles</dt>
    <?php
    shuffle($data['index_puzzles']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_puzzles'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/puzzles">more...</a></dd>
  </dl>

  <dl>
    <dt>Rhythm</dt>
    <?php
    shuffle($data['index_rhythm']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_rhythm'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <dl>
    <dt>Shooting</dt>
    <?php
    shuffle($data['index_shooting']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_shooting'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/shooting">more...</a></dd>
  </dl>

  <!------------------------- line ------------------------------->
  <dl>
    <dt>Sports</dt>
    <?php
    shuffle($data['index_sports']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_sports'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/sports">more...</a></dd>
  </dl>

  <dl>
    <dt>Strategy</dt>
    <?php
    shuffle($data['index_strategy']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_strategy'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/strategy">more...</a></dd>
  </dl>

  <dl>
    <dt>Other</dt>
    <?php
    shuffle($data['index_other']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_other'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
    <dd class="more"><a href="<?php echo $_sys['dispatcher']; ?>/games/others">more...</a></dd>
  </dl>

  <dl>
    <dt>Top Recommanded</dt>
    <?php
    shuffle($data['index_top']);
    for ($i = 0; $i < 5; ++$i) {
      $game = $data['index_top'][$i];
      echo '<dd><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
          '<img src="', $game['thumbnail_url'], '" width="30" height="30" /> ', htmlspecialchars($game['name']), '</a></dd>';
    }
    ?>
  </dl>

</div>
