<?php
require_once('./CodeceptionGenerator/Lib/Generator/AcceptanceTest.php');
use CodeceptionGenerator\Lib\Generator\AcceptanceTest;
$domDocument = new \DOMDocument();
$acceptanceTestGenerator = new AcceptanceTest($domDocument);
$acceptanceTestGenerator->execute();