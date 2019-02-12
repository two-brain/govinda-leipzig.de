<?php

kirbytext::$tags['team'] = array(
  'html' => function($tag) {
    return snippet('partials/team', ['title' => $tag->attr('team')], true);
  }
);
