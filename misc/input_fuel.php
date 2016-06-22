<!-- Connect to DB -->
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
$update = $db->fetchColumn('SELECT MAX(time) FROM IceProductPrices WHERE ItemId= :item', array('item' => 4247));

//Ice
//Amarr Fuel
$Amarr_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4247, 'time' => $update));
//Caldari Fuel
$Caldari_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4051, 'time' => $update));
//Gallente Fuel
$Gallente_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4312, 'time' => $update));
//Minmatar Fuel
$Minmatar_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4246, 'time' => $update));

DBClose($db);

?>

<script>
    var amarr = <?= $Amarr_Fuel ?>;
    var caldari = <?= $Caldari_Fuel ?>;
    var gallente = <?= $Gallente_Fuel ?>;
    var minmatar = <?= $Minmatar_Fuel ?>;
    var value = <?= $value ?>;
</script>
