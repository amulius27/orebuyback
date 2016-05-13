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

$alloyedTritaniumBar = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25595");
if($alloyedTritaniumBar === false) {
    $error = db_error();
}
$armorPlates = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25605");
if($armorPlates === false) {
    $error = db_error();
}
$artificialNeuralNetwork = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25616");
if($artificialNeuralNetwork === false) {
    $error = db_error();
}
$brokenDroneTransceiver = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25596");
if($brokenDroneTransceiver === false) {
    $error = db_error();
}
$burnedLogicCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25600");
if($burnedLogicCircuit === false) {
    $error = db_error();
}
$capacitorConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25622");
if($capacitorConsole === false) {
    $error = db_error();
}
$charredMicroCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25599");
if($charredMicroCircuit === false) {
    $error = db_error();
}
$conductivePolymer = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25604");
if($conductivePolymer === false) {
    $error = db_error();
}
$conductiveThermoplastic = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25623");
if($conductiveThermoplastic === false) {
    $error = db_error();
}
$contaminatedLorentzFluid = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25591");
if($contaminatedLorentzFluid === false) {
    $error = db_error();
}
$contaminatedNaniteCompound = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25590");
if($contaminatedNaniteCompound === false) {
    $error = db_error();
}
$currentPump = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25611");
if($currentPump === false) {
    $error = db_error();
}
$damagedArtificialNeuralNetwork = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25597");
if($damagedArtificialNeuralNetwork === false) {
    $error = db_error();
}
$defectiveCurrentPump = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25592");
if($defectiveCurrentPump === false) {
    $error = db_error();
}
$droneTransceiver = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25615");
if($droneTransceiver === false) {
    $error = db_error();
}
$enhancedWardConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25625");
if($enhancedWardConsole === false) {
    $error = db_error();
}
$friedInterfaceCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25601");
if($friedInterfaceCircuit === false) {
    $error = db_error();
}
$impetusConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25621");
if($impetusConsole === false) {
    $error = db_error();
}
$intactArmorPlates = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25624");
if($intactArmorPlates === false) {
    $error = db_error();
}
$intactShieldEmitter = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25608");
if($intactShieldEmitter === false) {
    $error = db_error();
}
$interfaceCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25620");
if($interfaceCircuit === false) {
    $error = db_error();
}
$logicCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25619");
if($logicCircuit === false) {
    $error = db_error();
}
$lorentzFluid = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25610");
if($lorentzFluid === false) {
    $error = db_error();
}
$malfunctioningShieldEmitter = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25589");
if($malfunctioningShieldEmitter === false) {
    $error = db_error();
}
$meltedCapacitorConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25603");
if($meltedCapacitorConsole === false) {
    $error = db_error();
}
$microCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25618");
if($microCircuit === false) {
    $error = db_error();
}
$naniteCompound = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25609");
if($naniteCompound === false) {
    $error = db_error();
}
$powerCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25617");
if($powerCircuit === false) {
    $error = db_error();
}
$powerConduit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25613");
if($powerConduit === false) {
    $error = db_error();
}
$scorchedTelemetryProcessor = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25588");
if($scorchedTelemetryProcessor === false) {
    $error = db_error();
}
$singleCrystalSuperalloyIBeam = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25614");
if($singleCrystalSuperalloyIBeam === false) {
    $error = db_error();
}
$smashedTriggerUnit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25593");
if($smashedTriggerUnit === false) {
    $error = db_error();
}
$tangledPowerConduit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25594");
if($tangledPowerConduit === false) {
    $error = db_error();
}
$telemetryProcessor = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25607");
if($telemetryProcessor === false) {
    $error = db_error();
}
$thrusterConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25602");
if($thrusterConsole === false) {
    $error = db_error();
}
$triggerUnit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25612");
if($triggerUnit === false) {
    $error = db_error();
}
$trippedPowerCircuit = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25598");
if($trippedPowerCircuit === false) {
    $error = db_error();
}
$wardConsole = db_select("SELECT `price` FROM `item_prices` WHERE itemid=25606");
if($wardConsole === false) {
    $error = db_error();
}

//Calculate Corp Price
$string=implode(".",$alloyedTritaniumBar[0]); $AlloyedTritaniumBar = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$armorPlates[0]); $ArmorPlates = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$artificialNeuralNetwork[0]); $ArtificialNeuralNetwork = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$brokenDroneTransceiver[0]); $BrokenDroneTransceiver = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$burnedLogicCircuit[0]); $BurnedLogicCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$capacitorConsole[0]); $CapacitorConsole = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$charredMicroCircuit[0]); $CharredMicroCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$conductivePolymer[0]); $ConductivePolymer = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$conductiveThermoplastic[0]); $ConductiveThermoplastic = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$contaminatedLorentzFluid[0]); $ContaminatedLorentzFluid = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$contaminatedNaniteCompound[0]); $ContaminatedNaniteCompound = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$currentPump[0]); $CurrentPump = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$damagedArtificialNeuralNetwork[0]); $DamagedArtificialNeuralNetwork = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$defectiveCurrentPump[0]); $DefectiveCurrentPump = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$droneTransceiver[0]); $DroneTransceiver = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$enhancedWardConsole[0]); $EnhancedWardConsole = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$friedInterfaceCircuit[0]); $FriedInterfaceCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$impetusConsole[0]); $ImpetusConsole = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$intactArmorPlates[0]); $IntactArmorPlates = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$intactShieldEmitter[0]); $IntactShieldEmitter = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$interfaceCircuit[0]); $InterfaceCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$logicCircuit[0]); $LogicCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$lorentzFluid[0]); $LorentzFluid = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$malfunctioningShieldEmitter[0]); $MalfunctioningShieldEmitter = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$meltedCapacitorConsole[0]); $MeltedCapacitorConsole = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$microCircuit[0]); $MicroCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$naniteCompound[0]); $NaniteCompound = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$powerCircuit[0]); $PowerCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$powerConduit[0]); $PowerConduit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$scorchedTelemetryProcessor[0]); $ScorchedTelemetryProcessor = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$singleCrystalSuperalloyIBeam[0]); $SingleCrystalSuperalloyIBeam = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$smashedTriggerUnit[0]); $SmashedTriggerUnit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$tangledPowerConduit[0]); $TangledPowerConduit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$telemetryProcessor[0]); $TelemetryProcessor = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$thrusterConsole[0]); $ThrusterConsole = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$triggerUnit[0]); $TriggerUnit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$trippedPowerCircuit[0]); $TrippedPowerCircuit = number_format($string*0.8*0.875 , 2, ".", "");
$string=implode(".",$wardConsole[0]); $WardConsole = number_format($string*0.8*0.875 , 2, ".", "");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var alloyedTritaniumBar = <?= $AlloyedTritaniumBar ?>;
    var armorPlates = <?= $ArmorPlates ?>;
    var artificialNeuralNetwork = <?= $ArtificialNeuralNetwork ?>;
    var brokenDroneTransceiver = <?= $BrokenDroneTransceiver ?>;
    var burnedLogicCircuit = <?= $BurnedLogicCircuit ?>;
    var capacitorConsole = <?= $CapacitorConsole ?>;
    var charredMicroCircuit = <?= $CharredMicroCircuit ?>;
    var conductivePolymer = <?= $ConductivePolymer ?>;
    var conductiveThermoplastic = <?= $ConductiveThermoplastic ?>;
    var contaminatedLorentzFluid = <?= $ContaminatedLorentzFluid ?>;
    var contaminatedNaniteCompound = <?= $ContaminatedNaniteCompound ?>;
    var currentPump = <?= $CurrentPump ?>;
    var damagedArtificialNeuralNetwork = <?= $DamagedArtificialNeuralNetwork ?>;
    var defectiveCurrentPump = <?= $DefectiveCurrentPump ?>;
    var droneTransceiver = <?= $DroneTransceiver ?>;
    var enhancedWardConsole = <?= $EnhancedWardConsole ?>;
    var friedInterfaceCircuit = <?= $FriedInterfaceCircuit ?>;
    var impetusConsole = <?= $ImpetusConsole ?>;
    var intactArmorPlates = <?= $IntactArmorPlates ?>;
    var intactShieldEmitter = <?= $IntactShieldEmitter ?>;
    var interfaceCircuit = <?= $InterfaceCircuit ?>;
    var logicCircuit = <?= $LogicCircuit ?>;
    var lorentzFluid = <?= $LorentzFluid ?>;
    var malfunctioningShieldEmitter = <?= $MalfunctioningShieldEmitter ?>;
    var meltedCapacitorConsole = <?= $MeltedCapacitorConsole ?>;
    var microCircuit = <?= $MicroCircuit ?>;
    var naniteCompound = <?= $NaniteCompound ?>;
    var powerCircuit = <?= $PowerCircuit ?>;
    var powerConduit = <?= $PowerConduit ?>;
    var scorchedTelemetryProcessor = <?= $ScorchedTelemetryProcessor ?>;
    var singleCrystalSuperalloyIBeam = <?= $SingleCrystalSuperalloyIBeam ?>;
    var smashedTriggerUnit = <?= $SmashedTriggerUnit ?>;
    var tangledPowerConduit = <?= $TangledPowerConduit ?>;
    var telemetryProcessor = <?= $TelemetryProcessor ?>;
    var thrusterConsole = <?= $ThrusterConsole ?>;
    var triggerUnit = <?= $TriggerUnit ?>;
    var trippedPowerCircuit = <?= $TrippedPowerCircuit ?>;
    var wardConsole = <?= $WardConsole ?>;
</script>
<script src="webroot/js/sal_cal.js"></script>