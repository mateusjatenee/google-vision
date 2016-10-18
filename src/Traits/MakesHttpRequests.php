<?php

namespace Mateusjatenee\GoogleVision\Traits;

trait MakesHttpRequests
{
    protected function callTextDetection($content, $base64 = true)
    {
        $req = $this->guzzle->post("{$this->endpoints['text']}?key=" . $this->key, [
            'json' => [
                'requests' => [
                    'features' => [
                        'type' => 'TEXT_DETECTION',
                    ],

                    'image' => [
                        'content' => $content,
                    ],
                ],

            ],
        ]);

    }
}
