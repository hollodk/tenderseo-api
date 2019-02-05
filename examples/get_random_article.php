<?php

use TenderSEO\Client;

require_once(__DIR__.'/../vendor/autoload.php');

$client = new Client();

$result = $client->randomArticle();

var_dump($result);
