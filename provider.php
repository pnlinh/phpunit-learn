<?php

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider  additionProviderWithCsvFile
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testAdd($a, $b, $expected): void
    {
        printf(sprintf("%d + %d = %d\n", $a, $b, $expected));

        $this->assertSame((int) $expected, $a + $b);
    }

    public function additionProviderArray(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2],
        ];
    }

    public function additionProviderArrayWithKeyString(): array
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 2]
        ];
    }

    public function additionProviderWithCsvFile(): \CsvFileIterator
    {
        return new CsvFileIterator('data.csv');
    }

    /**
     * @dataProvider seditionProvider
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testSub($a, $b, $expected): void
    {
        $this->assertSame($expected, $a - $b);
    }

    public function seditionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, -1],
            [1, 0, 1],
            [1, 1, 1],
        ];
    }
}

class CsvFileIterator implements Iterator
{
    protected $file;

    protected $key = 0;

    protected $current;

    public function __construct($file)
    {
        $this->file = fopen($file, 'rb');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function rewind()
    {
        rewind($this->file);
        $this->current = fgetcsv($this->file);
        $this->key = 0;
    }

    public function valid()
    {
        return ! feof($this->file);
    }

    public function key()
    {
        return $this->key;
    }

    public function current()
    {
        // Skip header
        if (0 === $this->key) {
            $this->next();
        }

        return $this->current;
    }

    public function next()
    {
        $this->current = fgetcsv($this->file);
        $this->key++;
    }
}