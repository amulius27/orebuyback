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
    
    if(isset($_POST["Compressed_Veldspar"])) {
        printf("Got number of compressed Veldspar.");
    }
        
    
    $post = array(
        "Compressed_Veldspar" => $_POST["Compressed_Veldspar"],
        "Compressed_Concentrated_Veldspar" => $_POST["Compressed_Concentrated_Veldspar"],
        "Compressed_Dense_Veldspar" => $_POST["Compressed_Dense_Veldspar"],
        "Compressed_Scordite" => $_POST["Compressed_Scordite"],
        "Compressed_Condensed_Scordite" => $_POST["Compressed_Condensed_Scordite"],
        "Compressed_Massive_Scordite" => $_POST["Compressed_Massive_Scordite"],
        "Compressed_Pyroxeres" => $_POST["Compressed_Pyroxeres"],
        "Compressed_Solid_Pyroxeres" => $_POST["Compressed_Solid_Pyroxeres"],
        "Compressed_Viscous_Pyroxers" => $_POST["Compressed_Viscous_Pyroxeres"],
        "Compressed_Plagioclase" => $_POST["Compressed_Plagioclase"],
        "Compressed_Azure_Plagioclase" => $_POST["Compressed_Azure_Plagioclase"],
        "Compressed_Rich_Plagioclase" => $_POST["Compressed_Rich_Plagioclase"],
        "Compressed_Omber" => $_POST["Compressed_Omber"],
        "Compressed_Silvery_Omber" => $_POST["Compressed_Silvery_Omber"],
        "Compressed_Golden_Omber" => $_POST["Compressed_Golden_Omber"],
        "Compressed_Kernite" => $_POST["Compressed_Kernite"],
        "Compressed_Luminous_Kernite" => $_POST["Compressed_Luminous_Kernite"],
        "Compressed_Fiery_Kernite" => $_POST["Compressed_Fiery_Kernite"],
        "Compressed_Jaspet" => $_POST["Compressed_Jaspet"],
        "Compressed_Pure_Jaspet" => $_POST["Compressed_Pure_Jaspet"],
        "Compressed_Pristine_Jaspet" => $_POST["Compressed_Pristine_Jaspet"],
        "Compressed_Hemorphite" => $_POST["Compressed_Hemorphite"],
        "Compressed_Vivid_Hemorphite" => $_POST["Compressed_Vivid_Hemorphite"],
        "Compressed_Radiant_Hemorphite" => $_POST["Compressed_Radiant_Hemorphite"],
        "Compressed_Hedbergite" => $_POST["Compressed_Hedbergite"],
        "Compressed_Vitric_Hedbergite" => $_POST["Compressed_Vitric_Hedbergite"],
        "Compressed_Glazed_Hedbergite" => $_POST["Compressed_Glazed_Hedbergite"],
        "Compressed_Gneiss" => $_POST["Compressed_Gneiss"],
        "Compressed_Iridescent_Gneiss" => $_POST["Compressed_Iridescent_Gneiss"],
        "Compressed_Prismatic_Gneiss" => $_POST["Compressed_Prismatic_Gneiss"],
        "Compressed_Dark_Ochre" => $_POST["Compressed_Dark Ochre"],
        "Compressed_Onyx_Ochre" => $_POST["Compressed_Onyx_Ochre"],
        "Compressed_Obsidian_Ochre" => $_POST["Compressed_Obisidian_Ochre"],
        "Compressed_Spodumain" => $_POST["Compressed_Spodumain"],
        "Compressed_Bright_Spodumain" => $_POST["Compressed_Bright_Spodumain"],
        "Compressed_Gleaming_Spodumain" => $_POST["Compressed_Gleaming_Spodumain"],
        "Compressed_Crokite" => $_POST["Compressed_Crokite"],
        "Compressed_Sharp_Crokite" => $_POST["Compressed_Sharp_Crokite"],
        "Compressed_Crystalline_Crokite" => $_POST["Compressed_Crystalline_Crokite"],
        "Compressed_Bistot" => $_POST["Compressed_Bistot"],
        "Compressed_Triclinic_Bistot" => $_POST["Compressed_Triclinic_Bistot"],
        "Compressed_Monoclinic_Bistot" => $_POST["Compressed_Monoclinic_Bistot"],
        "Compressed_Arkonor" => $_POST["Compressed_Arkonor"],
        "Compressed_Crimson_Arkonor" => $_POST["Compressed_Crimson_Arkonor"],
        "Compressed_Prime_Arkonor" => $_POST["Compressed_Prime_Arkonor"],
        "Compressed_Mercoxit" => $_POST["Compressed_Mercoxit"],
        "Compressed_Magma_Mercoxit" => $_POST["Compressed_Magma_Mercoxit"],
        "Compressed_Vitreous_Mercoxit" => $_POST["Compressed_Vitreous_Mercoxit"],
    );
    
    
    $contract = CompOreContractValue($db, $contractTime, $corporation, $post);
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
        <?php PrintCompOreContractContents($contract["Number"], $db); 
              DBClose($db);
        ?>
    </div>
    
</body>
</html>
    