<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Staircase;

class StaircaseTest extends TestCase
{
    public function testGenerateStaircase()
    {
        $staircase = new Staircase(19);
        $expectedOutput = "1\n"
            . "2 3\n"
            . "4 5 6\n"
            . "7 8 9 10\n"
            . "11 12 13 14\n"
            . "15 16 17 18 19\n";

        $this->assertEquals($expectedOutput, $staircase->generate());
    }
}
