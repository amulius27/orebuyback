<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../functions/registry.php');

$itemIDs = array(
    "tritanium" => "34",
    "pyerite" => "35",
    "mexallon" => "36",
    "isogen" => "37",
    "nocxium" => "38",
    "zydrine" => "39",
    "megacyte" => "40",
    "morphite" => "11399",
    "heliumIsotopes" => "16274",
    "nitrogenIsotopes" => "17888",
    "oxygenIsotopes" => "17887",
    "hydrogenIsotopes" => "17889",
    "liquidOzone" => "16273",
    "heavyWater" => "16272",
    "strontiumClathrates" => "16275"    
);

$regionlimit = 10000043;


$db = DBOpen();

foreach($itemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=".$id."&regionlimit=".$regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    $db->insert('MineralPrices', array("ItemId" => $id, "Price" => $price));
}

DBClose($db);

?>