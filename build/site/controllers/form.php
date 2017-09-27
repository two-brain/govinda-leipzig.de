<?php

return function($site, $pages, $page) {

  // for further information, see https://getkirby.com/docs/cookbook/creating-pages-from-frontend

  $alert = null;

  if(r::is('post') && get('order')) {
    if(!empty(get('website'))) {
      // lets tell the bot that everything is ok
      go($page->url());
      exit;
    }
    $data = array(
      'full_name'   => esc(get('full_name')),
      'email'       => esc(get('email')),
      'telefon'     => esc(get('telefon')),
      'datum'       => esc(get('datum')),
      'art'         => esc(get('art')),
      'vegan'       => esc(get('vegan')),
      'nachricht'   => esc(get('nachricht'))
    );

    $rules = array(
      'full_name'   => array('required'),
      'email'       => array('required', 'email'),
      'nachricht'   => array('required'),
    );
    $messages = array(
      'full_name'   => 'Name vergessen?',
      'email'       => 'Ungültige Mailadresse!',
      'nachricht'   => 'Bestellung vergessen?',
    );

    // some of the data is invalid
    if($invalid = invalid($data, $rules, $messages)) {
      $alert = $invalid;

    // the data is fine, let's send the email
    } else {

      // create the body from a simple snippet
      $body  = snippet('mailorder', $data, true);

      // build the email
      $email = email(array(
        'to'      => 'hello@twobrain.io',
        'from'    => 'catering@govinda-leipzig.de',
        'subject' => 'Catering-Anfrage',
        'replyTo' => $data['email'],
        'body'    => $body
      ));

      // try to send it and redirect to the thank you page if it worked
      if(!$email->send()) {
        // go('catering/jetzt-bestellen');

      // add the error to the alert list if it failed
      // } else {
        $alert = array($email->error());
      }

      // function for saving data as structure field
      function addToStructure($p, $field, $data = array()) {
        $fieldData = $p->$field()->yaml();
        $fieldData[] = $data;
        $fieldData = yaml::encode($fieldData);
        $p->update(array(
          $field => $fieldData
        ));
      }

      // let's try to create a new order inside the structure field
      try {
        addToStructure($page, 'orders', $data);

        $success = 'Ihre Bestellung war erfolgreich!';
        $data = array();

      } catch(Exception $e) {
        echo 'Ihre Bestellung ist fehlgeschlagen: ' . $e->getMessage();
      }
    }
  }

  return compact('alert', 'data', 'success');
};
