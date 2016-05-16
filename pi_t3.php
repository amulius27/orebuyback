<?php define('indexes', TRUE);
include '../input_pi_t3.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Buy Up Indexes | Lone Star Warriors</title>
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
        <span style="font-family: Arial; color: #8FEF2F;"><strong>Database was last updated
                on: <?php echo $string = implode("", $update[0]); ?></strong></span>
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
                        <label>Biotech Research Reports <?php echo number_format($biotech, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Biotech Research Reports" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Biotech Research Reports"
                               id="calc-input-Biotech_Research_Reports_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Camera Drones <?php echo number_format($camera_drones, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Camera Drones" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Camera Drones"
                               id="calc-input-Camera_Drones_Blocks_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Condensates <?php echo number_format($condensates, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Condensates" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Condensates"
                               id="calc-input-Condensates_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Cryoprotectant Solution <?php echo number_format($cryoprotectant, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Cryoprotectant Solution" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Cryoprotectant Solution"
                               id="calc-input-Cryoprotectant_Solution_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Data Chips <?php echo number_format($data_chips, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Data Chips" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Data Chips"
                               id="calc-input-Data_Chips_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Gel-Matrix Biopaste <?php echo number_format($biopaste, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Gel-Matrix Biopaste" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Gel-Matrix Biopaste"
                               id="calc-input-Gel_Matrix_Biopaste_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Guidance Systems <?php echo number_format($guidance_systems, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Guidance Systems" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Guidance Systems"
                               id="calc-input-Guidance_Systems_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Hazmat Detection Systems <?php echo number_format($hazmat_detection, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Hazmat Detection Systems" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Hazmat Detection Systems"
                               id="calc-input-Hazmat_Detection_Systems_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Hermetic Membranes <?php echo number_format($hermetic_membranes, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Hermetic Membranes" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Hermetic Membranes"
                               id="calc-input-Hermetic_Membranes_units-value">
                    </div>
                    </p>
                    <p>
                        <label>High-Tech Transmitters <?php echo number_format($hightech_transmitters, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="High-Tech Transmitters" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="High-Tech Transmitters"
                               id="calc-input-High_Tech_Transmitters_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Industrial Explosives <?php echo number_format($industrial_explosives, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Industrial Explosives" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Industrial Explosives"
                               id="calc-input-Industrial_Explosives_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Neocoms <?php echo number_format($neocoms, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Neocoms" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Neocoms"
                               id="calc-input-Neocoms_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Nuclear Reactors <?php echo number_format($nuclear_reactors, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Nuclear Reactors" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Nuclear Reactors"
                               id="calc-input-Nuclear_Reactors_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Planetary Vehicles <?php echo number_format($planetary_vehicles, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Planetary Vehicles" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Planetary Vehicles"
                               id="calc-input-Planetary_Vehicles_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Robotics <?php echo number_format($robotics, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Robotics" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Robotics"
                               id="calc-input-Robotics_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Smartfab Units <?php echo number_format($smartfab_units, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Smartfab Units" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Smartfab Units"
                               id="calc-input-Smartfab_Units_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Supercomputers <?php echo number_format($supercomputers, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Supercomputers" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Supercomputers"
                               id="calc-input-Supercomputers_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Synthetic Synapses <?php echo number_format($synthetic_synapses, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Synthetic Synapses" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Synthetic Synapses"
                               id="calc-input-Synthetic_Synapses_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Transcranial Microcontrollers <?php echo number_format($microcontrollers, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Transcranial Microcontrollers" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Transcranial Microcontrollers"
                               id="calc-input-Transcranial_Microcontrollers_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Ukomi Superconductors <?php echo number_format($ukomi, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Ukomi Superconductors" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Ukomi Superconductors"
                               id="calc-input-Ukomi_Superconductors_units-value">
                    </div>
                    </p>
                    <p>
                        <label>Vaccines <?php echo number_format($vaccines, 2, ',', '.');?> ISK/Unit</label>

                    <div class="input-group form-control" id="Vaccines" style="padding: 0; border: none;">
                        <input type="number" class="form-control text-right typeahead" placeholder="Vaccines"
                               id="calc-input-Vaccines_units-value">
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
                    <p id="calc-output-row">Total Biotech Research Reports value <span class="pull-right"><span id="calc-output-biotech-value"></span></p>
                    <p id="calc-output-row">Total Camera Drones value <span class="pull-right"><span id="calc-output-camera_drones-value"></span></p>
                    <p id="calc-output-row">Total Condensates value <span class="pull-right"><span id="calc-output-condensates-value"></span></p>
                    <p id="calc-output-row">Total Cryoprotectant Solution value <span class="pull-right"><span id="calc-output-cryoprotectant-value"></span></p>
                    <p id="calc-output-row">Total Data Chips value <span class="pull-right"><span id="calc-output-data_chips-value"></span></p>
                    <p id="calc-output-row">Total Gel-Matrix Biopaste value <span class="pull-right"><span id="calc-output-gel_matrix-value"></span></p>
                    <p id="calc-output-row">Total Guidance Systems value <span class="pull-right"><span id="calc-output-guidance_systems-value"></span></p>
                    <p id="calc-output-row">Total Hazmat Detection Systems value <span class="pull-right"><span id="calc-output-hazmat_systems-value"></span></p>
                    <p id="calc-output-row">Total Hermetic Membranes value <span class="pull-right"><span id="calc-output-hermetic_membranes-value"></span></p>
                    <p id="calc-output-row">Total High-Tech Transmitters value <span class="pull-right"><span id="calc-output-hightech_transmitters-value"></span></p>
                    <p id="calc-output-row">Total Industrial Explosives value <span class="pull-right"><span id="calc-output-industrial_explosives-value"></span></p>
                    <p id="calc-output-row">Total Neocoms value <span class="pull-right"><span id="calc-output-neocoms-value"></span></p>
                    <p id="calc-output-row">Total Nuclear Reactors value <span class="pull-right"><span id="calc-output-nuclear_reactors-value"></span></p>
                    <p id="calc-output-row">Total Planetary Vehicles value <span class="pull-right"><span id="calc-output-planetary_vehicles-value"></span></p>
                    <p id="calc-output-row">Total Robotics value <span class="pull-right"><span id="calc-output-robotics-value"></span></p>
                    <p id="calc-output-row">Total Smartfab Units value <span class="pull-right"><span id="calc-output-smartfab_units-value"></span></p>
                    <p id="calc-output-row">Total Supercomputers value <span class="pull-right"><span id="calc-output-supercomputers-value"></span></p>
                    <p id="calc-output-row">Total Synthetic Synapses value <span class="pull-right"><span id="calc-output-sythetic_synapses-value"></span></p>
                    <p id="calc-output-row">Total Transcranial Microcontrollers value <span class="pull-right"><span id="calc-output-microcontrollers-value"></span></p>
                    <p id="calc-output-row">Total Ukomi Superconductors value <span class="pull-right"><span id="calc-output-superconductors-value"></span></p>
                    <p id="calc-output-row">Total Vaccines value <span class="pull-right"><span id="calc-output-vaccines-value"></span></p>
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
    <script src="js/t3_pi_cal.js"></script>

</body>
</html>