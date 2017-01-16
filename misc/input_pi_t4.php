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

    //Get the last quote via timestamp from the database
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2867));
    
    $BroadcastTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2867, 'time' => $update));
    $Broadcast = InputItemPrice($BroadcastTemp['Enabled'], $BroadcastTemp['Price']);
    
    $Response_DronesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2868, 'time' => $update));
    $Response_Drones = InputItemPrice($Response_DronesTemp['Enabled'], $Response_DronesTemp['Price']);
    
    $NanoFactoryTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2869, 'time' => $update));
    $NanoFactory = InputItemPrice($NanoFactoryTemp['Enabled'], $NanoFactoryTemp['Price']);
    
    $Organic_Mortar_ApplicatorsTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2870, 'time' => $update));
    $Organic_Mortar_Applicators = InputItemPrice($Organic_Mortar_ApplicatorsTemp['Enabled'], $Organic_Mortar_ApplicatorsTemp['Price']);
    
    $Recursive_ComputingTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2871, 'time' => $update));
    $Recursive_Computing = InputItemPrice($Recursive_ComputingTemp['Enabled'], $Recursive_ComputingTemp['Price']);
    
    $Power_CoreTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2872, 'time' => $update));
    $Power_Core = InputItemPrice($Power_CoreTemp['Enabled'], $Power_CoreTemp['Price']);
    
    $Sterile_ConduitsTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2875, 'time' => $update));
    $Sterile_Conduits = InputItemPrice($Sterile_ConduitsTemp['Enabled'], $Sterile_ConduitsTemp['Price']);
    
    $MainframeTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2876, 'time' => $update));
    $Mainframe = InputItemPrice($MainframeTemp['Enabled'], $MainframeTemp['Price']);
    
    DBClose($db);
    
    $Broadcast = $Broadcast * $value;
    $Response_Drones = $Response_Drones * $value;
    $NanoFactory = $NanoFactory * $value;
    $Organic_Mortar_Applicators = $Organic_Mortar_Applicators * $value;
    $Recursive_Computing = $Recursive_Computing * $value;
    $Power_Core = $Power_Core * $value;
    $Sterile_Conduits = $Sterile_Conduits * $value;
    $Mainframe = $Mainframe * $value;

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var broadcast = <?= $Broadcast ?>;
    var responseDrones = <?= $Response_Drones ?>;
    var nanoFactory = <?= $NanoFactory ?>;
    var organicMortar = <?= $Organic_Mortar_Applicators ?>;
    var recursiveComputing = <?= $Recursive_Computing ?>;
    var powerCore = <?= $Power_Core ?>;
    var sterileConduits = <?= $Sterile_Conduits ?>;
    var Mainframe = <?= $Mainframe ?>;
    var value = <?= $value ?>;
</script>