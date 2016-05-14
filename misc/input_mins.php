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
    var tritanium = <?= $tritanium ?>;
    var pyerite = <?= $pyerite ?>;
    var mexallon = <?= $mexallon ?>;
    var nocxium = <?= $nocxium ?>;
    var isogen = <?= $isogen ?>;
    var megacyte = <?= $megacyte ?>;
    var zydrine = <?= $zydrine ?>;
    var morphite = <?= $morphite ?>;
</script>

<script src="webroot/js/min_cal.js"></script>

<script>
	var veldspar = <?= $Veldspar ?>;
	var scordite = <?= $Scordite ?>;
	var pyroxeres = <?= $Pyroxeres ?>;
	var plagioclase = <?= $Plagioclase ?>;
	var omber = <?= $Omber ?>;
	var kernite = <?= $Kernite ?>;
	var jaspet = <?= $Jaspet ?>;
	var hemorphite = <?= $Hemorphite ?>;
	var hedbergite = <?= $Hedbergite ?>;	
	var gneiss = <?= $Gneiss ?>;
	var dark_ochre = <?= $Dark_Ochre ?>;
	var spodumain = <?= $Spodumain ?>;
	var crokite = <?= $Crokite ?>;
	var bistot = <?= $Bistot ?>;
	var arkonor = <?= $Arkonor ?>;
	var mercoxit = <?= $Mercoxit ?>;
	
	var veldspar_comp = <?= $Veldspar_comp ?>;
	var scordite_comp = <?= $Scordite_comp ?>;
	var pyroxeres_comp = <?= $Pyroxeres_comp ?>;
	var plagioclase_comp = <?= $Plagioclase_comp ?>;
	var omber_comp = <?= $Omber_comp ?>;
	var kernite_comp = <?= $Kernite_comp ?>;
	var jaspet_comp = <?= $Jaspet_comp ?>;
	var hemorphite_comp = <?= $Hemorphite_comp ?>;
	var hedbergite_comp = <?= $Hedbergite_comp ?>;	
	var gneiss_comp = <?= $Gneiss_comp ?>;
	var dark_ochre_comp = <?= $Dark_Ochre_comp ?>;
	var spodumain_comp = <?= $Spodumain_comp ?>;
	var crokite_comp = <?= $Crokite_comp ?>;
	var bistot_comp = <?= $Bistot_comp ?>;
	var arkonor_comp = <?= $Arkonor_comp ?>;
	var mercoxit_comp = <?= $Mercoxit_comp ?>;
</script>

<script src="webroot/js/ore_cal.js"></script>
<script src="webroot/js/ore_comp_cal.js"></script>
