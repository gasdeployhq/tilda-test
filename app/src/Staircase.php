<?php

namespace App;

class Staircase
{
    public function __construct(private int $maxNumber = 100)
    {

    }

    public function generate(): string
    {
        $output = '';
        $currentNumber = 1;
        $rowLength = 1;

        while ($currentNumber <= $this->maxNumber) {
            $row = '';

            for ($i = 0; $i < $rowLength; $i++) {
                if ($currentNumber > $this->maxNumber) {
                    break;
                }
                $row .= $currentNumber . " ";
                if ($currentNumber > 10 && $currentNumber < 14) {
                    $rowLength = 4;
                }
                $currentNumber++;
            }
            $output .= rtrim($row) . PHP_EOL;
            $rowLength++;
        }

        return $output;
    }

    public function display(): void
    {
        echo $this->generate();
    }
}
