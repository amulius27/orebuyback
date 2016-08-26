<?php

require_once __DIR__.'/../../functions/registry.php';

$corporation = $_POST["CorpName"];
$taxRate = filter_input(INPUT_POST, $_POST["Tax"], FILTER_SANITIZE_NUMBER_FLOAT);
//$taxRate = $_POST["Tax"];
$db = DBOpen();
//Get the unique index from the table for the corporation being modified.
$index = $db->fetchColumn('SELECT index FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
$db->update('Corps', array('index' => $index), array('TaxRate' => $taxRate));
//Close the database connection
DBClose($db);

//Return to the Modify Contracts page
$location = 'http://' . $_SERVER['HTTP_HOST'];
$location = $location . dirname($_SERVER['PHP_SELF']) . '/../../corpsettings.php';
header("Location: $location");        
