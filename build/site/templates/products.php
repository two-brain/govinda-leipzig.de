<?php snippet('header') ?>

  <section class="page">
    <?= $page->text()->kt() ?>
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
          <?php
            $images = $item->thumbs()->yaml();
            $first = a::first($images);
            $thumb = $page->image($first);
          ?>
          <?= $thumb->crop(345, 230, 85)->html() ?>
          <div class="thumbnails" style="wdith: 345px">
            <?php foreach ($images as $image) : ?>
            <?php if($image = $page->image($image)) : ?>
                <?= $image->crop(112, 112, 85)->html(); ?>
            <?php endif ?>
            <?php endforeach ?>
          </div>





        </div>
        <div class="text">
          <h2><?= $item->title() ?></h2>
          <?= $item->text()->kt() ?>
        </div>
      </div>
      <?php e($item !== $last, '<hr>') ?>
      <?php endforeach ?>
    </div>
    <hr>
    <?= $page->outro()->kt() ?>
  </section>

<?php snippet('footer') ?>
