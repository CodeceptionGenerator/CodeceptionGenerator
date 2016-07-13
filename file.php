<?php
require_once('./CodeceptionGenerator/Lib/File/Csv.php');
use CodeceptionGenerator\Lib\File\Csv;
$csv = new Csv();
$filePath = __DIR__ . '/input/sample.csv';
$array = $csv->convertArray($filePath);
// var_dump($array);