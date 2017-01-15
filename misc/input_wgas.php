<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session
    $session = new Custom\Sessions\sessions();
    
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
    $update = $db->fetchColumn('SELECT MAX(time) FROM WGasPrices WHERE ItemId= :item', array('item' => 30370));

    //Wormhole Gas
    //C50
    $C50Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30370, 'time' => $update));
    $C50 = InputItemPrice($C50Temp['Enabled'], $C50Temp['Price']);
    
    $C60Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30371, 'time' => $update));
    $C60 = InputItemPrice($C60Temp['Enabled'], $C60Temp['Price']);
    
    $C70Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30372, 'time' => $update));
    $C70 = InputItemPrice($C70Temp['Enabled'], $C70Temp['Price']);
    
    $C72Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30373, 'time' => $update));
    $C72 = InputItemPrice($C72Temp['Enabled'], $C72Temp['Price']);
    
    $C84Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30374, 'time' => $update));
    $C84 = InputItemPrice($C84Temp['Enabled'], $C84Temp['Price']);
    
    $C28Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30375, 'time' => $update));
    $C28 = InputItemPrice($C28Temp['Enabled'], $C28Temp['Price']);
    
    $C32Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30376, 'time' => $update));
    $C32 = InputItemPrice($C32Temp['Enabled'], $C32Temp['Price']);
    
    $C320Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30377, 'time' => $update));
    $C320 = InputItemPrice($C320Temp['Enabled'], $C320Temp['Price']);
    
    $C540Temp = $db->fetchRow('SELECT Enabled, Price FROM WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30378, 'time' => $update));
    $C540 = InputItemPrice($C540Temp['Enabled'], $C540Temp['Price']);

    DBClose($db);
    
    $C50 = $C50 * $value;
    $C60 = $C60 * $value;
    $C70 = $C70 * $value;
    $C72 = $C72 * $value;
    $C84 = $C84 * $value;
    $C28 = $C28 * $value;
    $C32 = $C32 * $value;
    $C320 = $C320 * $value;
    $C540 = $C540 * $value;
    

?>

<script>
    var c50 = <?= $C50 ?>;
    var c60 = <?= $C60 ?>;
    var c70 = <?= $C70 ?>;
    var c72 = <?= $C72 ?>;
    var c84 = <?= $C84 ?>;
    var c28 = <?= $C28 ?>;
    var c32 = <?= $C32 ?>;
    var c320 = <?= $C320 ?>;
    var c540 = <?= $C540 ?>;
    var value = <?= $value ?>;
</script>
