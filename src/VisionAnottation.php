<?php

namespace Mateusjatenee\GoogleVision;

class VisionAnottation
{
    protected $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function __get($attribute)
    {
        if ($attribute === 'items') {
            return $this->items;
        }
    }

    public function getMainText()
    {
        return reset($this->items)['description'];
    }

    public function getParts()
    {
        $items = array_diff_key($this->items, [0]);
        return array_values(
            array_map(function ($item) {
                return $item['description'];
            }, $items)
        );
    }

}
