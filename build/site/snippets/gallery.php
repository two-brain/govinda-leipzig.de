<?php if($page->hasImages()) : ?>
  <div class="gallery">
    <?php
      $pageImages = $page->images();
      foreach ($pageImages as $image) :
    ?>
    <a class="gallery__item" href="<?= $image->url() ?>" data-caption="<?= $image->img_title() ?>">
      <img src="<?= $image->crop(150, 150, 85)->url() ?>" alt="<?= $image->img_desc() ?>">
    </a>
    <?php endforeach ?>
  </div>
<?php endif ?>
