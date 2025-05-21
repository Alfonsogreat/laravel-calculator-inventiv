<?php

namespace App\Services\Calculator;

use App\Services\Calculator\OperationInterface;

/**
 * Class DivideOperation
 * @package App\Services\Calculator
 *
 * This class implements the OperationInterface and provides a method to perform division.
 */
class DivideOperation implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('Erreur : division par zéro');
        }

        return $a / $b;
    }
}
