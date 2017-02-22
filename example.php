<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;

function sample()
{
    $client = new Client("IC9-55938-5");
    $feature1 = $client->getFeature("card-1")->isA();
    var_dump($feature1);
    $feature2 = $client->getFeature("card-2")->isA();
    var_dump($feature2);
    $feature3 = $client->getFeature("card-3")->isA();
    var_dump($feature3);
}

sample();