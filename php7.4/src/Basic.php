<?php

/**
 * Basic Class
 * @author Alessandro Lanni
 */

namespace Alab;

/**
 * Class Basic
 * @package Alab
 */
class Basic
{

    /**
     * Effettua la creazione di una stringa
     *
     * @param string $param
     * @return string
     */
    public function doOutput(string $param): string
    {

        return sprintf('do output: %s', $param);
    }

}
