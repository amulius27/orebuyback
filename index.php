<!DOCTYPE html>
<html lang="en">
<head>
<!--metas-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Lone Star Buyback Calculator" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>W4RP Buy Back Program</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css">  	
	<link href="css/custom.css" rel="stylesheet">  
    <link href="css/eve-link.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<body>
    <?php 
        require_once __DIR__.'/../functions/registry.php';
        PrintHeader();
        PrintBodyTag();
        PrintNavBar(); 
    ?>
    <!-- Lead -->
<div class="central-header">
        <h1>Warped Intentions Buy Back Program</h1>
        <p></p>
            <h4 class="text-danger">This site is still in development.  Please report any errors on the Warped Intention Forums.</h4>
      </div> 
<div class="container">
            <h4>Warped Intentions offers a buy back program designed for the Providence residence a way to sell off the extra materials they have within high sec and the <a href="http://evemaps.dotlan.net/special/Providence-Catch.pdf">Providence</a> region.<br></h4>
			<div class="clearfix"></div>
		</div>
		<div class="blocks">
	<div class="container">
		<h3 class="page-header">
			Ore Belt Resources
		</h3>
                <div class="view view-first">
                    
					<a href="ore.php">
					<img src="https://image.eveonline.com/Type/1230_64.png" />
					</a>
                </div>  
                <div class="view view-first">
                    <a href="comp_o.php">
					<img src="https://image.eveonline.com/Type/28432_64.png" />
                    </a>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/34_64.png" />
                    <div class="mask">
                        <a href="mins.php" class="info">Minerals</a>
                    </div>
                </div> 
                
          <div class="clearfix"></div>
		  <h3 class="page-header">
		    Ice Belt Resources
		  </h3>
		  
		  <div class="view view-first">
                    <img src="https://image.eveonline.com/Type/16267_64.png" />
                    <div class="mask">
                        <a href="ice.php" class="info">Raw Ice</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/28435_64.png" />
                    <div class="mask">
                        <a href="comp_i.php" class="info">Compressed Ice</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/16274_64.png" />
                    <div class="mask">
                        <a href="i_prod.php" class="info">Ice Products</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/4247_64.png" />
                    <div class="mask">
                        <a href="fuel.php" class="info">Fuel Blocks</a>
                    </div>
                </div>
			<div class="clearfix"></div>
		  <h3 class="page-header">
			Planet Resources
		</h3>
		<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/2267_64.png" />
                    <div class="mask">
                        <a href="pi.php" class="info">Raw PI Materials</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="https://image.eveonline.com/Type/2396_64.png" />
                    <div class="mask">
                        <a href="p_pi.php" class="info">Processed PI Materials</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="https://image.eveonline.com/Type/44_64.png" />
                    <div class="mask">
                        <a href="r_pi.php" class="info">Refined PI Materials</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/2869_64.png" />
                    <div class="mask">
                        <a href="a_pi.php" class="info">Advanced PI Materials</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/2345_64.png" />
                    <div class="mask">
                        <a href="s_pi.php" class="info">Specialized PI Materials</a>
                    </div>
                </div>
				<div class="clearfix"></div>
		  <h3 class="page-header">
		    Gas Cloud Materials
		  </h3>
		  
		  <div class="view view-first">
                    <img src="https://image.eveonline.com/Type/25268_64.png" />
                    <div class="mask">
                        <a href="booster.php" class="info">Booster Gas</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/30375_64.png" />
                    <div class="mask">
                        <a href="full.php" class="info">Fullerenes</a>
                    </div>
                </div>
				
			<div class="clearfix"></div>
			<h3 class="page-header">
		    Salvage Materials
		  </h3>
		  
		  <div class="view view-first">
                    <img src="https://image.eveonline.com/Type/30024_64.png" />
                    <div class="mask">
                        <a href="ancient.php" class="info">Ancient Salvaged Materials</a>
                    </div>
                </div>
				<div class="view view-first">
                    <img src="https://image.eveonline.com/Type/25605_64.png" />
                    <div class="mask">
                        <a href="salvage.php" class="info">Salvaged Materials</a>
                    </div>
                </div>
				
			<div class="clearfix"></div>
	</div>
</div>
				</div class="clearfix"></div>
				</div>
				<hr>
  <?php
    PrintFooter();
  ?>
	<!-- Popups -->
     <div class="hide" id="popchar" style="background:white;">
        <table style='border: 1px solid;'>
          <thead>
            <tr style='border-bottom: 1px solid;'>
              <th colspan='3' style='padding-left:2px;' id="popchar-name">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td width='64' height='64' background='img/loaderb32.gif' style='padding:2px; background-repeat:no-repeat; background-position:center;' id="popchar-image">&nbsp;</td>
              <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popchar-content-1">&nbsp;</td>
              <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popchar-content-2">&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="hide" id="popsys" style="background:white;">
        <table style='border: 1px solid;'>
          <thead>
            <tr style='border-bottom: 1px solid;'>
              <th colspan='2' style='padding-left:2px;' id="popsys-name">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>      
              <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popsys-content-1">&nbsp;</td>
              <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id="popsys-content-2">&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>
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
	<script src="js/eve-link.js"></script>
</body>
</html>