    </main>
    <footer class="site-footer">
      <div class="footer-details">
        <a class="facebook" href="https://www.facebook.com/pages/Govinda-Vegan-Vegetarisch/112828825406718?ref=hl">
          <?= (new Asset('assets/images/facebook.svg'))->content() ?>
        </a>
        <strong>
          <?= $site->title() ?>
        </strong>
      </div>
      <nav class="footer-links">
        <a href="<?= page('allgemeine-geschaeftsbedingungen')->url() ?>"><?= page('allgemeine-geschaeftsbedingungen')->title() ?></a>
        <a href="<?= page('impressum')->url() ?>"><?= page('impressum')->title() ?></a>
      </nav>
    </footer>

    <?= js('assets/scripts/main.js') ?>

  </body>
</html>
