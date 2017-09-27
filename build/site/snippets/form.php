<!-- ARIA REQUIRED ERSETZEN DURCH AJAX FORM VALIDATION
ODER MESSAGES ALS MODALS
action="<?= $page->url() ?>"
 -->
<form class="form" method="post">

  <h2>Bestellformular</h2>

  <div class="form__item">
    <label for="full_name">Name:<span class="required"> (erforderlich)</span></label>
    <input type="text" id="full_name" name="full_name" placeholder="Name" value="<?= isset($data['full_name']) ? $data['full_name'] : '' ?>" required/>
  </div>

  <div class="form__item">
    <label for="email">Email:<span class="required"> (erforderlich)</span></label>
    <input type="email" name="email" id="email" placeholder="mail@beispiel.de" value="<?= isset($data['email']) ? $data['email'] : '' ?>" required/>
  </div>

  <div class="form__item">
    <label for="telefon">Telefon:</label>
    <input type="text" id="telefon" name="telefon" placeholder="Telefon" value="<?= isset($data['telefon']) ? $data['telefon'] : '' ?>"/>
  </div>

  <div class="form__item">
    <label for="datum">Datum der Veranstaltung:</label>
    <input type="text" id="datum" name="datum" placeholder="Datum der Veranstaltung" value="<?= isset($data['datum']) ? $data['datum'] : '' ?>"/>
  </div>

  <div class="form__item">
    <label for="art">Art der Veranstaltung:</label>
    <input type="text" id="art" name="art" placeholder="Art der Veranstaltung" value="<?= isset($data['art']) ? $data['art'] : '' ?>"/>
  </div>

  <div class="form__item">
    <label for="vegan">Vegan?</label>
    <input type="checkbox" id="vegan" name="vegan" value="vegan"/>
  </div>

  <div class="form__item">
    <label for="nachricht">Nachricht:<span class="required"> (erforderlich)</span></label>
    <textarea name="nachricht" id="nachricht" placeholder="Wir freuen uns auf Ihre Bestellung!"><?= isset($data['nachricht']) ? $data['nachricht'] : '' ?></textarea>
  </div>

  <div class="honey">
     <label for="nachricht">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" placeholder="http://example.com" value="<?= isset($data['website']) ? $data['website'] : '' ?>"/>
  </div>

  <button type="submit" name="order" value="Bestellen">Bestellen</button>

</form>
