<?php

/**
 * Basic Class
 * @author Alessandro Lanni
 */

namespace Alab;

class Basic
{

    public function doOutput(string $param): string
    {

        return sprintf('do output: %s', $param);
    }

}
