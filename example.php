<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;
use Interact\CurlConfig;
use Interact\User;

// print_r(Client::world());
// print_r(CurlConfig::loadConfig("BASDSAD", "ASDASDASD"));
$user = new User("asdsad", "dsadsad", [["name" => "123123", "version" => "a"], ["name" => "asdasd", "version" => "b"]]);
var_dump($user);