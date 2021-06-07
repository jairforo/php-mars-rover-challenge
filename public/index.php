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
}

echo "<h1>PHP Mars Rover Challenge</h1><br />";
echo "[x] Starting Mars expedition<br />";
echo "[x] Setting plateau dimensions to <strong>0,0:" . $plateau->getMaxCoordinate()->getX() . "," . $plateau->getMaxCoordinate()->getY() . "</strong><br />";
echo "[x] Receiving Rovers data...<br />";
echo "---- " . count($plateau->getRovers()) . " Rovers were found<br />";
echo "[x] Deploying Rover Squad...<br />";
foreach ($input->getRoverData() as $index => $roverData) {
    echo "----| Deploying Rover #" .$index+1 . " at " . $roverData['coordinate'] . " " . $roverData['orientation'] . "<br />";
    echo "--------| Command Line: " . $roverData['commands'] . "<br />";
}
echo "[x] Rover Squad deployed successfully<br />";
echo "[x] Executing Command lines...<br />";
echo "[x] Printing output.<br />";
foreach ($plateau->getRovers() as $rover) {
    echo "<strong>" . $rover . "</strong><br />";
}
echo "[✔️] Mission complete.<br />";
echo "🤖🎖️🎉";