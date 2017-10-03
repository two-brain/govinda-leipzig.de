<?php if($page->gallery()->isNotEmpty()) : ?>
  <div class="gallery">
    <?php
      $galleryImages = $page->gallery()->yaml();
      foreach ($galleryImages as $image) :
    ?>
    <?php $image = $page->image($image); ?>
    <a class="gallery__item" href="<?= $image->url() ?>" data-caption="<?= $image->img_title() ?>">
      <?= $image->imageset([ '150x150' ], [ 'alt' => $image->img_desc() ]); ?>
    </a>
    <?php endforeach ?>
  </div>
<?php endif ?>
