<?php
namespace Interact;

class Config {
    private static $configs = [
        "server" => [
            "host" => "localhost",
            "port" => "9999"
        ]
    ];
    
    public static function getAll() {
        return Config::$configs;
    }
}
