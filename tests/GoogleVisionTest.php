<?php

namespace Mateusjatenee\GoogleVision\Tests;

use Guzzle\Http\Client;
use Illuminate\Support\Collection;
use Mateusjatenee\GoogleVision\Exceptions\ResponseNotValidException;
use Mateusjatenee\GoogleVision\Tests\Traits\StubTrait;
use Mateusjatenee\GoogleVision\Vision;
use Mateusjatenee\GoogleVision\VisionAnottation;
use PHPUnit_Framework_TestCase as PHPUnit;
use \Mockery as m;

class GoogleVisionTest extends PHPUnit
{
    use StubTrait;

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
    public function it_throws_exception_if_no_items_are_returned()
    {
        $guzzle_mock = m::mock(Client::class);
        $guzzle_mock
            ->shouldReceive('post')
            ->once()
            ->andReturn(json_encode([
                'responses' => [],
            ]));

        $this->setExpectedException(ResponseNotValidException::class, 'The response was not valid.');

        $googleVision = new Vision('foo', $guzzle_mock);

        $response = $googleVision->readImageText('foo');
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
}
