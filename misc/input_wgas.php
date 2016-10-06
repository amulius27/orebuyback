<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Open the session
    session_start();
    if(isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation == 'None') {
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        if($corporation == 'None') {
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
$update = $db->fetchColumn('SELECT MAX(time) FROM WGasPrices WHERE ItemId= :item', array('item' => 30370));

//Wormhole Gas
//C50
$C50 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30370, 'time' => $update));
//C60
$C60 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30371, 'time' => $update));
//C70
$C70 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30372, 'time' => $update));
//C72
$C72 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30373, 'time' => $update));
//C84
$C84 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30374, 'time' => $update));
//C28
$C28 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30375, 'time' => $update));
//C32
$C32 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30376, 'time' => $update));
//C320
$C320 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30377, 'time' => $update));
//C540
$C540 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30378, 'time' => $update));

DBClose($db);

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
