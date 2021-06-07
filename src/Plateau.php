<?php

namespace App;


class Plateau
{
    private Coordinate $minCoordinate;

    /** @var array  */
    private array $rovers = [];

    /**
     * Plateau constructor.
     * @param Coordinate $maxCoordinate
     */
    public function __construct(
        private Coordinate $maxCoordinate,
    )
    {
        $this->minCoordinate = new Coordinate(0, 0);
    }

    /**
     * @return Coordinate
     */
    public function getMaxCoordinate(): Coordinate
    {
        return $this->maxCoordinate;
    }

    /**
     * @return array
     */
    public function getRovers(): array
    {
        return $this->rovers;
    }

    /**
     * @param Rover $rover
     * @return Rover
     */
    public function addRover(Rover $rover): Rover
    {
        $this->rovers[] = $rover;
        return $rover;
    }
}