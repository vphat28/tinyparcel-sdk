<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;

// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'http://sundaysea.com']);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', '');
var_dump((string)$response->getBody());
