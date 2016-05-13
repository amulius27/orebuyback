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

$Bacteria = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2393");
if($Bacteria === false) {
    $error = db_error();
}
$Biofuels = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2396");
if($Biofuels === false) {
    $error = db_error();
}
$Biomass = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3779");
if($Biomass === false) {
    $error = db_error();
}
$Chiral_Structures = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2401");
if($Chiral_Structures === false) {
    $error = db_error();
}
$Electrolytes = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2390");
if($Electrolytes === false) {
    $error = db_error();
}
$Industrial_Fibers = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2397");
if($Industrial_Fibers === false) {
    $error = db_error();
}
$Oxidizing_Compound = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2392");
if($Oxidizing_Compound === false) {
    $error = db_error();
}
$Oxygen = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3683");
if($Oxygen === false) {
    $error = db_error();
}
$Plasmoids = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2389");
if($Plasmoids === false) {
    $error = db_error();
}
$Precious_metals = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2399");
if($Precious_metals === false) {
    $error = db_error();
}
$Proteins = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2395");
if($Proteins === false) {
    $error = db_error();
}
$Reactive_metals = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2398");
if($Reactive_metals === false) {
    $error = db_error();
}
$Silicon = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9828");
if($Silicon === false) {
    $error = db_error();
}
$Toxic_Metals = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2400");
if($Toxic_Metals === false) {
    $error = db_error();
}
$Water = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3645");
if($Water === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$Bacteria[0]); $bacteria = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Biofuels[0]); $biofuels = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Biomass[0]); $biomass = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Chiral_Structures[0]); $chiral_structures = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Electrolytes[0]); $electrolytes = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Industrial_Fibers[0]); $industrial_fibers = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Oxidizing_Compound[0]); $oxidizing_compound = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Oxygen[0]); $oxygen = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Plasmoids[0]); $plasmoids = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Precious_metals[0]); $precious_metals = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Proteins[0]); $proteins = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Reactive_metals[0]); $reactive_metals = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Silicon[0]); $silicon = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Toxic_Metals[0]); $toxic_metals = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Water[0]); $water = number_format($string*0.925 , 2, ".", "");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var bacteria = <?= $bacteria ?>;
    var biofuels = <?= $biofuels ?>;
    var biomass = <?= $biomass ?>;
    var chiralStructures = <?= $chiral_structures ?>;
    var electrolytes = <?= $electrolytes ?>;
    var industrialFibers = <?= $industrial_fibers ?>;
    var oxidizingCompound = <?= $oxidizing_compound ?>;
    var oxygenPI2 = <?= $oxygen ?>;
    var plasmoids = <?= $plasmoids ?>;
    var preciousMetals = <?= $precious_metals ?>;
    var proteins = <?= $proteins ?>;
    var reactiveMetals = <?= $reactive_metals ?>;
    var silicon = <?= $silicon ?>;
    var toxicMetals = <?= $toxic_metals ?>;
    var water = <?= $water ?>;
</script>
<script src="webroot/js/t1_pi_cal.js"></script>