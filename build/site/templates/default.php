<?php snippet('header') ?>

<div class="wrap">
  <section class="content">
    <?= $page->text()->kt() ?>
    <?php snippet('partials/gallery') ?>
  </section>
  <?php snippet('sidebar') ?>
</div>

<?php snippet('footer') ?>
