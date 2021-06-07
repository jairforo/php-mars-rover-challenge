<?php

namespace App;

use App\Services\Command;

class Rover extends Command
{
    /**
     * Rover constructor.
     */
    public function __construct(private Coordinate $coordinate, private Orientation $orientation)
    {
        parent::__construct($this);
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @param Coordinate $coordinate
     * @return Rover
     */
    public function setCoordinate(Coordinate $coordinate): Rover
    {
        $this->coordinate = $coordinate;
        return $this;
    }

    /**
     * @return Orientation
     */
    public function getOrientation(): Orientation
    {
        return $this->orientation;
    }

    /**
     * @param Orientation $orientation
     * @return Rover
     */
    public function setOrientation(Orientation $orientation): Rover
    {
        $this->orientation = $orientation;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getCoordinate()->getX() . " " .
            $this->getCoordinate()->getY() . " " .
            $this->getOrientation()->getOrientation();
    }
}