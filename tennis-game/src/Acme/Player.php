<?php

namespace Acme;

class Player {
    public $name;
    public $points;

    public function __construct($name, $points)
    {
        $this->points = $points;
        $this->name = $name;
    }

    public function scoresPoints($points)
    {
        $this->points = $points;
    }
}