tenderseo-api
=============

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

### Get random article

Now, you are able to request random articles from our archive to place into your website, this is also a great way to play for free with our API.

```
<?php
use TenderSEO\Client;

$client = new Client([
    'key' => 'YOUR KEY',
]);

$client->getRandomArticle();
```

### Order new article

Will come soon. Until we have finished the documentation take a look at our example.php file for further instructions.

### Get articles

Will come soon. Until we have finished the documentation take a look at our example.php file for further instructions.

