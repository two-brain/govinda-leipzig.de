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
        $slug = str::slug($item->title());
      ?>
      <div class="classic<?php e($count++%2, ' left', ' right') ?>">
        <div class="wrap">
          <div class="image-area">
            <div class="slider">
              <div class="slides" data-name="<?= $slug ?>">
                <?php
                  $images = $item->thumbs()->yaml();
                  foreach ($images as $image) :
                  if($image = $page->image($image)) : ?>
                    <div class="slide">
                    <?= $image->crop(364, 248, 85)->html() ?>
                    </div>
                <?php
                  endif;
                  endforeach;
                ?>
              </div>
              <div class="thumbnails-<?= $slug ?>">
                <?php foreach ($images as $image) : ?>
                <?php if($image = $page->image($image)) : ?>
                  <div class="thumbnail">
                    <?= $image->crop(118, 118, 85)->html(); ?>
                  </div>
                <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div class="text">
            <h2><?= $item->title() ?></h2>
            <?= $item->text()->kt() ?>
          </div>
        </div>
      </div>

      <?php e($item !== $last, '<hr>') ?>
      <?php endforeach ?>
    </div>
    <hr>
    <?= $page->outro()->kt() ?>
  </section>

<?php snippet('footer') ?>
