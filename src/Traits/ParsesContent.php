<?php

namespace Mateusjatenee\GoogleVision\Traits;

use Illuminate\Support\Collection;
use Mateusjatenee\GoogleVision\VisionAnottation;

trait ParsesContent
{
    /**
     * Parses the response to a collection of items
     *
     * @param $content
     *
     * @return \Illuminate\Support\Collection
     */
    public function parseContent($content)
    {
        return (new Collection($content['responses']
        ))->filter(function ($anottation) {
            return isset($anottation['textAnnotations']);
        })->map(function ($anottation) {
            return new VisionAnottation($anottation['textAnnotations']);
        });

    }
}
