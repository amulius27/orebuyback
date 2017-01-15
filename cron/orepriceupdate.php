<?php

//Register the necessary functions
require_once __DIR__.'/cronfunctions/cronregistry.php';

//Open the database connection
$db = DBOpen();

//Get the refine rate from the database
$refineRate = $db->fetchColumn('SELECT refineRate FROM Configuration');
$refineRate = $refineRate / 100.0;

//Get the time
$time = date("Y-m-d H:i:s");

$maxMineralTime = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :id', array('id' => 34));

//Get the price of the base minerals
$tritaniumPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $maxMineralTime));
$pyeritePrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $maxMineralTime));
$mexallonPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $maxMineralTime));
$isogenPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $maxMineralTime));
$nocxiumPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $maxMineralTime));
$zydrinePrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $maxMineralTime));
$megacytePrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $maxMineralTime));
$morphitePrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $maxMineralTime));
$heliumIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16274, 'time' => $maxMineralTime));
$nitrogenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17888, 'time' => $maxMineralTime));
$oxygenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17887, 'time' => $maxMineralTime));
$hydrogenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17889, 'time' => $maxMineralTime));
$liquidOzonePrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16273, 'time' => $maxMineralTime));
$heavyWaterPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16272, 'time' => $maxMineralTime));
$strontiumClathratesPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16275, 'time' => $maxMineralTime));

$items = $db->fetchRowMany('SELECT * FROM itemComposition');

foreach($items as $item){
    
    $lastUpdate = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => $item['ItemId']));
    $enabled = $db->fetchColumn('SELECT Enabled FROM OrePrices WHERE ItemId= :item AND Time= :update', 
                                array('item' => $item['ItemId'], 'update' => $lastUpdate));    
    //Calculate out the price in order to put it in the array
    $composition = $db->fetchRow('SELECT * FROM itemComposition WHERE ItemId= :id', array('id' => $item['ItemId']));
    $price = ( ($composition['TritaniumNum'] * $tritaniumPrice) + ($composition['PyeriteNum'] * $pyeritePrice) + ($composition['MexallonNum'] * $mexallonPrice) + ($composition['IsogenNum'] * $isogenPrice) +
               ($composition['NocxiumNum'] * $nocxiumPrice) + ($composition['ZydrineNum'] * $zydrinePrice) + ($composition['MegacyteNum'] * $megacytePrice) + ($composition['MorphiteNum'] * $morphitePrice) +
               ($composition['HeliumIsotopesNum'] * $heliumIsotopesPrice) + ($composition['NitrogenIsotopesNum'] * $nitrogenIsotopesPrice) + ($composition['OxygenIsotopesNum'] * $oxygenIsotopesPrice) +
               ($composition['HydrogenIsotopesNum'] * $hydrogenIsotopesPrice) + ($composition['LiquidOzoneNum'] * $liquidOzonePrice) + ($composition['HeavyWaterNum'] * $heavyWaterPrice) + 
               ($composition['StrontiumClathratesNum'] * $strontiumClathratesPrice));
    $price = $price / $composition['BatchSize'];
    $price = $price * $refineRate;
    //If its enabled update the price, otherwise set it to 0.00
    if($enabled == 1) {
        $db->insert('OrePrices', array('Price' => $price, 'ItemId' => $item['ItemId'], 'Time' => $time));
    } else {
        $db->insert('OrePrices', array('ItemId' => $item['ItemId'], 'Price' => $price, 'Time' => $time, 'Enabled' => 0));
    }
}


DBClose($db);
?>