<?php
namespace Interact;

use Interact\Config;

class CurlConfig 
{
    public static function loadConfig()
    {
        $ch = curl_init();
        $CONFIGS = Config::getAll();
        $CONFIGS_SERVER = $CONFIGS['server'];
        $url = $CONFIGS_SERVER['host'] . ":" . $CONFIGS_SERVER['port'];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_getinfo($ch);

        curl_close($ch);

        var_dump($response);
        return $response;
    }
}
