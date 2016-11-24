<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_iceProd.php';
	printf("Helium Isotopes: ");
	var_dump($Helium_Isotopes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--metas-->
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
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
            background-image:url(images/bgs/EVE_asteroid_ice.jpg);
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
        <form action="contracts/ice_prod_contract.php" method="post">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Helium Isotopes <?php echo number_format($Helium_Isotopes, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Helium" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Helium_Isotopes" placeholder="Helium Isotopes" id="calc-input-Helium_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Hydrogen Isotopes <?php echo number_format($Hydrogen_Isotopes, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Hydrogen" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Hydrogen_Isotopes" placeholder="Hydrogen Isotopes" id="calc-input-Hydrogen_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Nitrogen Isotopes <?php echo number_format($Nitrogen_Isotopes, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Nitrogen" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Nitrogen_Isotopes" placeholder="Nitrogen Isotopes" id="calc-input-Nitrogen_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Oxygen Isotopes <?php echo number_format($Oxygen_Isotopes, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Oxygen" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Oxygen_Isotopes" placeholder="Oxygen Isotopes" id="calc-input-Oxygen_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Heavy Water <?php echo number_format($Heavy_Water, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Heavy" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Heavy_Water" placeholder="Heavy Water" id="calc-input-Heavy_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Liquid Ozone <?php echo number_format($Liquid_Ozone, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Ozone" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Liquid_Ozone" placeholder="Liquid Ozone" id="calc-input-Ozone_units-value">
                            </div>
                        </p>
                        <p>
                            <label>Strontium Clathrates <?php echo number_format($Strontium_Clathrates, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="Strontium" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Strontium_Clathrates" placeholder="Strontium Clathrates" id="calc-input-Strontium_units-value">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <strong>Invoice</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Helium Isotopes value <span class="pull-right"><span id="calc-output-Helium-value"></span></p>
                        <p id="calc-output-row">Total Hydrogen Isotopes value <span class="pull-right"><span id="calc-output-Hydrogen-value"></span></p>
                        <p id="calc-output-row">Total Nitrogen Isotopes value<span class="pull-right"><span id="calc-output-Nitrogen-value"></span></p>
                        <p id="calc-output-row">Total Oxygen Isotopes value <span class="pull-right" id="calc-output-Oxygen-value"></span></p>
                        <p id="calc-output-row">Total Heavy Water value <span class="pull-right" id="calc-output-Heavy-value"></span></p>
                        <p id="calc-output-row">Total Liquid Ozone value <span class="pull-right" id="calc-output-Ozone-value"></span></p>
                        <p id="calc-outputb-row">Total Strontium Clathrates value <span class="pull-right" id="calc-output-Strontium-value"></span></p>
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
    <script src="js/custom.js"></script>
    <script src="js/typeahead.bundle.js"></script>
    <script src="js/handlebars-v1.3.0.js"></script>
    <script src="js/prod_cal.js"></script>
</body>
</html>
