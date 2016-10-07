<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = filter_input(INPUT_POST, "Quote_Time", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Tritanium"])) {
        $Tritanium = filter_input(INPUT_POST, "Tritanium", FILTER_SANITIZE_NUMBER_INT); 
    } else {
        $Tritanium = 0;
    }
    if(isset($_POST["Pyerite"])) {
        $Pyerite = filter_input(INPUT_POST, "Pyerite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pyerite = 0;
    }
    if(isset($_POST["Mexallon"])) {
        $Mexallon = filter_input(INPUT_POST, "Mexallon", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Mexallon = 0;
    }
    if(isset($_POST["Nocxium"])) {
        $Nocxium = filter_input(INPUT_POST, "Nocxium", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Nocxium = 0;
    }
    if(isset($_POST["Isogen"])) {
        $Isogen = filter_input(INPUT_POST, "Isogen", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Isogen = 0;
    }
    if(isset($_POST["Megacyte"])) {
        $Megacyte = filter_input(INPUT_POST, "Megacyte", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Megacyte = 0;
    }
    if(isset($_POST["Zydrine"])) {
        $Zydrine = filter_input(INPUT_POST, "Zydrine", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Zydrine = 0;
    }
    if(isset($_POST["Morphite"])) {
        $Morphite = filter_input(INPUT_POST, "Morphite", FILTER_SANITIZE_NUMBER_INT);
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
    <link href="/../css/bootstrap.min.css" rel="stylesheet">
    <link href="/../css/style.css" rel="stylesheet" type="text/css">
    <link href="/../css/custom.css" rel="stylesheet">
    <link href="/../css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="/../images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(/../images/bgs/ore_bg_blur.jpg);
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
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Contract Instruction Sheet</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                - The area below displays the details of the contract to make out to Spatial Forcese.<br>
                - The Contract To is whom you make out the contract to.<br>
                - Contract Type should <strong>always</strong> be Item Exchange and Private.<br>
            </div>
        </div>
    </div>
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
                PrintContractContents($contract["Number"], 'MineralContractContents');
            ?>
        </div>
    </div>
    
</body>
</html>
    