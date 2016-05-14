<?php

    require_once __DIR__.'/../functions/registry.php';

    if(!defined('indexes')) {
        die('Direct access not permitted');
    }

    //Open the database connection
    $db = DBOpen();
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 34));

    //Ice
    //Tritanium
    $Tritanium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $update));
    //Pyerite
    $Pyerite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $update));
    //Mexallon
    $Mexallon = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $update));
    //Nocxium
    $Nocxium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $update));
    //Isogen
    $Isogen = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $update));
    //Megacyte
    $Megacyte = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $update));
    //Zydrine
    $Zydrine = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $update));
    //Morphite
    $Morphite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $update));
    
    DBClose($db);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var tritanium = <?= $Tritanium ?>;
    var pyerite = <?= $Pyerite ?>;
    var mexallon = <?= $Mexallon ?>;
    var nocxium = <?= $Nocxium ?>;
    var isogen = <?= $Isogen ?>;
    var megacyte = <?= $Megacyte ?>;
    var zydrine = <?= $Zydrine ?>;
    var morphite = <?= $Morphite ?>;
</script>

<script src="webroot/js/min_cal.js"></script>

