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
    if(isset($_POST["C50_Gas"])) {
        $C50_Gas = filter_input(INPUT_POST, "C50_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C50_Gas = 0;
    }
    if(isset($_POST["C60_Gas"])) {
        $C60_Gas = filter_input(INPUT_POST, "C60_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C60_Gas = 0;
    }
    if(isset($_POST["C70_Gas"])) {
        $C70_Gas = filter_input(INPUT_POST, "C70_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C70_Gas = 0;
    }
    if(isset($_POS["C72_Gas"])) {
        $C72_Gas = filter_input(INPUT_POST, "C72_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C72_Gas = 0;
    }
    if(isset($_POST["C84_Gas"])) {
        $C84_Gas = filter_input(INPUT_POST, "C84_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C84_Gas = 0;
    }
    if(isset($_POST["C28_Gas"])) {
        $C28_Gas = filter_input(INPUT_POST, "C28_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C28_Gas = 0;
    }
    if(isset($_POST["C32_Gas"])) {
        $C32_Gas = filter_input(INPUT_POST, "C32_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C32_Gas = 0;
    }
    if(isset($_POS["C320_Gas"])) {
        $C320_Gas = filter_input(INPUT_POST, "C320_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C320_Gas = 0;
    }
    if(isset($_POS["C540_Gas"])) {
        $C540_Gas = filter_input(INPUT_POST, "C540_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C540_Gas = 0;
    }
    
    $post = array(
        'C50_Gas' => $C50_Gas,
        'C60_Gas' => $C60_Gas,
        'C70_Gas' => $C70_Gas,
        'C72_Gas' => $C72_Gas,
        'C84_Gas' => $C84_Gas,
        'C28_Gas' => $C28_Gas,
        'C32_Gas' => $C32_Gas,
        'C320_Gas' => $C320_Gas,
        'C540_Gas' => $C540_Gas
    );
    
    $contract = WGasContractValue($contractTime, $corporation, $post);
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
            background-image:url(/../images/bgs/EVE_asteroid_ice.jpg);
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
                PrintContractContents($contract["Number"], 'WGasContractContents');
            ?>
        </div>
    </div>
    
</body>
</html>
    