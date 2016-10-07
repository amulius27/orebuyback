<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_ore.php';
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
        <form action="contracts/ore_contract.php" method="POST">
            <input type="hidden" class="form-control" name="Quote_Time" id="update_time" value="<?php echo $update; ?>">
            <input type="hidden" class="form-control" name="Corporation" id="Corporation" value="<?php echo $corporation;?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Veldspar <?php echo number_format($Veldspar, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="veldspar" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Veldspar" placeholder="Base Veldspar" id="calc-input-Veldspar_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Concetrated_Veldspar" placeholder="Concentrated Veldspar" id="calc-input-Veldspar_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Dense_Veldspar" placeholder="Dense Veldspar" id="calc-input-Veldspar_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Scordite <?php echo number_format($Scordite, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="scordite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Scordite" placeholder="Base Scordite" id="calc-input-Scordite_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Condensed_Scordite" placeholder="Condensed Scordite" id="calc-input-Scordite_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Massive_Scordite" placeholder="Massive Scordite" id="calc-input-Scordite_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Pyroxeres <?php echo number_format($Pyroxeres, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="pyroxeres" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Pyroxeres" placeholder="Base Pyroxeres" id="calc-input-Pyroxeres_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Solid_Pyroxeres" placeholder="Solid Pyroxeres" id="calc-input-Pyroxeres_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Viscous_Pyroxeres" placeholder="Viscous Pyroxeres" id="calc-input-Pyroxeres_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Plagioclase <?php echo number_format($Plagioclase, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="plagioclase" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Plagioclase" placeholder="Base Plagioclase" id="calc-input-Plagioclase_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Azure_Plagioclase" placeholder="Azure Plagioclase" id="calc-input-Plagioclase_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Rich_Plagioclase" placeholder="Rich Plagioclase" id="calc-input-Plagioclase_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Omber <?php echo number_format($Omber, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="omber" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Omber" placeholder="Base Omber" id="calc-input-Omber_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Silvery_Omber" placeholder="Silvery Omber" id="calc-input-Omber_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Golden_Omber" placeholder="Golden Omber" id="calc-input-Omber_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Kernite <?php echo number_format($Kernite, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="kernite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Kernite" placeholder="Base Kernite" id="calc-input-Kernite_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Luminous_Kernite" placeholder="Luminous Kernite" id="calc-input-Kernite_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Fiery_Kernite" placeholder="Fiery Kernite" id="calc-input-Kernite_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Jaspet <?php echo number_format($Jaspet, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="jaspet" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Jaspte" placeholder="Base Jaspet" id="calc-input-Jaspet_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Pure_Jaspet" placeholder="Pure Jaspet" id="calc-input-Jaspet_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Pristine_Jaspet" placeholder="Pristine Jaspet" id="calc-input-Jaspet_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Hemorphite <?php echo number_format($Hemorphite, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="hemorphite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Hemorphite" placeholder="Base Hemorphite" id="calc-input-Hemorphite_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Vivid_Hemorphite" placeholder="Vivid Hemorphite" id="calc-input-Hemorphite_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Radiant_Hemorphite" placeholder="Radiant Hemorphite" id="calc-input-Hemorphite_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Hedbergite <?php echo number_format($Hedbergite, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="hedbergite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Hedbergite" placeholder="Base Hedbergite" id="calc-input-Hedbergite_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Vitric_Hedbergite" placeholder="Vitric Hedbergite" id="calc-input-Hedbergite_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Glazed_Hedbergite" placeholder="Glazed Hedbergite" id="calc-input-Hedbergite_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Gneiss <?php echo number_format($Gneiss, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="gneiss" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Gneiss" placeholder="Base Gneiss" id="calc-input-Gneiss_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Iridescent_Gneiss" placeholder="Iridescent Gneiss" id="calc-input-Gneiss_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Prismatic_Gneiss" placeholder="Prismatic Gneiss" id="calc-input-Gneiss_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Dark Ochre <?php echo number_format($Dark_Ochre, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="dark_ochre" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Dark_Ochre" placeholder="Base Dark Ochre" id="calc-input-Dark_Ochre_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Onyx_Ochre" placeholder="Onyx Dark Ochre" id="calc-input-Dark_Ochre_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Obsidian_Ochre" placeholder="Obsidian Dark Ochre" id="calc-input-Dark_Ochre_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Spodumain <?php echo number_format($Spodumain, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="spodumain" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Spodumain" placeholder="Base Spodumain" id="calc-input-Spodumain_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Bright_Spodumain" placeholder="Bright Spodumain" id="calc-input-Spodumain_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Gleaming_Spodumain" placeholder="Gleaming Spodumain" id="calc-input-Spodumain_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Crokite <?php echo number_format($Crokite, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="crokite" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Crokite" placeholder="Base Crokite" id="calc-input-Crokite_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Sharp_Crokite" placeholder="Sharp Crokite" id="calc-input-Crokite_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Crystalline_Crokite" placeholder="Crystalline Crokite" id="calc-input-Crokite_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Bistot <?php echo number_format($Bistot, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="bistot" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Bistot" placeholder="Base Bistot" id="calc-input-Bistot_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Triclinic_Bistot" placeholder="Triclinic Bistot" id="calc-input-Bistot_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Monoclinic_Bistot" placeholder="Monoclinic Bistot" id="calc-input-Bistot_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Arkonor <?php echo number_format($Arkonor, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="arkonor" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Arkonor" placeholder="Base Arkonor" id="calc-input-Arkonor_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Crimson_Arkonor" placeholder="Crimson Arkonor" id="calc-input-Arkonor_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Prime_Arkonor" placeholder="Prime Arkonor" id="calc-input-Arkonor_units_10-value">
                            </div>
                        </p>
                        <p>
                            <label>Mercoxit <?php echo number_format($Mercoxit, 2, '.', ',');?> ISK/Unit</label>
                            <div class="input-group form-control" id="mercoxit" style="padding: 0; border: none;">
                                <input type="number" class="form-control text-right typeahead" name="Mercoxit" placeholder="Base Mercoxit" id="calc-input-Mercoxit_units-value">
                                <input type="number" class="form-control text-right typeahead" name="Magma_Mercoxit" placeholder="Magma Mercoxit" id="calc-input-Mercoxit_units_5-value">
                                <input type="number" class="form-control text-right typeahead" name="Vitreous_Mercoxit" placeholder="Vitreous Mercoxit" id="calc-input-Mercoxit_units_10-value">
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
                        <p id="calc-output-row">Total Veldspar value <span class="pull-right"><span id="calc-output-veldspar-value"></span></p>
                        <p id="calc-output-row">Total Scordite value <span class="pull-right"><span id="calc-output-scordite-value"></span></p>
                        <p id="calc-output-row">Total Pyroxeres value <span class="pull-right"><span id="calc-output-pyroxeres-value"></span></p>
                        <p id="calc-output-row">Total Plagioclase value <span class="pull-right"><span id="calc-output-plagioclase-value"></span></p>
                        <p id="calc-output-row">Total Omber value <span class="pull-right"><span id="calc-output-omber-value"></span></p>
                        <p id="calc-output-row">Total Kernite value <span class="pull-right"><span id="calc-output-kernite-value"></span></p>
                        <p id="calc-output-row">Total Jaspet value <span class="pull-right"><span id="calc-output-jaspet-value"></span></p>
                        <p id="calc-output-row">Total Hemorphite value <span class="pull-right"><span id="calc-output-hemorphite-value"></span></p>
                        <p id="calc-output-row">Total Hedbergite value <span class="pull-right"><span id="calc-output-hedbergite-value"></span></p>
                        <p id="calc-output-row">Total Gneiss value <span class="pull-right"><span id="calc-output-gneiss-value"></span></p>
                        <p id="calc-output-row">Total Dark Ochre value <span class="pull-right"><span id="calc-output-dark_ochre-value"></span></p>
                        <p id="calc-output-row">Total Spodumain value <span class="pull-right"><span id="calc-output-spodumain-value"></span></p>
                        <p id="calc-output-row">Total Crokite value <span class="pull-right"><span id="calc-output-crokite-value"></span></p>
                        <p id="calc-output-row">Total Bistot Plasma value <span class="pull-right"><span id="calc-output-bistot-value"></span></p>
                        <p id="calc-output-row">Total Arkonor value <span class="pull-right"><span id="calc-output-arkonor-value"></span></p>
                        <p id="calc-output-row">Total Mercoxit value <span class="pull-right"><span id="calc-output-mercoxit-value"></span></p>
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
<script src="js/ore_cal.js"></script>

</body>
</html>