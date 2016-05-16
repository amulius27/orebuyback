<?php  define('indexes', TRUE);
include '../input_mins.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--metas-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>
        Buy Up Indexes | Lone Star Warriors
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
<!--Navigation-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="images/logo-wide.png" style="margin-top: -7px;"></a>
    </div>
    <div class="collapse navbar-collapse pull-right">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="../../index.html">Mainpage</a></li>
            <li><a href="../../eve.html">Eve Page</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img
                        src="images/settings.png"><b class="caret"></b></a>
                <ul class="dropdown-menu pull-right">
                    <li class="dropdown-header">Applications</li>
                    <li><a href="#">EvE Online Applications</a></li>
                    <li><a href="#" onclick="clearCookies();location.reload();">Clear all cookies</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--Navigation-->

<div class="central-header">
    <h1>Buying to make your lives easier.</h1>
    <h4 class="text-danger">These pages are still undergoing heavy development. Report any issues on our public
        forums!</h4>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Instruction Sheet</strong></span><br></h3>
        </div>
        <div class="panel-body" align="center">

            - In the Calculator below you can enter the amounts for each Raw PI material that you want to sell.<br>
            - Once done you can see the total value of each item and the final price in the <strong>Invoice</strong>
            panel.<br>
            - All you have to do now is click on the <strong>Contract Value</strong> price that is given<br>
            - This will open a "Copy to clipboard" window with a easy to copy number to use in the EVE Contract window.<br>
            <span style="font-family: Arial; color: #FF2A2A;"><strong>- Contract between 200-300 mil ISK at a time, this to allow for faster processing of the contracts.</strong></span>
            <hr>
                <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated
                        on: <?php echo $string = implode("", $update[0]); ?></strong></span><br>
            <span style="font-family: Arial; color: #8FEF2F;"><strong>Ore prices are now mineral based</strong></span>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Contract Type</th>
            <th class="text-right">Availability</th>
            <th class="text-right">I will receive</th>
            <th class="text-right">Expire</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Item Exchange</td>
            <td class="text-right">My Corporation or <strong><span class="eve-link" onmouseover="popCorp($(this), 98259161, 'Lone Star Warriors');">Lone Star Warriors</span></strong>
            </td>
            <td class="text-right">Value from Invoice below</td>
            <td class="text-right">2 Weeks</td>
        </tr>
        </tbody>
    </table>
</div>

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
                        <label>Veldspar <?php echo number_format($Veldspar_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="veldspar" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Veldspar" id="calc-input-Veldspar_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Concentrated Veldspar" id="calc-input-Veldspar_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Dense Veldspar" id="calc-input-Veldspar_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Scordite <?php echo number_format($Scordite_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="scordite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Scordite" id="calc-input-Scordite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Condensed Scordite" id="calc-input-Scordite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Massive Scordite" id="calc-input-Scordite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Pyroxeres <?php echo number_format($Pyroxeres_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="pyroxeres" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Pyroxeres" id="calc-input-Pyroxeres_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Solid Pyroxeres" id="calc-input-Pyroxeres_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Viscous Pyroxeres" id="calc-input-Pyroxeres_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Plagioclase <?php echo number_format($Plagioclase_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="plagioclase" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Plagioclase" id="calc-input-Plagioclase_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Azure Plagioclase" id="calc-input-Plagioclase_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Rich Plagioclase" id="calc-input-Plagioclase_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Omber <?php echo number_format($Omber_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="omber" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Omber" id="calc-input-Omber_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Silvery Omber" id="calc-input-Omber_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Golden Omber" id="calc-input-Omber_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Kernite <?php echo number_format($Kernite_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="kernite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Kernite" id="calc-input-Kernite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Luminous Kernite" id="calc-input-Kernite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Fiery Kernite" id="calc-input-Kernite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Jaspet <?php echo number_format($Jaspet_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="jaspet" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Jaspet" id="calc-input-Jaspet_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Pure Jaspet" id="calc-input-Jaspet_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Pristine Jaspet" id="calc-input-Jaspet_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Hemorphite <?php echo number_format($Hemorphite_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="hemorphite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Hemorphite" id="calc-input-Hemorphite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vivid Hemorphite" id="calc-input-Hemorphite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Radiant Hemorphite" id="calc-input-Hemorphite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Hedbergite <?php echo number_format($Hedbergite_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="hedbergite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Hedbergite" id="calc-input-Hedbergite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vitric Hedbergite" id="calc-input-Hedbergite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Glazed Hedbergite" id="calc-input-Hedbergite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Gneiss <?php echo number_format($Gneiss_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="gneiss" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Gneiss" id="calc-input-Gneiss_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Iridescent Gneiss" id="calc-input-Gneiss_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Prismatic Gneiss" id="calc-input-Gneiss_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Dark Ochre <?php echo number_format($Dark_Ochre_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="dark_ochre" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Dark Ochre" id="calc-input-Dark_Ochre_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Onyx Dark Ochre" id="calc-input-Dark_Ochre_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Obsidian Dark Ochre" id="calc-input-Dark_Ochre_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Spodumain <?php echo number_format($Spodumain_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="spodumain" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Spodumain" id="calc-input-Spodumain_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Bright Spodumain" id="calc-input-Spodumain_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Gleaming Spodumain" id="calc-input-Spodumain_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Crokite <?php echo number_format($Crokite_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="crokite" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Crokite" id="calc-input-Crokite_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Sharp Crokite" id="calc-input-Crokite_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Crystalline Crokite" id="calc-input-Crokite_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Bistot <?php echo number_format($Bistot_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="bistot" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Bistot" id="calc-input-Bistot_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Triclinic Bistot" id="calc-input-Bistot_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Monoclinic Bistot" id="calc-input-Bistot_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Arkonor <?php echo number_format($Arkonor_comp, 2, ',', '.');?> ISK/Unit</label>
                    <div class="input-group form-control" id="arkonor" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Base Arkonor" id="calc-input-Arkonor_units-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Crimson Arkonor" id="calc-input-Arkonor_units_5-value">
                        <input type="number" class="form-control text-right typeahead" placeholder="Prime Arkonor" id="calc-input-Arkonor_units_10-value">
                    </div>
                    </p>
                    <p>
                        <label>Mercoxit <?php echo number_format($Mercoxit_comp, 2, ',', '.');?> ISK/Unit</label>
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
                        <b>Contract Value</b> <a href="#" class="pull-right" onclick="$('#clipboard').modal('show');$('#clipboard-content').val(calcNow()).select();">
                            <strong id="calc-output-reward-value"></strong>
                        </a>
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
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
    <script src="js/ore_comp_cal.js"></script>

</body>
</html>