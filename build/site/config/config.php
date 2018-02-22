<?php

// Includes

include kirby()->roots()->config() . '/license.php';
include kirby()->roots()->config() . '/languages.php';
include kirby()->roots()->config() . '/media.php';
include kirby()->roots()->config() . '/plugins.php';

/*

---------------------------------------
Development settings
---------------------------------------

Debugging mode, see here: https://getkirby.com/docs/developer-guide/troubleshooting/debugging
Multi-environment-setup, see here: https://getkirby.com/docs/developer-guide/configuration/options

*/

c::set('env', 'development');
c::set('debug', true);

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

/*
 * General settings
 */

c::set('panel.stylesheet', 'assets/panel.css');
