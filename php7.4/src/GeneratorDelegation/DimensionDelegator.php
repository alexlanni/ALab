<?php

/**
 * Test dei generators
 *
 * @author Alessandro Lanni
 */

namespace Alab\GeneratorDelegation;

/**
 * Class DimensionDelegator
 *
 *
 * @property array $widths set di Widths
 * @property array $heights set di Heights
 * @package Alab\GeneratorDelegation
 */
class DimensionDelegator
{

    /**
     * Set di Widths
     */
    protected $widths = [10, 30, 50];

    /**
     * Set di heights
     */
    protected $heights = [15, 25, 35];

    /**
     * Ottiene le widths
     * @return \Generator
     */
    protected function getWidths()
    {
        foreach ($this->widths as $width) yield $width;
    }

    /**
     * Ottiene le heights
     *
     * @return \Generator
     */
    protected function getHeights()
    {
        foreach ($this->heights as $height) yield $height;
    }

    /**
     * Effettua lo yield del set di dimensioni
     *
     * @return \Generator
     */
    public function getDimensions()
    {
        yield from $this->getWidths();
        yield from $this->getHeights();
    }
}
