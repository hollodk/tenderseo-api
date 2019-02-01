<?php

function write($message)
{
    echo PHP_EOL;
    echo $message;
    echo PHP_EOL;

    sleep(3);
}

function persistCredentials($email, $result)
{
    $filename = __DIR__.'/api_key_'.$email;

    $body = <<<EOF
Your API key information is persisted here:

username: {$email}
password: {$result->password}
dashbord: {$result->dashboard_url}
api key: {$result->api_key}

Looking forward to work with you.

// TenderSEO

EOF;

    file_put_contents($filename, $body);

    return $filename;
}
