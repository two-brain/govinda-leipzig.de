<?php

/*
 * Setting up routes
 */

c::set('routes', array(
  array(
    'pattern' => 'bistro',
    'action'  => function () {
       go('unser-angebot', 301);
    }
  ),
  array(
    'pattern' => 'catering/anfrage',
    'action'  => function () {
       go('catering/unverbindliche-anfrage', 301);
    }
  ),
  array(
    'pattern' => 'kontakt',
    'action'  => function () {
       go('ueber-uns', 301);
    }
  )
));
