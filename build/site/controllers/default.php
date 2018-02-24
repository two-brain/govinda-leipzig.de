<?php

return function($site, $pages, $page) {

  $gallery = $page->gallery()->yaml();

  return compact('gallery');
};
