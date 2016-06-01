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
    if(isset($_POST["Clear_Icicle"])) {
        $Clear_Icicle = $_POST["Clear_Icicle"];
    } else {
        $Clear_Icicle = 0;
    }
    if(isset($_POST["Enriched_Clear_Icicle"])) {
        $Enriched_Clear_Icicle = $_POST["Enriched_Clear_Icicle"];
    } else {
        $Enriched_Clear_Icicle = 0;
    }
    if(isset($_POST["Glacial_Mass"])) {
        $Glacial_Mass = $_POST["Glacial_Mass"];
    } else {
        $Glacial_Mass = 0;
    }
    if(isset($_POST["Smooth_Glacial_Mass"])) {
        $Smooth_Glacial_Mass = $_POST["Smooth_Glacial_Mass"];
    } else {
        $Smooth_Glacial_Mass = 0;
    }
    if(isset($_POST["White_Glaze"])) {
        $White_Glaze = $_POST["White_Glaze"];
    } else {
        $White_Glaze = 0;
    }
    if(isset($_POST["Pristine_White_Glaze"])) {
        $Pristine_White_Glaze = $_POST["Pristine_White_Glaze"];
    } else {
        $Pristine_White_Glaze = 0;
    }
    if(isset($_POST["Blue_Ice"])) {
        $Blue_Ice = $_POST["Blue_Ice"];
    } else {
        $Blue_Ice = 0;
    }
    if(isset($_POST["Thick_Blue_Ice"])) {
        $Thick_Blue_Ice = $_POST["Thick_Blue_Ice"];
    } else {
        $Thick_Blue_Ice = 0;
    }
    if(isset($_POST["Glare_Crust"])) {
        $Glare_Crust = $_POST["Glare_Crust"];
    } else {
        $Glare_Crust = 0;
    }
    if(isset($_POST["Dark_Glitter"])) {
        $Dark_Glitter = $_POST["Dark_Glitter"];
    } else {
        $Dark_Glitter = 0;
    }
    if(isset($_POST["Gelidus"])) {
        $Gelidus = $_POST["Gelidus"];
    } else {
        $Gelidus = 0;
    }
    if(isset($_POST["Krystallos"])) {
        $Krystallos = $_POST["Krystallos"];
    } else {
        $Krystallos = 0;
    }
    
    $post = array(
        'Clear_Icicle' => $Clear_Icicle,
        'Enriched_Clear_Icicle' => $Enriched_Clear_Icicle,
        'Glacial_Mass' => $Glacial_Mass,
        'Smooth_Glacial_Mass' => $Smooth_Glacial_Mass,
        'White_Glaze' => $White_Glaze,
        'Pristine_White_Glaze' => $Pristine_White_Glaze,
        'Blue_Ice' => $Blue_Ice,
        'Thick_Blue_Ice' => $Thick_Blue_Ice,
        'Glare_Crust' => $Glare_Crust,
        'Dark_Glitter' => $Dark_Glitter,
        'Gelidus' => $Gelidus,
        'Krystallos' => $Krystallos
    );
    
    $contract= IceContractValue($contractTime, $corporation, $post);
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
    PrintNavBarContracts();
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
                PrintIceContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    