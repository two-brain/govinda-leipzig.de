<!DOCTYPE html>
<html class="no-js" lang="<?= $site->language() ?>">

<?php snippet('head') ?>

  <body class="<?php e(!$page->parents()->count(), $page->uid(), $page->parent()->uid()) ?>">
    <header class="site-header">
      <a class="header-logo" href="/">
        <?= (new Asset('assets/images/govinda.svg'))->content() ?>
      </a>
      <?php if(!$page->isHomePage()) : ?>

      <div class="header-image">
        <?php
          if($image = $page->banner()->toFile()) {
            echo $image->imageset([ '900x243' ], [ 'placeholder' => 'triangles', 'alt' => $image->img_desc() ]);
          } else {
            $fallback = new Asset('assets/images/header.jpg');
            echo imageset($fallback, [ '900x243' ], [ 'placeholder' => 'triangles', 'alt' => 'Die ganze Welt der indischen Küche | Govinda - Vegan + Vegetarirsch' ]);
          }
        ?>
        <?php snippet('about-us-link') ?>
      </div>


      <nav class="nav">
        <?php
          $menuItems = $pages->visible();
          foreach ($menuItems as $item) :
        ?>
        <a class="nav__link<?php e($item->isOpen(), ' is-active')?>" href="<?= $item->url() ?>"><?= $item->title() ?></a>
        <?php endforeach ?>
      </nav>
      <?php endif ?>
    </header>
    <main class="clearfix">
