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
    $update = $db->fetchColumn('SELECT MAX(time) FROM IceProductPrices WHERE ItemId= :item', array('item' => 4247));

    $Amarr_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4247, 'time' => $update));
    $Amarr_Fuel = InputItemPrice($Amarr_FuelTemp['Enabled'], $Amarr_FuelTemp['Price']);
    
    $Caldari_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4051, 'time' => $update));
    $Caldari_Fuel = InputItemPrice($Caldari_FuelTemp['Enabled'], $Caldari_FuelTemp['Price']);
    
    $Gallente_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4312, 'time' => $update));
    $Gallente_Fuel = InputItemPrice($Gallente_FuelTemp['Enabled'], $Gallente_FuelTemp['Price']);
    
    $Minmatar_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4246, 'time' => $update));
    $Minmatar_Fuel = InputItemPrice($Minmatar_FuelTemp['Enabled'], $Minmatar_FuelTemp['Price']);

    DBClose($db);

?>

<script>
    var amarr = <?= $Amarr_Fuel ?>;
    var caldari = <?= $Caldari_Fuel ?>;
    var gallente = <?= $Gallente_Fuel ?>;
    var minmatar = <?= $Minmatar_Fuel ?>;
    var value = <?= $value ?>;
</script>
