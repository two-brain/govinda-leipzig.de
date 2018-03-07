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
            $crop = $image->crop(900, 243, 85);
            echo '<img src="' . $crop->url() . '" alt="' . $image->img_desc() . '">';
          } else {
            $fallback = (new Asset('assets/images/header.jpg'))->crop(900, 243, 85);
            echo '<img src="' . $fallback->url() . '" alt="Die ganze Welt der indischen Küche | Govinda - Vegan + Vegetarirsch">';
          }
        ?>
        <?php snippet('partials/about-us-link') ?>
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
      <a class="badge-link facebook" href="<?= $site->facebook() ?>">
        <?= (new Asset('assets/images/facebook-big.svg'))->content() ?>
      </a>
    </header>
    <main class="clearfix">
