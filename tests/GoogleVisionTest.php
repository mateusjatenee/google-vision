<?php

namespace Mateusjatenee\GoogleVision\Tests;

use Guzzle\Http\Client;
use Illuminate\Support\Collection;
use Mateusjatenee\GoogleVision\Vision;
use Mateusjatenee\GoogleVision\VisionAnottation;
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

    /** @test */
    public function it_returns_a_collection_of_items()
    {
        $guzzle_mock = m::mock(Client::class);
        $guzzle_mock
            ->shouldReceive('post')
            ->once()
            ->andReturn(json_encode($this->getApiResponseStub()));

        $googleVision = new Vision('foo', $guzzle_mock);

        $response = $googleVision->readImageText('foo');

        $this->assertInstanceOf(Collection::class, $response);
    }

    /** @test */
    public function it_returns_a_collection_of_vision_anottations()
    {
        $guzzle_mock = m::mock(Client::class);
        $guzzle_mock
            ->shouldReceive('post')
            ->once()
            ->andReturn(json_encode($this->getApiResponseStub()));

        $googleVision = new Vision('foo', $guzzle_mock);

        $response = $googleVision->readImageText('foo');

        $this->assertInstanceOf(VisionAnottation::class, $response->first());
    }

    protected function getApiResponseStub()
    {
        return [
            'responses' => [
                [
                    'textAnnotations' => [
                        [
                            'locale' => 'en',
                            'description' => "D. CRILLEY\n",
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 25,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 147,
                                    ],
                                    [
                                        'x' => 25,
                                        'y' => 147,
                                    ],
                                ],
                            ],
                        ],
                        [
                            'description' => 'D.',
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 27,
                                        'y' => 54,
                                    ],
                                    [
                                        'x' => 89,
                                        'y' => 55,
                                    ],
                                    [
                                        'x' => 87,
                                        'y' => 140,
                                    ],
                                    [
                                        'x' => 25,
                                        'y' => 139,
                                    ],
                                ],
                            ],
                        ],
                        [
                            'description' => 'CRILLEY',
                            'boundingPoly' => [
                                'vertices' => [
                                    [
                                        'x' => 113,
                                        'y' => 56,
                                    ],
                                    [
                                        'x' => 384,
                                        'y' => 62,
                                    ],
                                    [
                                        'x' => 382,
                                        'y' => 147,
                                    ],
                                    [
                                        'x' => 111,
                                        'y' => 141,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

    }
}
