<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = filter_input(INPUT_POST, "Quote_Time", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Compressed_Veldspar"])) {
        $Compressed_Veldspar = filter_input(INPUT_POST, "Compressed_Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Concentrated_Veldspar"])) {
        $Compressed_Concentrated_Veldspar = filter_input(INPUT_POST, "Compressed_Concentrated_Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Concentrated_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Dense_Veldspar"])) {
        $Compressed_Dense_Veldspar = filter_input(INPUT_POST, "Compressed_Dense_Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Dense_Veldspar = 0;
    }
    if(isset($_POST["Compressed_Scordite"])) {
        $Compressed_Scordite = filter_input(INPUT_POST, "Compressed_Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Scordite = 0;
    }
    if(isset($_POST["Compressed_Condensed_Scordite"])) {
        $Compressed_Condensed_Scordite = filter_input(INPUT_POST, "Compressed_Condensed_Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Condensed_Scordite = 0;
    }
    if(isset($_POST["Compressed_Massive_Scordite"])) {
        $Compressed_Massive_Scordite = filter_input(INPUT_POST, "Compressed_Massive_Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Massive_Scordite = 0;
    }
    if(isset($_POST["Compressed_Pyroxeres"])) {
        $Compressed_Pyroxeres = filter_input(INPUT_POST, "Compressed_Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Solid_Pyroxeres"])) {
        $Compressed_Solid_Pyroxeres = filter_input(INPUT_POST, "Compressed_Solid_Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Solid_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Viscous_Pyroxeres"])) {
        $Compressed_Viscous_Pyroxeres = filter_input(INPUT_POST, "Compressed_Viscous_Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Viscous_Pyroxeres = 0;
    }
    if(isset($_POST["Compressed_Plagioclase"])) {
        $Compressed_Plagioclase = filter_input(INPUT_POST, "Compressed_Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Azure_Plagioclase"])) {
        $Compressed_Azure_Plagioclase = filter_input(INPUT_POST, "Compressed_Azure_Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Azure_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Rich_Plagioclase"])) {
        $Compressed_Rich_Plagioclase = filter_input(INPUT_POST, "Compressed_Rich_Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Rich_Plagioclase = 0;
    }
    if(isset($_POST["Compressed_Omber"])) {
        $Compressed_Omber = filter_input(INPUT_POST, "Compressed_Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Omber = 0;
    }
    if(isset($_POST["Compressed_Silvery_Omber"])) {
        $Compressed_Silvery_Omber = filter_input(INPUT_POST, "Compressed_Silvery_Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Silvery_Omber = 0;
    }
    if(isset($_POST["Compressed_Golden_Omber"])) {
        $Compressed_Golden_Omber = filter_input(INPUT_POST, "Compressed_Golden_Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Golden_Omber = 0;
    }
    if(isset($_POST["Compressed_Kernite"])) {
        $Compressed_Kernite = filter_input(INPUT_POST, "Compressed_Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Kernite = 0;
    }
    if(isset($_POST["Compressed_Luminous_Kernite"])) {
        $Compressed_Luminous_Kernite = filter_input(INPUT_POST, "Compressed_Luminous_Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Luminous_Kernite = 0;
    }
    if(isset($_POST["Compressed_Fiery_Kernite"])) {
        $Compressed_Fiery_Kernite = filter_input(INPUT_POST, "Compressed_Fiery_Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Fiery_Kernite = 0;
    }
    if(isset($_POST["Compressed_Jaspet"])) {
        $Compressed_Jaspet = filter_input(INPUT_POST, "Compressed_Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Pure_Jaspet"])) {
        $Compressed_Pure_Jaspet = filter_input(INPUT_POST, "Compressed_Pure_Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Pure_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Pristine_Jaspet"])) {
        $Compressed_Pristine_Jaspet = filter_input(INPUT_POST, "Compressed_Pristine_Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Pristine_Jaspet = 0;
    }
    if(isset($_POST["Compressed_Hemorphite"])) {
        $Compressed_Hemorphite = filter_input(INPUT_POST, "Compressed_Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Vivid_Hemorphite"])) {
        $Compressed_Vivid_Hemorphite = filter_input(INPUT_POST, "Compressed_Vivid_Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Vivid_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Radiant_Hemorphite"])) {
        $Compressed_Radiant_Hemorphite = filter_input(INPUT_POST, "Compressed_Radiant_Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Radiant_Hemorphite = 0;
    }
    if(isset($_POST["Compressed_Hedbergite"])) {
        $Compressed_Hedbergite = filter_input(INPUT_POST, "Compressed_Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Vitric_Hedbergite"])) {
        $Compressed_Vitric_Hedbergite = filter_input(INPUT_POST, "Compressed_Vitric_Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Vitric_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Glazed_Hedbergite"])) {
        $Compressed_Glazed_Hedbergite = filter_input(INPUT_POST, "Compressed_Glazed_Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Glazed_Hedbergite = 0;
    }
    if(isset($_POST["Compressed_Gneiss"])) {
        $Compressed_Gneiss = filter_input(INPUT_POST, "Compressed_Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Iridescent_Gneiss"])) {
        $Compressed_Iridescent_Gneiss = filter_input(INPUT_POST, "Compressed_Iridescent_Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Iridescent_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Prismatic_Gneiss"])) {
        $Compressed_Prismatic_Gneiss = filter_input(INPUT_POST, "Compressed_Prismatic_Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Prismatic_Gneiss = 0;
    }
    if(isset($_POST["Compressed_Dark_Ochre"])) {
        $Compressed_Dark_Ochre = filter_input(INPUT_POST, "Compressed_Dark_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Dark_Ochre = 0;
    }
    if(isset($_POST["Compressed_Onyx_Ochre"])) {
        $Compressed_Onyx_Ochre = filter_input(INPUT_POST, "Compressed_Onyx_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Onyx_Ochre = 0;
    }
    if(isset($_POST["Compressed_Obsidian_Ochre"])) {
        $Compressed_Obsidian_Ochre = filter_input(INPUT_POST, "Compressed_Obsidian_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Obsidian_Ochre = 0;
    }
    if(isset($_POST["Compressed_Spodumain"])) {
        $Compressed_Spodumain = filter_input(INPUT_POST, "Compressed_Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Bright_Spodumain"])) {
        $Compressed_Bright_Spodumain = filter_input(INPUT_POST, "Compressed_Bright_Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Bright_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Gleaming_Spodumain"])) {
        $Compressed_Gleaming_Spodumain = filter_input(INPUT_POST, "Compressed_Gleaming_Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Gleaming_Spodumain = 0;
    }
    if(isset($_POST["Compressed_Crokite"])) {
        $Compressed_Crokite = filter_input(INPUT_POST, "Compressed_Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Crokite = 0;
    }
    if(isset($_POST["Compressed_Sharp_Crokite"])) {
        $Compressed_Sharp_Crokite = filter_input(INPUT_POST, "Compressed_Sharp_Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Sharp_Crokite = 0;
    }
    if(isset($_POST["Compressed_Crystalline_Crokite"])) {
        $Compressed_Crystalline_Crokite = filter_input(INPUT_POST, "Compressed_Crystalline_Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Crystalline_Crokite = 0;
    }
    if(isset($_POST["Compressed_Bistot"])) {
        $Compressed_Bistot = filter_input(INPUT_POST, "Compressed_Bistot", FILTER_SANITIZE_NUMBER_INT); 
    } else {
        $Compressed_Bistot = 0;
    }
    if(isset($_POST["Compressed_Triclinic_Bistot"])) {
        $Compressed_Triclinic_Bistot = filter_input(INPUT_POST, "Compressed_Triclinic_Bistot", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Triclinic_Bistot = 0;
    }
    if(isset($_POST["Compressed_Monoclinic_Bistot"])) {
        $Compressed_Monoclinic_Bistot = filter_input(INPUT_POST, "Compressed_Monoclinic_Bistot", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Monoclinic_Bistot = 0;
    }
    if(isset($_POST["Compressed_Arkonor"])) {
        $Compressed_Arkonor = filter_input(INPUT_POST, "Compressed_Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Arkonor = 0; 
    }
    if(isset($_POST["Compressed_Crimson_Arkonor"])) {
        $Compressed_Crimson_Arkonor = filter_input(INPUT_POST, "Compressed_Crimson_Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Crimson_Arkonor = 0;
    }
    if(isset($_POST["Compressed_Prime_Arkonor"])) {
        $Compressed_Prime_Arkonor = filter_input(INPUT_POST, "Compressed_Prime_Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Prime_Arkonor = 0;
    }
    if(isset($_POST["Compressed_Mercoxit"])) {
        $Compressed_Mercoxit = filter_input(INPUT_POST, "Compressed_Mercoxit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Mercoxit = 0;
    }
    if(isset($_POST["Compressed_Magma_Mercoxit"])) {
        $Compressed_Magma_Mercoxit = filter_input(INPUT_POST, "Compressed_Magma_Mercoxit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Compressed_Magma_Mercoxit = 0;
    }
    if(isset($_POST["Compressed_Vitreous_Mercoxit"])) {
        $Compressed_Vitreous_Mercoxit = filter_input(INPUT_POST, "Compressed_Vitreous_Mercoxit", FILTER_SANITIZE_NUMBER_INT);
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
    PrintContractHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");

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
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Contract Details</strong><br></h3>
            </div>
            <div class="panel-body">
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
                        <td><?php echo number_format($contract["Value"], 2, '.', ','); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><strong>Contract Contents</strong><br></h1>
            </div>
        </div>
            <div class="panel-body">
                <?php 
                    PrintContractContents($contract["Number"], 'CompOreContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    