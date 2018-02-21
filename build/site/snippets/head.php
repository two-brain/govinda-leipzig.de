<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preload" href="/assets/fonts/Merriweather-Light-subset.woff2" as="font" type="font/woff2" crossorigin>

  <?php snippet('seo') ?>

  <?php if(c::get('env') == 'development') : ?>

    <?= css('assets/styles/main.css'); ?>

    <?= js('site/plugins/imageset/assets/js/dist/imageset.js') ?>

  <?php else : ?>

    <style media="screen">
      <?= (new Asset('assets/styles/main.css'))->content() ?>
    </style>

    <script type="text/javascript">
      <?= (new Asset('site/plugins/imageset/assets/js/dist/imageset.js'))->content() ?>
    </script>

  <?php endif ?>

  <link rel="shortcut icon" href="<?= url('favicon.png') ?>">

</head>
