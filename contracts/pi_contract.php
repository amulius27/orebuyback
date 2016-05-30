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
    if(isset($_POST["Aqueous_Liquids"])) {
        $Aqueous_Liquids = $_POST["Aqueous_Liquids"];
    } else {
        $Aqueous_Liquids = 0;
    }
    if(isset($_POST["Ionic_Solutions"])) {
        $Ionic_Solutions = $_POST["Ionic_Solutions"];
    } else {
        $Ionic_Solutions = 0;
    }
    if(isset($_POST["Base_Metals"])) {
        $Base_Metals = $_POST["Base_Metals"];
    } else {
        $Base_Metals = 0;
    }
    if(isset($_POST["Heavy_Metals"])) {
        $Heavy_Metals = $_POST["Heavy_Metals"];
    } else {
        $Heavy_Metals = 0;
    }
    if(isset($_POST["Noble_Metals"])) {
        $Noble_Metals = $_POST["Noble_Metals"];
    } else {
        $Noble_Metals = 0;
    }
    if(isset($_POST["Carbon_Compounds"])) {
        $Carbon_Compounds = $_POST["Carbon_Compounds"];
    } else {
        $Carbon_Compounds = 0;
    }
    if(isset($_POST["Micro_Organisms"])) {
        $Micro_Organisms = $_POST["Micro_Organisms"];
    } else {
        $Micro_Organisms = 0;
    }
    if(isset($_POST["Complex_Organisms"])) {
        $Complex_Organisms = $_POST["Complex_Organisms"];
    } else {
        $Complex_Organisms = 0;
    }
    if(isset($_POST["Planktic_Colonies"])) {
        $Planktic_Colonies = $_POST["Planktic_Colonies"];
    } else {
        $Planktic_Colonies = 0;
    }
    if(isset($_POST["Noble_Gas"])) {
        $Noble_Gas = $_POST["Noble_Gas"];
    } else {
        $Noble_Gas = 0;
    }
    if(isset($_POST["Reactive_Metals"])) {
        $Reactive_Metals = $_POST["Reactive_Metals"];
    } else {
        $Reactive_Metals = 0;
    }
    if(isset($_POST["Felsic_Magma"])) {
        $Felsic_Magma = $_POST["Felsic_Magma"];
    } else {
        $Felsic_Magma = 0;
    }
    if(isset($_POST["Non-CS_Materials"])) {
        $NonCS_Materials = $_POST["Non-CS_Materials"];
    } else {
        $NonCS_Materials = 0;
    }
    if(isset($_POST["Suspended_Plasma"])) {
        $Suspended_Plasma = $_POST["Suspended_Plasma"];
    } else {
        $Suspended_Plasma = 0;
    }
    if(isset($_POST["Autotrophs"])) {
        $Autotrophs = $_POST["Autotrophs"];
    } else {
        $Autotrophs = 0;
    }
    
    $post = array(
        'Aqueous_Liquid' => $Aqueous_Liquids,
        'Ionic_Solutions' => $Ionic_Solutions,
        'Base_Metals' => $Base_Metals,
        'Heavy_Metals' => $Heavy_Metals,
        'Noble_Metals' => $Noble_Metals,
        'Carbon_Compounds' => $Carbon_Compounds,
        'Micro_Organisms' => $Micro_Organisms,
        'Complex_Organisms' => $Complex_Organisms,
        'Planktic_Colonies' => $Planktic_Colonies,
        'Noble_Gas' => $Noble_Gas,
        'Reactive_Metals' => $Reactive_Metals,
        'Felsic_Magma' => $Felsic_Magma,
        'Non-CS_Materials' => $NonCS_Materials,
        'Suspended_Plasma' => $Suspended_Plasma,
        'Autotrophs' => $Autotrophs
    );
    
    $contract= PiContractValue($contractTime, $corporation, $post);
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
        <?php PrintPiContractContents($contract["Number"], $db); 
              DBClose($db);
        ?>
    </div>
    
</body>
</html>
    