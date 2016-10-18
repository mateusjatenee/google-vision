<?php

namespace Mateusjatenee\GoogleVision;

use GuzzleHttp\Client;
use Mateusjatenee\GoogleVision\Traits\MakesHttpRequests;
use Mateusjatenee\GoogleVision\Traits\ParsesContent;

class Vision
{
    use MakesHttpRequests, ParsesContent;

    protected $endpoints = [
        'text' => 'https://vision.googleapis.com/v1/images:annotate',
    ];

    protected $key;

    protected $guzzle;

    public function __construct(string $key, Client $guzzle)
    {
        $this->key = $key;
        $this->guzzle = $guzzle;
    }

    public function readImageText($base64)
    {
        $content = $this->callTextDetection($base64);

        return $this->parseContent($content);
    }
}
