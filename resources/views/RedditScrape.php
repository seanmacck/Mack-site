<?php

use GuzzleHttp\Client;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;


function getGuzzleRequest()

{

    $client = new client('https://www.reddit.com');

    $response->request->send();

    $response = $client->request('GET' , 'https://www.reddit.com/r/laravel/top/.json?t=all');

    $response = $request->getBody();

    //$data = $response->json();

}

var_dump($response);




