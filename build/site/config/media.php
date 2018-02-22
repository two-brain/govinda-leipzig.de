<?php

c::set('thumbs.driver', 'im');
c::set('thumbs.quality', 85);

// ImageSet options - see https://github.com/fabianmichael/kirby-imageset
c::set('imageset.placeholder', 'blurred');


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
      $resizedImage = $file->resize($maxDimension, null, c::get('thumbs.quality'));
      $resizedPath = $resizedImage->dir() . '/' . $resizedImage->filename();
      // replace the original image with the resized one
      copy($resizedPath, $originalPath);
      unlink($resizedPath);
      }
  } catch (Exception $e) {
      return response::error($e->getMessage());
  }
}
