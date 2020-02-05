<?php

use GuzzleHttp\Client;

$client = new Guzzle\Http\Client();
$request = $client->head('http://www.amazon.com');
$response = $request->send();
echo $response->getContentLength();

var_dump($response);
