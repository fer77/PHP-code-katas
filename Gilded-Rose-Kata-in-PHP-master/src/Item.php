<?php

namespace App;

class Item
{
    public $quality;
    public $sellIn;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick() { } // Will enforce this on every class that extends Item.
}