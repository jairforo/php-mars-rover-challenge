<?php

namespace App\Services;

use App\Contracts\Rotatable;
use App\Exceptions\InvalidDirectionException;
use App\Exceptions\InvalidOrientationException;
use App\Orientation;

class Rotate implements Rotatable
{
    const TURN_LEFT = "L";
    const TURN_RIGHT = "R";

    /**
     * Move constructor.
     */
    public function __construct(private Orientation $orientation)
    {
    }

    /**
     * @throws InvalidOrientationException
     */
    public function rotate(string $direction): Orientation
    {
        switch ($direction) {
            case self::TURN_LEFT:
                return $this->turnLeft();
            case self::TURN_RIGHT:
                return $this->turnRight();
        }

        throw new InvalidDirectionException('The given direction is invalid');
    }

    public function turnRight(): Orientation
    {
        $newOrientation = match ($this->orientation->getOrientation())
        {
            Orientation::NORTH => Orientation::EAST,
            Orientation::EAST => Orientation::SOUTH,
            Orientation::SOUTH => Orientation::WEST,
            Orientation::WEST => Orientation::NORTH,
        };

        return new Orientation($newOrientation);
    }

    public function turnLeft(): Orientation
    {
        $newOrientation = match ($this->orientation->getOrientation())
        {
            Orientation::NORTH => Orientation::WEST,
            Orientation::WEST => Orientation::SOUTH,
            Orientation::SOUTH => Orientation::EAST,
            Orientation::EAST => Orientation::NORTH,
        };

        return new Orientation($newOrientation);
    }
}