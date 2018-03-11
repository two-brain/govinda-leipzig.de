<?php
  $site = panel()->site();
  $orders = $site->orders()->toStructure()->limit(5);

  foreach ($orders as $order) :
?>

<div class="dashboard-box">
  <div class="text">
    <h3 class="">
      <span class="">
        Bestellung von <a href="mailto:<?= $order->mail() ?>"><?= $order->full_name() ?></a>:
      </span>
      <span class="hgroup-option-right">
        <?php e($order->datum()->isNotEmpty(), $order->datum()) ?>
      </span>
    </h3>
    <?= $order->nachricht() ?>
    <br>
<br>
<?= $order->datum() ?>

  </div>
</div>

<?php endforeach ?>
