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
    if(isset($_POST["Amarr_Fuel_Block"])) {
        $Amarr_Fuel_Block = $_POST["Amarr_Fuel_Block"];
    } else {
        $Amarr_Fuel_Block = 0;
    }
    if(isset($_POST["Caldari_Fuel_Block"])) {
        $Caldari_Fuel_Block = $_POST["Caldari_Fuel_Block"];
    } else {
        $Caldari_Fuel_Block = 0;
    }
    if(isset($_POST["Gallente_Fuel_Block"])) {
        $Gallente_Fuel_Block = $_POST["Gallente_Fuel_Block"];
    } else {
        $Gallente_Fuel_Block = 0;
    }
    if(isset($_POS["Minmatar_Fuel_Block"])) {
        $Minmatar_Fuel_Block = $_POST["Minmatar_Fuel_Block"];
    } else {
        $Minmatar_Fuel_Block = 0;
    }
    
    $post = array(
        'Amarr_Fuel_Block' => $Amarr_Fuel_Block,
        'Caldari_Fuel_Block' => $Caldari_Fuel_Block,
        'Gallente_Fuel_Block' => $Gallente_Fuel_Block,
        'Minmatar_Fuel_Block' => $Minmatar_Fuel_Block
    );
    
    $contract= FuelContractValue($contractTime, $corporation, $post);
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
            background-image:url(images/bgs/EVE_asteroid_ice.jpg);
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
    <div class="container">
        <h1>Contract Contents</h1><br>
        <?php PrintFuelContractContents($contract["Number"]); 
        ?>
    </div>
    
</body>
</html>
    