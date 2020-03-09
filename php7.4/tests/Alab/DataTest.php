<?php

/**
 * Data driven tests
 */

namespace Alab;

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @param $a
     * @param $b
     * @param $expected
     *
     * @dataProvider sommaProvider
     */
    public function testSomma($a, $b, $expected)
    {
        $this->assertSame($expected, $a + $b);
    }

    public function sommaProvider()
    {
        return [
            [0,1,1],
            [3,2,5],
            [5,1,6],
            [3,4,7],
            [1,1,2],
        ];
    }
}