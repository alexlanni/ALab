<?php

/**
 * Classe Test
 *
 * @author Alessandro Lanni
 */

namespace Alab;

/**
 * Class Test
 * @package Alab
 */
class Test
{

    protected $test;

    /**
     * Test constructor.
     * @param string $test
     */
    public function __construct(string $test = "")
    {
        $this->test = $test;
    }
}