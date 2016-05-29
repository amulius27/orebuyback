<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    $db = DBOpen();
    if(isset($_POST["Quote_Time"])) {
        $contractTime = $_POST["Quote_Time"];
    } else {
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));;
    }
    if(isset($_POST["Corporation"])) {
        $corporation = $_POST["Corporation"];
    } else {
        $corporation = 'None';
    }
    
    $post = array(
        "Veldspar" => $CompVeldspar,
        "Concentrated_Veldspar" => $CompConcentratedVeldspar,
        "Dense_Veldspar" => $CompDenseVeldspar,
        "Scordite" => $_POST["Scordite"],
        "Condensed_Scordite" => $_POST["Condensed_Scordite"],
        "Massive_Scordite" => $_POST["Massive_Scordite"],
        "Pyroxeres" => $_POST["Pyroxeres"],
        "Solid_Pyroxeres" => $_POST["Solid_Pyroxeres"],
        "Viscous_Pyroxers" => $_POST["Viscous_Pyroxeres"],
        "Plagioclase" => $_POST["Plagioclase"],
        "Azure_Plagioclase" => $_POST["Azure_Plagioclase"],
        "Rich_Plagioclase" => $_POST["Rich_Plagioclase"],
        "Omber" => $_POST["Omber"],
        "Silvery_Omber" => $_POST["Silvery_Omber"],
        "Golden_Omber" => $_POST["Golden_Omber"],
        "Kernite" => $_POST["Kernite"],
        "Luminous_Kernite" => $_POST["Luminous_Kernite"],
        "Fiery_Kernite" => $_POST["Fiery_Kernite"],
        "Jaspet" => $_POST["Jaspet"],
        "Pure_Jaspet" => $_POST["Pure_Jaspet"],
        "Pristine_Jaspet" => $_POST["Pristine_Jaspet"],
        "Hemorphite" => $_POST["Hemorphite"],
        "Vivid_Hemorphite" => $_POST["Vivid_Hemorphite"],
        "Radiant_Hemorphite" => $_POST["Radiant_Hemorphite"],
        "Hedbergite" => $_POST["Hedbergite"],
        "Vitric_Hedbergite" => $_POST["Vitric_Hedbergite"],
        "Glazed_Hedbergite" => $_POST["Glazed_Hedbergite"],
        "Gneiss" => $_POST["Gneiss"],
        "Iridescent_Gneiss" => $_POST["Iridescent_Gneiss"],
        "Prismatic_Gneiss" => $_POST["Prismatic_Gneiss"],
        "Dark_Ochre" => $_POST["Dark Ochre"],
        "Onyx_Ochre" => $_POST["Onyx_Ochre"],
        "Obsidian_Ochre" => $_POST["Obisidian_Ochre"],
        "Spodumain" => $_POST["Spodumain"],
        "Bright_Spodumain" => $_POST["Bright_Spodumain"],
        "Gleaming_Spodumain" => $_POST["Gleaming_Spodumain"],
        "Crokite" => $_POST["Crokite"],
        "Sharp_Crokite" => $_POST["Sharp_Crokite"],
        "Crystalline_Crokite" => $_POST["Crystalline_Crokite"],
        "Bistot" => $_POST["Bistot"],
        "Triclinic_Bistot" => $_POST["Triclinic_Bistot"],
        "Monoclinic_Bistot" => $_POST["Monoclinic_Bistot"],
        "Arkonor" => $_POST["Arkonor"],
        "Crimson_Arkonor" => $_POST["Crimson_Arkonor"],
        "Prime_Arkonor" => $_POST["Prime_Arkonor"],
        "Mercoxit" => $_POST["Mercoxit"],
        "Magma_Mercoxit" => $_POST["Magma_Mercoxit"],
        "Vitreous_Mercoxit" => $_POST["Vitreous_Mercoxit"],
    );
    
    $contract= OreContractValue($db, $contractTime, $corporation, $post);
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
        <?php PrintOreContractContents($contract["Number"], $db); 
              DBClose($db);
        ?>
    </div>
    
</body>
</html>
    