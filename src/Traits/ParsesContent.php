<?php

namespace Mateusjatenee\GoogleVision\Traits;

use Illuminate\Support\Collection;

trait ParsesContent
{
    public function parseContent($content)
    {
        return new Collection($content['responses']);
    }
}
