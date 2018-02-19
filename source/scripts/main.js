/*
 * Loading dependencies
 */

import baguetteBox from 'baguettebox.js';
import { tns } from 'tiny-slider/src/tiny-slider.module';


/*
 * Declaring custom functions
 */

// 1. Simple JS feature detection

function featureDetection() {
  let className = '';
  let html = '';
  html = document.documentElement;
  className = html.className.replace('no-js', 'js');
  html.className = className;
}




// forEach method, could be shipped as part of an Object Literal/Module
var forEach = function (array, callback, scope) {
  for (var i = 0; i < array.length; i++) {
    callback.call(scope, i, array[i]); // passes back stuff we need
  }
};

var sliders = document.querySelectorAll('.slides');
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

document.addEventListener('DOMContentLoaded', function(event) {
  featureDetection();

  baguetteBox.run('.gallery', {
    animation: 'fadeIn',
    // buttons: false,
  });
    

})
