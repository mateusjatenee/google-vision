<?php

namespace Mateusjatenee\GoogleVision\Traits;

use Mateusjatenee\GoogleVision\Exceptions\ResponseNotValidException;

trait MakesHttpRequests
{
    /**
     * @param $content
     *
     * @param $base64
     *
     * @throws \Mateusjatenee\GoogleVision\Exceptions\ResponseNotValidException
     *
     * @return array
     */
    protected function callTextDetection($content, $base64 = true)
    {
        $req = json_decode(
            $this->guzzle->post("{$this->endpoints['text']}?key=" . $this->key, [
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
            ])->getBody(), true
        );

        if ($req['responses'] === []) {
            throw new ResponseNotValidException;
        }

        return $req;
    }
}
