<?php

namespace Mateusjatenee\GoogleVision\Facades;

use Illuminate\Support\Facades\Facade;

class Vision extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vision';
    }
}
