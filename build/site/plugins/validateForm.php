<?php

function validateForm($data) {

  $response = array();

  // if the honeypot is filled, we set the redirect key to true
  if(!empty($data['website'])) {
    $response['redirect'] = true;

  } else {

    // array of rules for form validation
    $rules = array(
      'full_name'   => array('required'),
      'email'       => array('required', 'email'),
      'nachricht'   => array('required'),
    );

    // array of messages to return if some of the data is not valid
    $messages = array(
      'full_name'   => 'Name vergessen?',
      'email'       => 'Ungültige Mailadresse!',
      'nachricht'   => 'Bestellung vergessen?',
    );

    // evaluate data and rules using the invalid() helper
    if($invalid = invalid($data, $rules, $messages)) {
      $response['errors'] = $invalid;
    } else {
      $response['success'] = true;
    }

  }

  return $response;
}

function addToStructure($p, $field, $data = array()) {

  $response = array();

  // escape user data
  $data = array(
    'full_name'   => esc($data['full_name']),
    'email'       => $data['email'],
    'telefon'     => esc($data['telefon']),
    'datum'       => esc($data['datum']),
    'art'         => esc($data['art']),
    'vegan'       => esc($data['vegan']),
    'nachricht'   => esc($data['nachricht'])
  );

  // try to add data to field
  try {
    $fieldData = $p->$field()->yaml();
    $fieldData[] = $data;
    $fieldData = yaml::encode($fieldData);
    $p->update(array(
      $field => $fieldData,
    ));

    // create the body from a simple snippet
    $body  = snippet('order', $data, true);

    // build the email
    $email = email(array(
      'to'      => 'hello@twobrain.io',
      'from'    => 'catering@govinda-leipzig.de',
      'subject' => 'Catering-Anfrage',
      'replyTo' => $data['email'],
      'body'    => $body
    ));

    // try to send it and redirect to the thank you page if it worked
    if($email->send()) {
    //   go('catering/jetzt-bestellen');
    //
    // // add the error to the alert list if it failed
    } else {
      $alert = array($email->error());
    }

    // if successful, add success message to $response array
    $response['success'] = "Ihre Bestellung war erfolgreich!";

  } catch(Exception $e) {

    // if it fails, add error message to $response array
    $response['error'] = 'Ihre Bestellung ist fehlgeschlagen: ' . $e->getMessage();

  }

  return $response;

}
