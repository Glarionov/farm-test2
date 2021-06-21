<?php

namespace App\Farm;

use App\Farm\AnimalData;
use App\Farm\Animals\Cow;
use App\Farm\Animals\Hen;
use Exception;

class FarmEvents
{
    private $farm;

    public function __construct()
    {
        $this->farm = new Farm();
    }

    /**
     * Запуск действий на ферме
     */
    public function start()
    {

        try {
            $this->farm->addAnimalType('Cow', 'Milk');
            $this->farm->addAnimalType('Hen', 'Egg');

            // Uncomment to test error handling
//            $this->farm->addAnimalType('Cow2', 'Milk');
//            $Hen = new Hen('id_' );
//            $this->farm->addAnimal('xxx', $Hen);
//            $AnimalData = new AnimalData('1', '2');
//            $this->farm->addAnimal('Cow', $AnimalData);

            for ($i = 0; $i < 10; $i++) {
                $Cow = new Cow('id_' . $i);
                $this->farm->addAnimal('Cow', $Cow);
            }
            for ($i = 0; $i < 20; $i++) {
                $Hen = new Hen('id_' . $i);
                $this->farm->addAnimal('Hen', $Hen);
            }
            echo "Days 1-7:\n===============\n";
            $this->farm->showAmountOfAnimals();

            for ($i = 0; $i < 7; $i++) {
                $this->farm->collectProduction();
            }
            $this->farm->showAmountOfProducts();

            $Cow = new Cow('id_111');
            $this->farm->addAnimal('Cow', $Cow);
            for ($i = 0; $i < 5; $i++) {
                $Hen = new Hen('id#' . $i);
                $this->farm->addAnimal('Hen', $Hen);
            }
            echo "\n\nDays 8-14:\n===============\n";
            $this->farm->showAmountOfAnimals();

            for ($i = 0; $i < 7; $i++) {
                $this->farm->collectProduction();
            }
            $this->farm->showAmountOfProducts();
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
