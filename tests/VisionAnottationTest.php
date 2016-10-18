<?php

namespace Mateusjatenee\GoogleVision\Tests;

use Mateusjatenee\GoogleVision\Tests\Traits\StubTrait;
use Mateusjatenee\GoogleVision\VisionAnottation;
use PHPUnit_Framework_TestCase as PHPUnit;

class VisionAnottationTest extends PHPUnit
{
    use StubTrait;

    /** @test */
    public function it_gets_the_main_text()
    {
        $anottation = new VisionAnottation($this->getApiResponseStub()['responses'][0]['textAnnotations']);

        $this->assertEquals("D. CRILLEY", $anottation->getMainText());
    }

    /** @test */
    public function it_gets_the_phrase_parts()
    {
        $array = $this->getApiResponseStub()['responses'][0]['textAnnotations'];

        $anottation = new VisionAnottation($array);

        $this->assertEquals('D.', $anottation->getParts()[0]);
        $this->assertEquals('CRILLEY', $anottation->getParts()[1]);
    }

    /** @test */
    public function it_gets_all_items()
    {
        $array = $this->getApiResponseStub()['responses'][0]['textAnnotations'];

        $anottation = new VisionAnottation($array);

        $this->assertEquals($array, $anottation->items);
    }
}
