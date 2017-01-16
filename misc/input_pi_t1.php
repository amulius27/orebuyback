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
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2393));
    
    $bacteriaTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2393, 'time' => $update));
    $bacteria = InputItemPrice($bacteriaTemp['Enabled'], $bacteriaTemp['Price']);
    
    $biofuelsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2396, 'time' => $update));
    $biofuels = InputItemPrice($biofuelsTemp['Enabled'], $biofuelsTemp['Price']);
    
    $biomassTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3779, 'time' => $update));
    $biomass = InputItemPrice($biomassTemp['Enabled'], $biomassTemp['Price']);

    $chiral_structuresTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2401, 'time' => $update));
    $chiral_structures = InputItemPrice($chrial_structuresTemp['Enabled'], $chrial_structuresTemp['Price']);
    
    $electrolytesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2390, 'time' => $update));
    $electrolytes = InputItemPrice($electrolytesTemp['Enabled'], $electrolytesTemp['Price']);
    
    $industrial_fibersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2397, 'time' => $update));
    $industrial_fibers = InputItemPrice($industrial_fibersTemp['Enabled'], $industrial_fibersTemp['Price']);
    
    $oxidizing_compoundTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2392, 'time' => $update));
    $oxidizing_compound = InputItemPrice($oxidizing_compoundTemp['Enabled'], $oxidizing_compoundTemp['Price']);
    
    $oxygenTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3683, 'time' => $update));
    $oxygen = InputItemPrice($oxygenTemp['Enabled'], $oxygenTemp['Price']);
    
    $plasmoidsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2389, 'time' => $update));
    $plasmoids = InputItemPrice($plasmoidsTemp['Enabled'], $plasmoidsTemp['Price']);
    
    $precious_metalsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2399, 'time' => $update));
    $precious_metals = InputItemPrice($precious_metalsTemp['Enabled'], $precious_metalsTemp['Price']);
    
    $proteinsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2395, 'time' => $update));
    $proteins = InputItemPrice($proteinsTemp['Enabled'], $proteinsTemp['Price']);
    
    $reactive_metalsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2398, 'time' => $update));
    $reactive_metals = InputItemPrice($reactive_metalsTemp['Enabled'], $reactive_metalsTemp['Price']);
    
    $siliconTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9828, 'time' => $update));
    $silicon = InputItemPrice($siliconTemp['Enabled'], $siliconTemp['Price']);
    
    $toxic_metalsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2400, 'time' => $update));
    $toxic_metals = InputItemPrice($toxic_metalsTemp['Enabled'], $toxic_metalsTemp['Price']);
    
    $waterTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3645, 'time' => $update));
    $water = InputItemPrice($waterTemp['Enabled'], $waterTemp['Price']);
    
    DBClose($db);
    
    $bacteria = $bacteria * $value;
    $biofuels = $biofuels * $value;
    $biomass = $biomass * $value;
    $chiral_structures = $chiral_structures * $value;
    $electrolytes = $electrolytes * $value;
    $industrial_fibers = $industrial_fibers * $value;
    $oxidizing_compound = $oxidizing_compound * $value;
    $oxygen = $oxygen * $value;
    $plasmoids = $plasmoids * $value;
    $precious_metals = $precious_metals * $value;
    $proteins = $proteins * $value;
    $reactive_metals = $reactive_metals * $value;
    $silicon = $silicon * $value;
    $toxic_metals = $toxic_metals * $value;
    $water = $water * $value;

?>

<script>
    var bacteria = <?= $bacteria ?>;
    var biofuels = <?= $biofuels ?>;
    var biomass = <?= $biomass ?>;
    var chiralStructures = <?= $chiral_structures ?>;
    var electrolytes = <?= $electrolytes ?>;
    var industrialFibers = <?= $industrial_fibers ?>;
    var oxidizingCompound = <?= $oxidizing_compound ?>;
    var oxygenPI2 = <?= $oxygen ?>;
    var plasmoids = <?= $plasmoids ?>;
    var preciousMetals = <?= $precious_metals ?>;
    var proteins = <?= $proteins ?>;
    var reactiveMetals = <?= $reactive_metals ?>;
    var silicon = <?= $silicon ?>;
    var toxicMetals = <?= $toxic_metals ?>;
    var water = <?= $water ?>;
    var value = <?= $value ?>;
</script>
