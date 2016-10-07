<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_pi_t3.php';
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
            background-image:url(images/bgs/pi_bg_blur.jpg);
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
        <form action="contracts/pi_t3_contract.php" method="post">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Biotech Research Reports <?php echo number_format($Biotech, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Biotech Research Reports" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Biotech_Research_Reports" placeholder="Biotech Research Reports" id="calc-input-Biotech_Research_Reports_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Camera Drones <?php echo number_format($Camera_Drones, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Camera Drones" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Camera_Drones" placeholder="Camera Drones" id="calc-input-Camera_Drones_Blocks_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Condensates <?php echo number_format($Condensates, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Condensates" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Condensates" placeholder="Condensates" id="calc-input-Condensates_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Cryoprotectant Solution <?php echo number_format($Cryoprotectant_Solution, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Cryoprotectant Solution" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Cryoprotectant_Solution" placeholder="Cryoprotectant Solution" id="calc-input-Cryoprotectant_Solution_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Data Chips <?php echo number_format($Data_Chips, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Data Chips" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Data_Chips" placeholder="Data Chips" id="calc-input-Data_Chips_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Gel-Matrix Biopaste <?php echo number_format($Biopaste, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Gel-Matrix Biopaste" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Gel_Matrix_Biopaste" placeholder="Gel-Matrix Biopaste" id="calc-input-Gel_Matrix_Biopaste_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Guidance Systems <?php echo number_format($Guidance_Systems, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Guidance Systems" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Guidance_Systems" placeholder="Guidance Systems" id="calc-input-Guidance_Systems_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Hazmat Detection Systems <?php echo number_format($Hazmat_Detection_Systems, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Hazmat Detection Systems" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Hazmat_Detection_Systems" placeholder="Hazmat Detection Systems" id="calc-input-Hazmat_Detection_Systems_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Hermetic Membranes <?php echo number_format($Hermetic_Membranes, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Hermetic Membranes" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Hermetic_Membranes" placeholder="Hermetic Membranes" id="calc-input-Hermetic_Membranes_units-value">
                            </div>
                        </p>
                        <p>
                            <label>High-Tech Transmitters <?php echo number_format($Hightech_Transmitters, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="High-Tech Transmitters" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="High_Tech_Transmitters" placeholder="High-Tech Transmitters" id="calc-input-High_Tech_Transmitters_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Industrial Explosives <?php echo number_format($Industrial_Explosives, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Industrial Explosives" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Industrial_Explosives" placeholder="Industrial Explosives" id="calc-input-Industrial_Explosives_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Neocoms <?php echo number_format($Neocoms, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Neocoms" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Neocoms" placeholder="Neocoms" id="calc-input-Neocoms_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Nuclear Reactors <?php echo number_format($Nuclear_Reactors, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Nuclear Reactors" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Nuclear_Reactors" placeholder="Nuclear Reactors" id="calc-input-Nuclear_Reactors_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Planetary Vehicles <?php echo number_format($Planetary_Vehicles, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Planetary Vehicles" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Planetary_Vehicles" placeholder="Planetary Vehicles" id="calc-input-Planetary_Vehicles_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Robotics <?php echo number_format($Robotics, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Robotics" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Robotics" placeholder="Robotics" id="calc-input-Robotics_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Smartfab Units <?php echo number_format($Smartfab_Units, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Smartfab Units" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Smartfab_Units" placeholder="Smartfab Units" id="calc-input-Smartfab_Units_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Supercomputers <?php echo number_format($Supercomputers, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Supercomputers" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Supercomputers" placeholder="Supercomputers" id="calc-input-Supercomputers_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Synthetic Synapses <?php echo number_format($Synthetic_Synapses, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Synthetic Synapses" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Synthetic_Synapses" placeholder="Synthetic Synapses" id="calc-input-Synthetic_Synapses_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Transcranial Microcontrollers <?php echo number_format($Microcontrollers, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="Transcranial Microcontrollers" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Transcranial_Microcontrollers" placeholder="Transcranial Microcontrollers" id="calc-input-Transcranial_Microcontrollers_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Ukomi Superconductors <?php echo number_format($Ukomi, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Ukomi Superconductors" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Ukomi" placeholder="Ukomi Superconductors" id="calc-input-Ukomi_Superconductors_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Vaccines <?php echo number_format($Vaccines, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="Vaccines" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Vaccines" placeholder="Vaccines" id="calc-input-Vaccines_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Invoice</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Biotech Research Reports value <span class="pull-right"><span id="calc-output-biotech-value"></span></p>
                        <p id="calc-output-row">Total Camera Drones value <span class="pull-right"><span id="calc-output-camera_drones-value"></span></p>
                        <p id="calc-output-row">Total Condensates value <span class="pull-right"><span id="calc-output-condensates-value"></span></p>
                        <p id="calc-output-row">Total Cryoprotectant Solution value <span class="pull-right"><span id="calc-output-cryoprotectant-value"></span></p>
                        <p id="calc-output-row">Total Data Chips value <span class="pull-right"><span id="calc-output-data_chips-value"></span></p>
                        <p id="calc-output-row">Total Gel-Matrix Biopaste value <span class="pull-right"><span id="calc-output-gel_matrix-value"></span></p>
                        <p id="calc-output-row">Total Guidance Systems value <span class="pull-right"><span id="calc-output-guidance_systems-value"></span></p>
                        <p id="calc-output-row">Total Hazmat Detection Systems value <span class="pull-right"><span id="calc-output-hazmat_systems-value"></span></p>
                        <p id="calc-output-row">Total Hermetic Membranes value <span class="pull-right"><span id="calc-output-hermetic_membranes-value"></span></p>
                        <p id="calc-output-row">Total High-Tech Transmitters value <span class="pull-right"><span id="calc-output-hightech_transmitters-value"></span></p>
                        <p id="calc-output-row">Total Industrial Explosives value <span class="pull-right"><span id="calc-output-industrial_explosives-value"></span></p>
                        <p id="calc-output-row">Total Neocoms value <span class="pull-right"><span id="calc-output-neocoms-value"></span></p>
                        <p id="calc-output-row">Total Nuclear Reactors value <span class="pull-right"><span id="calc-output-nuclear_reactors-value"></span></p>
                        <p id="calc-output-row">Total Planetary Vehicles value <span class="pull-right"><span id="calc-output-planetary_vehicles-value"></span></p>
                        <p id="calc-output-row">Total Robotics value <span class="pull-right"><span id="calc-output-robotics-value"></span></p>
                        <p id="calc-output-row">Total Smartfab Units value <span class="pull-right"><span id="calc-output-smartfab_units-value"></span></p>
                        <p id="calc-output-row">Total Supercomputers value <span class="pull-right"><span id="calc-output-supercomputers-value"></span></p>
                        <p id="calc-output-row">Total Synthetic Synapses value <span class="pull-right"><span id="calc-output-sythetic_synapses-value"></span></p>
                        <p id="calc-output-row">Total Transcranial Microcontrollers value <span class="pull-right"><span id="calc-output-microcontrollers-value"></span></p>
                        <p id="calc-output-row">Total Ukomi Superconductors value <span class="pull-right"><span id="calc-output-superconductors-value"></span></p>
                        <p id="calc-output-row">Total Vaccines value <span class="pull-right"><span id="calc-output-vaccines-value"></span></p>
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
    <script src="js/t3_pi_cal.js"></script>

</body>
</html>