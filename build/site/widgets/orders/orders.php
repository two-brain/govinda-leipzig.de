<?php

return array(
  'title' => array(
    'text' => 'Aktuelle Bestellungen',
    'link' => 'options',
  ),
  'html' => function() {
    return tpl::load(__DIR__ . DS . 'orders.html.php');
  }
);
