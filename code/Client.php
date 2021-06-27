<?php

namespace TinyParcelSDK;

use GuzzleHttp\Client as GuzzleClient;

class Client {
    /** @var string */
    protected $mode;

    /** @var string */
    protected $bearer;

    /** @var GuzzleClient */
    protected $http;

    /** @var Parcel */
    public $parcels;

    public function __construct($mode = 'prod', $uri, $bearer)
    {
        $uri = trim($uri, '/');
        $this->mode = $mode;
        $this->bearer = $bearer;
        $httpClient = new GuzzleClient([
            'base_uri' => $mode == 'test' ? $uri . '/test' : $uri,
            'timeout'  => 2.0,
        ]);
        $this->http = $httpClient;
        $this->parcels = new Parcel($this);
    }

    public function getHttpClient()
    {
        return $this->http;
    }

    public function getBearer()
    {
        return $this->bearer;
    }
}
