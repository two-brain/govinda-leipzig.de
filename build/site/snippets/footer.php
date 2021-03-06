      <?php if(!$page->isHomePage()) snippet('partials/testimonials') ?>
    </main>
    <footer class="site-footer">
      <div class="footer-details">
        <a class="facebook" href="<?= $site->facebook() ?>" title="Besucht uns auf Facebook!" alt="Facebook-Logo" target="_blank">
          <?= (new Asset('assets/images/facebook-big.svg'))->content() ?>
          <strong>Schaut auf Facebook vorbei!</strong>
        </a>
      </div>
      <nav class="footer-nav">
        <ul class="secondary-links inline">
          <li><a href="<?= page('ueber-uns')->url() ?>">
            <?= page('ueber-uns')->title() ?>
          </a></li>
          <li><a href="<?= page('allgemeine-geschaeftsbedingungen')->url() ?>">
            <?= page('allgemeine-geschaeftsbedingungen')->title() ?>
          </a></li>
          <li><a href="<?= page('impressum')->url() ?>">
            <?= page('impressum')->title() ?>
          </a></li>
        </ul>

        <ul class="footer-social inline">
          <li><a href="mailto:<?= $site->mail() ?>">
            <?= (new Asset('assets/images/mail.svg'))->content() ?>
            </a></li>
        </ul>
      </nav>
    </footer>

    <?= js('assets/scripts/main.js') ?>

    <?php if($page->uid() == 'unverbindliche-anfrage') : ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/de.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js" charset="utf-8"></script>
      <script type="text/javascript">
        moment.locale('de');
        var picker = new Pikaday({
          field: document.getElementById('datum'),
          format: moment.localeData()._longDateFormat.L,
          firstDay: 1,
          i18n: {
            months: moment.localeData()._months,
            weekdays: moment.localeData()._weekdays,
            weekdaysShort: moment.localeData()._weekdaysShort,
          },
          minDate: moment().toDate(),
          theme: 'pd-govinda',
        });
      </script>

    <?php endif ?>

  </body>
</html>
