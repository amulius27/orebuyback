<?php  
    define('indexes', TRUE);
    require_once __DIR__.'/functions/registry.php';
    include 'misc/input_ore.php';
    //Open the connection to the database
    $db = DBOpen();    
    //Start our session so we can retrieve data
    session_start();
    //Get the corporation from the session
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corpTax = 10.00;
    }
    
    $alliance_tax = 4.00;
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    
    
    $update = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
    
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
                <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated
                        on: <?php echo $update; ?></strong></span><br>
                        <span style="font-family: Arial; color: #8FEF2F;"><strong>Ore prices are mineral based</strong></span><br>
                        <span style="font-family: Arial; color: white;"<strong>Corporation: </strong> <?php echo $corporation ?></span><br>
                        <span style="font-family: Arial; color: white;"<strong>Tax Rate: </strong> <?php printf($total_tax . "%"); ?></span><br>
        </div>
    </div>
</div>

<div class="clearfix"></div>


<!-- Calculate -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="contract.php">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Calculator</strong></h3>
                </div>
                <div class="panel-body">
                    <p>
                        <label>Veldspar <?php echo number_format($Veldspar, 2, '.', ',');?> ISK/Unit</label>
                    <div class="input-group form-control" id="veldspar" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Veldspar" id="calc-input-Veldspar_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Concentrated Veldspar" id="calc-input-Veldspar_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Dense Veldspar" id="calc-input-Veldspar_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Scordite <?php echo number_format($Scordite, 2, '.', ',');?> ISK/Unit</label>
                    <div class="input-group form-control" id="scordite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Scordite" id="calc-input-Scordite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Condensed Scordite" id="calc-input-Scordite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Massive Scordite" id="calc-input-Scordite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Pyroxeres <?php echo number_format($Pyroxeres, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="pyroxeres" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Pyroxeres" id="calc-input-Pyroxeres_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Solid Pyroxeres" id="calc-input-Pyroxeres_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Viscous Pyroxeres" id="calc-input-Pyroxeres_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Plagioclase <?php echo number_format($Plagioclase, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="plagioclase" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Plagioclase" id="calc-input-Plagioclase_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Azure Plagioclase" id="calc-input-Plagioclase_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Rich Plagioclase" id="calc-input-Plagioclase_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Omber <?php echo number_format($Omber, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="omber" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Omber" id="calc-input-Omber_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Silvery Omber" id="calc-input-Omber_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Golden Omber" id="calc-input-Omber_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Kernite <?php echo number_format($Kernite, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="kernite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Kernite" id="calc-input-Kernite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Luminous Kernite" id="calc-input-Kernite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Fiery Kernite" id="calc-input-Kernite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Jaspet <?php echo number_format($Jaspet, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="jaspet" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Jaspet" id="calc-input-Jaspet_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Pure Jaspet" id="calc-input-Jaspet_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Pristine Jaspet" id="calc-input-Jaspet_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Hemorphite <?php echo number_format($Hemorphite, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="hemorphite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Hemorphite" id="calc-input-Hemorphite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vivid Hemorphite" id="calc-input-Hemorphite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Radiant Hemorphite" id="calc-input-Hemorphite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Hedbergite <?php echo number_format($Hedbergite, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="hedbergite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Hedbergite" id="calc-input-Hedbergite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vitric Hedbergite" id="calc-input-Hedbergite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Glazed Hedbergite" id="calc-input-Hedbergite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Gneiss <?php echo number_format($Gneiss, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="gneiss" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Gneiss" id="calc-input-Gneiss_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Iridescent Gneiss" id="calc-input-Gneiss_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Prismatic Gneiss" id="calc-input-Gneiss_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Dark Ochre <?php echo number_format($Dark_Ochre, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="dark_ochre" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Dark Ochre" id="calc-input-Dark_Ochre_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Onyx Dark Ochre" id="calc-input-Dark_Ochre_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Obsidian Dark Ochre" id="calc-input-Dark_Ochre_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Spodumain <?php echo number_format($Spodumain, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="spodumain" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Spodumain" id="calc-input-Spodumain_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Bright Spodumain" id="calc-input-Spodumain_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Gleaming Spodumain" id="calc-input-Spodumain_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Crokite <?php echo number_format($Crokite, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="crokite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Crokite" id="calc-input-Crokite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Sharp Crokite" id="calc-input-Crokite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Crystalline Crokite" id="calc-input-Crokite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Bistot <?php echo number_format($Bistot, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="bistot" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Bistot" id="calc-input-Bistot_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Triclinic Bistot" id="calc-input-Bistot_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Monoclinic Bistot" id="calc-input-Bistot_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Arkonor <?php echo number_format($Arkonor, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="arkonor" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Arkonor" id="calc-input-Arkonor_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Crimson Arkonor" id="calc-input-Arkonor_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Prime Arkonor" id="calc-input-Arkonor_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Mercoxit <?php echo number_format($Mercoxit, 2, '.', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="mercoxit" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Mercoxit" id="calc-input-Mercoxit_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Magma Mercoxit" id="calc-input-Mercoxit_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vitreous Mercoxit" id="calc-input-Mercoxit_units_10-value">
                    </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default" data-spy="affix" data-offset-top="450" data-offset-bottom="370" id="invoice-panel">
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
                        <b>Contract Value</b> <a href="#" class="pull-right" onclick="$('#clipboard').modal('show');$('#clipboard-content').val(calcNow()).select();"><strong id="calc-output-reward-value"></strong></a><br>
                        <input class="form-contorl pull-right" type="submit" value="Submit Contract">
                    </p>
                    <br>
                </div>
            </div>
            </form>
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
    <script src="js/ore_cal.js"></script>

</body>
</html>