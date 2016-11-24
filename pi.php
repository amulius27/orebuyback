<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_pi_raw.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buyback Calculator" name="description">
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
        <form action="contracts/pi_contract.php" method="POST">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Aqueous Liquids <?php echo $Aqueous; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="aqueous" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Aqueous_Liquids" placeholder="Aqueous Liquids" id="calc-input-aqueous_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Ionic Solutions <?php echo $Ionic; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="ionic" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Ionic_Solutions" placeholder="Ionic Solutions" id="calc-input-ionic_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Base Metals <?php echo $Base; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="base" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Base_Metals" placeholder="Base Metals" id="calc-input-base_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Heavy Metals <?php echo $Heavy; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="heavy" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Heavy_Metals" placeholder="Heavy Metals" id="calc-input-heavy_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Noble Metals <?php echo $Noble; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="noble" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Noble_Metals" placeholder="Noble Metals" id="calc-input-noble_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Carbon Compounds <?php echo $Carbon; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="carbon" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Carbon_Compounds" placeholder="Carbon Compounds" id="calc-input-carbon_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Micro Organisms <?php echo $Micro; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="micro" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Micro_Organisms" placeholder="Micro Organisms" id="calc-input-micro_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Complex Organisms <?php echo $Complex; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="complex" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Complex_Organisms" placeholder="Complex Organisms" id="calc-input-complex_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Planktic Colonies <?php echo $Planktic; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="planktic" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Planktic_Colonies" placeholder="Planktic Colonies" id="calc-input-planktic_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Noble Gas <?php echo $Noble_Gas; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="noble_gas" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Noble_Gas" placeholder="Noble Gas" id="calc-input-noble_gas_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Reactive Gas <?php echo $Reactive; ?> ISK/Unit</label>
                        <div class="input-group form-control" id="reactive" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Reactive_Gas" placeholder="Reactive Gas" id="calc-input-reactive_units-value">
                        </div>
                        </p>
                        <p>
                            <label>Felsic Magma <?php echo $Felsic; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="felsic" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Felsic_Magma" placeholder="Felsic Magma" id="calc-input-felsic_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Non-CS Crystals <?php echo $Non; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="non_cs" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Non-CS_Crystals" placeholder="Non-CS_Crystals" id="calc-input-non_cs_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Suspended Plasma <?php echo $Suspended; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="suspended" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Suspended_Plasma" placeholder="Suspended Plasma" id="calc-input-suspended_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Autotrophs <?php echo $Autotrophs; ?> ISK/Unit</label>
                            <div class="input-group form-control" id="autotrophs" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Autotrophs" placeholder="Autotrophs" id="calc-input-autotrophs_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Invoice</strong>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <p id="calc-output-row">Total Aqueous Liquids value <span class="pull-right"><span id="calc-output-aqueous-value"></span></p>
                            <p id="calc-output-row">Total Ionic Solutions value <span class="pull-right"><span id="calc-output-ionic-value"></span></p>
                            <p id="calc-output-row">Total Base Metals value <span class="pull-right"><span id="calc-output-base-value"></span></p>
                            <p id="calc-output-row">Total Heavy Metals value <span class="pull-right"><span id="calc-output-heavy-value"></span></p>
                            <p id="calc-output-row">Total Noble Metals value <span class="pull-right"><span id="calc-output-noble-value"></span></p>
                            <p id="calc-output-row">Total Carbon Compounds value <span class="pull-right"><span id="calc-output-carbon-value"></span></p>
                            <p id="calc-output-row">Total Micro Organisms value <span class="pull-right"><span id="calc-output-micro-value"></span></p>
                            <p id="calc-output-row">Total Complex Organisms value <span class="pull-right"><span id="calc-output-complex-value"></span></p>
                            <p id="calc-output-row">Total Planktic Colonies value <span class="pull-right"><span id="calc-output-planktic-value"></span></p>
                            <p id="calc-output-row">Total Noble Gas value <span class="pull-right"><span id="calc-output-noble_gas-value"></span></p>
                            <p id="calc-output-row">Total Reactive Gas value <span class="pull-right"><span id="calc-output-reactive-value"></span></p>
                            <p id="calc-output-row">Total Felsic Magma value <span class="pull-right"><span id="calc-output-felsic-value"></span></p>
                            <p id="calc-output-row">Total Non-CS Crystals value <span class="pull-right"><span id="calc-output-non_cs-value"></span></p>
                            <p id="calc-output-row">Total Suspended Plasma value <span class="pull-right"><span id="calc-output-suspended-value"></span></p>
                            <p id="calc-output-row">Total Autotrophs value <span class="pull-right"><span id="calc-output-autotrophs-value"></span></p>
                            <hr>
                            <p id="calc-output-reward-row">
                            <b>Contract Value    </b><strong class="pull-right" id="calc-output-reward-value"></strong><br>
                            <br><input class="form-control pull-left" type="submit" value="Submit Contract">
                        </p>
                        <br>
                        </div>
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
<script src="js/custom.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/handlebars-v1.3.0.js"></script>
<script src="js/rawpi_cal.js"></script>
<!--<script src="js/fixed_div.js"></script>-->

</body>
</html>
