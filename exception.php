<?php

use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }
}

class ExpectedErrorTest extends TestCase
{
    /**
     * @expectedException PHPUnit\Framework\Error\Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}