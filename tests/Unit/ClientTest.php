<?php
namespace Tests\Unit\Client;

use PHPUnit_Framework_TestCase;
use Interact\Client;

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function testWorld()
    {
        $output = Client::world();
        $this->assertEquals("Hello World, I am Interact!", $output, "Failed to say hello to the world!");
    }
}