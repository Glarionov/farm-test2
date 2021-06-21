<?php

namespace App\Farm\Animals;

abstract class AbstractAnimal
{
    protected $productionMin = 0;
    protected $productionMax = 0;
    protected $discreteProduction = false;
    protected $id;

    public function __construct($id = false)
    {
        $this->id = $id;
    }

    /**
     * Имитация производства новой продукции
     * @return float|int
     * @throws Exception
     */
    public function getProduction()
    {
        if ($this->discreteProduction) {
            return random_int($this->productionMin, $this->productionMax);
        }
        return random_int($this->productionMin, $this->productionMax - 1) + (random_int(0, 100) / 100 );
    }

    public function getId()
    {
        return $this->id;
    }
}
