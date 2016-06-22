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
    if(isset($_POST["Compressed_Veldspar"])) {
        $Compressed_Veldspar = $_POST["Compressed_Veldspar"];
    } else {
        $Compressed_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Concentrated_Veldspar"])) {
        $Compressed_Concentrated_Veldspar = $_POST["Compressed_Concentrated_Veldspar"];
    } else {
        $Compressed_Concentrated_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Dense_Veldspar"])) {
        $Compressed_Dense_Veldspar = $_POST["Compressed_Dense_Veldspar"];
    } else {
        $Compressed_Dense_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Scordite"])) {
        $Compressed_Scordite = $_POST["Compressed_Scordite"];
    } else {
        $Compressed_Scordite = 0;
    }
    if(isset($_POST["Compressed_Condensed_Scordite"])) {
        $Compressed_Condensed_Scordite = $_POST["Compressed_Condensed_Scordite"];
    } else {
        $Compressed_Condensed_Scordite = 0;
    }
    if(isset($_POST["Compressed_Massive_Scordite"])) {
        $Compressed_Massive_Scordite = $_POST["Compressed_Massive_Scordite"];
    } else {
        $Compressed_Massive_Scordite = 0;
    }
    if(isset($_POST["Compressed_Pyroxeres"])) {
        $Compressed_Pyroxeres = $_POST["Compressed_Pyroxeres"];
    } else {
        $Compressed_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Solid_Pyroxeres"])) {
        $Compressed_Solid_Pyroxeres = $_POST["Compressed_Solid_Pyroxeres"];
    } else {
        $Compressed_Solid_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Viscous_Pyroxeres"])) {
        $Compressed_Viscous_Pyroxeres = $_POST["Compressed_Viscous_Pyroxeres"];
    } else {
        $Compressed_Viscous_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Plagioclase"])) {
        $Compressed_Plagioclase = $_POST["Compressed_Plagioclase"];
    } else {
        $Compressed_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Azure_Plagioclase"])) {
        $Compressed_Azure_Plagioclase = $_POST["Compressed_Azure_Plagioclase"];
    } else {
        $Compressed_Azure_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Rich_Plagioclase"])) {
        $Compressed_Rich_Plagioclase = $_POST["Compressed_Rich_Plagioclase"];
    } else {
        $Compressed_Rich_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Omber"])) {
        $Compressed_Omber = $_POST["Compressed_Omber"];
    } else {
        $Compressed_Omber = 0;
    }
    if(isset($_POST["Compressed_Silvery_Omber"])) {
        $Compressed_Silvery_Omber = $_POST["Compressed_Silvery_Omber"];
    } else {
        $Compressed_Silvery_Omber = 0;
    }
    if(isset($_POST["Compressed_Golden_Omber"])) {
        $Compressed_Golden_Omber = $_POST["Compressed_Golden_Omber"];
    } else {
        $Compressed_Golden_Omber = 0;
    }
    if(isset($_POST["Compressed_Kernite"])) {
        $Compressed_Kernite = $_POST["Compressed_Kernite"];
    } else {
        $Compressed_Kernite = 0;
    }
    if(isset($_POST["Compressed_Luminous_Kernite"])) {
        $Compressed_Luminous_Kernite = $_POST["Compressed_Luminous_Kernite"];
    } else {
        $Compressed_Luminous_Kernite = 0;
    }
    if(isset($_POST["Compressed_Fiery_Kernite"])) {
        $Compressed_Fiery_Kernite = $_POSt["Compressed_Fiery_Kernite"];
    } else {
        $Compressed_Fiery_Kernite = 0;
    }
    if(isset($_POST["Compressed_Jaspet"])) {
        $Compressed_Jaspet = $_POST["Compressed_Jaspet"];
    } else {
        $Compressed_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Pure_Jaspet"])) {
        $Compressed_Pure_Jaspet = $_POST["Compressed_Pure_Jaspet"];
    } else {
        $Compressed_Pure_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Pristine_Jaspet"])) {
        $Compressed_Pristine_Jaspet = $_POST["Compressed_Pristine_Jaspet"];
    } else {
        $Compressed_Pristine_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Hemorphite"])) {
        $Compressed_Hemorphite = $_POST["Compressed_Hemorphite"];
    } else {
        $Compressed_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Vivid_Hemorphite"])) {
        $Compressed_Vivid_Hemorphite = $_POST["Compressed_Vivid_Hemorphite"];
    } else {
        $Compressed_Vivid_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Radiant_Hemorphite"])) {
        $Compressed_Radiant_Hemorphite = $_POST["Compressed_Radiant_Hemorphite"];
    } else {
        $Compressed_Radiant_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Hedbergite"])) {
        $Compressed_Hedbergite = $_POST["Compressed_Hedbergite"];
    } else {
        $Compressed_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Vitric_Hedbergite"])) {
        $Compressed_Vitric_Hedbergite = $_POST["Compressed_Vitric_Hedbergite"];
    } else {
        $Compressed_Vitric_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Glazed_Hedbergite"])) {
        $Compressed_Glazed_Hedbergite = $_POST["Compressed_Glazed_Hedbergite"];
    } else {
        $Compressed_Glazed_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Gneiss"])) {
        $Compressed_Gneiss = $_POST["Compressed_Gneiss"];
    } else {
        $Compressed_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Iridescent_Gneiss"])) {
        $Compressed_Iridescent_Gneiss = $_POST["Compressed_Iridescent_Gneiss"];
    } else {
        $Compressed_Iridescent_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Prismatic_Gneiss"])) {
        $Compressed_Prismatic_Gneiss = $_POST["Compressed_Prismatic_Gneiss"];
    } else {
        $Compressed_Prismatic_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Dark_Ochre"])) {
        $Compressed_Dark_Ochre = $_POST["Compressed_Dark_Ochre"];
    } else {
        $Compressed_Dark_Ochre = 0;
    }
    if(isset($_POST["Compressed_Onyx_Ochre"])) {
        $Compressed_Onyx_Ochre = $_POST["Compressed_Onyx_Ochre"];
    } else {
        $Compressed_Onyx_Ochre = 0;
    }
    if(isset($_POST["Compressed_Obsidian_Ochre"])) {
        $Compressed_Obsidian_Ochre = $_POST["Compressed_Obsidian_Ochre"];
    } else {
        $Compressed_Obsidian_Ochre = 0;
    }
    if(isset($_POST["Compressed_Spodumain"])) {
        $Compressed_Spodumain = $_POST["Compressed_Spodumain"];
    } else {
        $Compressed_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Bright_Spodumain"])) {
        $Compressed_Bright_Spodumain = $_POST["Compressed_Bright_Spodumain"];
    } else {
        $Compressed_Bright_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Gleaming_Spodumain"])) {
        $Compressed_Gleaming_Spodumain = $_POST["Compressed_Gleaming_Spodumain"];
    } else {
        $Compressed_Gleaming_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Crokite"])) {
        $Compressed_Crokite = $_POST["Compressed_Crokite"];
    } else {
        $Compressed_Crokite = 0;
    }
    if(isset($_POST["Compressed_Sharp_Crokite"])) {
        $Compressed_Sharp_Crokite = $_POST["Compressed_Sharp_Crokite"];
    } else {
        $Compressed_Sharp_Crokite = 0;
    }
    if(isset($_POST["Compressed_Crystalline_Crokite"])) {
        $Compressed_Crystalline_Crokite = $_POST["Compressed_Crystalline_Crokite"];
    } else {
        $Compressed_Crystalline_Crokite = 0;
    }
    if(isset($_POST["Compressed_Bistot"])) {
        $Compressed_Bistot = $_POST["Compressed_Bistot"]; 
    } else {
        $Compressed_Bistot = 0;
    }
    if(isset($_POST["Compressed_Triclinic_Bistot"])) {
        $Compressed_Triclinic_Bistot = $_POST["Compressed_Triclinic_Bistot"]; 
    } else {
        $Compressed_Triclinic_Bistot = 0;
    }
    if(isset($_POST["Compressed_Monoclinic_Bistot"])) {
        $Compressed_Monoclinic_Bistot = $_POST["Compressed_Monoclinic_Bistot"];
    } else {
        $Compressed_Monoclinic_Bistot = 0;
    }
    if(isset($_POST["Compressed_Arkonor"])) {
        $Compressed_Arkonor = $_POST["Compressed_Arkonor"];
    } else {
        $Compressed_Arkonor = 0; 
    }
    if(isset($_POST["Compressed_Crimson_Arkonor"])) {
        $Compressed_Crimson_Arkonor = $_POST["Compressed_Crimson_Arkonor"];
    } else {
        $Compressed_Crimson_Arkonor = 0;
    }
    if(isset($_POST["Compressed_Prime_Arkonor"])) {
        $Compressed_Prime_Arkonor = $_POST["Compressed_Prime_Arkonor"];
    } else {
        $Compressed_Prime_Arkonor = 0;
    }
    if(isset($_POST["Compressed_Mercoxit"])) {
        $Compressed_Mercoxit = $_POST["Compressed_Mercoxit"];
    } else {
        $Compressed_Mercoxit = 0;
    }
    if(isset($_POST["Compressed_Magma_Mercoxit"])) {
        $Compressed_Magma_Mercoxit = $_POST["Compressed_Magma_Mercoxit"];
    } else {
        $Compressed_Magma_Mercoxit = 0;
    }
    if(isset($_POST["Compressed_Vitreous_Mercoxit"])) {
        $Compressed_Vitreous_Mercoxit = $_POST["Compressed_Vitreous_Mercoxit"];
    } else {
        $Compressed_Vitreous_Mercoxit = 0;
    }
    
    $post = array(
        'Compressed_Veldspar' => $Compressed_Veldspar,
        'Compressed_Concentrated_Veldspar' => $Compressed_Concentrated_Veldspar,
        'Compressed_Dense_Veldspar' => $Compressed_Dense_Veldspar,
        'Compressed_Scordite' => $Compressed_Scordite,
        'Compressed_Condensed_Scordite' => $Compressed_Condensed_Scordite,
        'Compressed_Massive_Scordite' => $Compressed_Massive_Scordite,
        'Compressed_Pyroxeres' => $Compressed_Pyroxeres,
        'Compressed_Solid_Pyroxeres' => $Compressed_Solid_Pyroxeres,
        'Compressed_Viscous_Pyroxeres' => $Compressed_Viscous_Pyroxeres,
        'Compressed_Plagioclase' => $Compressed_Plagioclase,
        'Compressed_Azure_Plagioclase' => $Compressed_Azure_Plagioclase,
        'Compressed_Rich_Plagioclase' => $Compressed_Rich_Plagioclase,
        'Compressed_Omber' => $Compressed_Omber,
        'Compressed_Silvery_Omber' => $Compressed_Silvery_Omber,
        'Compressed_Golden_Omber' => $Compressed_Golden_Omber,
        'Compressed_Kernite' => $Compressed_Kernite,
        'Compressed_Luminous_Kernite' => $Compressed_Luminous_Kernite,
        'Compressed_Fiery_Kernite' => $Compressed_Fiery_Kernite,
        'Compressed_Jaspet' => $Compressed_Jaspet,
        'Compressed_Pure_Jaspet' => $Compressed_Pure_Jaspet,
        'Compressed_Pristine_Jaspet' => $Compressed_Pristine_Jaspet,
        'Compressed_Hemorphite' => $Compressed_Hemorphite,
        'Compressed_Vivid_Hemorphite' => $Compressed_Vivid_Hemorphite,
        'Compressed_Radiant_Hemorphite' => $Compressed_Radiant_Hemorphite,
        'Compressed_Hedbergite' => $Compressed_Hedbergite,
        'Compressed_Vitric_Hedbergite' => $Compressed_Vitric_Hedbergite,
        'Compressed_Glazed_Hedbergite' => $Compressed_Glazed_Hedbergite,
        'Compressed_Gneiss' => $Compressed_Gneiss,
        'Compressed_Iridescent_Gneiss' => $Compressed_Iridescent_Gneiss,
        'Compressed_Prismatic_Gneiss' => $Compressed_Prismatic_Gneiss,
        'Compressed_Dark_Ochre' => $Compressed_Dark_Ochre,
        'Compressed_Onyx_Ochre' => $Compressed_Onyx_Ochre,
        'Compressed_Obsidian_Ochre' => $Compressed_Obsidian_Ochre,
        'Compressed_Spodumain' => $Compressed_Spodumain,
        'Compressed_Bright_Spodumain' => $Compressed_Bright_Spodumain,
        'Compressed_Gleaming_Spodumain' => $Compressed_Gleaming_Spodumain,
        'Compressed_Crokite' => $Compressed_Crokite,
        'Compressed_Sharp_Crokite' => $Compressed_Sharp_Crokite,
        'Compressed_Crystalline_Crokite' => $Compressed_Crystalline_Crokite,
        'Compressed_Bistot' => $Compressed_Bistot,
        'Compressed_Triclinic_Bistot' => $Compressed_Triclinic_Bistot,
        'Compressed_Monoclinic_Bistot' => $Compressed_Monoclinic_Bistot,
        'Compressed_Arkonor' => $Compressed_Arkonor,
        'Compressed_Crimson_Arkonor' => $Compressed_Crimson_Arkonor,
        'Compressed_Prime_Arkonor' => $Compressed_Prime_Arkonor,
        'Compressed_Mercoxit' => $Compressed_Mercoxit,
        'Compressed_Magma_Mercoxit' => $Compressed_Magma_Mercoxit,
        'Compressed_Vitreous_Mercoxit' => $Compressed_Vitreous_Mercoxit,
    ); 
    
    $contract = CompOreContractValue($contractTime, $corporation, $post);
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
            background-image:url(images/bgs/ore_bg_blur.jpg);
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
                PrintCompOreContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    