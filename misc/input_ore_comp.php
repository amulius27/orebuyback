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
    
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if (isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation != 'None') {
            $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
        } else {
            $corporation = 'None';
            $corpTax = $defaultTax;
        }
    } else {
        $corporation = 'None';
        $corpTax = $defaultTax;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    
    
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));

    $VeldsparTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1230, 'time' => $update));
    $Veldspar = InputItemPrice($VeldsparTemp['Enabled'], $VeldsparTemp['Price']);
    $Veldspar_comp = $Veldspar * 100.0;
    
    $ScorditeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));
    $Scordite = InputItemPrice($ScorditeTemp['Enabled'], $ScorditeTemp['Price']);
    $Scordite_comp = $Scordite * 100.00;
    
    $PyroxeresTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));
    $Pyroxeres = InputItemPrice($PyroxeresTemp['Enabled'], $PyroxeresTemp['Price']);
    $Pyroxeres_comp = $Pyroxeres * 100.00;
    
    $PlagioclaseTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));
    $Plagioclase = InputItemPrice($PlagioclaseTemp['Enabled'], $PlagioclaseTemp['Price']);
    $Plagioclase_comp = $Plagioclase * 100.00;
    
    $OmberTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    $Omber = InputItemPrice($OmberTemp['Enabled'], $OmberTemp['Price']);
    $Omber_comp = $Omber * 100.00;
    
    $KerniteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));
    $Kernite = InputItemPrice($KerniteTemp['Enabled'], $KerniteTemp['Price']);
    $Kernite_comp = $Kernite * 100.00;
    
    $JaspetTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    $Jaspet = InputItemPrice($JaspetTemp['Enabled'], $JaspetTemp['Price']);
    $Jaspet_comp = $Jaspet * 100.00;
    
    $HemorphiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    $Hemorphite = InputItemPrice($HemorphiteTemp['Enabled'], $HemorphiteTemp['Price']);
    $Hemorphite_comp = $Hemorphite * 100.00;
    
    $HedbergiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));
    $Hedbergite = InputItemPrice($HedbergiteTemp['Enabled'], $HedbergiteTemp['Price']);
    $Hedbergite_comp = $Hedbergite * 100.00;
    
    $GneissTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));
    $Gneiss = InputItemPrice($GneissTemp['Enabled'], $GneissTemp['Price']);
    $Gneiss_comp = $Gneiss * 100.00;
    
    $Dark_OchreTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));
    $Dark_Ochre = InputItemPrice($Dark_OchreTemp['Enabled'], $Dark_OchreTemp['Price']);
    $Dark_Ochre_comp = $Dark_Ochre * 100.00;
    
    $SpodumainTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));
    $Spodumain = InputItemPrice($SpodumainTemp['Enabled'], $SpodumainTemp['Price']);
    $Spodumain_comp = $Spodumain * 100.00;
    
    $CrokiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));
    $Crokite = InputItemPrice($CrokiteTemp['Enabled'], $CrokiteTemp['Price']);
    $Crokite_comp = $Crokite * 100.00;
    
    $BistotTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));
    $Bistot = InputItemPrice($BistotTemp['Enabled'], $BistotTemp['Price']);
    $Bistot_comp = $Bistot * 100.00;
    
    $ArkonorTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update));
    $Arkonor = InputItemPrice($ArkonorTemp['Enabled'], $ArkonorTemp['Price']);
    $Arkonor_comp = $Arkonor * 100.00;
    
    $MercoxitTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    $Mercoxit = InputItemPrice($MercoxitTemp['Enabled'], $MercoxitTemp['Price']);
    $Mercoxit_comp = $Mercoxit * 100.00;
    
    DBClose($db);
    
    $Veldspar_comp = $value * $Veldspar_comp;
    $Scordite_comp = $value * $Scordite_comp;
    $Pyroxeres_comp = $value * $Pyroxeres_comp;
    $Plagioclase_comp = $value * $Plagioclase_comp;
    $Omber_comp = $value * $Omber_comp;
    $Kernite_comp = $value * $Kernite_comp;
    $Jaspet_comp = $value * $Jaspet_comp;
    $Hemorphite_comp = $value * $Hemorphite_comp;
    $Hedbergite_comp = $value * $Hedbergite_comp;
    $Gneiss_comp = $value * $Gneiss_comp;
    $Dark_Ochre_comp = $value * $Dark_Ochre_comp;
    $Spodumain_comp = $value * $Spodumain_comp;
    $Crokite_comp = $value * $Crokite_comp;
    $Bistot_comp = $value * $Bistot_comp;
    $Arkonor_comp = $value * $Arkonor_comp;
    $Mercoxit_comp = $value * $Mercoxit_comp;

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

    <script>
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
        var value = <?= $value ?>;
</script>
   