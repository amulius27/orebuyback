<?php  
    require_once __DIR__.'/functions/registry.php';
    $db = DBOpen();
    
    $MineralUpdateTime = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices');
    $MineralPrices = $db->fetchColumnMany('SELECT * FROM MineralPrices WHERE time= :update', array('update' => $MineralUpdateTime));
    
    $PiUpdateTime = $db->fetchColumn('SELECT MAX(time) FROM PiPrices');
    $PiPrices = $db->fetchColumnMany('SELECT * FROM PiPrices WHERE time= :update', array('update' => $PiUpdateTime));
    
    $SalvageUpdateTime = $db->fetchColumn('SELECT MAX(time) FROM SalvagePrices');
    $SalvagePrices = $db->fetchColumnMany('SELECT * FROM SalvagePrices WHERE time= :update', array('update' => $SalvageUpdateTime));
    
    $FuelUpdateTime = $db->fetchColumn('SELECT MAX(time) FROM IceProductPrices');
    $FuelPrices = $db->fetchColumnMany('SELECT * FROM IceProductPrices WHERE time= :update', array('update' => 'IceProductPrices'));
    
    $OreUpdateTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices');
    $OrePrices = $db-> fetchColumnMany('SELECT * FROM OrePrices WHERE time= :update', array('update' => $OreUpdateTime));
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
            background-image:url(images/bgs/scifi-mmogames-entropy-asteroid-belt-screenshot.jpg);
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

<div class="clearfix"></div>

<div class="container">
    <div class="row">
        
    </div>
</div>

<?php
    PrintFooter();
    DBClose($db);
?>
<script src="js/jquery.cookie.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/handlebars-v1.3.0.js"></script>
<script src="js/ore_cal.js"></script>

</body>
</html>