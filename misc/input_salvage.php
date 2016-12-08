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
    if(isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation == 'None') {
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        if($corporation == 'None') {
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corporation = 'None';
        $corpTax = 10.00;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
   
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM SalvagePrices WHERE ItemId= :id', array('id' => 25595));
    
    $AlloyedTritaniumBar = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25595, 'time' => $update));
    $ArmorPlates = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25605, 'time' => $update));
    $ArtificialNeuralNetwork = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25616, 'time' => $update));
    $BrokenDroneTransceiver = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25596, 'time' => $update));
    $BurnedLogicCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25600, 'time' => $update));
    $CapacitorConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25622, 'time' => $update));
    $CharredMicroCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25599, 'time' => $update));
    $ConductivePolymer = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25604, 'time' => $update));
    $ConductiveThermoplastic = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25623, 'time' => $update));
    $ContaminatedLorentzFluid = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25591, 'time' => $update));
    $ContaminatedNaniteCompound = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25590, 'time' => $update));
    $CurrentPump = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25611, 'time' => $update));
    $DamagedArtificialNeuralNetwork = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25597, 'time' => $update));
    $DefectiveCurrentPump = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25592, 'time' => $update));
    $DroneTransceiver = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25615, 'time' => $update));
    $EnhancedWardConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25625, 'time' => $update));
    $FriedInterfaceCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25601, 'time' => $update));
    $ImpetusConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25621, 'time' => $update));
    $IntactArmorPlates = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25624, 'time' => $update));
    $IntactShieldEmitter = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25608, 'time' => $update));
    $InterfaceCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25620, 'time' => $update));
    $LogicCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25619, 'time' => $update));
    $LorentzFluid = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25610, 'time' => $update));
    $MalfunctioningShieldEmitter = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25589, 'time' => $update));
    $MeltedCapacitorConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25603, 'time' => $update));
    $MicroCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25618, 'time' => $update));
    $NaniteCompound = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25609, 'time' => $update));
    $PowerCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25617, 'time' => $update));
    $PowerConduit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25613, 'time' => $update));
    $ScorchedTelemetryProcessor = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25588, 'time' => $update));
    $SingleCrystalSuperalloyIBeam = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25614, 'time' => $update));
    $SmashedTriggerUnit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25593, 'time' => $update));
    $TangledPowerConduit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25594, 'time' => $update));
    $TelemetryProcessor = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25607, 'time' => $update));
    $ThrusterConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25602, 'time' => $update));
    $TriggerUnit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25612, 'time' => $update));
    $TrippedPowerCircuit = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25598, 'time' => $update));
    $WardConsole = $db->fetchColumn('SELECT Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25606, 'time' => $update));

    DBClose($db);
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
    var value = <?= $value ?>;
</script>