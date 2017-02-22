<?php
namespace Interact;

use Exception;
use Interact\Config;

class CurlConfig 
{
    public static function doCurl($apiKey, $userIdentity)
    {
        $ch = curl_init();
        $url = "http://" . Config::SERVER_HOST . ":" . Config::SERVER_PORT . "/api/event/oninit";
        $body = ['apiKey' => $apiKey, 'userIdentity' => $userIdentity];
        
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

    public static function loadConfig($apiKey, $userIdentity = array())
    {
        try {  
            return CurlConfig::doCurl($apiKey, $userIdentity);
        } catch(Exception $e) {
            print_r($e->getCode() . " " . $e->getMessage());
            return null;
        }
    }
}
