<?php
require_once('./CodeceptionGenerator/Lib/Importer/Csv.php');
use CodeceptionGenerator\Lib\Importer\Csv;
$csvImporter = new Csv();
$filePath = __DIR__ . '/input/sample.csv';
$array = $csvImporter->convertArray($filePath);
// var_dump($array);