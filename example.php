<?php

require_once "vendor/autoload.php";

use TinyParcelSDK\Client;

$client = new Client('prod', 'http://172.18.0.7:8000', 'somethinggood');

$parcel = $client->parcels->create([
    "item_name" => "New smartphone",
    "weight"=> 5.1,
    "volume"=> 0.0003,
    "declared_value"=> 4,
    "chosen_model"=> "by_value",
    "quote"=> 30
]);

$parcel = $client->parcels->update($parcel['id'], [
    "item_name" => "Old smartphone",
    "weight"=> 5.1,
    "volume"=> 0.0003,
    "declared_value"=> 4,
    "chosen_model"=> "by_value",
    "quote"=> 30
]);

$parcel = $client->parcels->delete($parcel['id']);

var_dump($parcel);
