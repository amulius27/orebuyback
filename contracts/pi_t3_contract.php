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
    if(isset($_POST["Biotech_Research_Reports"])) {
        $Biotech_Research_Reports = $_POST["Biotech_Research_Reports"];
    } else {
        $Biotech_Research_Reports = 0;
    }
    if(isset($_POST["Camera_Drones"])) {
        $Camera_Drones = $_POST["Camera_Drones"];
    } else {
        $Camera_Drones = 0;
    }
    if(isset($_POST["Condensates"])) {
        $Condensates = $_POST["Condensates"];
    } else {
        $Condensates = 0;
    }
    if(isset($_POST["Cryoprotectant_Solution"])) {
        $Cryoprotectant_Solution = $_POST["Cryoprotectant_Solution"];
    } else {
        $Cryoprotectant_Solution = 0;
    }
    if(isset($_POST["Data_Chips"])) {
        $Data_Chips = $_POST["Data_Chips"];
    } else {
        $Data_Chips = 0;
    }
    if(isset($_POST["Gel_Matrix_Biopaste"])) {
        $Gel_Matrix_Biopaste = $_POST["Gel_Matrix_Biopaste"];
    } else {
        $Gel_Matrix_Biopaste = 0;
    }
    if(isset($_POST["Guidance_Systems"])) {
        $Guidance_Systems = $_POST["Guidance_Systems"];
    } else {
        $Guidance_Systems = 0;
    }
    if(isset($_POST["Hazmat_Detection_System"])) {
        $Hazmat_Detection_Systems = $_POST["Hazmat_Detection_Systems"];
    } else {
        $Hazmat_Detection_Systems = 0;
    }
    if(isset($_POST["Hermetic_Membranes"])) {
        $Hermetic_Membranes = $_POST["Hermetic_Membranes"];
    } else {
        $Hermetic_Membranes = 0;
    }
    if(isset($_POST["High_Tech_Transmitters"])) {
        $High_Tech_Transmitters = $_POST["High_Tech_Transmitters"];
    } else {
        $High_Tech_Transmitters = 0;
    }
    if(isset($_POST["Industrial_Explosives"])) {
        $Industrial_Explosives = $_POST["Industrial_Explosives"];
    } else {
        $Industrial_Explosives = 0;
    }
    if(isset($_POST["Neocoms"])) {
        $Neocoms = $_POST["Neocoms"];
    } else {
        $Neocoms = 0;
    }
    if(isset($_POST["Nuclear_Reactors"])) {
        $Nuclear_Reactors = $_POST["Nuclear_Reactors"];
    } else {
        $Nuclear_Reactors = 0;
    }
    if(isset($_POST["Planetary_Vehicles"])) {
        $Planetary_Vehicles = $_POST["Planetary_Vehicles"];
    } else {
        $Planetary_Vehicles = 0;
    }
    if(isset($_POST["Robotics"])) {
        $Robotics = $_POST["Robotics"];
    } else {
        $Robotics = 0 ;
    }
    if(isset($_POST["Smartfab_Units"])) {
        $Smartfab_Units = $_POST["Smartfab_Units"];
    } else {
        $Smartfab_Units = 0;
    }
    if(isset($_POST["Supercomputers"])) {
        $Supercomputers = $_POST["Supercomputers"];
    } else {
        $Supercomputers = 0;
    }
    if(isset($_POST["Synthetic_Synapses"])) {
        $Synthetic_Synapses = $_POST["Synthetic_Synapses"];
    } else {
        $Synthetic_Synapses = 0;
    }
    if(isset($_POST["Transcranial_Microcontrollers"])) {
        $Transcranial_Microcontrollers = $_POST["Transcranial_Microcontrollers"];
    } else {
        $Transcranial_Microcontrollers = 0;
    }
    if(isset($_POST["Ukomi"])) {
        $Ukomi_Superconductors = $_POST["Ukomi"];
    } else {
        $Ukomi_Superconductors = 0;
    }
    if(isset($_POST["Vaccines"])) {
        $Vaccines = $_POST["Vaccines"];
    } else {
        $Vaccines = 0;
    }
    
    $post = array(
        'Biotech_Research_Reports' => $Biotech_Research_Reports,
        'Camera_Drones' => $Camera_Drones,
        'Condensates' => $Condensates,
        'Cryoprotectant_Solution' => $Cryoprotectant_Solution,
        'Data_Chips' => $Data_Chips,
        'Gel_Matrix_Biopaste' => $Gel_Matrix_Biopaste,
        'Guidance_Systems' => $Guidance_Systems,
        'Hazmat_Detection_Systems' => $Hazmat_Detection_Systems,
        'Hermetic_Membranes' => $Hermetic_Membranes,
        'High_Tech_Transmitters' => $High_Tech_Transmitters,
        'Industrial_Explosives' => $Industrial_Explosives,
        'Neocoms' => $Neocoms,
        'Nuclear_Reactors' => $Nuclear_Reactors,
        'Planetary_Vehicles' => $Planetary_Vehicles,
        'Robotics' => $Robotics,
        'Smartfab_Units' => $Smartfab_Units,
        'Supercomputers' => $Supercomputers,
        'Synthetic_Synapses' => $Synthetic_Synapses,
        'Transcranial_Microcontrollers' => $Transcranial_Microcontrollers,
        'Ukomi_Superconductors' => $Ukomi_Superconductors,
        'Vaccines' => $Vaccines
    );
    
    $contract= PiT3ContractValue($contractTime, $corporation, $post);
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
                PrintPiT3ContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    