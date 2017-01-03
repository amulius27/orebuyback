<?php  
    require_once __DIR__.'/functions/registry.php';
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
</head>
<body>

<?php
    PrintNavBar();
    PrintTitle();
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Quotes (WORK IN PROGRESS)</strong></span><br></h3>
        </div>
        <div class="panel-body" align="center">
            - In the panels below each group of materials is shown with the current price for each material.<br>
            - <strong>Alliance Taxes</strong> are included in this projection.<br>
        </div>
    </div>
</div>
<br>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Minerals">Minerals</a></li>
    <li><a data-toggle="tab" href="#Ore">Ore</a></li>
</ul>

<div class="tab-content">
  <div id="Minerals" class="tab-pane fade in active">
      <canvas id="MineralPriceLineChart" height="800" width="400"></canvas>
  </div>
  <div id="Ore" class="tab-pane fade">
      <canvas id="OrePriceLineChart" height="800" width="400"></canvas>
  </div>
</div>

<script src="js/jquery.cookie.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/handlebars-v1.3.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
<script src="js/pricequotes/minerchart.js"></script>

<?php
    PrintFooter();
?>

</body>
</html>