<?php

use TenderSEO\Client;

require_once(__DIR__.'/../vendor/autoload.php');

$client = new Client();

$result = $client->review(['language' => 'danish']);

var_dump($result);
