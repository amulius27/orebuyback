<!-- Connect to DB -->
<?php

require_once __DIR__.'/../functions/registry.php';
    
if(!defined('indexes')) {
    die('Direct access not permitted');
}
    
//Open the database connection
$db = DBOpen();

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
//Helium Isotopes
$Helium = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16274, 'time' => $update));
//Hydrogen Isotopes
$Hydrogen = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17889, 'time' => $update));
//Nitrogen Isotopes
$Nitrogen = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17888, 'time' => $update));
//Oxygen Isotopes
$Oxygen = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 17887, 'time' => $update));
//Heavy Water
$Heavy = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16272, 'time' => $update));
//Liquid Ozone
$Ozone = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16273, 'time' => $update));
//Strontium Clathrates
$Strontium = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 16275, 'time' => $update));

DBClose($db);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var amarr = <?= $amarr ?>;
    var caldari = <?= $caldari ?>;
    var gallente = <?= $gallente ?>;
    var minmatar = <?= $minmatar ?>;
    var helium = <?= $helium ?>;
    var hydrogen = <?= $hydrogen ?>;
    var nitrogen = <?= $nitrogen ?>;
    var oxygenIsotopes = <?= $oxygen ?>;
    var heavyWater = <?= $heavy ?>;
    var ozone = <?= $ozone ?>;
    var strontium = <?= $strontium ?>;
</script>
<script src="webroot/js/prod_cal.js"></script>
<script src="webroot/js/fuel_cal.js"></script>
<script>
    var icicle = <?=$Icicle?>;
    var enrichedIcicle =<?=$Enriched_icicle?>;
    var glacial = <?=$Glacial?>;
    var smoothGlacial = <?=$Smooth_glacial?>;
    var glaze = <?=$Glaze?>;
    var pristineGlaze = <?=$Pristine_glaze?>;
    var blue = <?=$Blue?>;
    var thickBlue = <?=$Thick_blue?>;
    var glare = <?=$Glare?>;
    var glitter = <?=$Glitter?>;
    var gelidus =<?=$Gelidus?>;
    var krystallos =<?=$Krystallos?>;
</script>
<script src="webroot/js/ice_cal.js"></script>