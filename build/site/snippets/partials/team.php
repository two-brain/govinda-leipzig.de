<?php $image = site()->team_image()->toFile(); ?>
  <div class="team-image">
    <?php foreach(site()->team_members()->toStructure() as $pin) :
      $left = number_format($pin->x()->value() * 100, 2, '.', ',') . '%';
      $top = number_format($pin->y()->value() * 100, 2, '.', ',') . '%';
    ?>
    <span class="pin" style="left: <?= $left ?>; top: <?= $top ?>;">
      <?= $pin->member() ?>
    </span>
    <?php endforeach; ?>
    <img src="<?= $image->url() ?>" title="<?= $title ?>">
  </div>
