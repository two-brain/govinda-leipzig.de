<?php

include kirby()->roots()->config() . '/languages.php';

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

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

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
