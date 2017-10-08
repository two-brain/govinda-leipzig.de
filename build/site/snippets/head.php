<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- <script>
    function loadFont(t,e,n,o){function a(){if(!window.FontFace)return!1;var t=new FontFace("t",'url("data:application/font-woff2,") format("woff2")',{}),e=t.load();try{e.then(null,function(){})}catch(n){}return"loading"===t.status}var s=navigator.userAgent,r=!window.addEventListener||s.match(/(Android (2|3|4.0|4.1|4.2|4.3))|(Opera (Mini|Mobi))/)&&!s.match(/Chrome/);if(!r){var c={};try{c=localStorage||{}}catch(f){}var i="x-font-"+t,d=i+"url",l=i+"css",u=c[d],w=c[l],h=document.createElement("style");if(h.rel="stylesheet",document.head.appendChild(h),!w||u!==e&&u!==n){var p=n&&a()?n:e,m=new XMLHttpRequest;m.open("GET",p),m.onload=function(){m.status>=200&&m.status<400&&(c[d]=p,c[l]=m.responseText,o||(h.textContent=m.responseText))},m.send()}else h.textContent=w}}
    loadFont('webfonts', '/assets/fonts/webfonts.woff.css', '/assets/fonts/webfonts.woff2.css')
  </script> -->
  <!-- <noscript> -->
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Merriweather'>
  <!-- </noscript> -->

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

  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
</head>
