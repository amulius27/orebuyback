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
    if(isset($_POST["Biocells"])) {
        $Biocells = $_POST["Biocells"];
    } else {
        $Biocells = 0;
    }
    if(isset($_POST["Construction_Blocks"])) {
        $Construction_Blocks = $_POST["Construction_Blocks"];
    } else {
        $Construction_Blocks = 0;
    }
    if(isset($_POST["Consumer_Electronics"])) {
        $Consumer_Electronics = $_POST["Consumer_Electronics"];
    } else {
        $Consumer_Electronics = 0;
    }
    if(isset($_POST["Coolant"])) {
        $Coolant = $_POST["Coolant"];
    } else {
        $Coolant = 0;
    }
    if(isset($_POST["Enriched_Uranium"])) {
        $Enriched_Uranium = $_POST["Enriched_Uranium"];
    } else {
        $Enriched_Uranium = 0;
    }
    if(isset($_POST["Fertilizer"])) {
        $Fertilizer = $_POST["Fertilizer"];
    } else {
        $Fertilizer = 0;
    }
    if(isset($_POST["Gen_Enhanced_Livestock"])) {
        $Genetically_Enchanced_Livestock = $_POST["Gen_Enhanced_Livestock"];
    } else {
        $Genetically_Enchanced_Livestock = 0;
    }
    if(isset($_POST["Livestock"])) {
        $Livestock = $_POST["Livestock"];
    } else {
        $Livestock = 0;
    }
    if(isset($_POST["Mechanical_Parts"])) {
        $Mechanical_Parts = $_POST["Mechanical_Parts"];
    } else {
        $Mechanical_Parts = 0;
    }
    if(isset($_POST["Microfiber_Shielding"])) {
        $Microfiber_Shielding = $_POST["Microfiber_Shielding"];
    } else {
        $Microfiber_Shielding = 0;
    }
    if(isset($_POST["Miniature_Electronics"])) {
        $Miniature_Electronics = $_POST["Miniature_Electronics"];
    } else {
        $Miniature_Electronics = 0;
    }
    if(isset($_POST["Nanites"])) {
        $Nanites = $_POST["Nanites"];
    } else {
        $Nanites = 0;
    }
    if(isset($_POST["Oxides"])) {
        $Oxides = $_POST["Oxides"];
    } else {
        $Oxides = 0;
    }
    if(isset($_POST["Polyaramids"])) {
        $Polyaramids = $_POST["Polyaramids"];
    } else {
        $Polyaramids = 0;
    }
    if(isset($_POST["Polytextiles"])) {
        $Polytextiles = $_POST["Polytextiles"];
    } else {
        $Polytextiles = 0;
    }
    if(isset($_POST["Rocket_Fuel"])) {
        $Rocket_Fuel = $_POST["Rocket_Fuel"];
    } else {
        $Rocket_Fuel = 0;
    }
    if(isset($_POST["Silicate_Glass"])) {
        $Silicate_Glass = $_POST["Silicate_Glass"];
    } else {
        $Silicate_Glass = 0;
    }
    if(isset($_POST["Superconductors"])) {
        $Superconductors = $_POST["Superconductors"];
    } else {
        $Superconductors = 0;
    }
    if(isset($_POST["Synthetic_Oil"])) {
        $Synthetic_Oil = $_POST["Synthetic_Oil"];
    } else {
        $Synthetic_Oil = 0;
    }
    if(isset($_POST["Test_Cultures"])) {
        $Test_Cultures = $_POST["Test_Cultures"];
    } else {
        $Test_Cultures = 0;
    }
    if(isset($_POST["Transmitter"])) {
        $Transmitter = $_POST["Transmitter"]; 
    } else {
        $Transmitter = 0;
    }
    if(isset($_POST["Viral_Agent"])) {
        $Viral_Agent = $_POST["Viral_Agent"];
    } else {
        $Viral_Agent = 0;
    }
    if(isset($_POST["Water-Cooled_CPU"])) {
        $Water_Cooled_CPU = $_POST["Water-Cooled_CPU"];
    } else {
        $Water_Cooled_CPU = 0;
    }
    
    $post = array(
        'Biocells' => $Biocells,
        'Construction_Blocks' => $Construction_Blocks,
        'Consumer_Electronics' => $Consumer_Electronics,
        'Coolant' => $Coolant,
        'Enriched_Uranium' => $Enriched_Uranium,
        'Fertilizer' => $Fertilizer,
        'Genetically_Enhanced_Livestock' => $Genetically_Enchanced_Livestock,
        'Livestock' => $Livestock,
        'Mechanical_Parts' => $Mechanical_Parts,
        'Microfiber_Shielding' => $Microfiber_Shielding,
        'Miniature_Electronics' => $Miniature_Electronics,
        'Nanites' => $Nanites,
        'Oxides' => $Oxides,
        'Polyaramids' => $Polyaramids,
        'Polytextiles' => $Polytextiles,
        'Rocket_Fuel' => $Rocket_Fuel,
        'Silicate_Glass' => $Silicate_Glass,
        'Superconductors' => $Superconductors,
        'Synthetic_Oil' => $Synthetic_Oil,
        'Test_Cultures' => $Test_Cultures,
        'Transmitter' => $Transmitter,
        'Viral_Agent' => $Viral_Agent,
        'Water_Cooled_CPU' => $Water_Cooled_CPU
    );
    
    $contract= PiT2ContractValue($contractTime, $corporation, $post);
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
                PrintPiT2ContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    