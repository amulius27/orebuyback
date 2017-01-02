<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_salvage.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buy Back Program" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Warped Intentions Buy Back Program</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(images/bgs/salvage_bg.jpg);
            background-repeat:no-repeat;
            background-attachment: fixed;
        }
        .affix {
            top: 75px;
        }
        .affix-bottom {
            position: absolute;
        }
    </style>
    <script>
        $(function() {
            var $affix = $("#invoice-panel"),
                $parent = $affix.parent(),
                resize = function() { $affix.width($parent.width()); };
            $(window).resize(resize);
            resize();
        });
    </script>
</head>
<body>
<?php
    PrintNavBar();
    PrintTitle();
?>
    
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Instruction Sheet</strong></span><br></h3>
        </div>
        <div class="panel-body" align="center">
            - In the Calculator below you can enter the amounts for each item that you want to sell back to the alliance.<br>
            - Once done click on the <strong>Submit Contract</strong> button to submit the contract.<br>
            - The contract will be submitted to the database, and contract details will be printed on the next page.<br>
            - After submitting the contract, make the contract out in Eve to Spatial Forces with the information displayed on the page.<br>
            <span style="font-family: Arial; color: #FF2A2A;"><strong>- Contract max is <?php echo $contractLimit; ?> at a time, will allow for faster processing of the contracts.</strong></span>
            <hr>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated on: <?php echo $update ?></strong></span><br>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Ore prices are mineral based</strong></span><br>
            <span style="font-family: Arial; color: white;"><strong>Corporation: </strong> <?php echo $corporation ?></span><br>
            <span style="font-family: Arial; color: white;"><strong>Alliance Tax Rate: </strong>  <?php echo $alliance_tax ?> %</span><br>
            <span style="font-family: Arial; color: white;"><strong>Corp Tax Rate: </strong>  <?php echo $corpTax ?> %</span><br>
            <span style="font-family: Arial; color: white;"><strong>TotalTax Rate: </strong>  <?php echo $total_tax ?> %</span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<!-- Calculate -->

<div class="container">
    <div class="row">
        <form action="contracts/salvage_contract.php" method="POST">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Alloyed Tritanium Bar <?php echo number_format($AlloyedTritaniumBar, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Alloyed Tritanium Bar" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Alloyed_Tritanium_Bar" placeholder="Alloyed Tritanium Bar" id="calc-input-Alloyed_Tritanium_Bar_units-value">
                            </div>
                        </p>
                        <p><
                            label>Armor Plates <?php echo number_format($ArmorPlates, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Armor Plates" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Armor_Plates" placeholder="Armor Plates" id="calc-input-Armor_Plates_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Artificial Neural Network <?php echo number_format($ArtificialNeuralNetwork, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Artificial Neural Network" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Artifical_Neural_Network" placeholder="Artificial Neural Network" id="calc-input-Artificial_Neural_Network_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Broken Drone Transceiver <?php echo number_format($BrokenDroneTransceiver, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Broken Drone Transceiver" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Broken_Drone_Transceiver" placeholder="Broken Drone Transceiver" id="calc-input-Broken_Drone_Transceiver_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Burned Logic Circuit <?php echo number_format($BurnedLogicCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Burned Logic Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Burned_Logic_Circuit" placeholder="Burned Logic Circuit" id="calc-input-Burned_Logic_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Capacitor Console <?php echo number_format($CapacitorConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Capacitor Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Capacitor_Circuit_Console" placeholder="Capacitor Console" id="calc-input-Capacitor_Console_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Charred Micro Circuit <?php echo number_format($CharredMicroCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Charred Micro Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Charred_Micro_Circuit" placeholder="Charred Micro Circuit" id="calc-input-Charred_Micro_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Conductive Polymer <?php echo number_format($ConductivePolymer, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Conductive Polymer" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Conductive_Polymer" placeholder="Conductive Polymer" id="calc-input-Conductive_Polymer_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Conductive Thermoplastic <?php echo number_format($ConductiveThermoplastic, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Conductive Thermoplastic" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Conductive_Thermoplastic" placeholder="Conductive Thermoplastic" id="calc-input-Conductive_Thermoplastic_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Contaminated Lorrentz Fluid <?php echo number_format($ContaminatedLorentzFluid, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Contaminated Lorentz Fluid" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Contaminated_Lorrentz_Fluid" placeholder="Contaminated Lorrentz Fluid" id="calc-input-Contaminated_Lorentz_Fluid_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Contaminated Nanite Compound <?php echo number_format($ContaminatedNaniteCompound, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Contaminated Nanite Compound" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Contaminated_Nanite_Compound" placeholder="Contaminated Nanite Compound" id="calc-input-Contaminated_Nanite_Compound_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Current Pump <?php echo number_format($CurrentPump, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Current Pump" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Current_Pump" placeholder="Current Pump" id="calc-input-Current_Pump_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Damaged Artificial Neural Network <?php echo number_format($DamagedArtificialNeuralNetwork, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="Damaged Artificial Neural Network" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Damaged_Artificial_Neural_Network" placeholder="Damaged Artificial Neural Network" id="calc-input-Damaged_Artificial_Neural_Network_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Defective Current Pump  <?php echo number_format($DefectiveCurrentPump, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Defective Current Pump" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Defective_Current_Pump" placeholder="Defective Current Pump" id="calc-input-Defective_Current_Pump_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Drone Transceiver <?php echo number_format($DroneTransceiver, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Drone Transceiver" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Drone_Transceiver" placeholder="Drone Transceiver" id="calc-input-Drone_Transceiver_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Enhanced Ward Console  <?php echo number_format($EnhancedWardConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Enhanced Ward Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Enhanced_Ward_Console" placeholder="Enhanced Ward Console" id="calc-input-Enhanced_Ward_Console_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Fried Interface Circuit <?php echo number_format($FriedInterfaceCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Fried Interface Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Fried_Interface_Circuit" placeholder="Fried Interface Circuit" id="calc-input-Fried_Interface_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Impetus Console  <?php echo number_format($ImpetusConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Impetus Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Impetus_Console" placeholder="Impetus Console" id="calc-input-Impetus_Console_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Intact Armor Plates <?php echo number_format($IntactArmorPlates, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Intact Armor Plates" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Intact_Armor_Plates" placeholder="Intact Armor Plates" id="calc-input-Intact_Armor_Plates_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Intact Shield Emitter  <?php echo number_format($IntactShieldEmitter, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Intact Shield Emitter" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Intact_Shield_Emitter" placeholder="Intact Shield Emitter" id="calc-input-Intact_Shield_Emitter_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Interface Circuit <?php echo number_format($InterfaceCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Interface Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Interface_Circuit" placeholder="Interface Circuit" id="calc-input-Interface_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Logic Circuit  <?php echo number_format($LogicCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Logic Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Logic_Circuit" placeholder="Logic Circuit" id="calc-input-Logic_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Lorrentz Fluid  <?php echo number_format($LorentzFluid, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Lorentz Fluid" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Lorrentz_Fluid" placeholder="Lorentz Fluid" id="calc-input-Lorentz_Fluid_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Malfunctioning Shield Emitter  <?php echo number_format($MalfunctioningShieldEmitter, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Malfunctioning Shield Emitter" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Malfunctioning_Shield_Emitter" placeholder="Malfunctioning Shield Emitter" id="calc-input-Malfunctioning_Shield_Emitter_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Melted Capacitor Console <?php echo number_format($MeltedCapacitorConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Melted Capacitor Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Melted_Capacitor_Console" placeholder="Melted Capacitor Console" id="calc-input-Melted_Capacitor_Console_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Micro Circuit  <?php echo number_format($MicroCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Micro Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Micro_Circuit" placeholder="Micro Circuit" id="calc-input-Micro_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Nanite Compound <?php echo number_format($NaniteCompound, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Nanite Compound" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Nanite_Compound" placeholder="Nanite Compound" id="calc-input-Nanite_Compound_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Power Circuit  <?php echo number_format($PowerCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Power Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Power_Circuit" placeholder="Power Circuit" id="calc-input-Power_Circuit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Power Conduit <?php echo number_format($PowerConduit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Power Conduit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Power_Conduit" placeholder="Power Conduit" id="calc-input-Power_Conduit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Scorched Telemetry Processor  <?php echo number_format($ScorchedTelemetryProcessor, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Scorched Telemetry Processor" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Scorched_Telemetry" placeholder="Scorched Telemetry Processor" id="calc-input-Scorched_Telemetry_Processor_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Single-crystal Superalloy I-beam <?php echo number_format($SingleCrystalSuperalloyIBeam, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Single-crystal Superalloy I-beam" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Single-crystal_Superalloy_I-beam" placeholder="Single-crystal Superalloy I-beam" id="calc-input-Single_crystal_Superalloy_I_beam_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Smashed Trigger Unit <?php echo number_format($SmashedTriggerUnit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Smashed Trigger" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Smashed_Trigger" placeholder="Smashed Trigger" id="calc-input-Smashed_Trigger_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Tangled Power Conduit <?php echo number_format($TangledPowerConduit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Tangled Power Conduit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Tangled_Power_Conduit" placeholder="Tangled Power Conduit" id="calc-input-Tangled_Power_Conduit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Telemetry Processor <?php echo number_format($TelemetryProcessor, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Telemetry Processor" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Telemetry_Processor" placeholder="Telemetry Processor" id="calc-input-Telemetry_Processor_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Thruster Console <?php echo number_format($ThrusterConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Thruster Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Thruster_Console" placeholder="Thruster Console" id="calc-input-Thruster_Console_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Trigger Unit  <?php echo number_format($TriggerUnit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Trigger Unit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Trigger_Unit" placeholder="Trigger Unit" id="calc-input-Trigger_Unit_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Tripped Power Circuit <?php echo number_format($TrippedPowerCircuit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Tripped Power Circuit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Tripped_Power_Circuit" placeholder="Tripped Power Circuit" id="calc-input-Tripped_Power_Circuit-value">
                            </div>
                        </p>
                        <p>
                            <label>Ward Console  <?php echo number_format($WardConsole, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Ward Console" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Ward_Console" placeholder="Ward Console" id="calc-input-Ward_Console_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Invoice</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Alloyed Tritanium Bar value <span class="pull-right"><span id="calc-output-Alloyed_Tritanium_Bar-value"></span></p>
                        <p id="calc-output-row">Total Armor Plates value <span class="pull-right"><span id="calc-output-Armor_Plates-value"></span></p>
                        <p id="calc-output-row">Total Artificial Neural Network value <span class="pull-right"><span id="calc-output-Artificial_Neural_Network-value"></span></p>
                        <p id="calc-output-row">Total Broken Drone Transceiver value <span class="pull-right"><span id="calc-output-Broken_Drone_Transceiver-value"></span></p>
                        <p id="calc-output-row">Total Burned Logic Circuit value <span class="pull-right"><span id="calc-output-Burned_Logic_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Capacitor Console value <span class="pull-right"><span id="calc-output-Capacitor_Console-value"></span></p>
                        <p id="calc-output-row">Total Charred Micro Circuit value <span class="pull-right"><span id="calc-output-Charred_Micro_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Conductive Polymer value <span class="pull-right"><span id="calc-output-Conductive_Polymer-value"></span></p>
                        <p id="calc-output-row">Total Conductive Thermoplastic value <span class="pull-right"><span id="calc-output-Conductive_Thermoplastic-value"></span></p>
                        <p id="calc-output-row">Total Contaminated Lorentz Fluid value <span class="pull-right"><span id="calc-output-Contaminated_Lorentz_Fluid-value"></span></p>
                        <p id="calc-output-row">Total Contaminated Nanite Compound value <span class="pull-right"><span id="calc-output-Contaminated_Nanite_Compound-value"></span></p>
                        <p id="calc-output-row">Total Current Pump value <span class="pull-right"><span id="calc-output-Current_Pump-value"></span></p>
                        <p id="calc-output-row">Total Damaged Artificial Neural Network value <span class="pull-right"><span id="calc-output-Damaged_Artificial_Neural_Network-value"></span></p>
                        <p id="calc-output-row">Total Defective Current Pump value <span class="pull-right"><span id="calc-output-Defective_Current_Pump-value"></span></p>
                        <p id="calc-output-row">Total Drone Transceiver value <span class="pull-right"><span id="calc-output-Drone_Transceiver-value"></span></p>
                        <p id="calc-output-row">Total Enhanced Ward Console value <span class="pull-right"><span id="calc-output-Enhanced_Ward_Console-value"></span></p>
                        <p id="calc-output-row">Total Fried Interface Circuit value <span class="pull-right"><span id="calc-output-Fried_Interface_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Impetus Console value <span class="pull-right"><span id="calc-output-Impetus_Console-value"></span></p>
                        <p id="calc-output-row">Total Intact Armor Plates value <span class="pull-right"><span id="calc-output-Intact_Armor_Plates-value"></span></p>
                        <p id="calc-output-row">Total Intact Shield Emitter value <span class="pull-right"><span id="calc-output-Intact_Shield_Emitter-value"></span></p>
                        <p id="calc-output-row">Total Interface Circuit value <span class="pull-right"><span id="calc-output-Interface_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Logic Circuit value <span class="pull-right"><span id="calc-output-Logic_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Lorentz Fluid value <span class="pull-right"><span id="calc-output-Lorentz_Fluid-value"></span></p>
                        <p id="calc-output-row">Total Malfunctioning Shield Emitter value <span class="pull-right"><span id="calc-output-Malfunctioning_Shield_Emitter-value"></span></p>
                        <p id="calc-output-row">Total Melted Capacitor Console value <span class="pull-right"><span id="calc-output-Melted_Capacitor_Console-value"></span></p>
                        <p id="calc-output-row">Total Micro Circuit value <span class="pull-right"><span id="calc-output-Micro_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Nanite Compound value <span class="pull-right"><span id="calc-output-Nanite_Compound-value"></span></p>
                        <p id="calc-output-row">Total Power Circuit value <span class="pull-right"><span id="calc-output-Power_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Power Conduit value <span class="pull-right"><span id="calc-output-Power_Conduit-value"></span></p>
                        <p id="calc-output-row">Total Scorched Telemetry Processor value <span class="pull-right"><span id="calc-output-Scorched_Telemetry_Processor-value"></span></p>
                        <p id="calc-output-row">Total Single-crystal Superalloy I-beam value <span class="pull-right"><span id="calc-output-Single_crystal_Superalloy_I_beam-value"></span></p>
                        <p id="calc-output-row">Total Smashed Trigger Unit value <span class="pull-right"><span id="calc-output-Smashed_Trigger_Unit-value"></span></p>
                        <p id="calc-output-row">Total Tangled Power Conduit value <span class="pull-right"><span id="calc-output-Tangled_Power_Conduit-value"></span></p>
                        <p id="calc-output-row">Total Telemetry Processor value <span class="pull-right"><span id="calc-output-Telemetry_Processor-value"></span></p>
                        <p id="calc-output-row">Total Thruster Console value <span class="pull-right"><span id="calc-output-Thruster_Console-value"></span></p>
                        <p id="calc-output-row">Total Trigger Unit value <span class="pull-right"><span id="calc-output-Trigger_Unit-value"></span></p>
                        <p id="calc-output-row">Total Tripped Power Circuit value <span class="pull-right"><span id="calc-output-Tripped_Power_Circuit-value"></span></p>
                        <p id="calc-output-row">Total Ward Console value <span class="pull-right"><span id="calc-output-Ward_Console-value"></span></p>
                        <hr>
                        <p id="calc-output-reward-row">
                            <b>Contract Value    </b><strong class="pull-right" id="calc-output-reward-value"></strong><br>
                            <br><input class="form-control pull-left" type="submit" value="Submit Contract">
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Calculate -->

<?php
    PrintFooter();
    PrintPopups();
?>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <script src="js/handlebars-v1.3.0.js"></script>
    <script src="js/sal_cal.js"></script>

</body>
</html>