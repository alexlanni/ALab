<?php

/**
 * Esempi di uso Generators
 *
 * Eseguire il test invocando il profiler, usando prima readFileGen e poi readFileNormal.
 * Notare nell'output la differenza.
 *
 * Notes
 * - Integer values do not require much memory byte space, unless really big, so don't be too concerned with large
 *   integers in your data.
 *
 * - Think of generators as a lazy loading of data as it is needed.
 *
 * Best Practices
 * - Use a generator when what you want to do will result in a large memory footprint.
 * - Use a generator when the dataset is composed of lots of boilerplate data, as this data consumes lots of memory
 *   containing the same values.
 */

function readFileGen($file)
{
    $fileContent = fopen($file, 'r');
    while (!feof($fileContent)) {
        yield fgets($fileContent);
    }
    fclose($fileContent);

}

function readFileNormal($file)
{
    $fileContent = fopen($file, 'r');
    $res = [];
    while (!feof($fileContent)) {
        $res[] = fgets($fileContent);
    }
    fclose($fileContent);
    return $res;
}

/** Modalita' Generators - Si useranno i generator */
foreach (readFileGen(__DIR__ . '/stuff/testfile') as $line)
    echo $line . PHP_EOL;

/** Modalita' Normale */
//$readLines = readFileNormal(__DIR__ . '/stuff/testfile');
//foreach ($readLines as $k=>$content)
//    echo $content . PHP_EOL;
