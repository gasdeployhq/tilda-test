<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Staircase;
use App\UniqueMatrix;

// Создаем экземпляры классов и запускаем их методы
echo "Staircase output:\n";
$staircase = new Staircase(107);
echo $staircase->generate();

echo "\nUnique Array output with sums:\n";
(new UniqueMatrix())->displayMatrixWithSums();
