<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }

    
    
    
    $db = DBOpen();
    
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM OrePricese WHERE ItemId= :item', array('item' => 1230));
	
    //Ores
	//Veldspar
    $veldspar = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1230, 'time' => $update));

    //Scordite
    $scordite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));

    //Pyroxeres
    $pyroxeres = $db->fetchColum('SELECT Price from OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));

    //Plagioclase
    $plagioclase = $db->fetchColum('SELECT Price FROM OrePrice WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));

    //Omber
    $omber = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    
    //Kernite
    $kernite = $db->fetchColumn('SELECT Price FROM  OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));

    //Jaspet
    $jaspet = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    
    //Hemorphite
    $hemorphite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    
    //Hedbergite
    $hedbergite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));

    //Gneiss
    $gneiss = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));

    //Dark Ochre
    $dark_ochre = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));

    //Spodumain
    $spodumain = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));

    //Crokite
    $crokite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));

    //Bistot
    $bistot = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));

    //Arkonor
    $arkonor = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update));
    
    //Mercoxit
    $mercoxit = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    
    DBClose($db);

    ?>