<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }

    $db = DBOpen();
    
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
	
    //Ores
	//Veldspar
    $Veldspar = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1230, 'time' => $update));

    //Scordite
    $Scordite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));

    //Pyroxeres
    $Pyroxeres = $db->fetchColumn('SELECT Price from OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));

    //Plagioclase
    $Plagioclase = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));

    //Omber
    $Omber = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    
    //Kernite
    $Kernite = $db->fetchColumn('SELECT Price FROM  OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));

    //Jaspet
    $Jaspet = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    
    //Hemorphite
    $Hemorphite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    
    //Hedbergite
    $Hedbergite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));

    //Gneiss
    $Gneiss = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));

    //Dark Ochre
    $Dark_Ochre = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));

    //Spodumain
    $Spodumain = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));

    //Crokite
    $Crokite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));

    //Bistot
    $Bistot = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));

    //Arkonor
    $Arkonor = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update));
    
    //Mercoxit
    $Mercoxit = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    
    DBClose($db);

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

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


   