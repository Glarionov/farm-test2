<?php

namespace App\Farm\Animals;

use App\Farm\Animals;

class Hen extends AbstractAnimal
{
    protected $productionMin = 0;
    protected $productionMax = 1;
    protected $discreteProduction = true;
}
