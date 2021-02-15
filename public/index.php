<?php
include_once '../src/utils/autoloader.php';

// create the database connection
$dbfactory = new \Rediite\Model\Factory\dbFactory();
$dbAdapter = $dbfactory->createService();

$data = [];

include_once '../src/View/template.php';
loadView('home', $data);
?>
