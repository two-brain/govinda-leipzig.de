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
            $image = $page->banner();
            if($image->isNotEmpty()) {
              $image = $image->toFile();
              echo $image->imageset([ '900x243' ], [ 'placeholder' => 'triangles', 'alt' => $image->img_desc() ]);
            } else {
              $fallback = new Asset('assets/images/header.jpg');
              echo imageset($fallback, [ '900x243' ], [ 'placeholder' => 'triangles', 'alt' => $image->img_desc() ]);
            }
          ?>
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
