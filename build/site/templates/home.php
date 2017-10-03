<?php snippet('header') ?>

<div class="promo">
  <?php
    $promoItems = $page->promo()->toStructure();
    foreach ($promoItems as $item) :
  ?>
  <div class="promo__item promo__item--<?= $item->link() ?>">
    <a class="promo__link" href="<?= url($item->link()) ?>">
      <?php e($image = $item->image()->toFile(), $image->imageset([ '214' ], [ 'alt' => $image->img_desc() ])) ?>
      <h2><?= $item->title() ?></h2>
    </a>
    <?= $item->text()->kt() ?>
  </div>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
