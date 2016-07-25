<?php

require_once __DIR__.'/../../functions/registry.php';

$corporation = $_POST["CorpName"];
$taxRate = $_POST["Tax"];
$db = DBOpen();

$db->update('Corps', array('CorpName' => $corporation), array('TaxRate' => $taxRate));
//Close the database connection
DBClose($db);

//Return to the Modify Contracts page
$location = 'http://' . $_SERVER['HTTP_HOST'];
$location = $location . dirname($_SERVER['PHP_SELF']) . '/../../corpsettings.php';
header("Location: $location");        
