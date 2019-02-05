<?php

use TenderSEO\Client;

require_once(__DIR__.'/../vendor/autoload.php');

$email = 'test-user@example.com';
$name = 'John Doe';

$client = new Client();

$result = $client->signup([
    'email' => $email,
    'name' => $name,
]);

var_dump($result);
