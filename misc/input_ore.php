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
    
    $ScorditeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));
    $Scordite = InputItemPrice($ScorditeTemp['Enabled'], $ScorditeTemp['Price']);
    
    $PyroxeresTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));
    $Pyroxeres = InputItemPrice($PyroxeresTemp['Enabled'], $PyroxeresTemp['Price']);
    
    $PlagioclaseTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));
    $Plagioclase = InputItemPrice($PlagioclaseTemp['Enabled'], $PlagioclaseTemp['Price']);
    
    $OmberTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    $Omber = InputItemPrice($OmberTemp['Enabled'], $OmberTemp['Price']);
    
    $KerniteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));
    $Kernite = InputItemPrice($KerniteTemp['Enabled'], $KerniteTemp['Price']);
    
    $JaspetTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    $Jaspet = InputItemPrice($JaspetTemp['Enabled'], $JaspetTemp['Price']);
    
    $HemorphiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    $Hemorphite = InputItemPrice($HemorphiteTemp['Enabled'], $HemorphiteTemp['Price']);
    
    $HedbergiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));
    $Hedbergite = InputItemPrice($HedbergiteTemp['Enabled'], $HedbergiteTemp['Price']);
    
    $GneissTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));
    $Gneiss = InputItemPrice($GneissTemp['Enabled'], $GneissTemp['Price']);
    
    $Dark_OchreTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));
    $Dark_Ochre = InputItemPrice($Dark_OchreTemp['Enabled'], $Dark_OchreTemp['Price']);
    
    $SpodumainTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));
    $Spodumain = InputItemPrice($SpodumainTemp['Enabled'], $SpodumainTemp['Price']);
    
    $CrokiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));
    $Crokite = InputItemPrice($CrokiteTemp['Enabled'], $CrokiteTemp['Price']);
    
    $BistotTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));
    $Bistot = InputItemPrice($BistotTemp['Enabled'], $BistotTemp['Price']);
    
    $ArkonorTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update));
    $Arkonor = InputItemPrice($ArkonorTemp['Enabled'], $ArkonorTemp['Price']);
    
    $MercoxitTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    $Mercoxit = InputItemPrice($MercoxitTemp['Enabled'], $MercoxitTemp['Price']);
    
    
    
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

    


   