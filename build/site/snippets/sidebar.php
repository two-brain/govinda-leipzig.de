<aside class="sidebar">
  <?php
    $sidebarItems = $page->side()->toStructure();
    foreach ($sidebarItems as $item) :
  ?>
  <div class="sidebar__item">
    <?= $item->text()->kt() ?>
  </div>
  <?php endforeach ?>
</aside>
