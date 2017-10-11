<?php

// Includes

include kirby()->roots()->config() . '/license.php';
include kirby()->roots()->config() . '/languages.php';
include kirby()->roots()->config() . '/thumbnails.php';

/*

---------------------------------------
Development settings
---------------------------------------

Debugging mode, see here: https://getkirby.com/docs/developer-guide/troubleshooting/debugging
Multi-environment-setup, see here: https://getkirby.com/docs/developer-guide/configuration/options

*/

c::set('env', 'development');
c::set('debug', true);
c::set('fingerprint', false);
c::set('cache', false);

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
