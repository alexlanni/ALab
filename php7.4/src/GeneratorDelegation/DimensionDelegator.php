<?php


namespace Alab\GeneratorDelegation;


class DimensionDelegator
{

    protected $widts = [10,30,50];
    protected $heights = [15,25,35];

    protected function getWidths()
    {
        foreach ($this->widts as $width) yield $width;
    }

    protected function getHeights()
    {
        foreach ($this->heights as $height) yield $height;
    }

    public function getDimensions()
    {
        yield from $this->getWidths();
        yield from $this->getHeights();
    }
}
