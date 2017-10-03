'use strict';

/*
 * Loading dependencies
 */

import baguetteBox from 'baguettebox.js';



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



/*
 * Initializing functions
 */

document.addEventListener('DOMContentLoaded', event => {
  featureDetection();

  baguetteBox.run('.gallery', {
    animation: 'fadeIn',
    // buttons: false,
  });
})
