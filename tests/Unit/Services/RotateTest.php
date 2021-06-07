<?php

namespace App\Tests\Unit\Services;

use App\Exceptions\InvalidDirectionException;
use App\Orientation;
use App\Services\Rotate;
use PHPUnit\Framework\TestCase;

class RotateTest extends TestCase
{

    public function test_should_throw_an_invalid_orientation_exception()
    {
        $this->expectException(InvalidDirectionException::class);
        (new Rotate(new Orientation('N')))->rotate("UP");
    }

    /**
     * @dataProvider getValidMovements
     */
    public function test_should_rotate_the_orientation($direction, $orientation, $expected)
    {
        $rotate = (new Rotate(new Orientation($orientation)))->rotate($direction);
        $this->assertEquals($rotate->getOrientation(), $expected);
    }

    public function getValidMovements(): array
    {
        return [
            [Rotate::TURN_LEFT, Orientation::NORTH, Orientation::WEST],
            [Rotate::TURN_LEFT, Orientation::SOUTH, Orientation::EAST],
            [Rotate::TURN_LEFT, Orientation::EAST, Orientation::NORTH],
            [Rotate::TURN_LEFT, Orientation::WEST, Orientation::SOUTH],
            [Rotate::TURN_RIGHT, Orientation::NORTH, Orientation::EAST],
            [Rotate::TURN_RIGHT, Orientation::SOUTH, Orientation::WEST],
            [Rotate::TURN_RIGHT, Orientation::EAST, Orientation::SOUTH],
            [Rotate::TURN_RIGHT, Orientation::WEST, Orientation::NORTH],
        ];
    }
}