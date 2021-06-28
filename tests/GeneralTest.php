<?php

use PHPUnit\Framework\TestCase as BaseTestCase;

class GeneralTest extends  BaseTestCase
{
    /** @var TinyParcelSDK\Client */
    protected $client;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $uri = $_ENV['API_BASE_URL'];
        $token = $_ENV['BEARER_TOKEN'];
        $this->client = new TinyParcelSDK\Client('prod', $uri, $token);
    }

    public function testAuthentication()
    {
        $uri = $_ENV['API_BASE_URL'];
        $this->client = new TinyParcelSDK\Client('prod', $uri, 'something');
        $this->expectExceptionCode(401);
        // Throw exception due to unauthentication
        $this->client->parcels->find(1);
    }

    public function testCreateParcel()
    {
        $response = $this->client->parcels->create([
            "item_name" => "New smartphone",
            "weight"=> 5.1,
            "volume"=> 0.0003,
            "declared_value"=> 4
        ]);
        $this->assertArrayHasKey('id', $response);
    }

    public function testUpdateParcel()
    {
        $response = $this->client->parcels->create([
            "item_name" => "New smartphone",
            "weight"=> 5.1,
            "volume"=> 0.0003,
            "declared_value"=> 4,
        ]);

        $this->assertEquals($response['chosen_model'], 'by_weight');

        $parcel = $this->client->parcels->update($response['id'], [
            "item_name" => "Old smartphone",
            "weight"=> 5.1,
            "volume"=> 1,
            "declared_value"=> 4,
        ]);

        $this->assertEquals($parcel['item_name'], 'Old smartphone');
        $this->assertEquals($parcel['chosen_model'], 'by_volume');
    }
}
