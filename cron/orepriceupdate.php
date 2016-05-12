<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Register the necessary functions
require_once('../functions/registry.php');

//Open the database connection
$db = DBOpen();

//Set our region for EVE-Central
$regionlimit = 10000043;
//Set our Refining Rate
$refineRate = 0.80;

//Get the price of the base minerals
$tritaniumPrice = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id', array("id" => "34"));
$pyeritePrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "35"));
$mexallonPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "36"));
$isogenPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "37"));
$nocxiumPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "38"));
$zydrinePrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "39"));
$megacytePrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "40"));
$morphitePrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "11399"));
$heliumIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "16274"));
$nitrogenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "17888"));
$oxygenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "17887"));
$hydrogenIsotopesPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "17889"));
$liquidOzonePrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "16273"));
$heavyWaterPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "16272"));
$strontiumClathratesPrice = $db->fetchColumn('SELECT Price FROM MineralPrice WHERE ItemId= :id', array("id" => "16275"));

$items = $db->fetchRowMany('SELECT * FROM itemComposition');

foreach($items[ItemId] as $item){
    $composition = $db->fetchRow('SELECT * FROM itemComposition WHERE id= :itemid', array("itemid" => $item));
    $price = ( ($composition[TritaniumNum] * $tritaniumPrice) + ($composition[PyeriteNum] * $pyeritePrice) + ($composition[MexallonNum] * $mexallonPrice) + ($composition[IsogenNum] * $isogenPrice) +
               ($composition[NocxiumNum] * $nocxiumPrice) + ($composition[ZydrineNum] * $zydrinePrice) + ($composition[MegacyteNum] * $megacytePrice) + ($composition[MorphiteNum] * $morphitePrice) +
               ($composition[HeliumIsotopesNum] * $heliumIsotopesPrice) + ($composition[NitrogenIsotopesNum] * $nitrogenIsotopesPrice) + ($composition[OxygenIsotopesNum] * $oxygenIsotopesPrice) +
               ($composition[HydrogenIsotopesNum] * $hydrogenIsotopesPrice) + ($composition[LiquidOzoneNum] * $liquidOzonePrice) + ($composition[HeavyWaterNum] * $heavyWaterPrice) + 
               ($composition[StrontiumClathratesNum] * $strontiumClathratesPrice));
    $price = $price / $composition[BatchSize];
    $price = $price * $refineRate;
    $db->insert(OrePrices, array("Price" => $price, "ItemId" => $item));
}


DBClose($db);
?>