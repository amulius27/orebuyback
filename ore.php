<?php  define('indexes', TRUE);
include '../input_ore.php';
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
        <script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
        </script>
        <script src=
        "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <script>
		$(document).ready(function() {
		$('.form-control').keyup(function () {
        var total = 
		
					$('#veldspar_units').val() * <?php $string=implode(",",$veld[0]); echo round($string*0.925,2); ?> +
					$('#veldspar_units_5').val() * 1.05 * <?php $string=implode(",",$veld[0]); echo round($string*0.925,2); ?> +
					$('#veldspar_units_10').val() * 1.1 * <?php $string=implode(",",$veld[0]); echo round ($string*0.925,2); ?> +
					
					$('#scordite_units').val() * <?php $string=implode(",",$scor[0]); echo round($string*0.925,2); ?> +
					$('#scordite_units_5').val() * 1.05 * <?php $string=implode(",",$scor[0]); echo round($string*0.925,2); ?> +
					$('#scordite_units_10').val() * 1.1 * <?php $string=implode(",",$scor[0]); echo round ($string*0.925,2); ?> +
					
					$('#pyroxeres_units').val() * <?php $string=implode(",",$pyro[0]); echo round($string*0.925,2); ?> +
					$('#pyroxeres_units_5').val() * 1.05 * <?php $string=implode(",",$pyro[0]); echo round($string*0.925,2); ?> +
					$('#pyroxeres_units_10').val() * 1.1 * <?php $string=implode(",",$pyro[0]); echo round ($string*0.925,2); ?> +
					
					$('#plagioclase_units').val() * <?php $string=implode(",",$plag[0]); echo round($string*0.925,2); ?> +
					$('#plagioclase_units_5').val() * 1.05 * <?php $string=implode(",",$plag[0]); echo round($string*0.925,2); ?> +
					$('#plagioclase_units_10').val() * 1.1 * <?php $string=implode(",",$plag[0]); echo round ($string*0.925,2); ?> +
					
					$('#omber_units').val() * <?php $string=implode(",",$omber[0]); echo round($string*0.925,2); ?> +
					$('#omber_units_5').val() * 1.05 * <?php $string=implode(",",$omber[0]); echo round($string*0.925,2); ?> +
					$('#omber_units_10').val() * 1.1 * <?php $string=implode(",",$omber[0]); echo round ($string*0.925,2); ?> +
					
					$('#kernite_units').val() * <?php $string=implode(",",$kern[0]); echo round($string*0.925,2); ?> +
					$('#kernite_units_5').val() * 1.05 * <?php $string=implode(",",$kern[0]); echo round($string*0.925,2); ?> +
					$('#kernite_units_10').val() * 1.1 * <?php $string=implode(",",$kern[0]); echo round ($string*0.925,2); ?> +
					
					$('#jaspet_units').val() * <?php $string=implode(",",$jasp[0]); echo round($string*0.925,2); ?> +
					$('#jaspet_units_5').val() * 1.05 * <?php $string=implode(",",$jasp[0]); echo round($string*0.925,2); ?> +
					$('#jaspet_units_10').val() * 1.1 * <?php $string=implode(",",$jasp[0]); echo round ($string*0.925,2); ?> +
					
					$('#hemorphite_units').val() * <?php $string=implode(",",$hemo[0]); echo round($string*0.925,2); ?> +
					$('#hemorphite_units_5').val() * 1.05 * <?php $string=implode(",",$hemo[0]); echo round($string*0.925,2); ?> +
					$('#hemorphite_units_10').val() * 1.1 * <?php $string=implode(",",$hemo[0]); echo round ($string*0.925,2); ?> +
					
					$('#hedbergite_units').val() * <?php $string=implode(",",$hedb[0]); echo round($string*0.925,2); ?> +
					$('#hedbergite_units_5').val() * 1.05 * <?php $string=implode(",",$hedb[0]); echo round($string*0.925,2); ?> +
					$('#hedbergite_units_10').val() * 1.1 * <?php $string=implode(",",$hedb[0]); echo round ($string*0.925,2); ?> +
					
					$('#gneiss_units').val() * <?php $string=implode(",",$gneiss[0]); echo round($string*0.925,2); ?> +
					$('#gneiss_units_5').val() * 1.05 * <?php $string=implode(",",$gneiss[0]); echo round($string*0.925,2); ?> +
					$('#gneiss_units_10').val() * 1.1 * <?php $string=implode(",",$gneiss[0]); echo round ($string*0.925,2); ?> +
					
					$('#ochre_units').val() * <?php $string=implode(",",$dark[0]); echo round($string*0.925,2); ?> +
					$('#ochre_units_5').val() * 1.05 * <?php $string=implode(",",$dark[0]); echo round($string*0.925,2); ?> +
					$('#ochre_units_10').val() * 1.1 * <?php $string=implode(",",$dark[0]); echo round ($string*0.925,2); ?> +
					
					$('#spod_units').val() * <?php $string=implode(",",$spod[0]); echo round($string*0.925,2); ?> +
					$('#spod_units_5').val() * 1.05 * <?php $string=implode(",",$spod[0]); echo round($string*0.925,2); ?> +
					$('#spod_units_10').val() * 1.1 * <?php $string=implode(",",$spod[0]); echo round ($string*0.925,2); ?> +
					
					$('#crokite_units').val() * <?php $string=implode(",",$crok[0]); echo round($string*0.925,2); ?> +
					$('#crokite_units_5').val() * 1.05 * <?php $string=implode(",",$crok[0]); echo round($string*0.925,2); ?> +
					$('#crokite_units_10').val() * 1.1 * <?php $string=implode(",",$crok[0]); echo round ($string*0.925,2); ?> +
					
					$('#bistot_units').val() * <?php $string=implode(",",$bis[0]); echo round($string*0.925,2); ?> +
					$('#bistot_units_5').val() * 1.05 * <?php $string=implode(",",$bis[0]); echo round($string*0.925,2); ?> +
					$('#bistot_units_10').val() * 1.1 * <?php $string=implode(",",$bis[0]); echo round ($string*0.925,2); ?> +
					
					$('#arkonor_units').val() * <?php $string=implode(",",$ark[0]); echo round($string*0.925,2); ?> +
					$('#arkonor_units_5').val() * 1.05 * <?php $string=implode(",",$ark[0]); echo round($string*0.925,2); ?> +
					$('#arkonor_units_10').val() * 1.1 * <?php $string=implode(",",$ark[0]); echo round ($string*0.925,2); ?> +
					
					$('#mercoxit_units').val() * <?php $string=implode(",",$merc[0]); echo round($string*0.925,2); ?> +
					$('#mercoxit_units_5').val() * 1.05 * <?php $string=implode(",",$merc[0]); echo round($string*0.925,2); ?> +
					$('#mercoxit_units_10').val() * 1.1 * <?php $string=implode(",",$merc[0]); echo round ($string*0.925,2); ?>;
					
                $('#total').html((total).toFixed(2));
            });
        });
			</script>
		</head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse"
                data-toggle="collapse" type="button"><span class=
                "sr-only">Toggle navigation</span> <span class=
                "icon-bar"></span> <span class="icon-bar"></span> <span class=
                "icon-bar"></span> <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html"><img src=
                "images/logo-wide.png" style="margin-top: -7px;"></a>
            </div>

            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html">Home</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle=
                        "dropdown">Games<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">EvE Online</a>
                            </li>

                            <li>
                                <a href="#">Firefall</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=
                        "http://www.lone-star-warriors.com/forums">Forum</a>
                    </li>

                    <li>
                        <a href="#">Services(WIP)</a>
                    </li>

                    <li>
                        <a href="contact.html">Contact</a>
                    </li>

                    <li>
                        <a href="about.html">About Us</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href=
                        "#"><img src="images/settings.png"><b class=
                        "caret"></b></a>
                        <ul class="dropdown-menu pull-right">
                            <li class="dropdown-header">Applications
                            </li>

                            <li>
                                <a href="#">EvE Online Applications</a>
                            </li>

                            <li>
                                <a href="#" onclick=
                                "clearCookies();location.reload();">Clear all
                                cookies</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="clearfix">
        </div>

        <div class="central-header">
            <h1>
                Buying to make your lives easier.
            </h1>

            <p>
            </p>

            <h4 class="text-danger">
                This site is still under going massive developments! Report any
                issues on the forums!
            </h4>
        </div>

        <div class="container">
            <div align="center">
                <span style=
                "font-family: Arial; color: #FF2A2A;"><strong>INSTRUCTIONS</strong></span><br>

                - In the form below, enter the number of units that you are
                selling back to the Corporation.<br>
                - When finished, click the <strong>CALCULATE</strong>
                button.<br>
                - Then just double-click the contract value and copy to the
                clipboard.<br>
                <span style="font-family: Arial; color: #8FEF2F;"><strong>
              Database was last updated on: <?php echo $string=implode(",",$update[0]); ?></strong></span><br>
            </div>
        </div>

        <div class="clearfix">
        </div>

        <hr>

        <div class="container">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-2" for=
                    "veldspar_units">Veldspar<br>(<?php $string=implode(",",$veld[0]); echo number_format($string*0.925 , 2, ",", "."); ?>
					<script>var veldspar = '<?php $string=implode(",",$veld[0]); echo number_format($string*0.925 , 2, ",", "."); ?>';</script>
                    ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="veldspar_units"
                        placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input class="form-control" id="veldspar_units_5"
                        placeholder="Concentrated" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input class="form-control" id="veldspar_units_10"
                        placeholder="Dense" type="number">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-sm-2" for=
                    "scordite_units">Scordite<br>(<?php $string=implode(",",$scor[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="scordite_units" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="scordite_units_5" class="form-control" placeholder="Condensed" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="scordite_units_10" class="form-control" placeholder="Massive" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "pyroxeres_units">Pyroxeres<br>(<?php $string=implode(",",$pyro[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="pyroxeres_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="pyroxeres_units_5" class="form-control" placeholder="Solid" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="pyroxeres_units_10" class="form-control" placeholder="Viscous" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "plagioclase_units">Plagioclase<br>(<?php $string=implode(",",$plag[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="plagioclase_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="plagioclase_units_5" class="form-control" placeholder="Azure" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="plagioclase_units_10" class="form-control" placeholder="Rich" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "omber_units">Omber<br>(<?php $string=implode(",",$omber[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="omber_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="omber_units_5" class="form-control" placeholder="Silvery" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="omber_units_10" class="form-control" placeholder="Golden" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "kernite_units">Kernite<br>(<?php $string=implode(",",$kern[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="kernite_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="kernite_units_5" class="form-control" placeholder="Luminous" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="kernite_units_10" class="form-control" placeholder="Fiery" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "jaspet_units">Jaspet<br>(<?php $string=implode(",",$jasp[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="jaspet_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="jaspet_units_5" class="form-control" placeholder="Pure" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="jaspet_units_10" class="form-control" placeholder="Pristine" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "hemorphite_units">Hemorphite<br>(<?php $string=implode(",",$hemo[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="hemorphite_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="hemorphite_units_5" class="form-control" placeholder="Vivid" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="hemorphite_units_10" class="form-control" placeholder="Radiant" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "hedbergite_units">Hedbergite<br>(<?php $string=implode(",",$hedb[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="hedbergite_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="hedbergite_units_5" class="form-control" placeholder="Vitric" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="hedbergite_units_10" class="form-control" placeholder="Glazed" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "gneiss_units">Gneiss<br>(<?php $string=implode(",",$gneiss[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="gneiss_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="gneiss_units_5" class="form-control" placeholder="Iridescent" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="gneiss_units_10" class="form-control" placeholder="Glazed" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "ochre_units">Dark Ochre<br>(<?php $string=implode(",",$dark[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="ochre_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="ochre_units_5" class="form-control" placeholder="Onyx" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="ochre_units_10" class="form-control" placeholder="Obsidian" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "spod_units">Spodumain<br>(<?php $string=implode(",",$spod[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="spod_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="spod_units_5" class="form-control" placeholder="Bright" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="spod_units_10" class="form-control" placeholder="Gleaming" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "crokite_units">Crokite<br>(<?php $string=implode(",",$crok[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="crokite_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="crokite_units_5" class="form-control" placeholder="Sharp" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="crokite_units_10" class="form-control" placeholder="Crystalline" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "bistot_units">Bistot<br>(<?php $string=implode(",",$bis[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="bistot_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="bistot_units_5" class="form-control" placeholder="Triclinic" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="bistot_units_10" class="form-control" placeholder="Monoclinic" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "arkonor_units">Arkonor<br>(<?php $string=implode(",",$ark[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="arkonor_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="arkonor_units_5" class="form-control" placeholder="Crimson" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="arkonor_units_10" class="form-control" placeholder="Prime" type="number">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-sm-2" for=
                    "mercoxit_units">Mercoxit<br>(<?php $string=implode(",",$merc[0]); echo number_format($string*0.925 , 2, ",", "."); ?> ISK/Unit)</label>
                    <div class="col-sm-3">
                        <input id="mercoxit_units" class="form-control" placeholder="Base" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="mercoxit_units_5" class="form-control" placeholder="Magma" type="number">
                    </div>

                    <div class="col-sm-3">
                        <input id="mercoxit_units_10" class="form-control" placeholder="Vitreous" type="number">
                    </div>
                </div>
				
            </form>
        </div>

        <div class="clearfix">

            <div class="price" id="results" style="text-align: center">
                Contract Value = <span id="total">0.00</span> ISK
            </div>

    </div>

        <hr>

        <div class="footer">
            <div class="container">
                <h4>
                    Buy Up Indexes brought to you by Lone Star Warriors
                </h4>

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
        <!-- Clipboard -->

        <div aria-hidden="true" aria-labelledby="clipboardLabel" class="modal"
        id="clipboard" onkeydown=
        "if (event.keyCode == 13) $('#clipboard').modal('hide');" role="dialog"
        tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" class="close" data-dismiss=
                        "modal" type="button">&times;</button>
                        <h4 class="modal-title" id="clipboardLabel">
                            Copy to clipboard: CTRL-C, Enter
                        </h4>
                    </div>

                    <div class="modal-body">
                        <input class="form-control text-right" id=
                        "clipboard-content" type="text">
                    </div>
                </div>
            </div>
        </div>
        <!-- Clipboard -->
        <script src="js/jquery.cookie.js">
        </script> 
        <script src="js/eve-link.js">
        </script>
        </body>
</html>