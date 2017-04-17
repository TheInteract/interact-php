<?php
namespace Interact;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Interact\Config;

class CurlConfig 
{
    public static function doCurl($apiKey, $userIdentity) 
    {
        $url = "http://" . Config::SERVER_HOST . ":" . Config::SERVER_PORT;
        $client = new Client([
            'base_uri' => $url,
            'timeout' => 2.0
        ]);

        $body = json_encode(['API_KEY_PRIVATE' => $apiKey, 'userIdentity' => $userIdentity]);
        try{
            $response = $client->request('POST', '/collector/api/event/oninit', [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);
        } catch(RequestException $e) {
            throw $e;
        }

        return $response->getBody();
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
