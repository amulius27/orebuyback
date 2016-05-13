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

$Biocells = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2329");
if($Biocells === false) {
    $error = db_error();
}
$Construction_Blocks = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3828");
if($Construction_Blocks === false) {
    $error = db_error();
}
$Consumer_Electronics = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9836");
if($Consumer_Electronics === false) {
    $error = db_error();
}
$Coolant = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9832");
if($Coolant === false) {
    $error = db_error();
}
$Enriched_Uranium = db_select("SELECT `price` FROM `item_prices` WHERE itemid=44");
if($Enriched_Uranium === false) {
    $error = db_error();
}
$Fertilizer = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3693");
if($Fertilizer === false) {
    $error = db_error();
}
$Gen_Enhanced_livestock = db_select("SELECT `price` FROM `item_prices` WHERE itemid=15317");
if($Gen_Enhanced_livestock === false) {
    $error = db_error();
}
$Livestock = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3725");
if($Livestock === false) {
    $error = db_error();
}
$Mechanical_Parts = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3689");
if($Mechanical_Parts === false) {
    $error = db_error();
}
$Microfiber_Shielding = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2327");
if($Microfiber_Shielding === false) {
    $error = db_error();
}
$Miniature_Electronics = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9842");
if($Miniature_Electronics === false) {
    $error = db_error();
}
$Nanites = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2463");
if($Nanites === false) {
    $error = db_error();
}
$Oxides = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2317");
if($Oxides === false) {
    $error = db_error();
}
$Polyaramids = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2321");
if($Polyaramids === false) {
    $error = db_error();
}
$Polytextiles = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3695");
if($Polytextiles === false) {
    $error = db_error();
}
$Rocket_Fuel = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9830");
if($Rocket_Fuel === false) {
    $error = db_error();
}
$Silicate_Glass = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3697");
if($Silicate_Glass === false) {
    $error = db_error();
}
$Superconductors = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9838");
if($Superconductors === false) {
    $error = db_error();
}
$Supertensile_Plastics = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2312");
if($Supertensile_Plastics === false) {
    $error = db_error();
}
$Synthetic_oil = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3691");
if($Synthetic_oil === false) {
    $error = db_error();
}
$Test_Cultures = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2319");
if($Test_Cultures === false) {
    $error = db_error();
}
$Transmitter = db_select("SELECT `price` FROM `item_prices` WHERE itemid=9840");
if($Transmitter === false) {
    $error = db_error();
}
$Viral_Agent = db_select("SELECT `price` FROM `item_prices` WHERE itemid=3775");
if($Viral_Agent === false) {
    $error = db_error();
}
$Water_Cooled_CPU = db_select("SELECT `price` FROM `item_prices` WHERE itemid=2328");
if($Water_Cooled_CPU === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$Biocells[0]); $biocells = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Construction_Blocks[0]); $construction_blocks = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Consumer_Electronics[0]); $consumer_electronics = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Coolant[0]); $coolant = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Enriched_Uranium[0]); $enriched_uranium = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Fertilizer[0]); $fertilizer = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Gen_Enhanced_livestock[0]); $gen_enhanced_livestock = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Livestock[0]); $livestock = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Mechanical_Parts[0]); $mechanical_parts = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Microfiber_Shielding[0]); $microfiber_shielding = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Miniature_Electronics[0]); $miniature_electronics = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Nanites[0]); $nanites = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Oxides[0]); $oxydes = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Polyaramids[0]); $polyaramids = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Polytextiles[0]); $polytextiles = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Rocket_Fuel[0]); $rocket_fuel = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Silicate_Glass[0]); $silicate_glass = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Superconductors[0]); $superconductors = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Supertensile_Plastics[0]); $supertensile_plastics = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Synthetic_oil[0]); $synthetic_oil = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Test_Cultures[0]); $test_cultures = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Transmitter[0]); $transmitter = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Viral_Agent[0]); $viral_agent = number_format($string*0.925 , 2, ".", "");
$string=implode(".",$Water_Cooled_CPU[0]); $water_cooled_cpu = number_format($string*0.925 , 2, ".", "");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var biocells = <?= $biocells ?>;
    var constructionBlocks = <?= $construction_blocks ?>;
    var consumerElectronics = <?= $consumer_electronics ?>;
    var coolant = <?= $coolant ?>;
    var enrichedUranium = <?= $enriched_uranium ?>;
    var fertilizer = <?= $fertilizer ?>;
    var genEnhancedLivestock = <?= $gen_enhanced_livestock ?>;
    var livestock = <?= $livestock ?>;
    var mechanicalParts = <?= $mechanical_parts ?>;
    var microfibreShielding = <?= $microfiber_shielding ?>;
    var miniatureElectronics = <?= $miniature_electronics ?>;
    var nanites = <?= $nanites ?>;
    var oxides = <?= $oxydes ?>;
    var polyaramids = <?= $polyaramids ?>;
    var polytextiles = <?= $polytextiles ?>;
    var rocketFuel = <?= $rocket_fuel ?>;
    var silicateGlass = <?= $silicate_glass ?>;
    var superconductors = <?= $superconductors ?>;
    var supertensilePlastics = <?= $supertensile_plastics ?>;
    var syntheticOil = <?= $synthetic_oil ?>;
    var testCultures = <?= $test_cultures ?>;
    var transmitter = <?= $transmitter ?>;
    var viralAgent = <?= $viral_agent ?>;
    var waterCooledCpu = <?= $water_cooled_cpu ?>;
</script>
<script src="webroot/js/t2_pi_cal.js"></script>