<?php

// Includes

include kirby()->roots()->config() . '/languages.php';

/*

---------------------------------------
Development settings
---------------------------------------

Debugging mode, see here: https://getkirby.com/docs/developer-guide/troubleshooting/debugging
Multi-environment-setup, see here: https://getkirby.com/docs/developer-guide/configuration/options

*/

c::set('debug', true);
c::set('fingerprint', false);
c::set('thumbs.driver', 'im');
c::set('cache', false);

c::set('imagekit.optimize', false);
c::set('imagekit.widget.step', 15);

c::set('imageset.placeholder', 'blurred');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
