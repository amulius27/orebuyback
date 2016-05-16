<?php define('indexes', TRUE);
include 'misc/input_pi_raw.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
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
            background-image:url(images/bgs/ore_bg_blur.jpg);
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
<?php
    PrintNavBar();
    PrintTitle();
    PrintInstructions();
?>
    
<div class="clearfix"></div>
<!-- Calculate -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Calculator</strong></h3>
                </div>
                <div class="panel-body">
                    <p>
                        <label>Aqueous Liquids <?php echo $aqueous; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="aqueous" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Aqueous Liquids" id="calc-input-aqueous_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Ionic Solutions <?php echo $ionic; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="ionic" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Ionic Solutions" id="calc-input-ionic_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Base Metals <?php echo $base; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="base" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Metals" id="calc-input-base_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Heavy Metals <?php echo $heavy; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="heavy" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Heavy Metals" id="calc-input-heavy_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Noble Metals <?php echo $noble; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="noble" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Noble Metals" id="calc-input-noble_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Carbon Compounds <?php echo $carbon; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="carbon" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Carbon Compounds" id="calc-input-carbon_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Micro Organisms <?php echo $micro; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="micro" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Micro Organisms" id="calc-input-micro_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Complex Organisms <?php echo $complex; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="complex" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Complex Organisms" id="calc-input-complex_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Planktic Colonies <?php echo $planktic; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="planktic" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Planktic Colonies" id="calc-input-planktic_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Noble Gas <?php echo $noble_gas; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="noble_gas" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Noble Gas" id="calc-input-noble_gas_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Reactive Gas <?php echo $reactive; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="reactive" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Reactive Gas" id="calc-input-reactive_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Felsic Magma <?php echo $felsic; ?> ISK/Unit</label>
                    <div class="input-group form-control" id="felsic" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Felsic Magma" id="calc-input-felsic_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Non-CS Crystals <?php echo $non_cs; ?> ISK/Unit</label>
                        <div class="input-group form-control" id="non_cs" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Non-CS Crystals" id="calc-input-non_cs_units-value">
                        </div>
                    </p>
                    <p>
                        <label>Suspended Plasma <?php echo $suspended; ?> ISK/Unit</label>
                        <div class="input-group form-control" id="suspended" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Suspended Plasma" id="calc-input-suspended_units-value">
                        </div>
                    </p>
                    <p>
                        <label>Autotrophs <?php echo $autotrophs; ?> ISK/Unit</label>
                        <div class="input-group form-control" id="autotrophs" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" placeholder="Autotrophs" id="calc-input-autotrophs_units-value">
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
                        <p id="calc-output-aqueous-row">Total Aqueous Liquids value <span class="pull-right"><span id="calc-output-aqueous-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Ionic Solutions value <span class="pull-right"><span id="calc-output-ionic-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Base Metals value <span class="pull-right"><span id="calc-output-base-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Heavy Metals value <span class="pull-right"><span id="calc-output-heavy-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Noble Metals value <span class="pull-right"><span id="calc-output-noble-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Carbon Compounds value <span class="pull-right"><span id="calc-output-carbon-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Micro Organisms value <span class="pull-right"><span id="calc-output-micro-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Complex Organisms value <span class="pull-right"><span id="calc-output-complex-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Planktic Colonies value <span class="pull-right"><span id="calc-output-planktic-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Noble Gas value <span class="pull-right"><span id="calc-output-noble_gas-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Reactive Gas value <span class="pull-right"><span id="calc-output-reactive-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Felsic Magma value <span class="pull-right"><span id="calc-output-felsic-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Non-CS Crystals value <span class="pull-right"><span id="calc-output-non-cs-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Suspended Plasma value <span class="pull-right"><span id="calc-output-suspended-value"></span></p>
                        <p id="calc-output-aqueous-row">Total Autotrophs value <span class="pull-right"><span id="calc-output-autotrophs-value"></span></p>
                        <hr>
                        <p id="calc-output-reward-row">
                            <b>Contract Value</b><strong id="calc-output-reward-value"></strong>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
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
<script src="js/rawpi_cal.js"></script>
<<<<<<< HEAD
<!--<script src="js/fixed_div.js"></script>-->

</body>
</html>
=======

</body>
</html>
>>>>>>> ccffdfdeebfc515e0fb12d0405c5f6842859013c
