<?php

namespace TenderSEO;

class Client
{
    const baseUrl = 'https://www.tenderseo.com/api/';

    private $key;
    private $isTest = false;

    public function __construct($params=[])
    {
        if (isset($params['test'])) {
            $this->isTest = $params['test'];
        }

        if (isset($params['key'])) {
            $this->key = $params['key'];
        }
    }

    public function setApiKey($key)
    {
        $this->key = $key;
    }

    public function status()
    {
        return $this->_request('status');
    }

    public function signup($options)
    {
        return $this->_request('signup', $options, 'post');
    }

    public function createArticle($options)
    {
        if (!$this->key) {
            throw new \Exception('You forgot to provide api key');
        }

        return $this->_request('order/create', $options, 'post');
    }

    public function order($options)
    {
        if (!$this->key) {
            throw new \Exception('You forgot to provide api key');
        }

        return $this->_request('order', $options);
    }

    public function randomImage($options)
    {
        return $this->_request('image/random', $options);
    }

    public function review($options)
    {
        return $this->_request('review', $options);
    }

    public function randomArticle()
    {
        return $this->_request('article/random');
    }

    public function article($uuid)
    {
        if (!$this->key) {
            throw new \Exception('You forgot to provide api key');
        }

        $options = [
            'uuid' => $uuid,
        ];

        return $this->_request('article', $options);
    }

    public function articles($options=null)
    {
        if (!$this->key) {
            throw new \Exception('You forgot to provide api key');
        }

        $options = ($options == null) ? [] : $options;

        if (isset($options['from']) && $options['from'] instanceOf \DateTime) {
            $options['from'] = $options['from']->format('Y-m-d');
        }

        $url = 'articles';

        return $this->_request($url, $options);
    }

    private function _request($suffix, $options=[], $method='get')
    {
        if ($this->key) {
            $options['key'] = $this->key;
        }

        if ($this->isTest) {
            $url = 'http://localhost:8000/api/'.$suffix;
        } else {
            $url = self::baseUrl.$suffix;
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, $url, [
                'query' => $options,
            ]);

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $res = new \StdClass();
            $res->error = true;
            $res->error_message = 'Unknown error, could not reach server, endpoint: '.$url;

            return $res;

        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $res = new \StdClass();
            $res->error = true;
            $res->error_message = 'Unknown error, server reported a problem, check your parameters again, endpoint: '.$url;

            return $res;
        }

        return json_decode($response->getBody()->getContents());
    }
}
