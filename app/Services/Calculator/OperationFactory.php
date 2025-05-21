<?php

namespace App\Services\Calculator;

use App\Services\Calculator\OperationInterface;
use App\Services\Calculator\AddOperation;
use App\Services\Calculator\SubtractOperation;
use App\Services\Calculator\MultiplyOperation;
use App\Services\Calculator\DivideOperation;

/**
 * Class OperationFactory
 * @package App\Services\Calculator
 *
 * Cette classe est responsable de la création d'instances d'opérations.
 */
class OperationFactory
{
    /**
     * Retourne l'implémentation appropriée selon le type d'opération.
     *
     * @param string $type
     * @return OperationInterface
     * @throws \InvalidArgumentException
     */
    public static function make(string $type): OperationInterface
    {
        return match ($type) {
            'add' => new AddOperation(),
            'subtract' => new SubtractOperation(),
            'multiply' => new MultiplyOperation(),
            'divide' => new DivideOperation(),
            default => throw new \InvalidArgumentException("Type d'opération invalide : $type"),
        };
    }
}
