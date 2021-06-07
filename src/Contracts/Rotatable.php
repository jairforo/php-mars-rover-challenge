<?php

namespace App\Contracts;

use App\Orientation;

interface Rotatable
{
    public function turnRight(): Orientation;
    public function turnLeft(): Orientation;
}