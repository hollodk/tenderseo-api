<?php

use TenderSEO\Client;

require_once(__DIR__.'/../vendor/autoload.php');

$key = 'YOUR-KEY';

$client = new Client();
$client->setApiKey($key);

$article = <<<EOF
<p>Hi George!</p>
<p>How are you feeling today? Wants to come out any play later?</p>
<p>Best regards,<br>
Emma</p>

EOF;

$result = $client->createArticle([
    'service' => 'rewrite',
    'language' => 'english',
    'source_article' => $article,
    'tag' => 'example-rewrite',
]);

var_dump($result);
