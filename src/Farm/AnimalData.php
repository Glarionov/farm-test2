<?php

namespace App\Farm;

class AnimalData
{
    public $name;
    public $productionName;
    public $list = [];
    public $producedProducts = 0;

    public function __construct($name, $productionName)
    {
        $this->name = $name;
        $this->productionName = $productionName;
    }
}
