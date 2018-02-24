<?php snippet('header') ?>

  <section class="page">
    <?= $page->text()->kt() ?>
    <?php snippet('orders/form', compact('data')) ?>
  </section>

<?php snippet('footer') ?>
