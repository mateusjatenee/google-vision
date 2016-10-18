<?php

namespace Mateusjatenee\GoogleVision\Traits;

use Illuminate\Support\Collection;
use Mateusjatenee\GoogleVision\VisionAnottation;

trait ParsesContent
{
    public function parseContent($content)
    {
        return (new Collection($content['responses']))->map(function ($anottation) {
            return new VisionAnottation($anottation['textAnnotations']);
        });

    }
}
