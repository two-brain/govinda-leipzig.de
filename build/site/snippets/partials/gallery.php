<?php if($page->gallery()->isNotEmpty()) : ?>
  <div class="gallery lightbox">
    <?php
      foreach ($gallery as $image) :
      $image = $page->image($image);
      $crop = $image->crop(150, null, 85);
    ?>
    <a class="gallery__item" href="<?= $image->url() ?>" data-caption="<?= $image->img_title() ?>">
      <img data-layzr="<?= $crop->url() ?>" alt="<?= $image->img_desc() ?>">
      <noscript>
        <img src="<?= $crop->url() ?>" alt="<?= $image->img_desc() ?>">
      </noscript>
    </a>
    <?php endforeach ?>
  </div>
<?php endif ?>
