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
            ->with('https://vision.googleapis.com/v1/images:annotate?key=foo', [
                'json' => [
                    'requests' => [
                        'features' => [
                            'type' => 'TEXT_DETECTION',
                        ],

                        'image' => [
                            'content' => 'base_64_string',
                        ],
                    ],

                ],
            ])
            ->once();

        $googleVision = new Vision('foo', $guzzle_mock);

        $googleVision->readImageText('foo');
    }
}
