<?php

namespace Mateusjatenee\GoogleVision;

class VisionAnottation
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param array $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * @param $attribute
     *
     * @return mixed
     */
    public function __get($attribute)
    {
        if ($attribute === 'items') {
            return $this->items;
        }
    }

    /**
     * Returns the main text from the Google Vision API response.
     *
     * @return string
     */
    public function getMainText()
    {
        return reset($this->items)['description'];
    }

    /**
     * Returns an array of the main string parts.
     *
     * @return array
     */
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
