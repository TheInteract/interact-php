<?php
namespace Interact;

use Interact\Feature;

class User
{
    public function __construct($deviceCode, $hashedUserId, $featureList) 
    {
        $this->deviceCode = $deviceCode;
        $this->hashedUserId = $hashedUserId;
        $this->featureList = array_reduce($featureList, array($this, "reduceFeature"), []);
    }

    public function getDeviceCode()
    {
        return $this->deviceCode;
    }

    public function getHashedUserId()
    {
        return $this->hashedUserId;
    }

    public function getFeature($featureName)
    {
        return $this->featureList[$featureName];
    }

    private function reduceFeature($carry, $feature) 
    {
        $carry[$feature['name']] = new Feature($feature['name'], $feature['version']);
        return $carry;
    }
}
