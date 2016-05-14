<?php
//Load the required functions for the sql calls
require_once __DIR__.'/../functions/registry.php';

$itemIDs = array(
    "tritanium" => 34,
    "pyerite" => 35,
    "mexallon" => 36,
    "isogen" => 37,
    "nocxium" => 38,
    "zydrine" => 39,
    "megacyte" => 40,
    "morphite" => 11399,
    "heliumIsotopes" => 16274,
    "nitrogenIsotopes" => 17888,
    "oxygenIsotopes" => 17887,
    "hydrogenIsotopes" => 17889,
    "liquidOzone" => 16273,
    "heavyWater" => 16272,
    "strontiumClathrates" => 16275,  
);
//Get the region
$regionlimit = 10000043;
//Open the database
$db = DBOpen();
//Get the current time
$time = date("Y-m-d H:i:s");

foreach($itemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in a float format for the database.  The
    //database is expecting a decimal and not a character
    $price = $price * 1.00;
    $db->insert('MineralPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}

DBClose($db);

?>