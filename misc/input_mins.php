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
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 34));

    //Tritanium
    $Tritanium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $update));
    //Pyerite
    $Pyerite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $update));
    //Mexallon
    $Mexallon = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $update));
    //Nocxium
    $Nocxium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $update));
    //Isogen
    $Isogen = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $update));
    //Megacyte
    $Megacyte = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $update));
    //Zydrine
    $Zydrine = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $update));
    //Morphite
    $Morphite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $update));
    
    DBClose($db);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var tritanium = <?= $Tritanium ?>;
    var pyerite = <?= $Pyerite ?>;
    var mexallon = <?= $Mexallon ?>;
    var nocxium = <?= $Nocxium ?>;
    var isogen = <?= $Isogen ?>;
    var megacyte = <?= $Megacyte ?>;
    var zydrine = <?= $Zydrine ?>;
    var morphite = <?= $Morphite ?>;
    var value = <?= $value ?>;
</script>

<script src="/../js/min_cal.js"></script>

