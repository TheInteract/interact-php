<?php
namespace Interact;

use Exception;
use Interact\Config;

class CurlConfig 
{
    public static function doCurl($customerCode, $userIdentity)
    {
        $ch = curl_init();
        $CONFIGS = Config::getAll();
        $CONFIGS_SERVER = $CONFIGS['server'];
        $url = "http://" . $CONFIGS_SERVER['host'] . ":" . $CONFIGS_SERVER['port'] . "/api/event/oninit";
        $body = ['customerCode' => $customerCode, 'userIdentity' => $userIdentity];
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);


        if ($response === FALSE) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
        curl_close($ch);

        return $response;
    }

    public static function loadConfig($customerCode, $userIdentity)
    {
        try {
            return CurlConfig::doCurl($customerCode, $userIdentity);
        } catch(Exception $e) {
            print_r($e->getCode() . " " . $e->getMessage());
        }
    }
}
