<?php snippet('header') ?>

  <section class="page">
    <?= $page->text()->kt() ?>
    <?php snippet('form', compact('data')) ?>
  </section>

<?php snippet('footer') ?>
