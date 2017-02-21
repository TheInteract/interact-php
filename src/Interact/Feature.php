<?php
namespace Interact;

class Feature
{
    public function __construct($name, $version)
    {
        $this->name = $name;
        $this->version = strtoupper($version);
    }

    public function getName()
    {
        return $this->name;
    }

    public function isA()
    {
        return $this->version === "A";
    }

    public function isB()
    {
        return $this->version === "B";
    }
}