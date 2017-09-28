<!DOCTYPE html>
<html class="no-js" lang="<?= $site->language() ?>">

<?php snippet('head') ?>

  <body class="<?php e(!$page->parents()->count(), $page->uid(), $page->parent()->uid()) ?>">
    <header class="site-header">
      <a class="header-logo" href="/">
        <?= (new Asset('assets/images/govinda.svg'))->content() ?>
      </a>
      <?php if(!$page->isHomePage()) : ?>
      <img class="header-image" src="/assets/images/header-<?php e(!$page->parents()->count() && $page->isVisible(), $page->uid(), $page->parent()->uid()) ?>.jpg" alt="Govinda Bistro - Vegan + Vegetarisch in Leipzig">
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
