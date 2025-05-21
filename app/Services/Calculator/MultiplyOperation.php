<?php

namespace App\Services\Calculator;

use App\Services\Calculator\OperationInterface;

/**
 * Class MultiplyOperation
 * @package App\Services\Calculator
 *
 * This class implements the OperationInterface and provides a method to perform multiplication.
 */
class MultiplyOperation implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        return $a * $b;
    }
}
