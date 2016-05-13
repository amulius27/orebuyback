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

$Biotech = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2358");
if($Biotech === false) {
    $error = db_error();
}
$Camera_Drones = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2345");
if($Camera_Drones === false) {
    $error = db_error();
}
$Condensates = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2344");
if($Condensates === false) {
    $error = db_error();
}
$Cryoprotectant_Solution = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2367");
if($Cryoprotectant_Solution === false) {
    $error = db_error();
}
$Data_Chips = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17392");
if($Data_Chips === false) {
    $error = db_error();
}
$Gel_Matrix_Biopaste = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2348");
if($Gel_Matrix_Biopaste=== false) {
    $error = db_error();
}
$Guidance_Systems = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9834");
if($Guidance_Systems === false) {
    $error = db_error();
}
$Hazmat_Detection_Systems = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2366");
if($Hazmat_Detection_Systems === false) {
    $error = db_error();
}
$Hermetic_Membranes = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2361");
if($Hermetic_Membranes === false) {
    $error = db_error();
}
$HighTech_Transmitters = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17898");
if($HighTech_Transmitters === false) {
    $error = db_error();
}
$Industrial_Explosives = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2360");
if($Industrial_Explosives === false) {
    $error = db_error();
}
$Neocoms = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2354");
if($Neocoms === false) {
    $error = db_error();
}
$Nuclear_Reactors = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2352");
if($Nuclear_Reactors === false) {
    $error = db_error();
}
$Planetary_Vehicles = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9846");
if($Planetary_Vehicles === false) {
    $error = db_error();
}
$Robotics = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9848");
if($Robotics === false) {
    $error = db_error();
}
$Smartfab_Units = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2351");
if($Smartfab_Units === false) {
    $error = db_error();
}
$Supercomputers = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2349");
if($Supercomputers === false) {
    $error = db_error();
}
$Synthetic_Synapses = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2346");
if($Synthetic_Synapses === false) {
    $error = db_error();
}
$Microcontrollers = db_select("SELECT `price` FROM `item_prices` WHERE itemid=12836");
if($Microcontrollers === false) {
    $error = db_error();
}
$Ukomi = db_select("SELECT `price` FROM `item_prices` WHERE itemid=17136");
if($Ukomi === false) {
    $error = db_error();
}
$Vaccines = db_select("SELECT `price` FROM `item_prices` WHERE itemid=28974");
if($Vaccines === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$Biotech[0]); $biotech = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Camera_Drones[0]); $camera_drones = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Condensates[0]); $condensates = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Cryoprotectant_Solution[0]); $cryoprotectant = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Data_Chips[0]); $data_chips = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Gel_Matrix_Biopaste[0]); $biopaste = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Guidance_Systems[0]); $guidance_systems = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Hazmat_Detection_Systems[0]); $hazmat_detection = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Hermetic_Membranes[0]); $hermetic_membranes = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$HighTech_Transmitters[0]); $hightech_transmitters = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Industrial_Explosives[0]); $industrial_explosives = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Neocoms[0]); $neocoms = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Nuclear_Reactors[0]); $nuclear_reactors = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Planetary_Vehicles[0]); $planetary_vehicles = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Robotics[0]); $robotics = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Smartfab_Units[0]); $smartfab_units = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Supercomputers[0]); $supercomputers = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Synthetic_Synapses[0]); $synthetic_synapses = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Microcontrollers[0]); $microcontrollers = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Ukomi[0]); $ukomi = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Vaccines[0]); $vaccines = number_format($string*0.925 , 2, ".", "");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var biotech = <?= $biotech ?>;
    var cameraDrones = <?= $camera_drones ?>;
    var condensates = <?= $condensates ?>;
    var cryoprotectant = <?= $cryoprotectant ?>;
    var dataChips = <?= $data_chips ?>;
    var biopaste = <?= $biopaste ?>;
    var guidanceSystems = <?= $guidance_systems ?>;
    var hazmatDetection = <?= $hazmat_detection ?>;
    var hermeticMembranes = <?= $hermetic_membranes ?>;
    var hightechTransmitters = <?= $hightech_transmitters ?>;
    var industrialExplosives = <?= $industrial_explosives ?>;
    var neocoms = <?= $neocoms ?>;
    var nuclearReactors = <?= $nuclear_reactors ?>;
    var planetaryVehicles = <?= $planetary_vehicles ?>;
    var robotics = <?= $robotics ?>;
    var smartfab = <?= $smartfab_units ?>;
    var supercomputers = <?= $supercomputers ?>;
    var syntheticSynapses = <?= $synthetic_synapses ?>;
    var microcontrollers = <?= $microcontrollers ?>;
    var ukomi = <?= $ukomi ?>;
    var vaccines = <?= $vaccines ?>;
</script>
<script src="webroot/js/t3_pi_cal.js"></script>