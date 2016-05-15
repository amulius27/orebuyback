<?php

//Register the necessary functions
require_once __DIR__.'/cronfunctions/cronregistry.php';

//Open the database connection
$db = DBOpen();

//Set our region for EVE-Central
$regionlimit = 10000043;

$ItemIDs = array(
    16262,
    17978,
    16263,
    17977,
    16265,
    17976,
    16264,
    17975,
    16266,
    16267,
    16268,
    16269,
    4247,
    4051,
    4312,
    4246,
    16274,
    17889,
    17888,
    17887,
    16272,
    16273,
    16275,
);
//Get the current time for the update
$time = date("Y-m-d H:i:s");
//Open the database connection
$db = DBOpen();
//Get the price for each of the ice products, and then insert into the database
foreach($itemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in decimal format for the sql database
    $price = $price * 1.00;
    $db->insert('IceProductPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}

DBClose($db);

?>