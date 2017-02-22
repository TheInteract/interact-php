<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;

function sample()
{
    $client = new Client("IC-sadsad", "1234");
    $feature = $client->getFeature("feature-2")->isA();
    // echo "Is Feature-2 A? =>".(var_dump($feature));
    var_dump($feature);
    // echo "Is Feature-2 B? =>".(print_r(!$feature));
}

sample();