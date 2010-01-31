<?php
if (!defined('EZGP')) die('Access denied.');
$CONST_SHOW_PAGES = 5;
extract($data);

//paging
$total_pages = intval(($rows - 1) / $pagesize) + 1;
if ($p == "" || $p < 1 || $p > $total_pages) $p = 1;
$show_page_from = $p - (int)($CONST_SHOW_PAGES / 2);
if ($show_page_from < 1) $show_page_from = 1;
$show_page_to = $show_page_from + ($CONST_SHOW_PAGES - 1);
if ($show_page_to > $total_pages) $show_page_to = $total_pages;
$show_page_from = $show_page_to - ($CONST_SHOW_PAGES - 1);
if ($show_page_from < 1) $show_page_from = 1;
?>
<div class="width100 gradient clear">
  <h2 class="floatLeft"><?php echo strtr($cat, '_', ' '); ?></h2>
  <p class="floatRight">Order by:
    <?php
      if ($order == 'newest') {
        echo '<em>Newest</em> | ',
             '<a href="', $_sys['dispatcher'], '/games/', $cat, '/popular">Popular</a>';
      } else {
        echo '<a href="', $_sys['dispatcher'], '/games/', $cat, '">Newest</a> | ',
             '<em>Popular</em>';
     }
    ?>
  </p>
  <div class="game_list_page clear">
    <ul>
      <?php
        foreach ($games as $game) {
          echo '<li><a href="', $_sys['dispatcher'], '/game/', $game['slug'], '/', dec2any($game['id']), '#mainMenu" title="', htmlspecialchars($game['name']), '">',
              '<span><img src="', $game['thumbnail_url'], '" width="100" height="100" /></span>',
              '<em>', htmlspecialchars($game['name']), '</em></a></li>';
        }
      ?>
    </ul>
    <div class="paginator">
      <?php
      $defaut_url = $_sys['dispatcher'] .'/games/'. $cat .'/'. $order .'/';
      if ($p == 1) {
        echo '<span class="disable">&lt;&lt;</span> ',
             '<span class="previous disable">&lt;</span>';
      } else {
        echo '<a href="', $defaut_url, '1">&lt;&lt;</a> ',
             '<a href="', $defaut_url, $p - 1, '" class="previous">&lt;</a>';
      }

      for ($i = $show_page_from; $i <= $show_page_to; $i++)	{
        if ($i === $p) {
          echo '<span class="current">', $p, '</span> ';
        } else {
          echo '<a href="', $defaut_url, $i, '">', $i, '</a> ';
        }
      }

      if ($p == $total_pages) {
        echo '<span class="next disable">&gt;</span> ',
             '<span class="disable">&gt;&gt;</span>';
      } else {
        echo '<a href="', $defaut_url, $p + 1, '" class="next">&gt;</a> ',
             '<a href="', $defaut_url, $total_pages, '">&gt;&gt;</a>';
      }
      ?>
    </div>
  </div>
</div>
