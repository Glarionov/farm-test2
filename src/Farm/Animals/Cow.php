<?php

namespace App\Farm\Animals;

use App\Farm\Animals;

class Cow extends AbstractAnimal
{
    protected $productionMin = 8;
    protected $productionMax = 12;
}
