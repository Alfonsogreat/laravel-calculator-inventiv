<?php

namespace App\Services\Calculator;

use App\Services\Calculator\OperationInterface;

/**
 * Class AddOperation
 * @package App\Services\Calculator
 *
 * This class implements the OperationInterface and provides a method to perform addition.
 */
class AddOperation implements OperationInterface
{
    public function calculate(float $a, float $b): float
    {
        return $a + $b;
    }
}
