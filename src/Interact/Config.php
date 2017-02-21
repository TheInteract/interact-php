<?php
namespace Interact;

class Config {
    private static $configs = [
        "server" => [
            "host" => "mockServer",
            "port" => "9000"
        ]
    ];
    
    public static function getAll() {
        return Config::$configs;
    }
}
