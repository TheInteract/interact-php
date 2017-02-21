<?php

require(__DIR__ . '/vendor/autoload.php');

use Interact\Client;
use Interact\CurlConfig;

print_r(Client::world());
print_r(CurlConfig::loadConfig());