<?php


namespace App\Services;

use App\Rover;

abstract class Command
{
    public function __construct(private Rover $rover)
    {
    }

    public function execute(string $commandLine): Rover
    {
        $commands = str_split(trim($commandLine));
        foreach ($commands as $command) {
            if ($command === Move::MOVE) {
                $coordinate = (new Move($this->rover->getCoordinate()))
                    ->move($this->rover->getOrientation());
                $this->rover->setCoordinate($coordinate);
            } else {
                $orientation = (new Rotate($this->rover->getOrientation()))
                    ->rotate($command);
                $this->rover->setOrientation($orientation);
            }
        }

        return $this->rover;
    }
}