<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = filter_input(INPUT_POST, "Quote_Time", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM PiPrices WHERE ItemID= :id', array('id' => 2867));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Broadcast_Node"])) {
        $Broadcast_Node = filter_input(INPUT_POST, "Broadcast_Node", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Broadcast_Node = 0;
    }
    if(isset($_POST["Integrity_Response_Drones"])) {
        $Integrity_Response_Drones = filter_input(INPUT_POST, "Integrity_Response_Drones", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Integrity_Response_Drones = 0;
    }
    if(isset($_POST["NanoFactory"])) {
        $NanoFactory = filter_input(INPUT_POST, "NanoFactory", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $NanoFactory = 0;
    }
    if(isset($_POST["Organic_Mortar_Applicators"])) {
        $Organic_Mortar_Applicators = filter_input(INPUT_POST, "Organic_Mortar_Applicators", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Organic_Mortar_Applicators = 0;
    }
    if(isset($_POST["Recursive_Computing_Module"])) {
        $Recursive_Computing_Module = filter_input(INPUT_POST, "Recursive_Computing_Module", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Recursive_Computing_Module = 0;
    }
    if(isset($_POST["Self-Harmonizing_Power_Core"])) {
        $Self_Harmonizing_Power_Core = filter_input(INPUT_POST, "Self-Harmonizing_Power_Core", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Self_Harmonizing_Power_Core = 0;
    }
    if(isset($_POST["Sterile_Conduits"])) {
        $Sterile_Conduits = filter_input(INPUT_POST, "Sterile_Conduits", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Sterile_Conduits = 0;
    }
    if(isset($_POST["Wetware_Mainframe"])) {
        $Wetware_Mainframe = filter_input(INPUT_POST, "Wetware_Mainframe", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Wetware_Mainframe = 0;
    }
    
    $post = array(
        'Broadcast_Node' => $Broadcast_Node,
        'Integrity_Response_Drones' => $Integrity_Response_Drones,
        'NanoFactory' => $NanoFactory,
        'Organic_Mortar_Applicators' => $Organic_Mortar_Applicators,
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
    <link href="/../css/bootstrap.min.css" rel="stylesheet">
    <link href="/../css/style.css" rel="stylesheet" type="text/css">
    <link href="/../css/custom.css" rel="stylesheet">
    <link href="/../css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="/../images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(/../images/bgs/pi_bg_blur.jpg);
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
                - The area below displays the details of the contract to make out to Spatial Forces.<br>
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
                PrintContractContents($contract["Number"], 'PiT4ContractContents');
            ?>
        </div>
    </div>
    
    
</body>
</html>
    