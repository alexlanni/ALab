<?php

/**
 *
 */

namespace Alab\Test;

use Alab\Basic;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testInstance()
    {
        $t = new Basic();
        $this->assertSame(Basic::class, get_class($t));
    }

    public function testEqualsSame()
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        $a = '1';
        $b = 1;
        // Questo funziona:
        $this->assertEquals($a, $b);

        // Questo no perche' tiene conto del tipo:
        $this->assertSame($a, $b);
    }

    public function testBasicClass()
    {
        $t = new Basic();
        $random = md5(time());
        $doOutput = $t->doOutput($random);
        $this->assertEquals(sprintf('do output: %s', $random), $doOutput);
    }

    public function testArray()
    {
        $a = [
            'test' => 'ciao',
            'time' => time()
        ];
        $this->assertArrayHasKey('test', $a);

        $this->assertArrayNotHasKey('date', $a);
    }

    public function testA()
    {
        $this->assertTrue(false);
    }

    /**
     * @depends testA
     */
    public function testB()
    {
        $this->assertTrue(true);
    }

    public function testFirst()
    {
        $this->assertTrue(true);
        return 345;
    }

    public function testSecond()
    {
        $this->assertTrue(true);
        return 678;
    }

    /**
     * @depends testFirst
     * @depends testSecond
     */
    public function testDependent($a, $b)
    {
        $this->assertSame(345, $a);
        $this->assertSame(678, $b);
    }

}
