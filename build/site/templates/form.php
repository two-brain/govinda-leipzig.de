<?php snippet('header') ?>

  <section class="page">
    <?php
      // if the form was successfully submitted and the page created, show the success message
      if(isset($success)) :
    ?>
    <?= $page->text()->kt(); ?>
    <div class="form__message">
      <?= $success; ?>
    </div>
    <?php endif ?>

    <?php
      if(!isset($success)) {
        // if the $success variable is not set, show the form (i.e. when the page is first loaded or the form submission was not successful)
        echo $page->text()->kt();
        snippet('form', compact('data'));
      }
    ?>
    <?php
      if($alert) :
      // if the form input does not validate, show a list of alerts ?>
      <div class="form__alert">
        <h2>Achtung:</h2>
        <ul>
          <?php foreach($alert as $message) : ?>
            <li><?= html($message) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>


  </section>

<?php snippet('footer') ?>
