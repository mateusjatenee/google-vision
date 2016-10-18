<?php

namespace Mateusjatenee\GoogleVision;

use Guzzle\Http\Client;
use Mateusjatenee\GoogleVision\Traits\MakesHttpRequests;

class Vision
{
    use MakesHttpRequests;

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
        $this->callTextDetection($base64);

    }
}
