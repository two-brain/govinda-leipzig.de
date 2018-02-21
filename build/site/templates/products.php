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
                  if($image = $page->image($image)) :
                  $crop = $image->crop(364, 248, 85);
                ?>
                <div class="slide lightbox">
                  <a href="<?= $image->url() ?>" data-caption="<?= $image->img_title() ?>">
                    <img src="<?= $crop->url() ?>" title="<?= $image->img_title() ?>" alt="<?= $image->img_desc() ?>">
                  </a>
                </div>
                <?php
                  endif;
                  endforeach;
                ?>
              </div>
              <div class="thumbnails-<?= $slug ?>">
                <?php
                  foreach ($images as $image) :
                  if($image = $page->image($image)) :
                  $thumb = $image->crop(118, 118, 85);
                ?>
                <div class="thumbnail" title="<?= $image->img_title() ?>">
                  <img src="<?= $thumb->url() ?>" alt="<?= $image->img_desc() ?>">
                </div>
                <?php
                  endif;
                  endforeach;
                ?>
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
