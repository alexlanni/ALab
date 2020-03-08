<?php

/**
 * Esempi pratici Datetime interface
 */

// Fuso orario
echo "Fuso Orario" . PHP_EOL;
$dtEDT = new \DateTime('now', new DateTimeZone('EDT'));
$dtCET = new \DateTime('now', new DateTimeZone('CET'));
$dtPST = new \DateTime('now', new DateTimeZone('PST'));

echo sprintf('Data/Ora EDT - %s', $dtEDT->format('Y-m-d H:i:s')) . PHP_EOL;
echo sprintf('Data/Ora CET - %s', $dtCET->format('Y-m-d H:i:s')) . PHP_EOL;
echo sprintf('Data/Ora PST - %s', $dtPST->format('Y-m-d H:i:s')) . PHP_EOL;

// Aggiungere intervallo usando DateTime e DateInterval
echo "\nIntervalli" . PHP_EOL;
$interval = new \DateInterval('P2D');
$dtCET->add($interval);

echo  $dtCET->format('Y-m-d') . PHP_EOL;

// Nuova istanza del DateTime
echo "\nModi per creare istanze DateTime" . PHP_EOL;
$dt = new \DateTime();
$dt->setDate(2020, 02, 10)
    ->setTime(12, 05, 30);

echo $dt->format('Y-m-d H:i:s') . PHP_EOL;

// Comparare due date
echo "\nComparazione di DateTime" . PHP_EOL;
$soglia = 5;
$oldDt = new DateTime('now');
sleep(3);
$newDt = new DateTime('now');

$count = $newDt->format('s') - $oldDt->format('s');
echo $count > $soglia ? 'Dopo la soglia' : 'Entro la soglia' . PHP_EOL;

// Date Period
echo "\nPeriodi" . PHP_EOL;
$dataDa = new DateTime('2020-01-01');
$dataA = new DateTime('2020-02-25');

$interval = new DateInterval('P1D');
$periods = new DatePeriod($dataDa, $interval, $dataA);


/** @var DateTime $date */
foreach ($periods as $date) {
    echo $date->format('Y-m-d H:i:s') . PHP_EOL;
}