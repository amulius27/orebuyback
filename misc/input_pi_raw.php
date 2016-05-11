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

$Aqueous = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2268");
if($Aqueous === false) {
    $error = db_error();
}
$Ionic = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2309");
if($Ionic === false) {
    $error = db_error();
}
$Base = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2267");
if($Base === false) {
    $error = db_error();
}
$Heavy = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2272");
if($Heavy === false) {
    $error = db_error();
}
$Noble = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2270");
if($Noble === false) {
    $error = db_error();
}
$Carbon = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2288");
if($Carbon === false) {
    $error = db_error();
}
$Micro = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2073");
if($Micro === false) {
    $error = db_error();
}
$Complex = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2287");
if($Complex === false) {
    $error = db_error();
}
$Planktic = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2286");
if($Planktic === false) {
    $error = db_error();
}
$Noble_Gas = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2310");
if($Noble_Gas === false) {
    $error = db_error();
}
$Reactive = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2398");
if($Reactive === false) {
    $error = db_error();
}
$Felsic = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2307");
if($Felsic === false) {
    $error = db_error();
}
$Non = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2306");
if($Non === false) {
    $error = db_error();
}
$Suspended = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2308");
if($Suspended === false) {
    $error = db_error();
}
$Autotrophs = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2305");
if($Autotrophs === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(",",$Aqueous[0]); $aqueous = number_format($string*0.925 , 2, ",", "."); //Aqueous Liquids
$string=implode(",",$Ionic[0]); $ionic = number_format($string*0.925 , 2, ",", "."); //Ionic Solutions
$string=implode(",",$Base[0]); $base = number_format($string*0.925 , 2, ",", "."); //Base Metals
$string=implode(",",$Heavy[0]); $heavy = number_format($string*0.925 , 2, ",", "."); //Heavy Metals
$string=implode(",",$Noble[0]); $noble = number_format($string*0.925 , 2, ",", "."); //Noble Metals
$string=implode(",",$Carbon[0]); $carbon = number_format($string*0.925 , 2, ",", "."); //Carbon Compounds
$string=implode(",",$Micro[0]); $micro = number_format($string*0.925 , 2, ",", "."); //Microorganisms
$string=implode(",",$Complex[0]); $complex = number_format($string*0.925 , 2, ",", "."); //Complex Organisms
$string=implode(",",$Planktic[0]); $planktic = number_format($string*0.925 , 2, ",", "."); //Planktic Colonies
$string=implode(",",$Noble_Gas[0]); $noble_gas = number_format($string*0.925 , 2, ",", "."); //Noble Gas
$string=implode(",",$Reactive[0]); $reactive = number_format($string*0.925 , 2, ",", "."); //Reactive Gas
$string=implode(",",$Felsic[0]); $felsic = number_format($string*0.925 , 2, ",", "."); //Felsic Magma
$string=implode(",",$Non[0]); $non_cs = number_format($string*0.925 , 2, ",", "."); //Non-CS Crystals
$string=implode(",",$Suspended[0]); $suspended = number_format($string*0.925 , 2, ",", "."); //Suspended Plasma
$string=implode(",",$Autotrophs[0]); $autotrophs = number_format($string*0.925 , 2, ",", "."); //Autotrophs
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var aqueous = "<?= $aqueous ?>";
    var ionic = "<?= $ionic ?>";
    var base = "<?= $base ?>";
    var heavy = "<?= $heavy ?>";
    var noble = "<?= $noble ?>";
    var carbon = "<?= $carbon ?>";
    var micro = "<?= $micro ?>";
    var complex = "<?= $complex ?>";
    var planktic = "<?= $planktic ?>";
    var noble_gas = "<?= $noble_gas ?>";
    var reactive = "<?= $reactive ?>";
    var felsic = "<?= $felsic ?>";
    var non_cs = "<?= $non_cs ?>";
    var suspended = "<?= $suspended ?>";
    var autotrophs = "<?= $autotrophs ?>";
</script>
<script src="js/rawpi_cal.js"></script>
