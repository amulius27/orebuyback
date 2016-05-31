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
    if(isset($_POST["Bacteria"])) {
        $Bacteria = $_POST["Bacteria"];
    } else {
        $Bacteria = 0;
    }
    if(isset($_POST["Biofuels"])) {
        $Biofuels = $_POST["Biofuels"];
    } else {
        $Biofuels = 0;
    }
    if(isset($_POST["Biomass"])) {
        $Biomass = $_POST["Biomass"];
    } else {
        $Biomass = 0;
    }
    if(isset($_POST["Chiral_Structures"])) {
        $Chiral_Structures = $_POST["Chiral_Structures"];
    } else {
        $Chiral_Structures = 0;
    }
    if(isset($_POST["Electrolytes"])) {
        $Electrolytes = $_POST["Electrolytes"];
    } else {
        $Electrolytes = 0;
    }
    if(isset($_POST["Industrial_Fibers"])) {
        $Industrial_Fibers = $_POST["Industrial_Fibers"];
    } else {
        $Industrial_Fibers = 0;
    }
    if(isset($_POST["Oxidizing_Compound"])) {
        $Oxidizing_Compound = $_POST["Oxidizing_Compound"];
    } else {
        $Oxidizing_Compound = 0;
    }
    if(isset($_POST["Oxygen"])) {
        $Oxygen = $_POST["Oxygen"];
    } else {
        $Oxygen = 0;
    }
    if(isset($_POST["Plasmoids"])) {
        $Plasmoids = $_POST["Plasmoids"];
    } else {
        $Plasmoids = 0;
    }
    if(isset($_POST["Precious_Metals"])) {
        $Precious_Metals = $_POST["Precious_Metals"];
    } else {
        $Precious_Metals = 0;
    }
    if(isset($_POST["Proteins"])) {
        $Proteins = $_POST["Proteins"];
    } else {
        $Proteins = 0;
    }
    if(isset($_POST["Reactive_Metals"])) {
        $Reactive_Metals = $_POST["Reactive_Metals"];
    } else {
        $Reactive_Metals = 0;
    }
    if(isset($_POST["Silicon"])) {
        $Silicon = $_POST["Silicon"];
    } else {
        $Silicon = 0;
    }
    if(isset($_POST["Toxic_Metals"])) {
        $Toxic_Metals = $_POST["Toxic_Metals"];
    } else {
        $Toxic_Metals = 0;
    }
    if(isset($_POST["Water"])) {
        $Water = $_POST["Water"];
    } else {
        $Water = 0;
    }
    
    $post = array(
        'Bacteria' => $Bacteria, 
        'Biofuels' => $Biofuels,
        'Biomass' => $Biomass,
        'Chiral_Structures' => $Chiral_Structures,
        'Electrolytes' => $Electrolytes,
        'Industrial_Fibers' => $Industrial_Fibers,
        'Oxidizing_Compound' => $Oxidizing_Compound,
        'Oxygen' => $Oxygen,
        'Plasmoids' => $Plasmoids,
        'Precious_Metals' => $Precious_Metals,
        'Proteins' => $Proteins,
        'Reactive_Metals' => $Reactive_Metals,
        'Silicon' => $Silicon,
        'Toxic_Metals' => $Toxic_Metals,
        'Water' => $Water
    );
    
    $contract= PiT1ContractValue($db, $contractTime, $corporation);
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
            background-image:url(images/bgs/pi_bg_blur.jpg);
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
        <?php 
            PrintPiT1ContractContents($contract["Number"]); 
        ?>
    </div>
    
</body>
</html>
    