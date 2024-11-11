<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\UniqueMatrix;

class UniqueMatrixTest extends TestCase
{
    public function testMatrixDimensions()
    {
        $matrix = new UniqueMatrix(5, 7);
        $matrixArray = $matrix->getMatrix();

        // Проверка размеров матрицы
        $this->assertCount(5, $matrixArray);
        foreach ($matrixArray as $row) {
            $this->assertCount(7, $row);
        }
    }

    public function testUniqueValuesInMatrix()
    {
        $matrix = new UniqueMatrix(5, 7);
        $matrixArray = $matrix->getMatrix();

        // Проверка уникальности чисел
        $flattenedArray = array_merge(...$matrixArray);
        $this->assertCount(35, array_unique($flattenedArray));
    }

    public function testRowSums()
    {
        $matrix = new UniqueMatrix(5, 7);
        $matrixArray = $matrix->getMatrix();
        $expectedRowSums = array_map('array_sum', $matrixArray);

        $this->assertEquals($expectedRowSums, $matrix->calculateRowSums());
    }

    public function testColumnSums()
    {
        $matrix = new UniqueMatrix(5, 7);
        $matrixArray = $matrix->getMatrix();
        $expectedColSums = array_fill(0, 7, 0);

        foreach ($matrixArray as $row) {
            foreach ($row as $j => $value) {
                $expectedColSums[$j] += $value;
            }
        }

        $this->assertEquals($expectedColSums, $matrix->calculateColumnSums());
    }
}
