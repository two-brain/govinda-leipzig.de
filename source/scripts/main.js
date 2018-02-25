/*
 * Loading dependencies
 */

import baguetteBox from 'baguettebox.js';
import { tns } from 'tiny-slider/src/tiny-slider.module';
import Layzr from 'layzr.js';

/*
 * Declaring custom functions
 */

function featureDetection() {
  let className = '';
  let html = '';
  html = document.documentElement;
  className = html.className.replace('no-js', 'js');
  html.className = className;
}

const lazyload = Layzr({
  normal: 'data-layzr',
  threshold: 25
});

const forEach = function (array, callback, scope) {
  for (let i = 0; i < array.length; i++) {
    callback.call(scope, i, array[i]);
  }
};

const sliders = document.querySelectorAll('.slides');
forEach(sliders, function (index, value) {
  let thumbnail = value.dataset.name;
  let slider = tns({
    container: value,
    mode: 'gallery',
    speed: 0,
    lazyload: true,
    navContainer: '.thumbnails-' + thumbnail,
    navAsThumbnails: true,
    controls: false,
  });
});


/*
 * Initializing functions
 */

featureDetection();
lazyload
  .update()
  .check()
  .handlers(true);
baguetteBox.run('.lightbox', { animation: 'fadeIn' });
