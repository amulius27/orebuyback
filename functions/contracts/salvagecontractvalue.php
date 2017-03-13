<?php

function SalvageContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
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
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $SalvageValue = array(
        'Alloyed_Tritanium_Bar' => $post['Alloyed_Tritanium_Bar'] * $AlloyedTritaniumBar,
        'Armor_Plates' => $post['Armor_Plates'] * $ArmorPlates,
        'Artificial_Neural_Network' => $post['Artificial_Neural_Network'] * $ArtificialNeuralNetwork,
        'Broken_Drone_Transceiver' => $post['Broken_Drone_Transceiver'] * $BrokenDroneTransceiver,
        'Burned_Logic_Circuit' => $post['Burned_Logic_Circuit'] * $BurnedLogicCircuit,
        'Capacitor_Circuit_Console' => $post['Capacitor_Circuit_Console'] * $CapacitorConsole,
        'Charred_Micro_Circuit' => $post['Charred_Micro_Circuit'] * $CharredMicroCircuit,
        'Conductive_Polymer' => $post['Conductive_Polymer'] * $ConductivePolymer,
        'Conductive_Thermoplastic' => $post['Conductive_Thermoplastic'] * $ConductiveThermoplastic,
        'Contaminated_Lorrentz_Fluid' => $post['Contaminated_Lorrentz_Fluid'] * $ContaminatedLorrentzFluid,
        'Contaminated_Nanite_Compound' => $post['Contaminated_Nanite_Compound'] * $ContaminatedNaniteCompound,
        'Current_Pump' => $post['Current_Pump'] * $CurrentPump,
        'Damaged_Artificial_Neural_Network' => $post['Damaged_Artifical_Neural_Network'] * $DamagedArtificialNeuralNetwork,
        'Defective_Current_Pump' => $post['Defective_Current_Pump'] * $DefectiveCurrentPump,
        'Drone_Transceiver' => $post['Drone_Transceiver'] * $DroneTransceiver,
        'Enhanced_Ward_Console' => $post['Enhanced_Ward_Console'] * $EnhancedWardConsole,
        'Fried_Interface_Circuit' => $post['Fried_Interface_Circuit'] * $FriedInterfaceCircuit,
        'Impetus_Console' => $post['Impetus_Console'] * $ImpetusConsole,
        'Intact_Armor_Plates' => $post['Intact_Armor_Plates'] * $IntactArmorPlates,
        'Intact_Shield_Emitter' => $post['Intact_Shield_Emitter'] * $IntactShieldEmitter,
        'Interface_Circuit' => $post['Interface_Circuit'] * $InterfaceCircuit,
        'Logic_Circuit' => $post['Logic_Circuit'] * $LogicCircuit,
        'Lorrentz_Fluid' => $post['Lorrentz_Fluid'] * $LorrentzFluid,
        'Malfunctioning_Shield_Emitter' => $post['Malfunctioning_Shield_Emitter'] * $MalfunctioningShieldEmitter,
        'Melted_Capacitor_Console' => $post['Melted_Capacitor_Console'] * $MeltedCapacitorConsole,
        'Micro_Circuit' => $post['Micro_Circuit'] * $MicroCircuit,
        'Nanite_Compound' => $post['Nanite_Compound'] * $NaniteCompound,
        'Power_Circuit' => $post['Power_Circuit'] * $PowerCircuit,
        'Power_Conduit' => $post['Power_Conduit'] * $PowerConduit,
        'Scorched_Telemetry_Processor' => $post['Scorched_Telemetry_Processor'] * $ScorchedTelemetryProcessor,
        'SCS_IBeam' => $post['SCS_IBeam'] * $SingleCrystalSuperalloyIBeam,
        'Smashed_Trigger_Unit' => $post['Smashed_Trigger_Unit'] * $SmashedTriggerUnit,
        'Tangled_Power_Conduit' => $post['Tangled_Power_Conduit'] * $TangledPowerConduit,
        'Telemetry_Processor' => $post['Telemetry_Processor'] * $TelemetryProcessor,
        'Thruster_Console' => $post['Thruster_Console'] * $ThrusterConsole,
        'Trigger_Unit' => $post['Trigger_Unit'] * $TriggerUnit,
        'Tripped_Power_Circuit' => $post['Tripped_Power_Circuit'] * $TrippedPowerCircuit,
        'Ward_Console' => $post['Ward_Console'] * $WardConsole,
    );
    
    //Add the contract value up from the ore
    foreach($SalvageValue as $value) {
       $contractValue = $contractValue + $value;
    }
    
    //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE Corpname= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * ($allianceTaxRate / 100.0);
    $corpTax = $contractValue * ($corpTaxRate / 100.0);
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $SalvageContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Alloyed_Tritanium_Bar' => $post['Alloyed_Tritanium_Bar'],
        'Armor_Plates' => $post['Armor_Plates'],
        'Artificial_Neural_Network' => $post['Artificial_Neural_Network'],
        'Broken_Drone_Transceiver' => $post['Broken_Drone_Transceiver'],
        'Burned_Logic_Circuit' => $post['Burned_Logic_Circuit'],
        'Capacitor_Circuit_Console' => $post['Capacitor_Circuit_Console'],
        'Charred_Micro_Circuit' => $post['Charred_Micro_Circuit'],
        'Conductive_Polymer' => $post['Conductive_Polymer'],
        'Conductive_Thermoplastic' => $post['Conductive_Thermoplastic'],
        'Contaminated_Lorrentz_Fluid' => $post['Contaminated_Lorrentz_Fluid'],
        'Contaminated_Nanite_Compound' => $post['Contaminated_Nanite_Compound'],
        'Current_Pump' => $post['Current_Pump'],
        'Damaged_Artificial_Neural_Network' => $post['Damaged_Artificial_Neural_Network'],
        'Defective_Current_Pump' => $post['Defective_Current_Pump'],
        'Drone_Transceiver' => $post['Drone_Transceiver'],
        'Enhanced_Ward_Console' => $post['Enhanced_Ward_Console'],
        'Fried_Interface_Circuit' => $post['Fried_Interface_Circuit'],
        'Impetus_Console' => $post['Impetus_Console'],
        'Intact_Armor_Plates' => $post['Intact_Armor_Plates'],
        'Intact_Shield_Emitter' => $post['Intact_Shield_Emitter'],
        'Interface_Circuit' => $post['Interface_Circuit'],
        'Logic_Circuit' => $post['Logic_Circuit'],
        'Lorrentz_Fluid' => $post['Lorrentz_Fluid'],
        'Malfunctioning_Shield_Emitter' => $post['Malfunctioning_Shield_Emitter'],
        'Melted_Capacitor_Console' => $post['Melted_Capacitor_Console'],
        'Micro_Circuit' => $post['Micro_Circuit'],
        'Nanite_Compound' => $post['Nanite_Compound'],
        'Power_Circuit' => $post['Power_Circuit'],
        'Power_Conduit' => $post['Power_Conduit'],
        'Scorched_Telemetry_Processor' => $post['Scorched_Telemetry_Processor'],
        'SCS_IBeam' => $post['SCS_IBeam'],
        'Smashed_Trigger_Unit' => $post['Smashed_Trigger_Unit'],
        'Tangled_Power_Conduit' => $post['Tangled_Power_Conduit'],
        'Telemetry_Processor' => $post['Telemetry_Processor'],
        'Thruster_Console' => $post['Thruster_Console'],
        'Trigger_Unit' => $post['Trigger_Unit'],
        'Tripped_Power_Circuit' => $post['Tripped_Power_Circuit'],
        'Ward_Console' => $post['Ward_Console'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Salvage',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('SalvageContractContents', $SalvageContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>