<?php

namespace Shenstef\QQLbs;

use GuzzleHttp\Client;
use Shenstef\QQLbs\Exceptions\HttpException;
use Shenstef\QQLbs\Exceptions\InvalidArgumentException;

class Ip2City
{
    protected $key = '';

    protected $guzzleOptions = [];

    private $caches = [];

    public function __construct()
    {
        $this->key = config('services.qqlbs.key');
    }

    public function getCity($ip)
    {
        $url = 'https://apis.map.qq.com/ws/location/v1/ip';

        $query = array_filter([
            'key' => $this->key,
            'ip' => $ip,
        ]);

        try {
            $result = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();

            $result = json_decode($result, true);
            return $result;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }
}
