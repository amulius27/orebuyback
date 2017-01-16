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
    if(isset($_POST["Veldspar"])) {
        $Veldspar = filter_input(INPUT_POST, "Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Veldspar = 0;
    }
    if(isset($_POST["Concentrated_Veldspar"])) {
        $Concentrated_Veldspar = filter_input(INPUT_POST, "Concentrated_Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Concentrated_Veldspar = 0;
    }
    if(isset($_POST["Dense_Veldspar"])) {
        $Dense_Veldspar = filter_input(INPUT_POST, "Dense_Veldspar", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Dense_Veldspar = 0;
    }
    if(isset($_POST["Scordite"])) {
        $Scordite = filter_input(INPUT_POST, "Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Scordite = 0;
    }
    if(isset($_POST["Condensed_Scordite"])) {
        $Condensed_Scordite = filter_input(INPUT_POST, "Condensed_Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Condensed_Scordite = 0;
    }
    if(isset($_POST["Massive_Scordite"])) {
        $Massive_Scordite = filter_input(INPUT_POST, "Massive_Scordite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Massive_Scordite = 0;
    }
    if(isset($_POST["Pyroxeres"])) {
        $Pyroxeres = filter_input(INPUT_POST, "Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pyroxeres = 0;
    }
    if(isset($_POST["Solid_Pyroxeres"])) {
        $Solid_Pyroxeres = filter_input(INPUT_POST, "Solid_Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Solid_Pyroxeres = 0;
    }
    if(isset($_POST["Viscous_Pyroxeres"])) {
        $Viscous_Pyroxeres = filter_input(INPUT_POST, "Viscous_Pyroxeres", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Viscous_Pyroxeres = 0;
    }
    if(isset($_POST["Plagioclase"])) {
        $Plagioclase = filter_input(INPUT_POST, "Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Plagioclase = 0;
    }
    if(isset($_POST["Azure_Plagioclase"])) {
        $Azure_Plagioclase = filter_input(INPUT_POST, "Azure_Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Azure_Plagioclase = 0;
    }
    if(isset($_POST["Rich_Plagioclase"])) {
        $Rich_Plagioclase = filter_input(INPUT_POST, "Rich_Plagioclase", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Rich_Plagioclase = 0;
    }
    if(isset($_POST["Omber"])) {
        $Omber = filter_input(INPUT_POST, "Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Omber = 0;
    }
    if(isset($_POST["Silvery_Omber"])) {
        $Silvery_Omber = filter_input(INPUT_POST, "Silvery_Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Silvery_Omber = 0;
    }
    if(isset($_POST["Golden_Omber"])) {
        $Golden_Omber = filter_input(INPUT_POST, "Golden_Omber", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Golden_Omber = 0;
    }
    if(isset($_POST["Kernite"])) {
        $Kernite = filter_input(INPUT_POST, "Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Kernite = 0;
    }
    if(isset($_POST["Luminous_Kernite"])) {
        $Luminous_Kernite = filter_input(INPUT_POST, "Luminous_Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Luminous_Kernite = 0;
    }
    if(isset($_POST["Fiery_Kernite"])) {
        $Fiery_Kernite = filter_input(INPUT_POST, "Fiery_Kernite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Fiery_Kernite = 0;
    }
    if(isset($_POST["Jaspet"])) {
        $Jaspet = filter_input(INPUT_POST, "Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Jaspet = 0;
    }
    if(isset($_POST["Pure_Jaspet"])) {
        $Pure_Jaspet = filter_input(INPUT_POST, "Pure_Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pure_Jaspet = 0;
    }
    if(isset($_POST["Pristine_Jaspet"])) {
        $Pristine_Jaspet = filter_input(INPUT_POST, "Pristine_Jaspet", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pristine_Jaspet = 0;
    }
    if(isset($_POST["Hemorphite"])) {
        $Hemorphite = filter_input(INPUT_POST, "Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Hemorphite = 0;
    }
    if(isset($_POST["Vivid_Hemorphite"])) {
        $Vivid_Hemorphite = filter_input(INPUT_POST, "Vivid_Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Vivid_Hemorphite = 0;
    }
    if(isset($_POST["Radiant_Hemorphite"])) {
        $Radiant_Hemorphite = filter_input(INPUT_POST, "Radiant_Hemorphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Radiant_Hemorphite = 0;
    }
    if(isset($_POST["Hedbergite"])) {
        $Hedbergite = filter_input(INPUT_POST, "Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Hedbergite = 0;
    }
    if(isset($_POST["Vitric_Hedbergite"])) {
        $Vitric_Hedbergite = filter_input(INPUT_POST, "Vitric_Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Vitric_Hedbergite = 0;
    }
    if(isset($_POST["Glazed_Hedbergite"])) {
        $Glazed_Hedbergite = filter_input(INPUT_POST, "Glazed_Hedbergite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Glazed_Hedbergite = 0;
    }
    if(isset($_POST["Gneiss"])) {
        $Gneiss = filter_input(INPUT_POST, "Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Gneiss = 0;
    }
    if(isset($_POST["Iridescent_Gneiss"])) {
        $Iridescent_Gneiss = filter_input(INPUT_POST, "Iridescent_Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Iridescent_Gneiss = 0;
    }
    if(isset($_POST["Prismatic_Gneiss"])) {
        $Prismatic_Gneiss = filter_input(INPUT_POST, "Prismatic_Gneiss", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Prismatic_Gneiss = 0;
    }
    if(isset($_POST["Dark_Ochre"])) {
        $Dark_Ochre = filter_input(INPUT_POST, "Dark_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Dark_Ochre = 0;
    }
    if(isset($_POST["Onyx_Ochre"])) {
        $Onyx_Ochre = filter_input(INPUT_POST, "Onyx_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Onyx_Ochre = 0;
    }
    if(isset($_POST["Obsidian_Ochre"])) {
        $Obsidian_Ochre = filter_input(INPUT_POST, "Obsidian_Ochre", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Obsidian_Ochre = 0;
    }
    if(isset($_POST["Spodumain"])) {
        $Spodumain = filter_input(INPUT_POST, "Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Spodumain = 0;
    }
    if(isset($_POST["Bright_Spodumain"])) {
        $Bright_Spodumain = filter_input(INPUT_POST, "Bright_Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Bright_Spodumain = 0;
    }
    if(isset($_POST["Gleaming_Spodumain"])) {
        $Gleaming_Spodumain = filter_input(INPUT_POST, "Gleaming_Spodumain", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Gleaming_Spodumain = 0;
    }
    if(isset($_POST["Crokite"])) {
        $Crokite = filter_input(INPUT_POST, "Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Crokite = 0;
    }
    if(isset($_POST["Sharp_Crokite"])) {
        $Sharp_Crokite = filter_input(INPUT_POST, "Sharp_Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Sharp_Crokite = 0;
    }
    if(isset($_POST["Crystalline_Crokite"])) {
        $Crystalline_Crokite = filter_input(INPUT_POST, "Crystalline_Crokite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Crystalline_Crokite = 0;
    }
    if(isset($_POST["Bistot"])) {
        $Bistot = filter_input(INPUT_POST, "Bistot", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Bistot = 0;
    }
    if(isset($_POST["Triclinic_Bistot"])) {
        $Triclinic_Bistot = filter_input(INPUT_POST, "Triclinic_Bistot", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Triclinic_Bistot = 0;
    }
    if(isset($_POST["Monoclinic_Bistot"])) {
        $Monoclinic_Bistot = filter_input(INPUT_POST, "Monoclinic_Bistot", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Monoclinic_Bistot = 0;
    }
    if(isset($_POST["Arkonor"])) {
        $Arkonor = filter_input(INPUT_POST, "Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Arkonor = 0; 
    }
    if(isset($_POST["Crimson_Arkonor"])) {
        $Crimson_Arkonor = filter_input(INPUT_POST, "Crimson_Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Crimson_Arkonor = 0;
    }
    if(isset($_POST["Prime_Arkonor"])) {
        $Prime_Arkonor = filter_input(INPUT_POST, "Prime_Arkonor", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Prime_Arkonor = 0;
    }
    if(isset($_POST["Mercoxit"])) {
        $Mercoxit = filter_input(INPUT_POST, "Mercoxit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Mercoxit = 0;
    }
    if(isset($_POST["Magma_Mercoxit"])) {
        $Magma_Mercoxit = filter_input(INPUT_POST, "Magma_Mercoxit", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Magma_Mercoxit = 0;
    }
    if(isset($_POST["Vitreous_Mercoxit"])) {
        $Vitreous_Mercoxit = filter_input(INPUT_POST, "Vitreous_Mercoxit", FILTER_SANITIZE_NUMBER_INT);
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
        'Vitreous_Mercoxit' => $Vitreous_Mercoxit
    );
    
    $contract = OreContractValue($contractTime, $corporation, $post);
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
                    PrintContractContents($contract["Number"], 'OreContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    