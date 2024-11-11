<?php

namespace App;

class UniqueMatrix
{
    private array $matrix;

    public function __construct(private int $rows = 5, private int $columns = 7)
    {
        $this->matrix = $this->generateUniqueMatrix();
    }

    private function generateUniqueMatrix(int $min = 1, int $max = 1000): array
    {
        $numbers = range($min, $max);
        shuffle($numbers);
        $uniqueNumbers = array_slice($numbers, 0, $this->rows * $this->columns);

        $matrix = [];
        $index = 0;
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $matrix[$i][$j] = $uniqueNumbers[$index++];
            }
        }

        return $matrix;
    }

    public function getMatrix(): array
    {
        return $this->matrix;
    }

    public function calculateRowSums(): array
    {
        return array_map('array_sum', $this->matrix);
    }

    public function calculateColumnSums(): array
    {
        $colSums = array_fill(0, $this->columns, 0);
        foreach ($this->matrix as $row) {
            foreach ($row as $j => $value) {
                $colSums[$j] += $value;
            }
        }
        return $colSums;
    }

    public function displayMatrixWithSums(): void
    {
        $rowSums = $this->calculateRowSums();
        $colSums = $this->calculateColumnSums();

        echo "Matrix with Row and Column Sums:\n";

        for ($i = 0; $i < $this->rows; $i++) {
            echo implode("\t", $this->matrix[$i]) . "\t| " . $rowSums[$i] . PHP_EOL;
        }

        echo str_repeat("-------\t", $this->columns) . "-------\n";

        echo implode("\t", $colSums) . PHP_EOL;
    }
}
