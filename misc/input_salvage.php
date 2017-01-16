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
    
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if (isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation != 'None') {
            $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
        } else {
            $corporation = 'None';
            $corpTax = $defaultTax;
        }
    } else {
        $corporation = 'None';
        $corpTax = $defaultTax;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
   
    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM SalvagePrices WHERE ItemId= :id', array('id' => 25595));
    
    $AlloyedTritaniumBarTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25595, 'time' => $update));
    $AlloyedTritaniumBar = InputItemPrice($AlloyedTritaniumBarTemp['Enabled'], $AlloyedTritaniumBarTemp['Price']);
    
    $ArmorPlatesTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25605, 'time' => $update));
    $ArmorPlates = InputItemPrice($ArmorPlatesTemp['Enabled'], $ArmorPlatesTemp['Price']);
    
    $ArtificialNeuralNetworkTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25616, 'time' => $update));
    $ArtificialNeuralNetwork = InputItemPrice($ArtificialNeuralNetworkTemp['Enabled'], $ArtificialNeuralNetworkTemp['Price']);
    
    $BrokenDroneTransceiverTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25596, 'time' => $update));
    $BrokenDroneTransceiver = InputItemPrice($BrokenDroneTransceiverTemp['Enabled'], $BrokenDroneTransceiverTemp['Price']);
    
    $BurnedLogicCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25600, 'time' => $update));
    $BurnedLogicCircuit = InputItemPrice($BurnedLogicCircuitTemp['Enabled'], $BurnedLogicCircuitTemp['Price']);
    
    $CapacitorConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25622, 'time' => $update));
    $CapacitorConsole = InputItemPrice($CapacitorConsoleTemp['Enabled'], $CapacitorConsoleTemp['Price']);
    
    $CharredMicroCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25599, 'time' => $update));
    $CharredMicroCircuit = InputItemPrice($CharredMicroCircuitTemp['Enabled'], $CharredMicroCircuitTemp['Price']);
    
    $ConductivePolymerTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25604, 'time' => $update));
    $ConductivePolymer = InputItemPrice($ConductivePolymerTemp['Enabled'], $ConductivePolymerTemp['Price']);
    
    $ConductiveThermoplasticTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25623, 'time' => $update));
    $ConductiveThermoplastic = InputItemPrice($ConductiveThermoplasticTemp['Enabled'], $ConductiveThermoplasticTemp['Price']);
    
    $ContaminatedLorentzFluidTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25591, 'time' => $update));
    $ContaminatedLorentzFluid = InputItemPrice($ContaminatedLorentzFluidTemp['Enabled'], $ContaminatedLorentzFluidTemp['Price']);
    
    $ContaminatedNaniteCompoundTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25590, 'time' => $update));
    $ContaminatedNaniteCompound = InputItemPrice($ContaminatedNaniteCompoundTemp['Enabled'], $ContaminatedNaniteCompoundTemp['Price']);
    
    $CurrentPumpTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25611, 'time' => $update));
    $CurrentPump = InputItemPrice($CurrentPumpTemp['Enabled'], $CurrentPumpTemp['Price']);
  
    $DamagedArtificialNeuralNetworkTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25597, 'time' => $update));
    $DamagedArtificialNeuralNetwork = InputItemPrice($DamagedArtificialNeuralNetworkTemp['Enabled'], $DamagedArtificialNeuralNetworkTemp['Price']);
    
    $DefectiveCurrentPumpTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25592, 'time' => $update));
    $DefectiveCurrentPump = InputItemPrice($DefectiveCurrentPumpTemp['Enabled'], $DefectiveCurrentPumpTemp['Price']);
    
    $DroneTransceiverTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25615, 'time' => $update));
    $DroneTransceiver = InputItemPrice($DroneTransceiverTemp['Enabled'], $DroneTransceiverTemp['Price']);
    
    $EnchancedWardConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25625, 'time' => $update));
    $EnchancedWardConsole = InputItemPrice($EnchancedWardConsoleTemp['Enabled'], $EnchancedWardConsoleTemp['Price']);
    
    $FriedInterfaceCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25601, 'time' => $update));
    $FriedInterfaceCircuit = InputItemPrice($FriedInterfaceCircuitTemp['Enabled'], $FriedInterfaceCircuitTemp['Price']);
    
    $ImpetusConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25621, 'time' => $update));
    $ImpetusConsole = InputItemPrice($ImpetusConsoleTemp['Enabled'], $ImpetusConsoleTemp['Price']);
    
    $IntactArmorPlatesTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25624, 'time' => $update));
    $IntactArmorPlates = InputItemPrice($IntactArmorPlatesTemp['Enabled'], $IntactArmorPlatesTemp['Price']);
    
    $IntactShieldEmitterTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25608, 'time' => $update));
    $IntactShieldEmitter = InputItemPrice($IntactShieldEmitterTemp['Enabled'], $IntactShieldEmitterTemp['Price']);
    
    $InterfaceCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25620, 'time' => $update));
    $InterfaceCircuit = InputItemPrice($InterfaceCircuitTemp['Enabled'], $InterfaceCircuitTemp['Price']);
    
    $LogicCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25619, 'time' => $update));
    $LogicCircuit = InputItemPrice($LogicCircuitTemp['Enabled'], $LogicCircuitTemp['Price']);
    
    $LorentzFluidTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25610, 'time' => $update));
    $LorentzFluid = InputItemPrice($LorentzFluidTemp['Enabled'], $LorentzFluidTemp['Price']);
    
    $MalfunctioningShieldEmitterTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25589, 'time' => $update));
    $MalfunctioningShieldEmitter = InputItemPrice($MalfunctioningShieldEmitterTemp['Enabled'], $MalfunctioningShieldEmitterTemp['Price']);
    
    $MeltedCapacitorConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25603, 'time' => $update));
    $MeltedCapacitorConsole = InputItemPrice($MeltedCapacitorConsoleTemp['Enabled'], $MeltedCapacitorConsoleTemp['Price']);
    
    $MicroCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25618, 'time' => $update));
    $MicroCircuit = InputItemPrice($MicroCircuitTemp['Enabled'], $MicroCircuitTemp['Price']);
    
    $NaniteCompoundTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25609, 'time' => $update));
    $NaniteCompound = InputItemPrice($NaniteCompoundTemp['Enabled'], $NaniteCompoundTemp['Price']);
    
    $PowerCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25617, 'time' => $update));
    $PowerCircuit = InputItemPrice($PowerCircuitTemp['Enabled'], $PowerCircuitTemp['Price']);
    
    $PowerConduitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25613, 'time' => $update));
    $PowerConduit = InputItemPrice($PowerConduitTemp['Enabled'], $PowerConduitTemp['Price']);
    
    $ScorchedTelemetryProcessorTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25588, 'time' => $update));
    $ScorchedTelemetryProcessor = InputItemPrice($ScorchedTelemetryProcessorTemp['Enabled'], $ScorchedTelemetryProcessorTemp['Price']);
    
    $SingleCrystalSuperalloyIBeamTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25614, 'time' => $update));
    $SingleCrystalSuperalloyIBeam = InputItemPrice($SingleCrystalSuperalloyIBeamTemp['Enabled'], $SingleCrystalSuperalloyIBeamTemp['Price']);
    
    $SmashedTriggerUnitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25593, 'time' => $update));
    $SmashedTriggerUnit = InputItemPrice($SmashedTriggerUnitTemp['Enabled'], $SmashedTriggerUnitTemp['Price']);
    
    $TangledPowerConduitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25594, 'time' => $update));
    $TangledPowerConduit = InputItemPrice($TangledPowerConduitTemp['Enabled'], $TangledPowerConduitTemp['Price']);
    
    $TelemetryProcessorTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25607, 'time' => $update));
    $TelemetryProcessor = InputItemPrice($TelemetryProcessorTemp['Enabled'], $TelemetryProcessorTemp['Price']);
    
    $ThrusterConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25602, 'time' => $update));
    $ThrusterConsole = InputItemPrice($ThrusterConsoleTemp['Enabled'], $ThrusterConsoleTemp['Price']);
    
    $TriggerUnitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25612, 'time' => $update));
    $TriggerUnit = InputItemPrice($TriggerUnitTemp['Enabled'], $TriggerUnitTemp['Price']);
    
    $TrippedPowerCircuitTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25598, 'time' => $update));
    $TrippedPowerCircuit = InputItemPrice($TrippedPowerCircuitTemp['Enabled'], $TrippedPowerCircuitTemp['Price']);
    
    $WardConsoleTemp = $db->fetchRow('SELECT Enabled, Price FROM SalvagePrices WHERE ItemId= :id AND Time= :time', array('id' => 25606, 'time' => $update));
    $WardConsole = InputItemPrice($WardConsoleTemp['Enabled'], $WardConsoleTemp['Price']);

    DBClose($db);
    
    $AlloyedTritaniumBar = $AlloyedTritaniumBar * $value;
    $ArmorPlates = $ArmorPlates * $value;
    $ArtificialNeuralNetwork = $ArtificialNeuralNetwork * $value;
    $BrokenDroneTransceiver = $BrokenDroneTransceiver * $value;
    $BurnedLogicCircuit = $BurnedLogicCircuit * $value;
    $CapacitorConsole = $CapacitorConsole * $value;
    $CharredMicroCircuit = $CharredMicroCircuit * $value;
    $ConductivePolymer = $ConductivePolymer * $value;
    $ConductiveThermoplastic = $ConductiveThermoplastic * $value;
    $ContaminatedLorentzFluid = $ContaminatedLorentzFluid * $value;
    $ContaminatedNaniteCompound = $ContaminatedNaniteCompound * $value;
    $CurrentPump = $CurrentPump * $value;
    $DamagedArtificialNeuralNetwork = $DamagedArtificialNeuralNetwork * $value;
    $DefectiveCurrentPump = $DefectiveCurrentPump * $value;
    $DroneTransceiver = $DroneTransceiver * $value;
    $EnchancedWardConsole = $EnchancedWardConsole * $value;
    $FriedInterfaceCircuit = $FriedInterfaceCircuit * $value;
    $ImpetusConsole = $ImpetusConsole * $value;
    $IntactArmorPlates = $IntactArmorPlates * $value;
    $IntactShieldEmitter = $IntactShieldEmitter * $value;
    $InterfaceCircuit = $InterfaceCircuit * $value;
    $LogicCircuit = $LogicCircuit * $value;
    $LorentzFluid = $LorentzFluid * $value;
    $MalfunctioningShieldEmitter = $MalfunctioningShieldEmitter * $value;
    $MeltedCapacitorConsole = $MeltedCapacitorConsole * $value;
    $MicroCircuit = $MicroCircuit * $value;
    $NaniteCompound = $NaniteCompound * $value;
    $PowerCircuit = $PowerCircuit * $value;
    $ScorchedTelemetryProcessor = $ScorchedTelemetryProcessor * $value;
    $SingleCrystalSuperalloyIBeam = $SingleCrystalSuperalloyIBeam * $value;
    $SmashedTriggerUnit = $SmashedTriggerUnit * $value;
    $TangledPowerConduit = $TangledPowerConduit * $value;
    $TelemetryProcessor = $TelemetryProcessor * $value;
    $ThrusterConsole = $ThrusterConsole * $value;
    $TriggerUnit = $TriggerUnit * $value;
    $TrippedPowerCircuit = $TrippedPowerCircuit * $value;
    $WardConsole = $WardConsole * $value;
    
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