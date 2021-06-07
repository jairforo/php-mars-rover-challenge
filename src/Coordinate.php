<?php

namespace App;

class Coordinate
{
    /**
     * Coordinates constructor.
     */
    public function __construct(private int $x, private int $y)
    {
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    public function __toString(): string
    {
        return $this->getX() . " " . $this->getY();
    }
}