<?php snippet('header') ?>

<div class="promo">
  <?php
    $promoItems = $page->promo()->toStructure();
    foreach ($promoItems as $item) :
  ?>
  <div class="promo__item promo__item--<?= $item->link() ?>">
    <a class="promo__link" href="<?= url($item->link()) ?>">
      <img src="<?= $item->image()->toFile()->crop(214, 243, 95)->url() ?>" alt="Govinda Bistro - Vegan + Vegetarische Küche in Leipzig">
      <h2><?= $item->title() ?></h2>
    </a>
    <?= $item->text()->kt() ?>
  </div>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
