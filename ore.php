<?php  
    define('indexes', TRUE);
    require_once('./functions/registry.php');
    include 'misc/input_ore.php';
    
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
            W4RP Buy Back Program
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
		
					$('#veldspar_units').val() * <?php $string=implode(",",$veldspar); echo round($string,2); ?> +
					$('#veldspar_units_5').val() * 1.05 * <?php $string=implode(",",$veldspar); echo round($string,2); ?> +
					$('#veldspar_units_10').val() * 1.1 * <?php $string=implode(",",$veldspar); echo round ($string,2); ?> +
					
					$('#scordite_units').val() * <?php $string=implode(",",$scordite); echo round($string,2); ?> +
					$('#scordite_units_5').val() * 1.05 * <?php $string=implode(",",$scordite); echo round($string,2); ?> +
					$('#scordite_units_10').val() * 1.1 * <?php $string=implode(",",$scordite); echo round ($string,2); ?> +
					
					$('#pyroxeres_units').val() * <?php $string=implode(",",$pyroxeres); echo round($string,2); ?> +
					$('#pyroxeres_units_5').val() * 1.05 * <?php $string=implode(",",$pyroxeres); echo round($string,2); ?> +
					$('#pyroxeres_units_10').val() * 1.1 * <?php $string=implode(",",$pyroxeres); echo round ($string,2); ?> +
					
					$('#plagioclase_units').val() * <?php $string=implode(",",$plagioclase); echo round($string,2); ?> +
					$('#plagioclase_units_5').val() * 1.05 * <?php $string=implode(",",$plagioclase); echo round($string,2); ?> +
					$('#plagioclase_units_10').val() * 1.1 * <?php $string=implode(",",$plagioclase); echo round ($string,2); ?> +
					
					$('#omber_units').val() * <?php $string=implode(",",$omber); echo round($string,2); ?> +
					$('#omber_units_5').val() * 1.05 * <?php $string=implode(",",$omber); echo round($string,2); ?> +
					$('#omber_units_10').val() * 1.1 * <?php $string=implode(",",$omber); echo round ($string,2); ?> +
					
					$('#kernite_units').val() * <?php $string=implode(",",$kernite); echo round($string,2); ?> +
					$('#kernite_units_5').val() * 1.05 * <?php $string=implode(",",$kernite); echo round($string,2); ?> +
					$('#kernite_units_10').val() * 1.1 * <?php $string=implode(",",$kernite); echo round ($string,2); ?> +
					
					$('#jaspet_units').val() * <?php $string=implode(",",$jaspet); echo round($string,2); ?> +
					$('#jaspet_units_5').val() * 1.05 * <?php $string=implode(",",$jaspet); echo round($string,2); ?> +
					$('#jaspet_units_10').val() * 1.1 * <?php $string=implode(",",$jaspet); echo round ($string,2); ?> +
					
					$('#hemorphite_units').val() * <?php $string=implode(",",$hemorphite); echo round($string,2); ?> +
					$('#hemorphite_units_5').val() * 1.05 * <?php $string=implode(",",$hemorphite); echo round($string,2); ?> +
					$('#hemorphite_units_10').val() * 1.1 * <?php $string=implode(",",$hemorphite); echo round ($string,2); ?> +
					
					$('#hedbergite_units').val() * <?php $string=implode(",",$hedbergite); echo round($string,2); ?> +
					$('#hedbergite_units_5').val() * 1.05 * <?php $string=implode(",",$hedbergite); echo round($string,2); ?> +
					$('#hedbergite_units_10').val() * 1.1 * <?php $string=implode(",",$hedbergite); echo round ($string,2); ?> +
					
					$('#gneiss_units').val() * <?php $string=implode(",",$gneiss); echo round($string,2); ?> +
					$('#gneiss_units_5').val() * 1.05 * <?php $string=implode(",",$gneiss); echo round($string,2); ?> +
					$('#gneiss_units_10').val() * 1.1 * <?php $string=implode(",",$gneiss); echo round ($string,2); ?> +
					
					$('#ochre_units').val() * <?php $string=implode(",",$dark_ochre); echo round($string,2); ?> +
					$('#ochre_units_5').val() * 1.05 * <?php $string=implode(",",$dark_ochre); echo round($string,2); ?> +
					$('#ochre_units_10').val() * 1.1 * <?php $string=implode(",",$dark_ochre); echo round ($string,2); ?> +
					
					$('#spod_units').val() * <?php $string=implode(",",$spodumain); echo round($string,2); ?> +
					$('#spod_units_5').val() * 1.05 * <?php $string=implode(",",$spodumain); echo round($string,2); ?> +
					$('#spod_units_10').val() * 1.1 * <?php $string=implode(",",$spodumain); echo round ($string,2); ?> +
					
					$('#crokite_units').val() * <?php $string=implode(",",$crokite); echo round($string,2); ?> +
					$('#crokite_units_5').val() * 1.05 * <?php $string=implode(",",$crokite); echo round($string,2); ?> +
					$('#crokite_units_10').val() * 1.1 * <?php $string=implode(",",$crokite); echo round ($string,2); ?> +
					
					$('#bistot_units').val() * <?php $string=implode(",",$bistot); echo round($string,2); ?> +
					$('#bistot_units_5').val() * 1.05 * <?php $string=implode(",",$bistot); echo round($string,2); ?> +
					$('#bistot_units_10').val() * 1.1 * <?php $string=implode(",",$bistot); echo round ($string,2); ?> +
					
					$('#arkonor_units').val() * <?php $string=implode(",",$arkonor); echo round($string,2); ?> +
					$('#arkonor_units_5').val() * 1.05 * <?php $string=implode(",",$arkonor); echo round($string,2); ?> +
					$('#arkonor_units_10').val() * 1.1 * <?php $string=implode(",",$arkonor); echo round ($string,2); ?> +
					
					$('#mercoxit_units').val() * <?php $string=implode(",",$mercoxit); echo round($string,2); ?> +
					$('#mercoxit_units_5').val() * 1.05 * <?php $string=implode(",",$mercoxit); echo round($string,2); ?> +
					$('#mercoxit_units_10').val() * 1.1 * <?php $string=implode(",",$mercoxit); echo round ($string,2); ?>;
					
                $('#total').html((total).toFixed(2));
            });
        });
			</script>
		</head>
    <body>
        <?php
            PrintNavBar();
        ?>

        <div class="clearfix">
        </div>

        <div class="central-header">
            <h1>
                Warped Intentions Buy Back Program.
            </h1>

            <p>
            </p>

            <h4 class="text-danger">
                This site is still in development.  Please report any errors on the Warped Intention Forums.
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
              Database was last updated on: <?php echo $string=implode(",",$update); ?></strong></span><br>
            </div>
        </div>

        <div class="clearfix">
        </div>

        <hr>

        <div class="container">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-2" for=
                    "veldspar_units">Veldspar<br>(<?php $string=implode(",",$veldspar); echo number_format($string, 2, ".", ","); ?>
					<script>var veldspar = '<?php $string=implode(",",$veldspar); echo number_format($string , 2, ".", ","); ?>';</script>
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
                    "scordite_units">Scordite<br>(<?php $string=implode(",",$scordite); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "pyroxeres_units">Pyroxeres<br>(<?php $string=implode(",",$pyroxeres); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "plagioclase_units">Plagioclase<br>(<?php $string=implode(",",$plagioclase); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "omber_units">Omber<br>(<?php $string=implode(",",$omber); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "kernite_units">Kernite<br>(<?php $string=implode(",",$kernite); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "jaspet_units">Jaspet<br>(<?php $string=implode(",",$jaspet); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "hemorphite_units">Hemorphite<br>(<?php $string=implode(",",$hemorphite); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "hedbergite_units">Hedbergite<br>(<?php $string=implode(",",$hedbergite); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "gneiss_units">Gneiss<br>(<?php $string=implode(",",$gneiss); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "ochre_units">Dark Ochre<br>(<?php $string=implode(",",$dark_ochre); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "spod_units">Spodumain<br>(<?php $string=implode(",",$spodumain); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "crokite_units">Crokite<br>(<?php $string=implode(",",$crokite); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "bistot_units">Bistot<br>(<?php $string=implode(",",$bistot); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "arkonor_units">Arkonor<br>(<?php $string=implode(",",$arkonor); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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
                    "mercoxit_units">Mercoxit<br>(<?php $string=implode(",",$mercoxit); echo number_format($string , 2, ".", ","); ?> ISK/Unit)</label>
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

        <?php 
            PrintFooter();
        ?>
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