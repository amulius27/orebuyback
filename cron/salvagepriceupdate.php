<?php
//Get the required files in order to run sql calls
require_once __DIR__.'/cronfunctions/cronregistry.php';

//Set our region for EVE-Central
$regionlimit = 10000043;

$ItemIDs = array(
    25595,
    25605,
    25616,
    25596,
    25600,
    25622,
    25599,
    25604,
    25623,
    25591,
    25590,
    25611,
    25597,
    25592,
    25615,
    25625,
    25601,
    25621,
    25624,
    25608,
    25620,
    25619,
    25610,
    25589,
    25603,
    25618,
    25609,
    25617,
    25613,
    25588,
    25614,
    25593,
    25594,
    25607,
    25602,
    25612,
    25598,
    25606,
);


//Get the current time
$time = date("Y-m-d H:i:s");
//Open the database
$db = DBOpen();
//Get the price for each of the ice products, and then insert into the database
foreach($ItemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in decimal format for the sql database
    $price = $price * 1.00;
    $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}
//Close the database connection
DBClose($db);

?>