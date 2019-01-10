<?php
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider  additionProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testAdd($a, $b, $expected): void
    {
        printf(sprintf("%d + %d = %d\n", $a, $b, $expected));

        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider(): array
    {
        //return [
        //    [0, 0, 0],
        //    [0, 1, 1],
        //    [1, 0, 1],
        //    [1, 1, 2]
        //];

        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 2]
        ];
    }

    /**
     * @dataProvider subitionProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testSub($a, $b, $expected): void
    {
        $this->assertSame($expected, $a - $b);
    }

    public function subitionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, -1],
            [1, 0, 1],
            [1, 1, 1]
        ];
    }
}