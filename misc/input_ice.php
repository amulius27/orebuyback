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
    
    //Get timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :id', array('id' => 16262));
    
    $Clear_IcicleTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16262, 'time' => $update));
    $Clear_Icicle = InputItemPrice($Clear_IcicleTemp['Enabled'], $Clear_IcicleTemp['Price']);
    
    $Enriched_Clear_IcicleTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17978, 'time' => $update));
    $Enriched_Clear_Icicle = InputItemPrice($Enriched_Clear_IcicleTemp['Enabled'], $Enriched_Clear_IcicleTemp['Price']);
    
    $Glacial_MassTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16263, 'time' => $update));
    $Glacial_Mass = InputItemPrice($Glacial_MassTemp['Enabled'], $Glacial_MassTemp['Price']);
    
    $Smooth_Glacial_MassTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17977, 'time' => $update));
    $Smooth_Glacial_Mass = InputItemPrice($Smooth_Glacial_MassTemp['Enabled'], $Smooth_Glacial_MassTemp['Price']);
    
    $White_GlazeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16265, 'time' => $update));
    $White_Glaze = InputItemPrice($White_GlazeTemp['Enabled'], $White_GlazeTemp['Price']);
    
    $Pristine_White_GlazeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17976, 'time' => $update));
    $Pristine_White_Glaze = InputItemPrice($Pristine_White_GlazeTemp['Enabled'], $Pristine_White_GlazeTemp['Price']);
    
    $Blue_IceTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16264, 'time' => $update));
    $Blue_Ice = InputItemPrice($Blue_IceTemp['Enabled'], $Blue_IceTemp['Price']);
    
    $Thick_Blue_IceTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17975, 'time' => $update));
    $Thick_Blue_Ice = InputItemPrice($Thick_Blue_IceTemp['Enabled'], $Thick_Blue_IceTemp['Price']);
    
    $Glare_CrustTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' =>16266, 'time' => $update));
    $Glare_Crust = InputItemPrice($Glare_CrustTemp['Enabled'], $Glare_CrustTemp['Price']);
    
    $Dark_GlitterTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16267, 'time' => $update));
    $Dark_Glitter = InputItemPrice($Dark_GlitterTemp['Enabled'], $Dark_GlitterTemp['Price']);
    
    $GelidusTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16268, 'time' => $update));
    $Gelidus = InputItemPrice($GelidusTemp['Enabled'], $GelidusTemp['Price']);
    
    $KrystallosTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16269, 'time' => $update));
    $Krystallos = InputItemPrice($KrystallosTemp['Enabled'], $KrystallosTemp['Price']);
    
    DBClose($db);
    
    $Clear_Icicle = $Clear_Icicle * $value;
    $Enriched_Clear_Icicle = $Enriched_Clear_Icicle * $value;
    $Glacial_Mass = $Glacial_Mass * $value;
    $Smooth_Glacial_Mass = $Smooth_Glacial_Mass * $value;
    $White_Glaze = $White_Glaze * $value;
    $Pristine_White_Glaze = $Pristine_White_Glaze * $value;
    $Blue_Ice = $Blue_Ice * $value;
    $Thick_Blue_Ice = $Thick_Blue_Ice * $value;
    $Glare_Crust = $Glare_Crust * $value;
    $Dark_Glitter = $Dark_Glitter * $value;
    $Gelidus = $Gelidus * $value;
    $Krystallos = $Krystallos * $value;

?>

<script>
    var icicle = <?= $Clear_Icicle ?>;
    var enrichedIcicle =<?= $Enriched_Clear_Icicle ?>;
    var glacial = <?= $Glacial_Mass ?>;
    var smoothGlacial = <?= $Smooth_Glacial_Mass ?>;
    var glaze = <?= $White_Glaze ?>;
    var pristineGlaze = <?= $Pristine_White_Glaze ?>;
    var blue = <?= $Blue_Ice ?>;
    var thickBlue = <?= $Thick_Blue_Ice ?>;
    var glare = <?= $Glare_Crust ?>;
    var glitter = <?= $Dark_Glitter ?>;
    var gelidus =<?= $Gelidus ?>;
    var krystallos =<?= $Krystallos ?>;
    var value = <?= $value ?>;
</script>