<?php snippet('header') ?>

  <section class="page">
    <?= $page->text()->kt() ?>
    <hr>
    <div class="classics">
      <?php
        $classics = $page->classics()->toStructure();
        $last = $classics->last();
        $count = 1;
        foreach ($classics as $item) :
      ?>
      <div class="classic<?php e($count++%2, ' left', ' right') ?>">
        <div class="wrap">
          <div class="image-area">
            <?php snippet('partials/slider', $item) ?>
          </div>
          <div class="text">
            <h2><?= $item->title() ?></h2>
            <?= $item->text()->kt() ?>
          </div>
        </div>
      </div>

      <?php e($item !== $last, '<hr>') ?>
      <?php endforeach ?>
    </div>
    <hr>
    <?= $page->outro()->kt() ?>
  </section>

<?php snippet('footer') ?>
