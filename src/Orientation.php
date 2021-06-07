<?php


namespace App;


use App\Exceptions\InvalidOrientationException;

class Orientation
{
    const NORTH = "N";
    const SOUTH = "S";
    const WEST = "W";
    const EAST = "E";

    /**
     * Orientation constructor.
     */
    public function __construct(private string $orientation)
    {
        $this->checkOrientation(trim($orientation));
    }

    /**
     * @return string
     */
    public function getOrientation(): string
    {
        return $this->orientation;
    }

    /**
     * @param string $orientation
     */
    private function checkOrientation(string $orientation): void
    {
        if (!in_array($orientation,
            [
                self::NORTH,
                self::SOUTH,
                self::WEST,
                self::EAST
            ]
        )) {
            throw new InvalidOrientationException('The given orientation is invalid');
        };
    }

    public function __toString(): string
    {
        return $this->orientation;
    }
}