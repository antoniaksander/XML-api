<?php

// defined( 'ABSPATH' ) || exit;

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "API_KEY",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_COOKIE => "ASPSESSIONIDCGQBQRTB=PFKEAIHCFJMJOJPANKKKKMAK; ASPSESSIONIDACTBRRQB=CJKEAIHCOLPPONILNPAMNLMF",
  CURLOPT_HTTPHEADER => [
    "content-type: application/xml"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $xmlResponse = new SimpleXMLElement($response);
  print_r($xmlResponse);

}
