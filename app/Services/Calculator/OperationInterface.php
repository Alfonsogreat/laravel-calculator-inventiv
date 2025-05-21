<?php

namespace App\Services\Calculator;

/**
 * Interface OperationInterface
 * @package App\Services\Calculator
 *
 * This interface defines the contract for all calculator operations.
 */
interface OperationInterface
{
    public function calculate(float $a, float $b): float;
}
