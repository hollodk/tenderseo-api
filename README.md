tenderseo-api
=============

Welcome to the client library for tenderseo.com, speed up your blogging.

## Quick start

If you just want to get started, and see some fast results, here is a quick quide for you.

```
mkdir new-path
cd new-path
composer require mh/tenderseo-api
```

Now the folder is ready, create a file as following, and you got your first article.

```
<?php
use TenderSEO\Client;

require_once(__DIR__.'/vendor/autoload.php');

$client = new Client();

$r = $client->randomArticle();
var_dump($r);
```

Done! :) Now, if you like the result, start by create an account which you can do with the API as well.

## Installation

### Composer

Simply add a dependency on mh/tenderseo-api to your project's composer.json file if you are using Composer to manage the dependencies of your project. Here is a minimal example of a composer.json file that just defines a dependency on newest stable version of TenderSEO:

```
{
    "require": {
        "mh/tenderseo-api": "1.0.*"
    }
}
```

## Usage

Before getting started you will need a API KEY in order to talk with our platform, but you can register as a user via our API as well, otherwise go to our website https://www.tenderseo.com.

### Create a new client

Before you start with anything, you will need to create an instance of our TenderSEO client.

```
<?php
use TenderSEO\Client;

$client = new Client();
```

If you already have a API KEY you can add the key as parameter

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);
```

### Signup as new user

If you do not have a API KEY on our platform, you can register here to start using our services.

```
<?php
use TenderSEO\Client;

$client = new Client();

$client->signup([
    'email' => 'YOUR EMAIL',
    'name' => 'YOUR NAME',
]);
```

Now, as a response, you will get your new API KEY, so remember to save it, otherwise you will have to send a message to our support at info@tenderseo.com.

### Get user status

If you want to check your status, how many credits you have left and other useful informations.

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);

$client->status();
```

### Get random article

Now, you are able to request random articles from our archive to place into your website, this is also a great way to play for free with our API.

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);

$client->randomArticle();
```

### Order new article

If you wants to create a new article on our platform, use this end point.

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);

$client->createArticle([
    'language' => 'english',
    'keywords' => 'car, blue',
    'words' => 50,
    'tag' => 'test',
    'test' => true, // the order will not be processed
]);
```

### Get articles

You can download all your articles as you like, or order them with different options, so you easily can cherry pick articles for a specific blog.

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);

$client->articles([
    'language' => 'english',
    'tag' => 'test',
    'from' => '2019-01-01 00:00:00',
]);
```
