<?php

/*

---------------------------------------
Production settings
---------------------------------------

For kirby-fingerprint plugin, see here: https://github.com/iksi/kirby-fingerprint
For kirby-compress plugin, see here: https://github.com/iksi/kirby-compress

*/

c::set('env', 'production');
c::set('debug', false);
c::set('thumbs.driver', 'gd');
c::set('cache', true);
c::set('cache.ignore', array(
  'catering/unverbindliche-anfrage',
  'sitemap'
));

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
