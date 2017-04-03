<?php
// namespace Tests\Unit\Client;

use Interact\CurlConfig;
use Interact\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    protected $client;

    protected $mockResponse = [
        'featureList' => [
            [
            'name' => "feature-1",
            'version' => "A"
            ], [
            'name' => "feature-2",
            'version' => "B"
            ],
        ],
        'deviceCode' => "device-1234",
        'initCode' => "console.log(\'hello interact\')"
    ];
    protected $customerCode = "IC555-44B";
    protected $userId = "12345";

    protected function setUp()
    {
        $this->client = new Client($this->customerCode, $this->userId);
    }

    public function testGetFeature()
    {
        $stub = $this->getMockBuilder(CurlConfig::class)
                     ->getMock();
        $stub->method('loadConfig')->willReturn($this->mockResponse);
        
        $isA = $this->client->getFeature("feature-1")->isA();
        $this->assertTrue($isA);
    }
}