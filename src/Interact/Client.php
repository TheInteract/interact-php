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

        $this->initCookie();
    }

    private function initCookie()
    {
        $deviceCode = $_COOKIE[Config::COOKIE_DEVICE_CODE];
        $userIdentity = [
            'deviceCode' => $deviceCode,
            'hashedUserId' => $this->_hashedUserId
        ];
        
        $result = json_decode(CurlConfig::loadConfig($this->_apiKey, $userIdentity), true);
        $cookieLifeTime = intval(time() + (10 * 365 * 24 * 60 * 60));

        setcookie(Config::COOKIE_DEVICE_CODE, $result['deviceCode'], $cookieLifeTime);
        
        if(array_key_exists('userCode', $result))
        {
            setcookie(Config::COOKIE_USER_CODE, $result['userCode'], $cookieLifeTime);
        } else if(isset($_COOKIE[Config::COOKIE_USER_CODE])) {
            setcookie(Config::COOKIE_USER_CODE, $result['userCode'], time() - 1);
        }

        $this->_hashedUserId = array_key_exists('hashedUserId', $result) ? $result['hashedUserId'] : "";
        $this->_userCode = array_key_exists('userCode', $result) ? $result['userCode'] : "";
        $this->_featureList = $result['featureList'];
        $this->_deviceCode = $result['deviceCode'];
        $this->_initCode = $result['initCode'];
    }

    public function getInitCode()
    {
        return $this->_initCode;
    }
    
    public function getFeature($featureName)
    {
        $config = [
            'deviceCode' => $this->_apiKey,
            'hashedUserId' => $this->_hashedUserId,
            'featureList' => $this->_featureList
        ];
        $this->_currentUser = new User($config['deviceCode'], $config['hashedUserId'] = "", $config['featureList']);

        return $this->_currentUser->getFeature($featureName);
    }
}