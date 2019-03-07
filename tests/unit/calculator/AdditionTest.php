<?php

use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function adds_up_given_operands()
    {
        $additon = new Addition();

        $additon->setOperands([5, 10]);

        $this->assertEquals(15, $additon->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandsException::class);

        $additon = new Addition();
        $additon->calculate();
    }
}