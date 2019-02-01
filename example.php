<?php

use TenderSEO\Client;

require_once(__DIR__.'/vendor/autoload.php');
require_once(__DIR__.'/require.php'); // helper functions

/**
 * We have made this helper example.php file to ease your integration,
 * but this short comment is the short version if that is easier to read
 *
 * $client = new Client()
 *
 * $client->signup([
 *  'email' => $email,
 *  'name' => $name,
 * ]);
 *
 * $client->setApiKey($result->api_key);
 *
 * $client->getRandomArticle();
 */

/**
 * If you have your api key already, simply
 *
 * $client = new Client(['key' => $key]);
 *
 * $client->getRandomArticle();
 */


$email = 'test-user@example.com'; // your email
$name = 'John Doe'; // your name

/**
 * Initialize the wrapper
 */
$client = new Client();


/**
 * Signup with a new user to get your api key
 */
write("First we will create a new account for you, hold on");

$result = $client->signup([
    'email' => $email,
    'name' => $name,
]);

if (isset($result->error)) {
    var_dump($result);
    die();

} else {
    var_dump($result);
}


/**
 * Persist api credentials
 */
$filename = persistCredentials($email, $result);

write("Saving your API credentials here ".$filename);


/**
 * Set the new api key to TenderSEO client
 */
$client->setApiKey($result->api_key);


/**
 * Fetch an random article
 */
write("Now we are going to fetch a random article from our database for your pleasure :)");

$article = $client->getRandomArticle();

var_dump($article);


write('Now, go on and play with our API as you like :)');
