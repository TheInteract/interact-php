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

    public function getFeature($featureId)
    {
        if(!array_key_exists($featureId, $this->featureList)) {
            throw new Exception("Feature ID: ".$featureId." is not found.");
        }
        return $this->featureList[$featureId];
    }

    private function reduceFeature($carry, $feature) 
    {
        $carry[$feature['featureName']] = new Feature($feature['version']);
        return $carry;
    }
}
