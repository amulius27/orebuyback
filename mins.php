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
        <form action="contracts/minerals_contract.php" method="post">
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
<script src="js/min_cal.js"></script>
</body>
</html>
