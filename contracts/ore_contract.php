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
    if(isset($_POST["Veldspar"])) {
        $Veldspar = $_POST["Veldspar"];
    } else {
        $Veldspar = 0;
    }
    if(isset($_POST["Concentrated_Veldspar"])) {
        $Concentrated_Veldspar = $_POST["Concentrated_Veldspar"];
    } else {
        $Concentrated_Veldspar = 0;
    }
    if(isset($_POST["Dense_Veldspar"])) {
        $Dense_Veldspar = $_POST["Dense_Veldspar"];
    } else {
        $Dense_Veldspar = 0;
    }
    if(isset($_POST["Scordite"])) {
        $Scordite = $_POST["Scordite"];
    } else {
        $Scordite = 0;
    }
    if(isset($_POST["Condensed_Scordite"])) {
        $Condensed_Scordite = $_POST["Condensed_Scordite"];
    } else {
        $Condensed_Scordite = 0;
    }
    if(isset($_POST["Massive_Scordite"])) {
        $Massive_Scordite = $_POST["Massive_Scordite"];
    } else {
        $Massive_Scordite = 0;
    }
    if(isset($_POST["Pyroxeres"])) {
        $Pyroxeres = $_POST["Pyroxeres"];
    } else {
        $Pyroxeres = 0;
    }
    if(isset($_POST["Solid_Pyroxeres"])) {
        $Solid_Pyroxeres = $_POST["Solid_Pyroxeres"];
    } else {
        $Solid_Pyroxeres = 0;
    }
    if(isset($_POST["Viscous_Pyroxeres"])) {
        $Viscous_Pyroxeres = $_POST["Viscous_Pyroxeres"];
    } else {
        $Viscous_Pyroxeres = 0;
    }
    if(isset($_POST["Plagioclase"])) {
        $Plagioclase = $_POST["Plagioclase"];
    } else {
        $Plagioclase = 0;
    }
    if(isset($_POST["Azure_Plagioclase"])) {
        $Azure_Plagioclase = $_POST["Azure_Plagioclase"];
    } else {
        $Azure_Plagioclase = 0;
    }
    if(isset($_POST["Rich_Plagioclase"])) {
        $Rich_Plagioclase = $_POST["Rich_Plagioclase"];
    } else {
        $Rich_Plagioclase = 0;
    }
    if(isset($_POST["Omber"])) {
        $Omber = $_POST["Omber"];
    } else {
        $Omber = 0;
    }
    if(isset($_POST["Silvery_Omber"])) {
        $Silvery_Omber = $_POST["Silvery_Omber"];
    } else {
        $Silvery_Omber = 0;
    }
    if(isset($_POST["Golden_Omber"])) {
        $Golden_Omber = $_POST["Golden_Omber"];
    } else {
        $Golden_Omber = 0;
    }
    if(isset($_POST["Kernite"])) {
        $Kernite = $_POST["Kernite"];
    } else {
        $Kernite = 0;
    }
    if(isset($_POST["Luminous_Kernite"])) {
        $Luminous_Kernite = $_POST["Luminous_Kernite"];
    } else {
        $Luminous_Kernite = 0;
    }
    if(isset($_POST["Fiery_Kernite"])) {
        $Fiery_Kernite = $_POSt["Fiery_Kernite"];
    } else {
        $Fiery_Kernite = 0;
    }
    if(isset($_POST["Jaspet"])) {
        $Jaspet = $_POST["Jaspet"];
    } else {
        $Jaspet = 0;
    }
    if(isset($_POST["Pure_Jaspet"])) {
        $Pure_Jaspet = $_POST["Pure_Jaspet"];
    } else {
        $Pure_Jaspet = 0;
    }
    if(isset($_POST["Pristine_Jaspet"])) {
        $Pristine_Jaspet = $_POST["Pristine_Jaspet"];
    } else {
        $Pristine_Jaspet = 0;
    }
    if(isset($_POST["Hemorphite"])) {
        $Hemorphite = $_POST["Hemorphite"];
    } else {
        $Hemorphite = 0;
    }
    if(isset($_POST["Vivid_Hemorphite"])) {
        $Vivid_Hemorphite = $_POST["Vivid_Hemorphite"];
    } else {
        $Vivid_Hemorphite = 0;
    }
    if(isset($_POST["Radiant_Hemorphite"])) {
        $Radiant_Hemorphite = $_POST["Radiant_Hemorphite"];
    } else {
        $Radiant_Hemorphite = 0;
    }
    if(isset($_POST["Hedbergite"])) {
        $Hedbergite = $_POST["Hedbergite"];
    } else {
        $Hedbergite = 0;
    }
    if(isset($_POST["Vitric_Hedbergite"])) {
        $Vitric_Hedbergite = $_POST["Vitric_Hedbergite"];
    } else {
        $Vitric_Hedbergite = 0;
    }
    if(isset($_POST["Glazed_Hedbergite"])) {
        $Glazed_Hedbergite = $_POST["Glazed_Hedbergite"];
    } else {
        $Glazed_Hedbergite = 0;
    }
    if(isset($_POST["Gneiss"])) {
        $Gneiss = $_POST["Gneiss"];
    } else {
        $Gneiss = 0;
    }
    if(isset($_POST["Iridescent_Gneiss"])) {
        $Iridescent_Gneiss = $_POST["Iridescent_Gneiss"];
    } else {
        $Iridescent_Gneiss = 0;
    }
    if(isset($_POST["Prismatic_Gneiss"])) {
        $Prismatic_Gneiss = $_POST["Prismatic_Gneiss"];
    } else {
        $Prismatic_Gneiss = 0;
    }
    if(isset($_POST["Dark_Ochre"])) {
        $Dark_Ochre = $_POST["Dark_Ochre"];
    } else {
        $Dark_Ochre = 0;
    }
    if(isset($_POST["Onyx_Ochre"])) {
        $Onyx_Ochre = $_POST["Onyx_Ochre"];
    } else {
        $Onyx_Ochre = 0;
    }
    if(isset($_POST["Obsidian_Ochre"])) {
        $Obsidian_Ochre = $_POST["Obsidian_Ochre"];
    } else {
        $Obsidian_Ochre = 0;
    }
    if(isset($_POST["Spodumain"])) {
        $Spodumain = $_POST["Spodumain"];
    } else {
        $Spodumain = 0;
    }
    if(isset($_POST["Bright_Spodumain"])) {
        $Bright_Spodumain = $_POST["Bright_Spodumain"];
    } else {
        $Bright_Spodumain = 0;
    }
    if(isset($_POST["Gleaming_Spodumain"])) {
        $Gleaming_Spodumain = $_POST["Gleaming_Spodumain"];
    } else {
        $Gleaming_Spodumain = 0;
    }
    if(isset($_POST["Crokite"])) {
        $Crokite = $_POST["Crokite"];
    } else {
        $Crokite = 0;
    }
    if(isset($_POST["Sharp_Crokite"])) {
        $Sharp_Crokite = $_POST["Sharp_Crokite"];
    } else {
        $Sharp_Crokite = 0;
    }
    if(isset($_POST["Crystalline_Crokite"])) {
        $Crystalline_Crokite = $_POST["Crystalline_Crokite"];
    } else {
        $Crystalline_Crokite = 0;
    }
    if(isset($_POST["Bistot"])) {
        $Bistot = $_POST["Bistot"]; 
    } else {
        $Bistot = 0;
    }
    if(isset($_POST["Triclinic_Bistot"])) {
        $Triclinic_Bistot = $_POST["Triclinic_Bistot"]; 
    } else {
        $Triclinic_Bistot = 0;
    }
    if(isset($_POST["Monoclinic_Bistot"])) {
        $Monoclinic_Bistot = $_POST["Monoclinic_Bistot"];
    } else {
        $Monoclinic_Bistot = 0;
    }
    if(isset($_POST["Arkonor"])) {
        $Arkonor = $_POST["Arkonor"];
    } else {
        $Arkonor = 0; 
    }
    if(isset($_POST["Crimson_Arkonor"])) {
        $Crimson_Arkonor = $_POST["Crimson_Arkonor"];
    } else {
        $Crimson_Arkonor = 0;
    }
    if(isset($_POST["Prime_Arkonor"])) {
        $Prime_Arkonor = $_POST["Prime_Arkonor"];
    } else {
        $Prime_Arkonor = 0;
    }
    if(isset($_POST["Mercoxit"])) {
        $Mercoxit = $_POST["Mercoxit"];
    } else {
        $Mercoxit = 0;
    }
    if(isset($_POST["Magma_Mercoxit"])) {
        $Magma_Mercoxit = $_POST["Magma_Mercoxit"];
    } else {
        $Magma_Mercoxit = 0;
    }
    if(isset($_POST["Vitreous_Mercoxit"])) {
        $Vitreous_Mercoxit = $_POST["Vitreous_Mercoxit"];
    } else {
        $Vitreous_Mercoxit = 0;
    }
    
    $post = array(
        'Veldspar' => $Veldspar,
        'Concentrated_Veldspar' => $Concentrated_Veldspar,
        'Dense_Veldspar' => $Dense_Veldspar,
        'Scordite' => $Scordite,
        'Condensed_Scordite' => $Condensed_Scordite,
        'Massive_Scordite' => $Massive_Scordite,
        'Pyroxeres' => $Pyroxeres,
        'Solid_Pyroxeres' => $Solid_Pyroxeres,
        'Viscous_Pyroxeres' => $Viscous_Pyroxeres,
        'Plagioclase' => $Plagioclase,
        'Azure_Plagioclase' => $Azure_Plagioclase,
        'Rich_Plagioclase' => $Rich_Plagioclase,
        'Omber' => $Omber,
        'Silvery_Omber' => $Silvery_Omber,
        'Golden_Omber' => $Golden_Omber,
        'Kernite' => $Kernite,
        'Luminous_Kernite' => $Luminous_Kernite,
        'Fiery_Kernite' => $Fiery_Kernite,
        'Jaspet' => $Jaspet,
        'Pure_Jaspet' => $Pure_Jaspet,
        'Pristine_Jaspet' => $Pristine_Jaspet,
        'Hemorphite' => $Hemorphite,
        'Vivid_Hemorphite' => $Vivid_Hemorphite,
        'Radiant_Hemorphite' => $Radiant_Hemorphite,
        'Hedbergite' => $Hedbergite,
        'Vitric_Hedbergite' => $Vitric_Hedbergite,
        'Glazed_Hedbergite' => $Glazed_Hedbergite,
        'Gneiss' => $Gneiss,
        'Iridescent_Gneiss' => $Iridescent_Gneiss,
        'Prismatic_Gneiss' => $Prismatic_Gneiss,
        'Dark_Ochre' => $Dark_Ochre,
        'Onyx_Ochre' => $Onyx_Ochre,
        'Obsidian_Ochre' => $Obsidian_Ochre,
        'Spodumain' => $Spodumain,
        'Bright_Spodumain' => $Bright_Spodumain,
        'Gleaming_Spodumain' => $Gleaming_Spodumain,
        'Crokite' => $Crokite,
        'Sharp_Crokite' => $Sharp_Crokite,
        'Crystalline_Crokite' => $Crystalline_Crokite,
        'Bistot' => $Bistot,
        'Triclinic_Bistot' => $Triclinic_Bistot,
        'Monoclinic_Bistot' => $Monoclinic_Bistot,
        'Arkonor' => $Arkonor,
        'Crimson_Arkonor' => $Crimson_Arkonor,
        'Prime_Arkonor' => $Prime_Arkonor,
        'Mercoxit' => $Mercoxit,
        'Magma_Mercoxit' => $Magma_Mercoxit,
        'Vitreous_Mercoxit' => $Vitreous_Mercoxit,
    );
    
    $contract = OreContractValue($contractTime, $corporation, $post);
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
                PrintOreContractContents($contract["Number"]);
            ?>
        </div>
    </div>
    
</body>
</html>
    