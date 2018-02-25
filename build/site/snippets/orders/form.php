<?php if(!isset($response['success'])) :  ?>
  <hr>
  <h2>Bestellformular</h2>
  <form class="form" action="<?= $page->url() ?>" method="post">
    <div class="wrap clearfix">
      <div class="form__item">
        <label for="full_name">Name:<span class="required"> (erforderlich)</span></label>
        <input type="text" id="full_name" name="full_name" placeholder="Wer bestellt?" value="<?= isset($data['full_name']) ? $data['full_name'] : '' ?>" required />
        <div class="alert"><?php if(isset($response['errors']['full_name'])) { echo $response['errors']['full_name']; } ?></div>
      </div>

      <div class="form__item">
        <label for="email">Email:<span class="required"> (erforderlich)</span></label>
        <input type="email" name="email" id="email" placeholder="mail@beispiel.de" value="<?= isset($data['email']) ? $data['email'] : '' ?>" required />
        <div class="alert"><?php if(isset($response['errors']['email'])) { echo $response['errors']['email']; } ?></div>
      </div>

      <div class="form__item">
        <label for="telefon">Telefon:</label>
        <input type="text" id="telefon" name="telefon" placeholder="Sind Sie telefonisch erreichbar?" value="<?= isset($data['telefon']) ? $data['telefon'] : '' ?>"/>
      </div>

      <div class="form__item">
        <label for="datum">Datum der Veranstaltung:</label>
        <input type="text" id="datum" name="datum" placeholder="Wann findet Ihre Veranstaltung statt?" value="<?= isset($data['datum']) ? $data['datum'] : '' ?>"/>
      </div>

      <div class="form__item">
        <label for="art">Art der Veranstaltung:</label>
        <input type="text" id="art" name="art" placeholder="zB Hochzeit, Jugendweihe, .." value="<?= isset($data['art']) ? $data['art'] : '' ?>"/>
      </div>

      <div class="form__item">
        <label for="vegan">Rein vegan?</label>
        <input type="hidden" name="vegan" value="nein"/>
        <input type="checkbox" id="vegan" name="vegan" value="ja"/>
      </div>
    </div>

    <div>
      <label for="nachricht">Nachricht:<span class="required"> (erforderlich)</span></label>
      <textarea name="nachricht" id="nachricht" placeholder="Wir freuen uns auf Ihre Bestellung!"><?= isset($data['nachricht']) ? $data['nachricht'] : '' ?></textarea>
      <div class="alert"><?php if(isset($response['errors']['nachricht'])) { echo $response['errors']['nachricht']; } ?></div>
    </div>

    <div class="honey">
       <label for="nachricht">If you are a human, leave this field empty</label>
       <input type="website" name="website" id="website" placeholder="http://example.com" value="<?= isset($data['website']) ? $data['website'] : '' ?>"/>
    </div>

    <button class="button" type="submit" name="order" value="Bestellen">Bestellen</button>

  </form>
<?php endif ?>

<div class="form-result">
  <?php if(isset($response['success'])) { echo $response['success']; } elseif(isset($response['error'])) { echo $response['error']; }  ?>
</div>
