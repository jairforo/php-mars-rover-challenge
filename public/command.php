<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\InputReader;
use App\Plateau;
use App\Rover;

$input = new InputReader();
$plateau = new Plateau(maxCoordinate: $input->getMaxCoordinate());
foreach ($input->getRoverData() as $roverData) {
    $rover = $plateau->addRover(new Rover(
        $roverData['coordinate'],
        $roverData['orientation']
    ))->execute($roverData['commands']);

    echo $rover . "\r\n";
}