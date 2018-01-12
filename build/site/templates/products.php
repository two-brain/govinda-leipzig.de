<?php snippet('header') ?>

  <section class="page">
    <?= $page->text()->kt(); ?>
    <hr>
    <div class="classics">
      <?php
        $classics = $page->classics()->toStructure();
        $last = $classics->last();
        $count = 1;
        foreach ($classics as $item) :
      ?>
      <div class="classic<?php e($count++%2, ' left', ' right') ?> wrap">
        <div class="image">
          <?php if($image = $item->image()->toFile()) { echo $image->imageset([ '345' ], [ 'alt' => $image->img_desc() ]); } ?>
        </div>
        <div class="text">
          <h2><?= $item->title() ?></h2>
          <?= $item->text()->kt(); ?>
        </div>
      </div>
      <?php e($item !== $last, '<hr>') ?>
      <?php endforeach ?>
    </div>
    <hr>
    <?= $page->outro()->kt(); ?>
  </section>

<?php snippet('footer') ?>
