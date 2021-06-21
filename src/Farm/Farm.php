<?php

namespace App\Farm;

use App\Farm\AnimalData;
use App\Farm\Animals\AbstractAnimal;
use Exception;

class Farm
{
    /**
     * Список всеж животных
     * @var array
     */
    private $farmAnimals = [];

    /**
     * @throws Exception
     */
    public function addAnimalType($name, $productionName)
    {
        $className = "App\Farm\Animals\\$name";
        if (!class_exists($className)) {
            throw new Exception('Trying to add animal type without existing matching class.');
        }
        $this->farmAnimals[$name] = new AnimalData($name, $productionName);
    }

    /**
     * Добавление животных в списко
     * @throws Exception
     */
    public function addAnimal($name, $animalObject)
    {
        if (empty($this->farmAnimals[$name])) {
            throw new Exception('Trying to add animal with unknown type.');
        }

        if (!is_subclass_of($animalObject, AbstractAnimal::class)) {
            throw new Exception('Trying to add non-animal object.');
        }
        $this->farmAnimals[$name]->list[$animalObject->getId()] = $animalObject;
    }

    /**
     * Сбор продкции со всех животных
     */
    public function collectProduction()
    {
        foreach ($this->farmAnimals as $animalName => $animalData) {
            foreach ($animalData->list as $animalObject) {
                $this->farmAnimals[$animalName]->produced += $animalObject->getProduction();
            }
        }
    }

    /**
     * Показывает количество животных
     */
    public function showAmountOfAnimals()
    {
        echo "Animals:\n____________\n";
        foreach ($this->farmAnimals as $animalData) {
            echo $animalData->name . ': ' . count($animalData->list) . "\n";
        }
        echo "\n";
    }

    /**
     * Показывает количество произведённой продукции
     */
    public function showAmountOfProducts()
    {
        echo "Produced:\n____________\n";
        foreach ($this->farmAnimals as $animalData) {
            echo $animalData->productionName .
                ': ' . $animalData->produced . "\n";
        }
        echo "\n";
    }
}
