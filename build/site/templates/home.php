<?php snippet('header') ?>

<div class="promo">
  <?php
    $promoItems = $page->promo()->toStructure();
    $count = 0;
    foreach ($promoItems as $item) :
    $count++;
  ?>
  <div class="promo__item promo__item--<?= $item->link() ?>">
    <a class="promo__link" href="<?= url($item->link()) ?>">
      <?php
        if($image = $item->image()->toFile()) :
        $crop = $image->crop(214, 243, 85);
      ?>
      <img src="<?= $crop->url() ?>" alt="<?= $image->img_desc() ?>">
      <?php endif ?>
      <h2><?= $item->title() ?></h2>
    </a>
    <?= $item->text()->kt() ?>
    <?php if($count == 1) { snippet('partials/about-us-link'); } ?>
  </div>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
