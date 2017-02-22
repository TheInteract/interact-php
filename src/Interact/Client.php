<?php
namespace Interact;

use Interact\Config;
use Interact\CurlConfig;
use Interact\User;

class Client 
{
    public function __construct($apiKey, $hashedUserId = "")
    {
        $this->_apiKey = $apiKey;
        $this->_hashedUserId = $hashedUserId;
        $this->_featureList = [];
    }

    private function checkCookie()
    {
        $deviceCode = $_COOKIE[Config::COOKIE_DEVICE_CODE];
        // $userCode = $_COOKIE[Config::COOKIE_USER_CODE];
        $userIdentity = [
            'deviceCode' => $deviceCode,
            'hashedUserId' => $this->_hashedUserId
        ];
        
        $result = json_decode(CurlConfig::loadConfig($this->_apiKey, $userIdentity), true);
        $cookieLifeTime = time() + (100 * 365 * 24 * 60 * 60);

        setcookie(Config::COOKIE_DEVICE_CODE, $result['deviceCode'], $cookieLifeTime);
        if(!is_null($result['userCode']))
        {
            setcookie(Config::COOKIE_USER_CODE, $result['userCode'], $cookieLifeTime);
        } else {
            setcookie(Config::COOKIE_USER_CODE, $result['userCode'], time() - 1);
        }

        $this->_hashedUserId = $result['hashedUserId'];
        $this->_featureList = $result['featureList'];
        $this->_deviceCode = $result['deviceCode'];

        return $result;
    }
    
    public function getFeature($featureName)
    {
        $config = [
            'deviceCode' => $this->deviceCode,
            'hashedUserId' => $this->hashedUserId,
            'featureList' => $this->featureList
        ];
        if(count($this->featureList) === 0) 
        {
            $config = $this->checkCookie();
        }
        $this->_currentUser = new User($config['deviceCode'], $config['hashedUserId'], $config['featureList']);

        return $this->_currentUser->getFeature($featureName);
    }
}