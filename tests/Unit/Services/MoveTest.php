<?php

namespace App\Tests\Unit\Services;

use App\Coordinate;
use App\Orientation;
use App\Services\Move;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    /**
     * @dataProvider getValidMovements
     */
    public function test_should_move_the_position($x, $y, $orientation, $expectedX, $expectedY)
    {
        $move = (new Move(new Coordinate($x,$y)))
            ->move(new Orientation($orientation));

        $this->assertEquals($expectedX, $move->getX());
        $this->assertEquals($expectedY, $move->getY());
    }

    public function getValidMovements(): array
    {
        return [
            [5, 5, Orientation::NORTH, 5, 6],
            [5, 5, Orientation::SOUTH, 5, 4],
            [5, 5, Orientation::EAST, 6, 5],
            [5, 5, Orientation::WEST, 4, 5],
        ];
    }
}