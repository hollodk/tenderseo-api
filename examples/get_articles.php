<?php

use TenderSEO\Client;

require_once(__DIR__.'/../vendor/autoload.php');

$client = new Client(['key' => 'YOUR-KEY']);

$from = new \DateTime();
$from->modify('-1 day');

$result = $client->articles([
    'tag' => null,
    'language' => null,
    'from' => $from,
]);

var_dump($result);
