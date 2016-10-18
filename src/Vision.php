<?php

namespace Mateusjatenee\GoogleVision;

use Guzzle\Http\Client;

class Vision
{
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
        $this->guzzle->post("{$this->endpoints['text']}?key=" . $this->key, [
            'json' => [
                'requests' => [
                    'features' => [
                        'type' => 'TEXT_DETECTION',
                    ],

                    'image' => [
                        'content' => $base64,
                    ],
                ],

            ],
        ]);

    }
}
