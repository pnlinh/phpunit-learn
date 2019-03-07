<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException();
        }

        return array_reduce(array_filter($this->operands), function ($x, $y) {
            if ($x !== null && $y !== null) {
                return $x / $y;
            }

            return $y;
        });
    }
}