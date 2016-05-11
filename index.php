<!DOCTYPE html>
<html lang="en">
<head>
<!--metas-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
    <button class="navbar-toggle" data-target=".navbar-collapse"
            data-toggle="collapse" type="button"><span class="sr-only">Toggle
    navigation</span> <span class="icon-bar"></span> <span class=
            "icon-bar"></span> <span class="icon-bar"></span> <span class=
            "icon-bar"></span></button>
    <a class="navbar-brand" href=
            "index.html"><img src="images/logo-wide.png" style=
            "margin-top: -7px;"></a> </div>
  <div class="collapse navbar-collapse pull-right">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Home</a> </li>
      <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle">Games<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">EvE Online</a></li>
          <li><a href="#">Firefall</a></li>
        </ul>
      </li>
      <li><a href="http://www.lone-star-warriors.com/forums">Forum</a> </li>
      <li><a href="#">Services(WIP)</a> </li>
      <li><a href="contact.html">Contact</a> </li>
      <li><a href="about.html">About Us</a> </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href=
                    "#"><img src="images/settings.png"><b class=
                    "caret"></b></a>
        <ul class="dropdown-menu pull-right">
          <li class="dropdown-header">Applications</li>
          <li><a href="#">EvE Online Applications</a> </li>
          <li><a href="#" onclick=
                        "clearCookies();location.reload();">Clear all
            cookies</a> </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<!-- Lead -->
<div class="central-header">
  <h1>Buying to make your lives easier.</h1>
  <p></p>
  <h4 class="text-danger">This site is still under going massive developments! Report any issues on the forums!</h4>
</div>
<div class="container">
  <h4><span class="eve-link" onmouseover="popCorp($(this), 98259161, 'Lone Star Warriors');">Lone Star Warriors</span> offers <a href="http://evewho.com/alli/Yulai+Federation">Yulai</a> and other PROVI-BLOC members a reliable calculator to sell your resources to us within the <a href="http://evemaps.dotlan.net/special/Providence-Catch.pdf">PROVI</a> empire.<br>
  </h4>
  <div class="clearfix"></div>
</div>
<div class="blocks">
  <div class="container">
    <h3 class="page-header"> Ore Belt Resources </h3>
    <div class="view view-first"> <a href="ore.php"> <img src="https://image.eveonline.com/Type/1230_64.png" /> </a> </div>
    <div class="view view-first"> <a href="ore_comp.php"> <img src="https://image.eveonline.com/Type/28432_64.png" /> </a> </div>
    <div class="view view-first"> <a href="mins.php"> <img src="https://image.eveonline.com/Type/34_64.png" /> </a> </div>
    <div class="clearfix"></div>
    <h3 class="page-header"> Ice Belt Resources </h3>
    <div class="view view-first"> <a href="ice.php"><img src="https://image.eveonline.com/Type/16267_64.png" /></a></div>
    <div class="view view-first"> <a href="i_prod.php"><img src="https://image.eveonline.com/Type/16274_64.png" /></a> </div>
    <div class="view view-first"> <a href="fuel.php"><img src="https://image.eveonline.com/Type/4247_64.png" /></a> </div>
    <div class="clearfix"></div>
    <h3 class="page-header"> Planet Resources </h3>
    <div class="view view-first"> <a href="pi.php"><img src="https://image.eveonline.com/Type/2267_64.png" /></a> </div>
    <div class="view view-first"> <a href="pi_t1.php"><img src="https://image.eveonline.com/Type/2396_64.png" /></a> </div>
    <div class="view view-first"> <a href="pi_t2.php"><img src="https://image.eveonline.com/Type/44_64.png" /></a> </div>
    <div class="view view-first"> <a href="pi_t3.php"><img src="https://image.eveonline.com/Type/2869_64.png" /></a> </div>
    <div class="view view-first"> <a href="pi_t4.php"><img src="https://image.eveonline.com/Type/2345_64.png" /></a> </div>
    <div class="clearfix"></div>
    <h3 class="page-header"> Gas Cloud Materials <strong>(Work In Progress)</strong></h3>
    <div class="view view-first"> <img src="https://image.eveonline.com/Type/25268_64.png" />
      <div class="mask"> <a href="booster.php" class="info">Booster Gas</a> </div>
    </div>
    <div class="view view-first"> <img src="https://image.eveonline.com/Type/30375_64.png" />
      <div class="mask"> <a href="full.php" class="info">Fullerenes</a> </div>
    </div>
    <div class="clearfix"></div>
    <h3 class="page-header"> Salvage Materials <strong>(Work In Progress)</strong></h3>
    <div class="view view-first"><a href="salvage.php"><img src="https://image.eveonline.com/Type/25605_64.png" /></a> </div>
	<div class="view view-first"> <img src="https://image.eveonline.com/Type/30024_64.png" />
      <div class="mask"> <a href="ancient.php" class="info">Ancient Salvaged Materials</a> </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div class="clearfix">
</div>
</div>
<hr>
<div class="footer">
  <div class="container">
    <h4>Buy Up Indexes brought to you by Lone Star Warriors</h4>
    <ul class="social">
      <li><a href="https://www.facebook.com/lonestarwarriorsgaming"><i class="fa"></i></a> </li>
      <li><a href="https://twitter.com/lone_warriors"><i class="fb"></i></a> </li>
      <li><a href="https://plus.google.com/+lonestarwarriorsgaming"><i class="fc"></i></a> </li>
    </ul>
    <p>2015 Design by <a href="#">Joery Pigmans</a>. All rights reserved.</p>
    <p>EVE Online and the EVE logo are the registered trademarks of CCP hf. All rights are reserved worldwide. 
      All other trademarks are the property of their respective owners. 
      EVE Online, the EVE logo, EVE and all associated logos and designs are 
      the intellectual property of CCP hf. All artwork, screenshots, characters, vehicles, 
      storylines, world facts or other recognizable features of the intellectual property 
      relating to these trademarks are likewise the intellectual property of CCP hf. CCP hf. 
      has granted permission to Joery Pigmans to use EVE Online and all associated logos and 
      designs for promotional and information purposes on its website but does not endorse, 
      and is not in any way affiliated with, Joery Pigmans. 
      CCP is in no way responsible for the content on or functioning of this website, 
      nor can it be liable for any damage arising from the use of this website.</p>
  </div>
</div>
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
<script src="js/jquery.cookie.js"></script> 
<script src="js/eve-link.js"></script>
</body>
</html>