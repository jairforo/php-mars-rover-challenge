<?php

namespace App\Tests\Unit;

use App\Plateau;
use App\Services\InputReader;
use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    public function test_should_ensure_the_plateau_has_valid_max_coordinates()
    {
        $plateau = new Plateau(maxCoordinate: (new InputReader())->getMaxCoordinate());
        $this->assertEquals(5, $plateau->getMaxCoordinate()->getX());
        $this->assertEquals(5, $plateau->getMaxCoordinate()->getY());
    }
}