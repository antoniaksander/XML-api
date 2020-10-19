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

// import part

$directoXml = get_first_available_import_xml();
if ( ! $directoXml ) {
  echo "ALL FILES PARSED" . PHP_EOL;
  die();
}


//functions


// functions start here

function get_first_available_import_xml() {
	$files = glob( dirname( __FILE__ ) . '/prepared/items*' ); // get all file names
	foreach ( $files as $file ) { // iterate files

		if ( is_file( $file ) ) {
			$data        = file_get_contents( $file );
			$backup_file = str_replace( '/prepared/', '/backup_prepared/', (string) $file );
			$backup_file = str_replace( '.xml', '-' . (string) time() . '.xml', $backup_file );
			copy( $file, $backup_file );
			unlink( $file ); // delete file
			echo "Delete" . $file;

			return $data;
		}
	}

	return null;
}
