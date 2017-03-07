<?php
namespace Interact;

class Feature
{
    public function __construct($versionName)
    {
        $this->versionName = strtoupper($versionName);
    }

    public function getName()
    {
        return $this->name;
    }

    public function isA()
    {
        return $this->versionName === "A";
    }

    public function isB()
    {
        return $this->versionName === "B";
    }
}