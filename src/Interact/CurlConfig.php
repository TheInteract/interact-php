<?php
namespace Interact;

use Exception;
use Interact\Config;

class CurlConfig 
{
    public static function doCurl()
    {
        $ch = curl_init();
        $CONFIGS = Config::getAll();
        $CONFIGS_SERVER = $CONFIGS['server'];
        $url = "http://" . $CONFIGS_SERVER['host'] . ":" . $CONFIGS_SERVER['port'] . "/api/event/oninit";
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);


        if ($response === FALSE) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
        curl_close($ch);

        return $response;
    }

    public static function loadConfig()
    {
        try {
            return CurlConfig::doCurl();
        } catch(Exception $e) {
            print_r($e->getCode() . " " . $e->getMessage());
        }
    }
}
