<?php

namespace Mateusjatenee\GoogleVision\Tests;

use Guzzle\Http\Client;
use Mateusjatenee\GoogleVision\Vision;
use PHPUnit_Framework_TestCase as PHPUnit;
use \Mockery as m;

class GoogleVisionTest extends PHPUnit
{

    public function tearDown()
    {
        m::close();
    }

    /** @test */
    public function it_calls_vision_api()
    {
        $guzzle_mock = m::mock(Client::class);
        $guzzle_mock
            ->shouldReceive('post')
            ->once();

        $googleVision = new Vision('foo', $guzzle_mock);

        $googleVision->readImageText('foo');
    }
}
