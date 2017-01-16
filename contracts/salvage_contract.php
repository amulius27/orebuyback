<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = $_POST["Quote_Time"];
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Alloyed_Tritanium_Bar"])) {
        $AlloyedTritaniumBar = filter_input(INPUT_POST, "Alloyed_Tritanium_Bar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $AlloyedTritaniumBar = 0;
    }
    if(isset($_POST["Armor_Plates"])) {
        $ArmorPlates = filter_input(INPUT_POST, "Armor_Plates", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ArmorPlates = 0;
    }
    if(isset($_POST["Artifical_Neural_Network"])) {
        $ArtificialNeuralNetwork = filter_input(INPUT_POST, "Artifical_Neural_Network", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ArtificialNeuralNetwork = 0;
    }
    if(isset($_POST["Broken_Drone_Transceiver"])) {
        $BrokenDroneTransceiver = filter_input(INPUT_POST, "Broken_Drone_Transceiver", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $BrokenDroneTransceiver = 0;
    }
    if(isset($_POST["Burned_Logic_Circuit"])) {
        $BurnedLogicCircuit = filter_input(INPUT_POST, "Burned_Logic_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $BurnedLogicCircuit = 0;
    }
    if(isset($_POST["Capacitor_Circuit_Console"])) {
        $CapacitorConsole = filter_input(INPUT_POST, "Capacitor_Circuit_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $CapacitorConsole = 0;
    }
    if(isset($_POST["Charred_Micro_Circuit"])) {
        $CharredMicroCircuit = filter_input(INPUT_POST, "Charred_Micro_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $CharredMicroCircuit = 0;
    }
    if(isset($_POST["Conductive_Polymer"])) {
        $ConductivePolymer = filter_input(INPUT_POST, "Conductive_Polymer", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ConductivePolymer = 0;
    }
    if(isset($_POST["Conductive_Thermoplastic"])) {
        $ConductiveThermoplastic = filter_input(INPUT_POST, "Conductive_Thermoplastic", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ConductiveThermoplastic = 0;
    }
    if(isset($_POST["Contaminated_Lorrentz_Fluid"])) {
        $ContaminatedLorrentzFluid = filter_input(INPUT_POST, "Contaminated_Lorrentz_Fluid", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ContaminatedLorrentzFluid = 0;
    }
    if(isset($_POST["Contaminated_Nanite_Compound"])) {
        $ContaminatedNaniteCompound = filter_input(INPUT_POST, "Contaminated_Nanite_Compound", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ContaminatedNaniteCompound = 0;
    }
    if(isset($_POST["Current_Pump"])) {
        $CurrentPump = filter_input(INPUT_POST, "Current_Pump", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $CurrentPump = 0;
    }
    if(isset($_POST["Damaged_Artificial_Neural_Network"])) {
        $DamagedArtificialNeuralNetwork = filter_input(INPUT_POST, "Damaged_Artificial_Neural_Network", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $DamagedArtificialNeuralNetwork = 0;
    }
    if(isset($_POST["Defective_Current_Pump"])) {
        $DefectiveCurrentPump = filter_input(INPUT_POST, "Defective_Current_Pump", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $DefectiveCurrentPump = 0;
    }
    if(isset($_POST["Drone_Transceiver"])) {
        $DroneTransceiver = filter_input(INPUT_POST, "Drone_Transceiver", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $DroneTransceiver = 0;
    }
    if(isset($_POST["Enhanced_Ward_Console"])) {
        $EnhancedWardConsole = filter_input(INPUT_POST, "Enhanced_Ward_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $EnhancedWardConsole = 0;
    }
    if(isset($_POST["Fried_Interface_Circuit"])) {
        $FriedInterfaceCircuit = filter_input(INPUT_POST, "Fried_Interface_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $FriedInterfaceCircuit = 0;
    }
    if(isset($_POST["Impetus_Console"])) {
        $ImpetusConsole = filter_input(INPUT_POST, "Impetus_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ImpetusConsole = 0;
    }
    if(isset($_POST["Intact_Armor_Plates"])) {
        $IntactArmorPlates = filter_input(INPUT_POST, "Intact_Armor_Plates", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $IntactArmorPlates = 0;
    }
    if(isset($_POST["Intact_Shield_Emitter"])) {
        $IntactShieldEmitter = filter_input(INPUT_POST, "Intact_Shield_Emitter", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $IntactShieldEmitter = 0;
    }
    if(isset($_POST["Interface_Circuit"])) {
        $InterfaceCircuit = filter_input(INPUT_POST, "Interface_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $InterfaceCircuit = 0;
    }
    if(isset($_POST["Logic_Circuit"])) {
        $LogicCircuit = filter_input(INPUT_POST, "Logic_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $LogicCircuit = 0;
    }
    if(isset($_POST["Lorrentz_Fluid"])) {
        $LorrentzFluid = filter_input(INPUT_POST, "Lorrentz_Fluid", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $LorrentzFluid = 0;
    }
    if(isset($_POST["Malfunctioning_Shield_Emitter"])) {
        $MalfunctioningShieldEmitter = filter_input(INPUT_POST, "Malfunctioning_Shield_Emitter", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $MalfunctioningShieldEmitter = 0;
    }
    if(isset($_POST["Melted_Capacitor_Console"])) {
        $MeltedCapacitorConsole = filter_input(INPUT_POST, "Melted_Capacitor_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $MeltedCapacitorConsole = 0;
    }
    if(isset($_POST["Micro_Circuit"])) {
        $MicroCircuit = filter_input(INPUT_POST, "Micro_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $MicroCircuit = 0;
    }
    if(isset($_POST["Nanite_Compound"])) {
        $NaniteCompound = filter_input(INPUT_POST, "Nanite_Compound", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $NaniteCompound = 0;
    }
    if(isset($_POST["Power_Circuit"])) {
        $PowerCircuit = filter_input(INPUT_POST, "Power_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $PowerCircuit = 0;
    }
    if(isset($_POST["Power_Conduit"])) {
        $PowerConduit = filter_input(INPUT_POST, "Power_Conduit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $PowerConduit = 0;
    }
    if(isset($_POST["Scorched_Telemetry"])) {
        $ScorchedTelemetryProcessor = filter_input(INPUT_POST, "Scorched_Telemetry", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ScorchedTelemetryProcessor = 0;
    }
    if(isset($_POST["Single-crystal_Superalloy_I-beam"])) {
        $SingleCrystalSuperalloyIBeam = filter_input(INPUT_POST, "Single-crystal_Superalloy_I-beam", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $SingleCrystalSuperalloyIBeam = 0;
    }
    if(isset($_POST["Smashed_Trigger"])) {
        $SmashedTriggerUnit = filter_input(INPUT_POST, "Smashed_Trigger", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $SmashedTriggerUnit = 0;
    }
    if(isset($_POST["Tangled_Power_Conduit"])) {
        $TangledPowerConduit = filter_input(INPUT_POST, "Tangled_Power_Conduit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $TangledPowerConduit = 0;
    }
    if(isset($_POST["Telemetry_Processor"])) {
        $TelemetryProcessor = filter_input(INPUT_POST, "Telemetry_Processor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $TelemetryProcessor = 0;
    }
    if(isset($_POST["Thruster_Console"])) {
        $ThrusterConsole = filter_input(INPUT_POST, "Thruster_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $ThrusterConsole = 0;
    }
    if(isset($_POST["Trigger_Unit"])) {
        $TriggerUnit = filter_input(INPUT_POST, "Trigger_Unit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $TriggerUnit = 0;
    }
    if(isset($_POST["Tripped_Power_Circuit"])) {
        $TrippedPowerCircuit = filter_input(INPUT_POST, "Tripped_Power_Circuit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $TrippedPowerCircuit = 0;
    }
    if(isset($_POST["Ward_Console"])) {
        $WardConsole = filter_input(INPUT_POST, "Ward_Console", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $WardConsole = 0;
    }
    
    $post = array(
        'Alloyed_Tritanium_Bar' => $AlloyedTritaniumBar,
        'Armor_Plates' => $ArmorPlates,
        'Artificial_Neural_Network' => $ArtificialNeuralNetwork,
        'Broken_Drone_Transceiver' => $BrokenDroneTransceiver,
        'Burned_Logic_Circuit' => $BurnedLogicCircuit,
        'Capacitor_Circuit_Console' => $CapacitorConsole,
        'Charred_Micro_Circuit' => $CharredMicroCircuit,
        'Conductive_Polymer' => $ConductivePolymer,
        'Conductive_Thermoplastic' => $ConductiveThermoplastic,
        'Contaminated_Lorrentz_Fluid' => $ContaminatedLorrentzFluid,
        'Contaminated_Nanite_Compound' => $ContaminatedNaniteCompound,
        'Current_Pump' => $CurrentPump,
        'Damaged_Artificial_Neural_Network' => $DamagedArtificialNeuralNetwork,
        'Defective_Current_Pump' => $DefectiveCurrentPump,
        'Drone_Transceiver' => $DroneTransceiver,
        'Enhanced_Ward_Console' => $EnhancedWardConsole,
        'Fried_Interface_Circuit' => $FriedInterfaceCircuit,
        'Impetus_Console' => $ImpetusConsole,
        'Intact_Armor_Plates' => $IntactArmorPlates,
        'Intact_Shield_Emitter' => $IntactShieldEmitter,
        'Interface_Circuit' => $InterfaceCircuit,
        'Logic_Circuit' => $LogicCircuit,
        'Lorrentz_Fluid' => $LorrentzFluid,
        'Malfunctioning_Shield_Emitter' => $MalfunctioningShieldEmitter,
        'Melted_Capacitor_Console' => $MeltedCapacitorConsole,
        'Micro_Circuit' => $MicroCircuit,
        'Nanite_Compound' => $NaniteCompound,
        'Power_Circuit' => $PowerCircuit,
        'Power_Conduit' => $PowerConduit,
        'Scorched_Telemetry_Processor' => $ScorchedTelemetryProcessor,
        'SCS_IBeam' => $SingleCrystalSuperalloyIBeam,
        'Smashed_Trigger_Unit' => $SmashedTriggerUnit,
        'Tangled_Power_Conduit' => $TangledPowerConduit,
        'Telemetry_Processor' => $TelemetryProcessor,
        'Thruster_Console' => $ThrusterConsole,
        'Trigger_Unit' => $TriggerUnit,
        'Tripped_Power_Circuit' => $TrippedPowerCircuit,
        'Ward_Console' => $WardConsole,
    );
    
    $contract = SalvageContractValue($contractTime, $corporation, $post);
    PrintContractHTMLHeader('/../images/bgs/pi_bg_blur.jpg');
    printf("<body>");

    PrintNavBarContracts($corporation);
    PrintTitle();
?>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Contract Instruction Sheet</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                - The area below displays the details of the contract to make out to Spatial Forcese.<br>
                - The Contract To is whom you make out the contract to.<br>
                - Contract Type should <strong>always</strong> be Item Exchange and Private.<br>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Contract Details</strong><br></h3>
            </div>
            <div class="panel-body">
                <table class="table-bordered table-striped">
                    <tr>
                        <td>Contract To</td>
                        <td>Contract Type</td>
                        <td>Contract Length</td>
                        <td>Contract Value</td>
                    </tr>
                    <tr>
                        <td>Spatial Forces</td>
                        <td>Private</td>
                        <td>2 weeks</td>
                        <td><?php echo number_format($contract["Value"], 2, '.', ','); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><strong>Contract Contents</strong><br></h1>
            </div>
        </div>
            <div class="panel-body">
                <?php 
                    PrintContractContents($contract["Number"], 'SalvageContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    