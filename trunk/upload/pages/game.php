<?php
if (!defined('EZGP')) die('Access denied.');
$game = $data['game'];
?>
<div class="gradient">
  <h1 class="game_title"><?php echo $game['name']; ?></h1>

  <div id="game_container"><div id="game_swf">Loading...</div></div>

</div>

<div class="gradient floatLeft">

  <div class="width66 floatLeft">
    <h2>About this game</h2>
    <div class="width25 floatLeft">
      <p>
        <img src="<?php echo $game['thumbnail_url']; ?>" width="100" height="100" />
      </p>
    </div>
    <div class="width75 floatLeft">
      <ul>
        <li>Added: <?php echo update_desc($game['updated']); ?></li>
        <li>Category: <?php echo htmlspecialchars($game['category']); ?></li>
        <li>Tags: <?php echo htmlspecialchars($game['categories']); ?></li>
      </ul>
    </div>
    <blockquote class="floatLeft">
      <p><?php echo htmlspecialchars($game['description']); ?></p>
    </blockquote>
  </div>

  <div class="width33 floatRight">
    <h2>Controls:</h2>
    <ul>
      <?php
        $controls = unserialize($game['controls']);
        foreach ($controls as $control) {
          if (is_array($control) && count($control) > 1 && $control[0] != 'na' && $control[1] != 'na') {
            echo '<li>', htmlspecialchars($control[0]), ': ', htmlspecialchars($control[1]), '</li>';
          }
        }
      ?>
    </ul>
    <p><?php echo htmlspecialchars($game['instructions']); ?></p>

  </div>
</div>
