<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session
    $session = new Custom\Sessions\sessions();
    //If the database session isn't available then start a regular session
    if(!$session) {
        session_start();
    }
    if(isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation == 'None') {
            $corporation = 'None';
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        if($corporation == 'None') {
            $corporation = 'None';
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corporation = 'None';
        $corpTax = 10.00;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    
    
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
    
    $Veldspar = $value * $Veldspar;
    $Scordite = $value * $Scordite;
    $Pyroxeres = $value * $Pyroxeres;
    $Plagioclase = $value * $Plagioclase;
    $Omber = $value * $Omber;
    $Kernite = $value * $Kernite;
    $Jaspet = $value * $Jaspet;
    $Hemorphite = $value * $Hemorphite;
    $Hedbergite = $value * $Hedbergite;
    $Gneiss = $value * $Gneiss;
    $Dark_Ochre = $value * $Dark_Ochre;
    $Spodumain = $value * $Spodumain;
    $Crokite = $value * $Crokite;
    $Bistot = $value * $Bistot;
    $Arkonor = $value * $Arkonor;
    $Mercoxit = $value * $Mercoxit;

?>
    

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
    var value = <?= $value ?>;
</script>

    


   