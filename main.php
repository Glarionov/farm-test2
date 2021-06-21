<?php

require 'vendor/autoload.php';

use App\Farm\FarmEvents;

$FarmEvens = new FarmEvents();
$FarmEvens->start();
