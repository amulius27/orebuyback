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
    if(isset($_POST["Broadcast_Node"])) {
        $Broadcast_Node = $_POST["Broadcast_Node"];
    } else {
        $Broadcast_Node = 0;
    }
    if(isset($_POST["Integrity_Response_Drones"])) {
        $Integrity_Response_Drones = $_POST["Integrity_Response_Drones"];
    } else {
        $Integrity_Response_Drones = 0;
    }
    if(isset($_POST["Nanofactory"])) {
        $Nanofactory = $_POST["Nanofactory"];
    } else {
        $Nanofactory = 0;
    }
    if(isset($_POST["Organic_Mortar_Applicator"])) {
        $Organic_Mortar_Applicator = $_POST["Organic_Mortar_Applicator"];
    } else {
        $Organic_Mortar_Applicator = 0;
    }
    if(isset($_POST["Recursive_Computing_Module"])) {
        $Recursive_Computing_Module = $_POST["Recursive_Computing_Module"];
    } else {
        $Recursive_Computing_Module = 0;
    }
    if(isset($_POST["Self-Harmonizing_Power_Core"])) {
        $Self_Harmonizing_Power_Core = $_POST["Self-Harmonizing_Power_Core"];
    } else {
        $Self_Harmonizing_Power_Core = 0;
    }
    if(isset($_POST["Sterile_Conduits"])) {
        $Sterile_Conduits = $_POST["Sterile_Conduits"];
    } else {
        $Sterile_Conduits = 0;
    }
    if(isset($_POST["Wetware_Mainframe"])) {
        $Wetware_Mainframe = $_POST["Wetware_Mainframe"];
    } else {
        $Wetware_Mainframe = 0;
    }
    
    $post = array(
        'Broadcast_Node' => $Broadcast_Node,
        'Integrity_Response_Drones' => $Integrity_Response_Drones,
        'Nanofactory' => $Nanofactory,
        'Organic_Mortar_Applicator' => $Organic_Mortar_Applicator,
        'Recursive_Computing_Module' => $Recursive_Computing_Module,
        'Self_Harmonizing_Power_Core' => $Self_Harmonizing_Power_Core,
        'Sterile_Conduits' => $Sterile_Conduits,
        'Wetware_Mainframe' => $Wetware_Mainframe
    );
    
    $contract= PiT4ContractValue($contractTime, $corporation, $post);
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
                PrintPiT4ContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    