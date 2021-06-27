<?php

namespace TinyParcelSDK;

class Parcel
{
    /** @var Client */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param $id
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find($id)
    {
        $response = $this->client->getHttpClient()->get('/parcels/' . $id,
            [
                'headers' =>
                    [
                        'Authorization' => "Bearer {$this->client->getBearer()}",
                    ],
            ]
        );

        $contents = json_decode($response->getBody()->getContents(), true);

        return $contents;
    }

    /**
     * @param array $parcel
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($parcel)
    {
        $response = $this->client->getHttpClient()->post('/parcels/',
            [
                'headers' =>
                    [
                        'Authorization' => "Bearer {$this->client->getBearer()}",
                    ],
                'json'    => $parcel,
            ]
        );

        $contents = json_decode($response->getBody()->getContents(), true);

        return $contents;
    }

    /**
     * @param $id
     * @param $parcel
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($id, $parcel)
    {
        $response = $this->client->getHttpClient()->put('/parcels/' . $id,
            [
                'headers' =>
                    [
                        'Authorization' => "Bearer {$this->client->getBearer()}",
                    ],
                'json'    => $parcel,
            ]
        );

        $contents = json_decode($response->getBody()->getContents(), true);

        return $contents;
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($id)
    {
        $response = $this->client->getHttpClient()->delete('/parcels/' . $id,
            [
                'headers' =>
                    [
                        'Authorization' => "Bearer {$this->client->getBearer()}",
                    ]
            ]
        );

        $contents = json_decode($response->getBody()->getContents(), true);

        return $contents;
    }
}
