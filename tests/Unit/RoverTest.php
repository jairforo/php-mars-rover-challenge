<?php

namespace App\Tests\Unit;

use App\Coordinate;
use App\Orientation;
use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * @dataProvider getCommands
     */
    public function test_should_ensure_the_output(
        int $x,
        int $y,
        string $orientation,
        string $command,
        string $expected
    )
    {
        $rover = new Rover(
            new Coordinate($x,$y),
            new Orientation($orientation)
        );
        $rover->execute($command);
        $this->assertEquals($expected, $rover);
    }

    public function getCommands()
    {
        return [
            [1, 2, "N", "LMLMLMLMM", "1 3 N"],
            [3, 3, "E", "MMRMMRMRRM", "5 1 E"]
        ];
    }
}