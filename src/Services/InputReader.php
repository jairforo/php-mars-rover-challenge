<?php

namespace App\Services;

use App\Coordinate;
use App\Orientation;

class InputReader
{
    private Coordinate $maxCoordinate;

    private array $roverData;

    private array $commands;

    public function __construct(private string $fileName = 'stdin.txt')
    {
        $this->extractCommands();
        $this->setMaxCoordinate();
        $this->setRoverData();
    }

    private function extractCommands(): void
    {
        $commandsFile = fopen(__DIR__ . "/../../" . $this->fileName, "r");
        $allCommands = [];
        if ($commandsFile) {
            while (($line = fgets($commandsFile)) !== false) {
                $allCommands[] = $line;
            }
            fclose($commandsFile);
        }
        $this->commands = $allCommands;
    }

    public function getMaxCoordinate(): Coordinate
    {
        return $this->maxCoordinate;
    }

    private function setMaxCoordinate(): void
    {
        $dimensions = explode(" ", trim($this->commands[0]));
        $this->maxCoordinate = new Coordinate(
            (int) $dimensions[0],
            (int) $dimensions[1]
        );
    }

    public function getRoverData(): array
    {
        return $this->roverData;
    }

    public function setRoverData(): InputReader
    {
        $allCommands = $this->commands;
        unset($allCommands[0]);
        $count = 0;
        $data = [];
        foreach ($allCommands as $commandLine) {
            if ($count === 0) {
                $position = array_values(array_filter(str_split(trim($commandLine)), function ($command) {
                    return $command !== " ";
                }));
                $data = [
                    "coordinate" => new Coordinate((int) $position[0], (int) $position[1]),
                    "orientation" => new Orientation($position[2]),
                ];
                $count++;
            } else {
                $data["commands"] = trim($commandLine);
                $this->roverData[] = $data;
                $count = 0;
            }
        }

        return $this;
    }
}