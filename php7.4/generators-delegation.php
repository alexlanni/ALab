<?php

/**
 * Esempi di Generators Delegation
 *
 * La delega di un generator 'e la possibilit'a della dichiarazione  "yield" di essere combinata con la dichiarazione
 * "from" all' interno di un altro metodo.
 *
 * La riga "yield from <expression>" permette la chiamata da un altro metodo/call.
 *
 * `yield from` continua fino a quando l'oggetto o l'array traversable 'e scaduto.
 */

use Alab\GeneratorDelegation\DimensionDelegator;

require './vendor/autoload.php';

$dim = new DimensionDelegator();

foreach ($dim->getDimensions() as $dimension)
{
    var_dump($dimension);
}