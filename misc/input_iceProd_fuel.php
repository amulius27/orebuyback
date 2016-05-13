<!-- Connect to DB -->
<?php

if(!defined('indexes')) {
    die('Direct access not permitted');
}

function db_connect() {
    static $connection;
    if (!isset($connection)) {
        $config = parse_ini_file('../config.ini');
        $connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['dbname']);
    }
    if ($connection === false) {
        return mysqli_connect_error();
    }
    return $connection;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_query($query) {
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

    return $result;
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);

    if($result === false) {
        return false;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//Update timestamp
$update = db_select("SELECT `update_time` FROM `item_prices` WHERE itemid=34");

//Ice
//Amarr Fuel
$Amarr_Fuel = db_select("SELECT `price` FROM `item_prices` WHERE itemid=4247");
if($Amarr_Fuel === false) {
    $error = db_error();
}
//Caldari Fuel
$Caldari_Fuel = db_select("SELECT `price` FROM `item_prices` WHERE itemid=4051");
if($Caldari_Fuel === false) {
    $error = db_error();
}
//Gallente Fuel
$Gallente_Fuel = db_select("SELECT `price` FROM `item_prices` WHERE itemid=4312");
if($Gallente_Fuel === false) {
    $error = db_error();
}
//Minmatar Fuel
$Minmatar_Fuel = db_select("SELECT `price` FROM `item_prices` WHERE itemid=4246");
if($Minmatar_Fuel === false) {
    $error = db_error();
}
//Helium Isotopes
$Helium = db_select("SELECT `price` FROM `item_prices` WHERE itemid=16274");
if($Helium === false) {
    $error = db_error();
}
//Hydrogen Isotopes
$Hydrogen = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17889");
if($Hydrogen === false) {
    $error = db_error();
}
//Nitrogen Isotopes
$Nitrogen = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17888");
if($Nitrogen === false) {
    $error = db_error();
}
//Oxygen Isotopes
$Oxygen = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17887");
if($Oxygen === false) {
    $error = db_error();
}
//Heavy Water
$Heavy = db_select("SELECT `price` FROM `item_prices` WHERE itemid=16272");
if($Heavy === false) {
    $error = db_error();
}
//Liquid Ozone
$Ozone = db_select("SELECT `price` FROM `item_prices` WHERE itemid=16273");
if($Ozone === false) {
    $error = db_error();
}//Strontium Clathrates
$Strontium = db_select("SELECT `price` FROM `item_prices` WHERE itemid=16275");
if($Strontium === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$Amarr_Fuel[0]); $amarr = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Caldari_Fuel[0]); $caldari = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Gallente_Fuel[0]); $gallente = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Minmatar_Fuel[0]); $minmatar = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Helium[0]); $helium = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Hydrogen[0]); $hydrogen = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Nitrogen[0]); $nitrogen = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Oxygen[0]); $oxygen = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Heavy[0]); $heavy = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Ozone[0]); $ozone = number_format($string*0.875 , 2, ".", "");
$string=implode(".",$Strontium[0]); $strontium = number_format($string*0.875 , 2, ".", "");

$Icicle = number_format(($heavy*69+$ozone*35+$helium*414+$strontium*1)*0.8*0.875 , 2, ".", "");
$Enriched_icicle = number_format(($heavy*104+$ozone*55+$helium*483+$strontium*1)*0.8*0.875 , 2, ".", "");
$Glacial = number_format(($heavy*69+$ozone*35+$hydrogen*414+$strontium*1)*0.8*0.875 , 2, ".", "");
$Smooth_glacial = number_format(($heavy*104+$ozone*55+$hydrogen*483+$strontium*1)*0.8*0.875 , 2, ".", "");
$Glaze = number_format(($heavy*69+$ozone*35+$nitrogen*414+$strontium*1)*0.8*0.875 , 2, ".", "");
$Pristine_glaze = number_format(($heavy*104+$ozone*88+$nitrogen*483+$strontium*1)*0.8*0.875 , 2, ".", "");
$Blue = number_format(($heavy*69+$ozone*35+$oxygen*414+$strontium*1)*0.8*0.875 , 2, ".", "");
$Thick_blue = number_format(($heavy*104+$ozone*55+$oxygen*483+$strontium*1)*0.8*0.875 , 2, ".", "");
$Glare = number_format(($heavy*1381+$ozone*691+$strontium*35)*0.8*0.875 , 2, ".", "");
$Glitter = number_format(($heavy*691+$ozone*1381+$strontium*69)*0.8*0.875 , 2, ".", "");
$Gelidus = number_format(($heavy*345+$ozone*691+$strontium*104)*0.8*0.875 , 2, ".", "");
$Krystallos = number_format(($heavy*173+$ozone*691+$strontium*173)*0.8*0.875 , 2, ".", "");

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