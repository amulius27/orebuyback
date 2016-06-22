<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = $_POST["Quote_Time"];
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = $_POST["Corporation"];
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Tritanium"])) {
        $Tritanium = $_POST["Tritanium"]; 
    } else {
        $Tritanium = 0;
    }
    if(isset($_POST["Pyerite"])) {
        $Pyerite = $_POST["Pyerite"];
    } else {
        $Pyerite = 0;
    }
    if(isset($_POST["Mexallon"])) {
        $Mexallon = $_POST["Mexallon"];
    } else {
        $Mexallon = 0;
    }
    if(isset($_POST["Nocxium"])) {
        $Nocxium = $_POST["Nocxium"];
    } else {
        $Nocxium = 0;
    }
    if(isset($_POST["Isogen"])) {
        $Isogen = $_POST["Isogen"];
    } else {
        $Isogen = 0;
    }
    if(isset($_POST["Megacyte"])) {
        $Megacyte = $_POST["Megacyte"];
    } else {
        $Megacyte = 0;
    }
    if(isset($_POST["Zydrine"])) {
        $Zydrine = $_POST["Zydrine"];
    } else {
        $Zydrine = 0;
    }
    if(isset($_POST["Morphite"])) {
        $Morphite = $_POST["Morphite"];
    } else {
        $Morphite = 0;
    }
    
    $post = array(
        'Tritanium' => $Tritanium,
        'Pyerite' => $Pyerite,
        'Mexallon' => $Mexallon,
        'Nocxium' => $Nocxium,
        'Isogen' => $Isogen,
        'Megacyte' => $Megacyte,
        'Zydrine' => $Zydrine,
        'Morphite' => $Morphite
    );
    
    $contract= MineralsContractValue($contractTime, $corporation, $post);
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
</head>
<body>

<?php
    PrintNavBarContracts($corporation);
    PrintTitle();
?>

    <div class="container col-md-6 col-md-offset-3">
        <div class="row">
            <h1>Contract Details</h1>
            <table class="table-bordered table-striped">
                <tr>
                    <td>Contract To</td>
                    <td>Contract Type</td>
                    <td>Contract Length</td>
                    <td>Contract Value</td>
                </tr>
                <tr>
                    <td>Spatial Forces</td>
                    <td>Private</td>
                    <td>2 weeks</td>
                    <td><?php echo $contract["Value"]; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <div class="row">
            <h1>Contract Contents</h1><br>
            <?php 
                PrintMineralsContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    