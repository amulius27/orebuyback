<?php define('indexes', TRUE);
include '../input_pi_t2.php';
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
            - In the Calculator below you can enter the amounts for each Ore that you want to sell.<br>
            - Once done click on the <strong>Invoice</strong> price to submit the contract.<br>
            - The contract will be submitted to the database, and contract details will be printed on the next page.<br>
            <span style="font-family: Arial; color: #FF2A2A;"><strong>- Contract max is 500m ISK at a time, will allow for faster processing of the contracts.</strong></span>
            <hr>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated on: <?php echo $update ?></strong></span><br>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Ore prices are mineral based</strong></span><br>
            <span style="font-family: Arial; color: white;"<strong>Corporation: </strong> <?php echo $corporation ?></span><br>
            <span style="font-family: Arial; color: white;"<strong>Alliance Tax Rate: </strong>  <?php echo $alliance_tax ?> %</span><br>
            <span style="font-family: Arial; color: white;"<strong>Corp Tax Rate: </strong>  <?php echo $corpTax ?> %</span><br>
            <span style="font-family: Arial; color: white;"<strong>TotalTax Rate: </strong>  <?php echo $total_tax ?> %</span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<!-- Calculate -->

<div class="container">
    <div class="row">
        <form action="contracts/pi_t2_contract.php" method="post">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Biocells <?php echo number_format($Biocells, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Biocells" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Biocells"
                                   id="calc-input-Biocells_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Construction Blocks <?php echo number_format($Construction_Blocks, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Construction Blocks" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="	Construction Blocks"
                                   id="calc-input-Construction_Blocks_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Consumer Electronics <?php echo number_format($Consumer_Electronics, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Consumer Electronics" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Consumer Electronics"
                                   id="calc-input-Consumer_Electronics_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Coolant <?php echo number_format($Coolant, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Coolant" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Coolant"
                                   id="calc-input-Coolant_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Enriched Uranium <?php echo number_format($Enriched_Uranium, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Enriched Uranium" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Enriched Uranium"
                                   id="calc-input-Enriched_Uranium_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Fertilizer <?php echo number_format($Fertilizer, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Fertilizer" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Fertilizer"
                                   id="calc-input-Fertilizer_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Gen. Enhanced Livestock <?php echo number_format($Gen_Enhanced_livestock, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Gen. Enhanced Livestock" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Gen. Enhanced Livestock"
                                   id="calc-input-Gen_Enhanced_Livestock_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Livestock <?php echo number_format($Livestock, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Livestock" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Livestock"
                                   id="calc-input-Livestock_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Mechanical Parts <?php echo number_format($Mechanical_Parts, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Mechanical Parts" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Mechanical Parts"
                                   id="calc-input-Mechanical_Parts_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Microfiber Shielding <?php echo number_format($Microfiber_Shielding, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Microfiber Shielding" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Microfiber Shielding"
                                   id="calc-input-Microfiber_Shielding_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Miniature Electronics <?php echo number_format($Miniature_Electronics, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Miniature Electronics" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Miniature Electronics"
                                   id="calc-input-Miniature_Electronics_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Nanites <?php echo number_format($Nanites, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Nanites" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Nanites"
                                   id="calc-input-Nanites_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Oxides <?php echo number_format($Oxides, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Oxides" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Oxides"
                                   id="calc-input-Oxides_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Polyaramids <?php echo number_format($Polyaramids, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Polyaramids" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Polyaramids"
                                   id="calc-input-Polyaramids_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Polytextiles <?php echo number_format($Polytextiles, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Polytextiles" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Polytextiles"
                                   id="calc-input-Polytextiles_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Rocket Fuel <?php echo number_format($Rocket_Fuel, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Rocket Fuel" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Rocket Fuel"
                                   id="calc-input-Rocket_Fuel_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Silicate Glass <?php echo number_format($Silicate_Glass, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Silicate Glass" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Silicate Glass"
                                   id="calc-input-Silicate_Glass_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Superconductors <?php echo number_format($Superconductors, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Superconductors" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Superconductors"
                                   id="calc-input-Superconductors_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Supertensile Plastics <?php echo number_format($Supertensile_Plastics, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Supertensile Plastics" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Supertensile Plastics"
                                   id="calc-input-Supertensile_Plastics_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Synthetic Oil <?php echo number_format($Synthetic_Oil, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Synthetic Oil" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Synthetic Oil"
                                   id="calc-input-Synthetic_Oil_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Test Cultures <?php echo number_format($Test_Cultures, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Test Cultures" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Test Cultures"
                                   id="calc-input-Test_Cultures_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Transmitter <?php echo number_format($Transmitter, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Transmitter" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Transmitter"
                                   id="calc-input-Transmitter_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Viral Agent <?php echo number_format($Viral_Agent, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Viral Agent" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Viral Agent"
                                   id="calc-input-Viral_Agent_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Water-Cooled CPU <?php echo number_format($Water_Cooled_CPU, 2, ',', '.');?> ISK/Unit</label>

                        <div class="input-group form-control" id="Water-Cooled CPU" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Water-Cooled CPU"
                                   id="calc-input-Water_Cooled_CPU_units-value">
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
                        <p id="calc-output-row">Total Biocells value <span class="pull-right"><span id="calc-output-biocells-value"></span></p>
                        <p id="calc-output-row">Total Construction Blocks value <span class="pull-right"><span id="calc-output-construction_blocks-value"></span></p>
                        <p id="calc-output-row">Total Consumer Electronics value <span class="pull-right"><span id="calc-output-consumer_electronics-value"></span></p>
                        <p id="calc-output-row">Total Coolant value <span class="pull-right"><span id="calc-output-coolant-value"></span></p>
                        <p id="calc-output-row">Total Enriched Uranium value <span class="pull-right"><span id="calc-output-enriched_uranium-value"></span></p>
                        <p id="calc-output-row">Total Fertilizer value <span class="pull-right"><span id="calc-output-fertilizer-value"></span></p>
                        <p id="calc-output-row">Total Gen. Enhanced Livestock value <span class="pull-right"><span id="calc-output-gen_enhanced_livestock-value"></span></p>
                        <p id="calc-output-row">Total Livestock value <span class="pull-right"><span id="calc-output-livestock-value"></span></p>
                        <p id="calc-output-row">Total Mechanical Parts value <span class="pull-right"><span id="calc-output-mechanical_parts-value"></span></p>
                        <p id="calc-output-row">Total Microfiber Shielding value <span class="pull-right"><span id="calc-output-microfiber_shielding-value"></span></p>
                        <p id="calc-output-row">Total Miniature Electronics value <span class="pull-right"><span id="calc-output-miniature_electronics-value"></span></p>
                        <p id="calc-output-row">Total Nanites value <span class="pull-right"><span id="calc-output-nanites-value"></span></p>
                        <p id="calc-output-row">Total Oxides value <span class="pull-right"><span id="calc-output-oxides-value"></span></p>
                        <p id="calc-output-row">Total Polyaramids value <span class="pull-right"><span id="calc-output-polyaramids-value"></span></p>
                        <p id="calc-output-row">Total Polytextiles value <span class="pull-right"><span id="calc-output-polytextiles-value"></span></p>
                        <p id="calc-output-row">Total Rocket Fuel value <span class="pull-right"><span id="calc-output-rocket_fuel-value"></span></p>
                        <p id="calc-output-row">Total Silicate Glass value <span class="pull-right"><span id="calc-output-silicate_glass-value"></span></p>
                        <p id="calc-output-row">Total Superconductors value <span class="pull-right"><span id="calc-output-superconductors-value"></span></p>
                        <p id="calc-output-row">Total Supertensile Plastics value <span class="pull-right"><span id="calc-output-supertensile_plastics-value"></span></p>
                        <p id="calc-output-row">Total Synthetic Oil value <span class="pull-right"><span id="calc-output-synthetic_oil-value"></span></p>
                        <p id="calc-output-row">Total Test Cultures value <span class="pull-right"><span id="calc-output-test_cultures-value"></span></p>
                        <p id="calc-output-row">Total Transmitter value <span class="pull-right"><span id="calc-output-transmitter-value"></span></p>
                        <p id="calc-output-row">Total Viral Agent value <span class="pull-right"><span id="calc-output-viral_agent-value"></span></p>
                        <p id="calc-output-row">Total Water-Cooled CPU value <span class="pull-right"><span id="calc-output-cpu-value"></span></p>
                        <hr>
                        <p id="calc-output-reward-row">
                                <b>Contract Value    </b><strong class="pull-right" id="calc-output-reward-value"></strong><br>
                                <br><input class="form-contorl pull-left" type="submit" value="Submit Contract">
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
    <script src="js/t2_pi_cal.js"></script>

</body>
</html>