<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_wgas.php';
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
            <span style="font-family: Arial; color: white;"><strong>Total Tax Rate: </strong>  <?php echo $total_tax ?> %</span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<!-- Calculate -->

<div class="container">
    <div class="row">
        <form action="contracts/wgas_contract.php" method="post">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>C50 Gas <?php echo number_format($C50, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C50" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C50" placeholder="C50 Units" id="calc-input-C50-value">
                            </div>
                        </p>
                        <p>
                            <label>C60 Gas <?php echo number_format($C60, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C60" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C60" placeholder="C60 Units" id="calc-input-C60-value">
                            </div>
                        </p>
                        <p>
                            <label>C70 Gas <?php echo number_format($C70, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C70" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C70" placeholder="C70 Units" id="calc-input-C70-value">
                            </div>
                        </p>
                        <p>
                            <label>C72 Gas <?php echo number_format($C72, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C72" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C72" placeholder="C72 Units" id="calc-input-C72-value">
                            </div>
                        </p>
                        <p>
                            <label>C84 Gas <?php echo number_format($C84, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C84" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C84" placeholder="C84 Units" id="calc-input-C84-value">
                            </div>
                        </p>
                        <p>
                            <label>C28 Gas <?php echo number_format($C28, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C28" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C28" placeholder="C28 Units" id="calc-input-C28-value">
                            </div>
                        </p>
                        <p>
                            <label>C32 Gas <?php echo number_format($C32, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C32" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C32" placeholder="C32 Units" id="calc-input-C32-value">
                            </div>
                        </p>
                        <p>
                            <label>C320 Gas <?php echo number_format($C320, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C320" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C320" placeholder="C320 Units" id="calc-input-C320-value">
                            </div>
                        </p>
                        <p>
                            <label>C540 Gas <?php echo number_format($C540, 2, '.', ','); ?> ISK/Unit</label>
                            <div class="input-group form-control" id="C540" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="C540" placeholder="C540 Units" id="calc-input-C540-value">
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
                        <p id="calc-output-row">Total C50 Gas Value <span class="pull-right"><span id="calc-output-C50-value"></span></span></p>
                        <p id="calc-output-row">Total C60 Gas Value <span class="pull-right"><span id="calc-output-C60-value"></span></span></p>
                        <p id="calc-output-row">Total C70 Gas Value<span class="pull-right"><span id="calc-output-C70-value"></span></span></p>
                        <p id="calc-output-row">Total C72 Gas Value <span class="pull-right"><span id="calc-output-C72-value"></span></span></p>
                        <p id="calc-output-row">Total C84 Gas Value <span class="pull-right"><span id="calc-output-C84-value"></span></span></p>
                        <p id="calc-output-row">Total C28 Gas Value <span class="pull-right"><span id="calc-output-C28-value"></span></span></p>
                        <p id="calc-output-row">Total C32 Gas Value<span class="pull-right"><span id="calc-output-C32-value"></span></span></p>
                        <p id="calc-output-row">Total C320 Gas Value <span class="pull-right"><span id="calc-output-C320-value"></span></span></p>
                        <p id="calc-output-row">Total C540 Gas Value <span class="pull-right"><span id="calc-output-C540-value"></span></span></p>
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
    <script src="js/wgas_cal.js"></script>
</body>
</html>
