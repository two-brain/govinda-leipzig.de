<?php
  $slug = str::slug($item->title());
?>

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
      <img data-layzr="<?= $thumb->url() ?>" alt="<?= $image->img_desc() ?>">
      <noscript>
        <img src="<?= $thumb->url() ?>" alt="<?= $image->img_desc() ?>">
      </noscript>
    </div>
    <?php
      endif;
      endforeach;
    ?>
  </div>
</div>