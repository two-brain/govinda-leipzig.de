<?php

// Includes

include kirby()->roots()->config() . '/license.php';
include kirby()->roots()->config() . '/languages.php';
include kirby()->roots()->config() . '/thumbnails.php';
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


c::set('govinda.upload-quality', 85);

/*
 * Resizing images on upload / replacement
 */

kirby()->hook('panel.file.upload', 'resizeImage');
kirby()->hook('panel.file.replace', 'resizeImage');

function resizeImage($file) {
  // set a max. dimension
  $maxDimension = 1440;
  try {
    // check file type and dimensions
    if ($file->type() == 'image' and ($file->width() > $maxDimension)) {

      // get the original file path
      $originalPath = $file->dir() . '/' . $file->filename();
      // create a thumb and get its path
      $resizedImage = $file->resize($maxDimension, null, c::get('govinda.upload-quality'));
      $resizedPath = $resizedImage->dir() . '/' . $resizedImage->filename();
      // replace the original image with the resized one
      copy($resizedPath, $originalPath);
      unlink($resizedPath);
      }
  } catch (Exception $e) {
      return response::error($e->getMessage());
  }
}
