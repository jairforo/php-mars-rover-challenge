<?php

namespace App\Tests\Unit;

use App\Exceptions\InvalidOrientationException;
use App\Orientation;
use PHPUnit\Framework\TestCase;

class OrientationTest extends TestCase
{
    public function test_should_throw_an_invalid_orientation_exception()
    {
        $this->expectException(InvalidOrientationException::class);
        new Orientation("JF");
    }

    /**
     * @dataProvider getValidOrientations
     */
    public function test_should_return_a_valid_orientation($expected)
    {
        $orientation = new Orientation($expected);
        $this->assertEquals($expected, $orientation->getOrientation());
    }

    public function getValidOrientations(): array
    {
        return [
            [Orientation::NORTH],
            [Orientation::SOUTH],
            [Orientation::WEST],
            [Orientation::EAST],
        ];
    }
}