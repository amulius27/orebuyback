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

    //Get the latest timestamp to fetch prices
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 16274));

    $Helium_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16274, 'time' => $update));
    $Helium_Isotopes = InputItemPrice($Helium_IsotopesTemp['Enabled'], $Helium_IsotopesTemp['Price']);
    
    $Hydrogen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17889, 'time' => $update));
    $Hydrogen_Isotopes = InputItemPrice($Hydrogen_IsotopesTemp['Enabled'], $Hydrogen_IsotopesTemp['Price']);
    
    $Nitrogen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17888, 'time' => $update));
    $Nitrogen_Isotopes = InputItemPrice($Nitrogen_IsotopesTemp['Enabled'], $Nitrogen_IsotopesTemp['Price']);
    
    $Oxygen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17887, 'time' => $update));
    $Oxygen_Isotopes = InputItemPrice($Oxygen_IsotopesTemp['Enabled'], $Oxygen_IsotopesTemp['Price']);
    
    $Heavy_WaterTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16272, 'time' => $update));
    $Heavy_Water = InputItemPrice($Heavy_WaterTemp['Enabled'], $Heavy_WaterTemp['Price']);
    
    $Liquid_OzoneTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16273, 'time' => $update));
    $Liquid_Ozone = InputItemPrice($Liquid_OzoneTemp['Enabled'], $Liquid_OzoneTemp['Price']);
    
    $Strontium_ClathratesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16275, 'time' => $update));
    $Strontium_Clathrates = InputItemPrice($Strontium_ClathratesTemp['Enabled'], $Strontium_ClathratesTemp['Price']);

    DBClose($db);
    
    $Helium_Isotopes = $Helium_Isotopes * $value;
    $Hydrogen_Isotopes = $Hydrogen_Isotopes * $value;
    $Nitrogen_Isotopes = $Nitrogen_Isotopes * $value;
    $Oxygen_Isotopes = $Oxygen_Isotopes * $value;
    $Heavy_Water = $Heavy_Water * $value;
    $Liquid_Ozone = $Liquid_Ozone * $value;
    $Strontium_Clathrates = $Strontium_Clathrates * $value;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var helium = <?= $Helium_Isotopes ?>;
    var hydrogen = <?= $Hydrogen_Isotopes ?>;
    var nitrogen = <?= $Nitrogen_Isotopes ?>;
    var oxygenIsotopes = <?= $Oxygen_Isotopes ?>;
    var heavyWater = <?= $Heavy_Water ?>;
    var ozone = <?= $Liquid_Ozone ?>;
    var strontium = <?= $Strontium_Clathrates ?>;
    var value = <?= $value ?>;
</script>
