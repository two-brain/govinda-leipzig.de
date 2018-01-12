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
      <?php e($image = $item->image()->toFile(), $image->imageset([ '214' ], [ 'alt' => $image->img_desc() ])) ?>
      <h2><?= $item->title() ?></h2>
    </a>
    <?= $item->text()->kt() ?>
    <?php if($count == 1) { snippet('about-us-link'); } ?>
  </div>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
