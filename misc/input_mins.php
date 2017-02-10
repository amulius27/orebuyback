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
    
    $alliance_tax = $db->fetchColumn('SELECT mineralTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 34));

    $TritaniumTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $update));
    $Tritanium = InputItemPrice($TritaniumTemp['Enabled'], $TritaniumTemp['Price']);
    
    $PyeriteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $update));
    $Pyerite = InputItemPrice($PyeriteTemp['Enabled'], $PyeriteTemp['Price']);
    
    $MexallonTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $update));
    $Mexallon = InputItemPrice($MexallonTemp['Enabled'], $MexallonTemp['Price']);
    
    $NocxiumTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $update));
    $Nocxium = InputItemPrice($NocxiumTemp['Enabled'], $NocxiumTemp['Price']);
    
    $IsogenTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $update));
    $Isogen = InputItemPrice($IsogenTemp['Enabled'], $IsogenTemp['Price']);
    
    $MegacyteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $update));
    $Megacyte = InputItemPrice($MegacyteTemp['Enabled'], $MegacyteTemp['Price']);
    
    $ZydrineTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $update));
    $Zydrine = InputItemPrice($ZydrineTemp['Enabled'], $ZydrineTemp['Price']);
    
    $MorphiteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $update));
    $Morphite = InputItemPrice($MorphiteTemp['Enabled'], $MorphiteTemp['Price']);
    
    DBClose($db);
    
    $Tritanium = $Tritanium * $value;
    $Pyerite = $Pyerite * $value;
    $Mexallon = $Mexallon * $value;
    $Nocxium = $Nocxium * $value;
    $Isogen = $Isogen * $value;
    $Megacyte = $Megacyte * $value;
    $Zydrine = $Zydrine * $value;
    $Morphite = $Morphite * $value;

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

