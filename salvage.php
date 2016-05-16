<?php define('indexes', TRUE);
include '../input_salvage.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Buy Up Indexes | Lone Star Warriors</title>
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
            top: 60px;
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
<!--Navigation-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="images/logo-wide.png" style="margin-top: -7px;"></a>
    </div>
    <div class="collapse navbar-collapse pull-right">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="../../index.html">Mainpage</a></li>
            <li><a href="../../eve.html">Eve Page</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img
                        src="images/settings.png"><b class="caret"></b></a>
                <ul class="dropdown-menu pull-right">
                    <li class="dropdown-header">Applications</li>
                    <li><a href="#">EvE Online Applications</a></li>
                    <li><a href="#" onclick="clearCookies();location.reload();">Clear all cookies</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--Navigation-->

<div class="central-header">
    <h1>Buying to make your lives easier.</h1>
    <h4 class="text-danger">These pages are still undergoing heavy development. Report any issues on our public
        forums!</h4>
</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Instruction Sheet</strong></span><br></h3>
        </div>
        <div class="panel-body" align="center">
            - In the Calculator below you can enter the amounts for each Salvage piece that you want to sell.<br>
            - Once done you can see the total value of each item and the final price in the <strong>Invoice</strong>
            panel.<br>
            - All you have to do now is click on the <strong>Contract Value</strong> price that is given<br>
            - This will open a "Copy to clipboard" window with a easy to copy number to use in the EVE Contract window.<br>
            <span style="font-family: Arial; color: #FF2A2A;"><strong>- Contract between 200-300 mil ISK at a time, this to allow for faster processing of the contracts.</strong></span>
        <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated
                on: <?php echo number_format($string = implode("", $update[0]), 2, ',', '.');?></strong></span>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Contract Type</th>
            <th class="text-right">Availability</th>
            <th class="text-right">I will receive</th>
            <th class="text-right">Expire</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Item Exchange</td>
            <td class="text-right">My Corporation or <strong><span class="eve-link" onmouseover="popCorp($(this), 98259161, 'Lone Star Warriors');">Lone Star Warriors</span></strong>
            </td>
            <td class="text-right">Value from Invoice below</td>
            <td class="text-right">2 Weeks</td>
        </tr>
        </tbody>
    </table>
</div>

<!-- Calculate -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Calculator</strong></h3>
                </div>
                <div class="panel-body">
                    <p style="text-align:left;"><strong>Alloyed Tritanium Bar <span style="float:right;"><?php echo number_format($AlloyedTritaniumBar, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Alloyed Tritanium Bar" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Alloyed Tritanium Bar"
                               id="calc-input-Alloyed_Tritanium_Bar_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Armor Plates <span style="float:right;"><?php echo number_format($ArmorPlates, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Armor Plates" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Armor Plates"
                               id="calc-input-Armor_Plates_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Artificial Neural Network <span style="float:right;"><?php echo number_format($ArtificialNeuralNetwork, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Artificial Neural Network" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Artificial Neural Network"
                               id="calc-input-Artificial_Neural_Network_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Broken Drone Transceiver <span style="float:right;"><?php echo number_format($BrokenDroneTransceiver, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Broken Drone Transceiver" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Broken Drone Transceiver"
                               id="calc-input-Broken_Drone_Transceiver_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Burned Logic Circuit <span style="float:right;"><?php echo number_format($BurnedLogicCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Burned Logic Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Burned Logic Circuit"
                               id="calc-input-Burned_Logic_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Capacitor Console <span style="float:right;"><?php echo number_format($CapacitorConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Capacitor Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Capacitor Console"
                               id="calc-input-Capacitor_Console_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Charred Micro Circuit <span style="float:right;"><?php echo number_format($CharredMicroCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Charred Micro Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Charred Micro Circuit"
                               id="calc-input-Charred_Micro_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Conductive Polymer <span style="float:right;"><?php echo number_format($ConductivePolymer, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Conductive Polymer" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Conductive Polymer"
                               id="calc-input-Conductive_Polymer_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Conductive Thermoplastic <span style="float:right;"><?php echo number_format($ConductiveThermoplastic, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Conductive Thermoplastic" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Conductive Thermoplastic"
                               id="calc-input-Conductive_Thermoplastic_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Contaminated Lorentz Fluid <span style="float:right;"><?php echo number_format($ContaminatedLorentzFluid, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Contaminated Lorentz Fluid" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Contaminated Lorentz Fluid"
                               id="calc-input-Contaminated_Lorentz_Fluid_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Contaminated Nanite Compound <span style="float:right;"><?php echo number_format($ContaminatedNaniteCompound, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Contaminated Nanite Compound" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Contaminated Nanite Compound"
                               id="calc-input-Contaminated_Nanite_Compound_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Current Pump<span style="float:right;"> <?php echo number_format($CurrentPump, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Current Pump" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Current Pump"
                               id="calc-input-Current_Pump_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Damaged Artificial Neural Network<span style="float:right;"> <?php echo number_format($DamagedArtificialNeuralNetwork, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Damaged Artificial Neural Network" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Damaged Artificial Neural Network"
                               id="calc-input-Damaged_Artificial_Neural_Network_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Defective Current Pump <span style="float:right;"> <?php echo number_format($DefectiveCurrentPump, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Defective Current Pump" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Defective Current Pump"
                               id="calc-input-Defective_Current_Pump_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Drone Transceiver<span style="float:right;"> <?php echo number_format($DroneTransceiver, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Drone Transceiver" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Drone Transceiver"
                               id="calc-input-Drone_Transceiver_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Enhanced Ward Console<span style="float:right;">  <?php echo number_format($EnhancedWardConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Enhanced Ward Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Enhanced Ward Console"
                               id="calc-input-Enhanced_Ward_Console_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Fried Interface Circuit <span style="float:right;"><?php echo number_format($FriedInterfaceCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Fried Interface Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Fried Interface Circuit"
                               id="calc-input-Fried_Interface_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Impetus Console  <span style="float:right;"><?php echo number_format($ImpetusConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Impetus Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Impetus Console"
                               id="calc-input-Impetus_Console_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Intact Armor Plates<span style="float:right;"> <?php echo number_format($IntactArmorPlates, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Intact Armor Plates" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Intact Armor Plates"
                               id="calc-input-Intact_Armor_Plates_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Intact Shield Emitter <span style="float:right;"> <?php echo number_format($IntactShieldEmitter, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Intact Shield Emitter" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Intact Shield Emitter"
                               id="calc-input-Intact_Shield_Emitter_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Interface Circuit<span style="float:right;"> <?php echo number_format($InterfaceCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Interface Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Interface Circuit"
                               id="calc-input-Interface_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Logic Circuit <span style="float:right;"> <?php echo number_format($LogicCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Logic Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Logic Circuit"
                               id="calc-input-Logic_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Lorentz Fluid <span style="float:right;"> <?php echo number_format($LorentzFluid, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Lorentz Fluid" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Lorentz Fluid"
                               id="calc-input-Lorentz_Fluid_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Malfunctioning Shield Emitter  <span style="float:right;"><?php echo number_format($MalfunctioningShieldEmitter, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Malfunctioning Shield Emitter" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Malfunctioning Shield Emitter"
                               id="calc-input-Malfunctioning_Shield_Emitter_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Melted Capacitor Console <span style="float:right;"><?php echo number_format($MeltedCapacitorConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Melted Capacitor Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Melted Capacitor Console"
                               id="calc-input-Melted_Capacitor_Console_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Micro Circuit  <span style="float:right;"><?php echo number_format($MicroCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Micro Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Micro Circuit"
                               id="calc-input-Micro_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Nanite Compound <span style="float:right;"><?php echo number_format($NaniteCompound, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Nanite Compound" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Nanite Compound"
                               id="calc-input-Nanite_Compound_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Power Circuit  <span style="float:right;"><?php echo number_format($PowerCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Power Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Power Circuit"
                               id="calc-input-Power_Circuit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Power Conduit <span style="float:right;"><?php echo number_format($PowerConduit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Power Conduit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Power Conduit"
                               id="calc-input-Power_Conduit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Scorched Telemetry Processor  <span style="float:right;"><?php echo number_format($ScorchedTelemetryProcessor, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Scorched Telemetry Processor" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Scorched Telemetry Processor"
                               id="calc-input-Scorched_Telemetry_Processor_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Single-crystal Superalloy I-beam <span style="float:right;"><?php echo number_format($SingleCrystalSuperalloyIBeam, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Single-crystal Superalloy I-beam" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Single-crystal Superalloy I-beam"
                               id="calc-input-Single_crystal_Superalloy_I_beam_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Smashed Trigger Unit <span style="float:right;"><?php echo number_format($SmashedTriggerUnit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Smashed Trigger" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Smashed Trigger"
                               id="calc-input-Smashed_Trigger_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Tangled Power Conduit <span style="float:right;"><?php echo number_format($TangledPowerConduit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Tangled Power Conduit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Tangled Power Conduit"
                               id="calc-input-Tangled_Power_Conduit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Telemetry Processor <span style="float:right;"><?php echo number_format($TelemetryProcessor, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Telemetry Processor" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Telemetry Processor"
                               id="calc-input-Telemetry_Processor_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Thruster Console <span style="float:right;"><?php echo number_format($ThrusterConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Thruster Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Thruster Console"
                               id="calc-input-Thruster_Console_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Trigger Unit  <span style="float:right;"><?php echo number_format($TriggerUnit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Trigger Unit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Trigger Unit"
                               id="calc-input-Trigger_Unit_units-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Tripped Power Circuit <span style="float:right;"><?php echo number_format($TrippedPowerCircuit, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Tripped Power Circuit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Tripped Power Circuit"
                               id="calc-input-Tripped_Power_Circuit-value">
                    </div>
                    </p>
                    <p style="text-align:left;"><strong>Ward Console  <span style="float:right;"><?php echo number_format($WardConsole, 2, ',', '.');?> ISK/Unit</span></strong></p>

                    <div class="input-group form-control" id="Ward Console" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Ward Console"
                               id="calc-input-Ward_Console_units-value">
                    </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Invoice</strong>
                        <label data-html="true" data-original-title="<b>Fees</b>" class="popover-reward text-info"
                               data-toggle="popover" data-content="
                    <span>
			<p>In this invoice window you can see how the price is build up for each individual mineral</p>
			<p>The <strong>Contract Value</strong> price is the total of the material values.</p>
			<hr>
                        <p>The <b>Contract Value</b> is what you have to use as <i>'I will receive'</i> in the contract.</p>
                    </span>">[?]</label>
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
                        <b>Contract Value</b> <a href="#" class="pull-right" onclick="$('#clipboard').modal('show');$('#clipboard-content').val(calcNow()).select();">
                            <strong id="calc-output-reward-value"></strong>
                        </a>
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Calculate -->

<!-- Footer -->
<div class="clearfix"></div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><strong>Buy Up Indexes brought to you by <span class="eve-link" onmouseover="popCorp($(this), 98259161, 'Lone Star Warriors');">Lone Star Warriors</span></strong></h3>
        </div>
        <div class="panel-body" align="center">
            <ul class="social">
                <li>
                    <a href=
                       "https://www.facebook.com/lonestarwarriorsgaming"><i class="fa">
                        </i></a>
                </li>

                <li>
                    <a href="https://twitter.com/lone_warriors"><i class=
                                                                   "fb"></i></a>
                </li>

                <li>
                    <a href=
                       "https://plus.google.com/+lonestarwarriorsgaming"><i class="fc">
                        </i></a>
                </li>
            </ul>

            <p>
                2015 Design by <a href="#">Joery Pigmans</a>. All rights
                reserved.
            </p>

            <p>
                EVE Online and the EVE logo are the registered trademarks
                of CCP hf. All rights are reserved worldwide. All other
                trademarks are the property of their respective owners. EVE
                Online, the EVE logo, EVE and all associated logos and
                designs are the intellectual property of CCP hf. All
                artwork, screenshots, characters, vehicles, storylines,
                world facts or other recognizable features of the
                intellectual property relating to these trademarks are
                likewise the intellectual property of CCP hf. CCP hf. has
                granted permission to Joery Pigmans to use EVE Online and
                all associated logos and designs for promotional and
                information purposes on its website but does not endorse,
                and is not in any way affiliated with, Joery Pigmans. CCP
                is in no way responsible for the content on or functioning
                of this website, nor can it be liable for any damage
                arising from the use of this website.
            </p>
        </div>
    </div>
    <!-- Footer -->

    <!-- Popups -->
    <div class="hide" id="popcorp" style="background:white;">
        <table style='border: 1px solid;'>
            <thead>
            <tr style='border-bottom: 1px solid;'>
                <th colspan='3' style='padding-left:2px;' id="popcorp-name">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width='64' height='64' style='padding:2px; background-repeat:no-repeat; background-position:center;' id="popcorp-image">&nbsp;</td>
                <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popcorp-content-1">&nbsp;</td>
                <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popcorp-content-2">&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Popups -->

    <!-- Clipboard -->
    <div class="modal" id="clipboard" tabindex="-1" role="dialog" aria-labelledby="clipboardLabel" aria-hidden="true" onkeydown="if (event.keyCode == 13) $('#clipboard').modal('hide');">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="clipboardLabel">Copy to clipboard: CTRL-C, Enter</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control text-right" id="clipboard-content">
                </div>
            </div>
        </div>
    </div>
    <!-- Clipboard -->

    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <script src="js/handlebars-v1.3.0.js"></script>
    <script src="js/sal_cal.js"></script>

</body>
</html>