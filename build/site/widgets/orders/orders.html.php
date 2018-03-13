<?php
  $site = panel()->site();
  $orders = $site->orders()->toStructure()->limit(5);

  foreach ($orders as $order) :
?>

<div class="dashboard-box dashboard-orders">
  <div class="text">
    <h3>
      Bestellung von <?= $order->full_name() ?>:
    </h3>
    <?= $order->nachricht() ?>
  </div>
  <div class="text">
    <h4>Kontakt</h4>
    <ul class="dashboard-items">
      <li>
        E-Mail: <a href="mailto:<?= $order->email() ?>"><?= $order->email() ?></a>
      </li>
      <?php e($order->telefon()->isNotEmpty(), '<li>Telefon: ' . $order->telefon() . '</li>') ?>
    </ul>
  </div>
  <div class="text">
    <h4>Sonstige Angaben:</h4>
    <ul class="dashboard-items">
      <li>
        Vegan?<?php e($order->vegan() == 'ja', ' ja', ' nein') ?>
      </li>
      <?php e($order->datum()->isNotEmpty(), '<li>Datum: ' . $order->datum() . '</li>') ?>
      <?php e($order->art()->isNotEmpty(), '<li>Art der Veranstaltung: ' . $order->art() . '</li>') ?>
    </ul>
  </div>
</div>

<?php endforeach ?>
