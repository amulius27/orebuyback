<!-- Connect to DB -->
<?php
    require_once('../functions/registry.php');
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }

    
    
    
    $db = DBOpen();
    
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => '34'));
	
    //Ores
	//Veldspar
    $veldspar = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1230'));

    //Scordite
    $scordite = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1228'));

    //Pyroxeres
    $pyroxeres = $db->fetchColum('SELECT price from OrePrices WHERE ItemId= :id', array('id' => '1224'));

    //Plagioclase
    $plagioclase = $db->fetchColum('SELECT price FROM OrePrice WHERE ItemId= :id', array('id' => '18'));

    //Omber
    $omber = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1227'));
    
    //Kernite
    $kernite = $db->fetchColumn('SELECT price FROM  OrePrices WHERE ItemId= :id', array('id' => '20'));

    //Jaspet
    $jaspet = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1226'));
    
    //Hemorphite
    $hemorphite = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1231'));
    
    //Hedbergite
    $hedbergite = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '21'));

    //Gneiss
    $gneiss = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1229'));

    //Dark Ochre
    $dark_ochre = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1232'));

    //Spodumain
    $spodumain = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '19'));

    //Crokite
    $crokite = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1225'));

    //Bistot
    $bistot = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '1223'));

    //Arkonor
    $arkonor = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '22'));
    
    //Mercoxit
    $mercoxit = $db->fetchColumn('SELECT price FROM OrePrices WHERE ItemId= :id', array('id' => '11396'));

    ?>