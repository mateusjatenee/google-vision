<?php

namespace Mateusjatenee\GoogleVision;

use GuzzleHttp\Client;
use Mateusjatenee\GoogleVision\Traits\MakesHttpRequests;
use Mateusjatenee\GoogleVision\Traits\ParsesContent;

class Vision
{
    use MakesHttpRequests, ParsesContent;

    /**
     * @var array
     */
    protected $endpoints = [
        'text' => 'https://vision.googleapis.com/v1/images:annotate',
    ];

    /**
     * @var string
     */
    protected $key;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * @param string $key
     *
     * @param \GuzzleHttp\Client $guzzle
     */
    public function __construct(string $key, Client $guzzle)
    {
        $this->key = $key;
        $this->guzzle = $guzzle;
    }

    /**
     * @param string $base64
     *
     * @return \Illuminate\Support\Collection
     */
    public function readImageText($base64)
    {
        $content = $this->callTextDetection($base64);

        return $this->parseContent($content);
    }
}
