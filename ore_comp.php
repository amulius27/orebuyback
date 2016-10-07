<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_ore_comp.php';
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
        <form action="contracts/ore_comp_contract.php" method="POST">
            <input class="form-control" type="hidden" name="Quote_Time" value="<?php echo $update; ?>">
            <input class="form-control" type="hidden" name="Corporation" value="<?php echo $corporation; ?>">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Calculator</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <label>Compressed Veldspar <?php echo number_format($Veldspar_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="veldspar" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Veldspar" placeholder="Compressed Veldspar" id="calc-input-Veldspar_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Concentrated_Veldspar" placeholder="Compressed Concentrated Veldspar" id="calc-input-Veldspar_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Dense_Veldspar" placeholder="Compressed Dense Veldspar" id="calc-input-Veldspar_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Scordite <?php echo number_format($Scordite_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="scordite" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Scordite" placeholder="Compressed Scordite" id="calc-input-Scordite_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Condensed_Scordite" placeholder="Compressed Condensed Scordite" id="calc-input-Scordite_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Massive_Scordite" placeholder="Compressed Massive Scordite" id="calc-input-Scordite_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Pyroxeres <?php echo number_format($Pyroxeres_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="pyroxeres" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Pyroxeres" placeholder="Compressed Pyroxeres" id="calc-input-Pyroxeres_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Solid_Pyroxeres" placeholder="Compressed Solid Pyroxeres" id="calc-input-Pyroxeres_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Viscous_Pyroxeres" placeholder="Compressed Viscous Pyroxeres" id="calc-input-Pyroxeres_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Plagioclase <?php echo number_format($Plagioclase_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="plagioclase" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Plagioclase" placeholder="Compressed Plagioclase" id="calc-input-Plagioclase_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Azure_Plagioclase" placeholder="Compressed Azure Plagioclase" id="calc-input-Plagioclase_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Rich_Plagioclase" placeholder="Compressed Rich Plagioclase" id="calc-input-Plagioclase_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Omber <?php echo number_format($Omber_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="omber" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Omber" placeholder="Compressed Omber" id="calc-input-Omber_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Silvery_Omber" placeholder="Compressed Silvery Omber" id="calc-input-Omber_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Golden_Omber" placeholder="Compressed Golden Omber" id="calc-input-Omber_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Kernite <?php echo number_format($Kernite_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="kernite" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Kernite" placeholder="Compressed Kernite" id="calc-input-Kernite_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Luminous_Kernite" placeholder="Compressed Luminous Kernite" id="calc-input-Kernite_units_5-value">
                            <input type="number" class="form-control text-right typeahead" nmae="Compressed_Fiery_Kernite" placeholder="Compressed Fiery Kernite" id="calc-input-Kernite_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Jaspet <?php echo number_format($Jaspet_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="jaspet" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Jaspet" placeholder="Compressed Jaspet" id="calc-input-Jaspet_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Pure_Jaspet" placeholder="Compressed Pure Jaspet" id="calc-input-Jaspet_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Pristine_Jaspet" placeholder="Compressed Pristine Jaspet" id="calc-input-Jaspet_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Hemorphite <?php echo number_format($Hemorphite_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="hemorphite" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Hemorphite" placeholder="Compressed Hemorphite" id="calc-input-Hemorphite_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Vivid_Hemorphite" placeholder="Compressed Vivid Hemorphite" id="calc-input-Hemorphite_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Radiant_Hemorphite" placeholder="Compressed Radiant Hemorphite" id="calc-input-Hemorphite_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Hedbergite <?php echo number_format($Hedbergite_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="hedbergite" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Hedbergite" placeholder="Compressed Hedbergite" id="calc-input-Hedbergite_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Vitric_Hedbergite" placeholder="Compressed Vitric Hedbergite" id="calc-input-Hedbergite_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Glazed_Hedbergite" placeholder="Compressed Glazed Hedbergite" id="calc-input-Hedbergite_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Gneiss <?php echo number_format($Gneiss_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="gneiss" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Gneiss" placeholder="Compressed Gneiss" id="calc-input-Gneiss_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Iridescent_Gneiss" placeholder="Compressed Iridescent Gneiss" id="calc-input-Gneiss_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Prismatic_Gneiss" placeholder="Compressed Prismatic Gneiss" id="calc-input-Gneiss_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Dark Ochre <?php echo number_format($Dark_Ochre_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="dark_ochre" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Dark_Ochre" placeholder="Compressed Dark Ochre" id="calc-input-Dark_Ochre_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Onyx_Dark_Ochre" placeholder="Compressed Onyx Dark Ochre" id="calc-input-Dark_Ochre_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Obsidian_Dark_Ochre" placeholder="Compressed Obsidian Dark Ochre" id="calc-input-Dark_Ochre_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Spodumain <?php echo number_format($Spodumain_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="spodumain" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Spodumain" placeholder="Compressed Spodumain" id="calc-input-Spodumain_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Bright_Spodumain" placeholder="Compressed Bright Spodumain" id="calc-input-Spodumain_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Gleaming_Spodumain" placeholder="Compressed Gleaming Spodumain" id="calc-input-Spodumain_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Crokite <?php echo number_format($Crokite_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="crokite" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Crokite" placeholder="Compressed Crokite" id="calc-input-Crokite_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Sharp_Crokite" placeholder="Compressed Sharp Crokite" id="calc-input-Crokite_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Crystalline_Crokite" placeholder="Compressed Crystalline Crokite" id="calc-input-Crokite_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Bistot <?php echo number_format($Bistot_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="bistot" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Bistot" placeholder="Compressed Bistot" id="calc-input-Bistot_units-value">
                            <input type="number" class="form-control text-right typeahead" nmae="Compressed_Triclinic_Bistot" placeholder="Compressed Triclinic Bistot" id="calc-input-Bistot_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Monoclinic_Bistot" placeholder="Compressed Monoclinic Bistot" id="calc-input-Bistot_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Arkonor <?php echo number_format($Arkonor_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="arkonor" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Arkonor" placeholder="Compressed Arkonor" id="calc-input-Arkonor_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Crimson_Arkonor" placeholder="Compressed Crimson Arkonor" id="calc-input-Arkonor_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Prime_Arkonor" placeholder="Compressed Prime Arkonor" id="calc-input-Arkonor_units_10-value">
                        </div>
                        </p>
                        <p>
                            <label>Compressed Mercoxit <?php echo number_format($Mercoxit_comp, 2, '.', ',');?> ISK/Unit</label>
                        <div class="input-group form-control" id="mercoxit" style="padding: 0; border: none;">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Mercoxit" placeholder="Compressed Mercoxit" id="calc-input-Mercoxit_units-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Magma_Mercoxit" placeholder="Compressed Magma Mercoxit" id="calc-input-Mercoxit_units_5-value">
                            <input type="number" class="form-control text-right typeahead" name="Compressed_Vitreous_Mercoxit" placeholder="Compressed Vitreous Mercoxit" id="calc-input-Mercoxit_units_10-value">
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Invoice</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p id="calc-output-row">Total Compressed Veldspar value <span class="pull-right"><span id="calc-output-veldspar-value"></span></p>
                        <p id="calc-output-row">Total Compressed Scordite value <span class="pull-right"><span id="calc-output-scordite-value"></span></p>
                        <p id="calc-output-row">Total Compressed Pyroxeres value <span class="pull-right"><span id="calc-output-pyroxeres-value"></span></p>
                        <p id="calc-output-row">Total Compressed Plagioclase value <span class="pull-right"><span id="calc-output-plagioclase-value"></span></p>
                        <p id="calc-output-row">Total Compressed Omber value <span class="pull-right"><span id="calc-output-omber-value"></span></p>
                        <p id="calc-output-row">Total Compressed Kernite value <span class="pull-right"><span id="calc-output-kernite-value"></span></p>
                        <p id="calc-output-row">Total Compressed Jaspet value <span class="pull-right"><span id="calc-output-jaspet-value"></span></p>
                        <p id="calc-output-row">Total Compressed Hemorphite value <span class="pull-right"><span id="calc-output-hemorphite-value"></span></p>
                        <p id="calc-output-row">Total Compressed Hedbergite value <span class="pull-right"><span id="calc-output-hedbergite-value"></span></p>
                        <p id="calc-output-row">Total Compressed Gneiss value <span class="pull-right"><span id="calc-output-gneiss-value"></span></p>
                        <p id="calc-output-row">Total Compressed Dark Ochre value <span class="pull-right"><span id="calc-output-dark_ochre-value"></span></p>
                        <p id="calc-output-row">Total Compressed Spodumain value <span class="pull-right"><span id="calc-output-spodumain-value"></span></p>
                        <p id="calc-output-row">Total Compressed Crokite value <span class="pull-right"><span id="calc-output-crokite-value"></span></p>
                        <p id="calc-output-row">Total Compressed Bistot value <span class="pull-right"><span id="calc-output-bistot-value"></span></p>
                        <p id="calc-output-row">Total Compressed Arkonor value <span class="pull-right"><span id="calc-output-arkonor-value"></span></p>
                        <p id="calc-output-row">Total Compressed Mercoxit value <span class="pull-right"><span id="calc-output-mercoxit-value"></span></p>
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
    <script src="js/ore_comp_cal.js"></script>

</body>
</html>