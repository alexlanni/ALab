<?php

/**
 * Esegue output dal client, testando l' autoloading mediante composer PSR-49
 * Da Docker prova aad usare:
 *
 * docker-compose exec lab php cli-test.php
 */

use Alab\Test;

require './vendor/autoload.php';

$t = new Test();
echo sprintf("Ho appena creato una istanza di %s\n", get_class($t));
