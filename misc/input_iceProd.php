<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session to retrieve session data
    session_start();
    //Get the corporation from the session
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corpTax = 10.00;
    }
    
    $alliance_tax = 4.00;
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );

//Update timestamp
$update = $db->fetchColumn('SELECT MAX(time) FROM IceProductPrices WHERE ItemId= :item', array('item' => 4247));

//Ice Products
//Helium Isotopes
$Helium_Isotopes = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16274, 'time' => $update));
//Hydrogen Isotopes
$Hydrogen_Isotopes = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17889, 'time' => $update));
//Nitrogen Isotopes
$Nitrogen_Isotopes = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17888, 'time' => $update));
//Oxygen Isotopes
$Oxygen_Isotopes = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17887, 'time' => $update));
//Heavy Water
$Heavy_Water = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16272, 'time' => $update));
//Liquid Ozone
$Liquid_Ozone = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16273, 'time' => $update));
//Strontium Clathrates
$Strontium_Clathrates = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16275, 'time' => $update));

DBClose($db);

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
</script>
