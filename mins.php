<?php 
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_mins.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--metas-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buy Back Program" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>
        Warped Intentions Buy Back Program
    </title>
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
        <form action="contracts/minerals_contract.php" method="post">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Tritanium <?php echo number_format($Tritanium, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Tritanium" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Tritanium" placeholder="Tritanium" id="calc-input-tritanium_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Pyerite <?php echo number_format($Pyerite, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Pyerite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Pyerite" placeholder="Pyerite" id="calc-input-pyerite_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Mexallon <?php echo number_format($Mexallon, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Mexallon" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Mexallon" placeholder="Mexallon" id="calc-input-mexallon_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Isogen <?php echo number_format($Isogen, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Isogen" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Isogen" placeholder="Isogen" id="calc-input-isogen_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Nocxium <?php echo number_format($Nocxium, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Nocxium" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Nocxium" placeholder="Nocxium" id="calc-input-nocxium_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Zydrine <?php echo number_format($Zydrine, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Zydrine" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Zydrine" placeholder="Zydrine" id="calc-input-zydrine_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Megacyte <?php echo number_format($Megacyte, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Megacyte" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Megacyte" placeholder="Megacyte" id="calc-input-megacyte_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Morphite <?php echo number_format($Morphite, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Morphite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Morphite" placeholder="Morphite" id="calc-input-morphite_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <strong>Invoice</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Tritanium value <span class="pull-right"><span id="calc-output-tritanium-value"></span></p>
                        <p id="calc-output-row">Total Pyerite value <span class="pull-right"><span id="calc-output-pyerite-value"></span></p>
                        <p id="calc-output-row">Total Mexallon value<span class="pull-right"><span id="calc-output-mexallon-value"></span></p>
                        <p id="calc-output-row">Total Isogen value <span class="pull-right"><span id="calc-output-isogen-value"></span></p>
                        <p id="calc-output-row">Total Nocxium value <span class="pull-right" id="calc-output-nocxium-value"></span></p>
                        <p id="calc-output-row">Total Zydrine value <span class="pull-right" id="calc-output-zydrine-value"></span></p>
                        <p id="calc-output-row">Total Megactye value <span class="pull-right" id="calc-output-megacyte-value"></span></p>
                        <p id="calc-outputb-row">Total Morphite value <span class="pull-right" id="calc-output-morphite-value"></span></p>
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

<?php
    PrintFooter();
    PrintPopups();
?>

<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script> 
<script src="js/typeahead.bundle.js"></script> 
<script src="js/handlebars-v1.3.0.js"></script> 
<script src="js/min_cal.js"></script>
</body>
</html>
