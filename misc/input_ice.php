<?php

    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }

    //Open the database connection
    $db = DBOpen();
    
    //Get timestamp
    $update = $db->fetchColumn('SELECT MAX(time) FROM IcePrices WHERE ItemId= :item', array('item' => 16262));
    
    $Clear_Icicle = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16262, 'time' => $update));
    $Enriched_Clear_Icicle = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 17978, 'time' => $update));
    $Glacial_Mass = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16263, 'time' => $update));
    $Smooth_Glacial_Mass = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 17977, 'time' => $update));
    $White_Glaze = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16265, 'time' => $update));
    $Pristine_White_Glaze = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 17976, 'time' => $update));
    $Blue_Ice = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16264, 'time' => $update));
    $Thick_Blue_Ice = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 17975, 'time' => $update));
    $Glare_Crust = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16266, 'time' => $update));
    $Dark_Glitter = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16267, 'time' => $update));
    $Gelidus = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16268, 'time' => $update));
    $Krystallos = $db->fetchColumn('SELECT Price FROM IcePrices WHERE ItemId= :item AND Time= :time', array('id' => 16269, 'time' => $update));

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<script src="webroot/js/prod_cal.js"></script>
<script src="webroot/js/fuel_cal.js"></script>
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
</script>
<script src="webroot/js/ice_cal.js"></script>