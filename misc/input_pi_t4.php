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

$Broadcast = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2867");
if($Broadcast === false) {
    $error = db_error();
}
$Response_drones = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2868");
if($Response_drones === false) {
    $error = db_error();
}
$Nanofactory = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2869");
if($Nanofactory === false) {
    $error = db_error();
}
$Organic_mortar = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2870");
if($Organic_mortar === false) {
    $error = db_error();
}
$Recursive_computing = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2871");
if($Recursive_computing === false) {
    $error = db_error();
}
$Power_core = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2872");
if($Power_core=== false) {
    $error = db_error();
}
$Sterile_conduits = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2875");
if($Sterile_conduits === false) {
    $error = db_error();
}
$Mainframe = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2876");
if($Mainframe === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$Broadcast[0]); $broadcast = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Response_drones[0]); $response_drones = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Nanofactory[0]); $nanofactory = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Organic_mortar[0]); $organic_mortar = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Recursive_computing[0]); $recursive_computing = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Power_core[0]); $power_core = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Sterile_conduits[0]); $sterile_conduits = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Mainframe[0]); $mainframe = number_format($string*0.925 , 2, ".", "");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var broadcast = <?= $broadcast ?>;
    var responseDrones = <?= $response_drones ?>;
    var nanoFactory = <?= $nanofactory ?>;
    var organicMortar = <?= $organic_mortar ?>;
    var recursiveComputing = <?= $recursive_computing ?>;
    var powerCore = <?= $power_core ?>;
    var sterileConduits = <?= $sterile_conduits ?>;
    var Mainframe = <?= $mainframe ?>;
</script>
<script src="webroot/js/t4_pi_cal.js"></script>