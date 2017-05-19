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
    if(isset($_POST["Biocells"])) {
        $Biocells = filter_input(INPUT_POST, "Biocells", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Biocells = 0;
    }
    if(isset($_POST["Construction_Blocks"])) {
        $Construction_Blocks = filter_input(INPUT_POST, "Construction_Blocks", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Construction_Blocks = 0;
    }
    if(isset($_POST["Consumer_Electronics"])) {
        $Consumer_Electronics = filter_input(INPUT_POST, "Consumer_Electronics", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Consumer_Electronics = 0;
    }
    if(isset($_POST["Coolant"])) {
        $Coolant = filter_input(INPUT_POST, "Coolant", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Coolant = 0;
    }
    if(isset($_POST["Enriched_Uranium"])) {
        $Enriched_Uranium = filter_input(INPUT_POST, "Enriched_Uranium", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Enriched_Uranium = 0;
    }
    if(isset($_POST["Fertilizer"])) {
        $Fertilizer = filter_input(INPUT_POST, "Fertilizer", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Fertilizer = 0;
    }
    if(isset($_POST["Gen_Enhanced_Livestock"])) {
        $Genetically_Enchanced_Livestock = filter_input(INPUT_POST, "Gen_Enhanced_Livestock", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Genetically_Enchanced_Livestock = 0;
    }
    if(isset($_POST["Livestock"])) {
        $Livestock = filter_input(INPUT_POST, "Livestock", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Livestock = 0;
    }
    if(isset($_POST["Mechanical_Parts"])) {
        $Mechanical_Parts = filter_input(INPUT_POST, "Mechanical_Parts", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Mechanical_Parts = 0;
    }
    if(isset($_POST["Microfiber_Shielding"])) {
        $Microfiber_Shielding = filter_input(INPUT_POST, "Microfiber_Shielding", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Microfiber_Shielding = 0;
    }
    if(isset($_POST["Miniature_Electronics"])) {
        $Miniature_Electronics = filter_input(INPUT_POST, "Miniature_Electronics", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Miniature_Electronics = 0;
    }
    if(isset($_POST["Nanites"])) {
        $Nanites = filter_input(INPUT_POST, "Nanites", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Nanites = 0;
    }
    if(isset($_POST["Oxides"])) {
        $Oxides = filter_input(INPUT_POST, "Oxides", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Oxides = 0;
    }
    if(isset($_POST["Polyaramids"])) {
        $Polyaramids = filter_input(INPUT_POST, "Polyaramids", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Polyaramids = 0;
    }
    if(isset($_POST["Polytextiles"])) {
        $Polytextiles = filter_input(INPUT_POST, "Polytextiles", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Polytextiles = 0;
    }
    if(isset($_POST["Rocket_Fuel"])) {
        $Rocket_Fuel = filter_input(INPUT_POST, "Rocket_Fuel", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Rocket_Fuel = 0;
    }
    if(isset($_POST["Silicate_Glass"])) {
        $Silicate_Glass = filter_input(INPUT_POST, "Silicate_Glass", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Silicate_Glass = 0;
    }
    if(isset($_POST["Superconductors"])) {
        $Superconductors = filter_input(INPUT_POST, "Superconductors", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Superconductors = 0;
    }
    if(isset($_POST['Supertensile_Plastics'])) {
        $Supertensile_Plastics = filter_input(INPUT_POST, "Supertensile_Plastics", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Supertensile_Plastics = 0;
    }
    if(isset($_POST["Synthetic_Oil"])) {
        $Synthetic_Oil = filter_input(INPUT_POST, "Synthetic_Oil", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Synthetic_Oil = 0;
    }
    if(isset($_POST["Test_Cultures"])) {
        $Test_Cultures = filter_input(INPUT_POST, "Test_Cultures", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Test_Cultures = 0;
    }
    if(isset($_POST["Transmitter"])) {
        $Transmitter = filter_input(INPUT_POST, "Transmitter", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Transmitter = 0;
    }
    if(isset($_POST["Viral_Agent"])) {
        $Viral_Agent = filter_input(INPUT_POST, "Viral_Agent", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Viral_Agent = 0;
    }
    if(isset($_POST["Water-Cooled_CPU"])) {
        $Water_Cooled_CPU = filter_input(INPUT_POST, "Water-Cooled_CPU", FILTER_SANITIZE_NUMBER_INT);
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
        'Supertensile_Plastics' => $Supertensile_Plastics,
        'Synthetic_Oil' => $Synthetic_Oil,
        'Test_Cultures' => $Test_Cultures,
        'Transmitter' => $Transmitter,
        'Viral_Agent' => $Viral_Agent,
        'Water_Cooled_CPU' => $Water_Cooled_CPU
    );
    
    $contract= PiT2ContractValue($contractTime, $corporation, $post);
    PrintContractHTMLHeader('/../images/bgs/pi_bg_blur.jpg');
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
                    PrintContractContents($contract["Number"], 'PiT2ContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    