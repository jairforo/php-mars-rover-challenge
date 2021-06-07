<?php

namespace App\Services;

use App\Coordinate;
use App\Exceptions\InvalidOrientationException;
use App\Orientation;

class Move
{
    const MOVE = "M";

    /**
     * Move constructor.
     */
    public function __construct(private Coordinate $coordinate)
    {
    }

    /**
     * @throws InvalidOrientationException
     */
    public function move(Orientation $direction): Coordinate
    {
        switch ($direction->getOrientation()) {
            case Orientation::NORTH:
                return $this->goToNorth();
            case Orientation::SOUTH:
                return $this->goToSouth();
            case Orientation::EAST:
                return $this->goToEast();
            case Orientation::WEST:
                return $this->goToWest();
        }

        throw new InvalidOrientationException('The given direction is invalid');
    }

    private function goToNorth(): Coordinate
    {
        return new Coordinate(
            $this->coordinate->getX(),
            $this->coordinate->getY() + 1
        );
    }

    private function goToSouth(): Coordinate
    {
        return new Coordinate(
            $this->coordinate->getX(),
            $this->coordinate->getY() - 1
        );
    }

    private function goToEast(): Coordinate
    {
        return new Coordinate(
            $this->coordinate->getX() + 1,
            $this->coordinate->getY()
        );
    }

    private function goToWest(): Coordinate
    {
        return new Coordinate(
            $this->coordinate->getX() - 1,
            $this->coordinate->getY()
        );
    }
}