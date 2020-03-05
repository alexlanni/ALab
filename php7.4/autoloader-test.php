<?php

use Alab\Test;

require './vendor/autoload.php';

$t = new Test();
echo sprintf("Ho appena creato una istanza di %s\n", get_class($t));