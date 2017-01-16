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
    if(isset($_POST["Bacteria"])) {
        $Bacteria = filter_input(INPUT_POST, "Bacteria", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Bacteria = 0;
    }
    if(isset($_POST["Biofuels"])) {
        $Biofuels = filter_input(INPUT_POST, "Biofuels", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Biofuels = 0;
    }
    if(isset($_POST["Biomass"])) {
        $Biomass = filter_input(INPUT_POST, "Biomass", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Biomass = 0;
    }
    if(isset($_POST["Chiral_Structures"])) {
        $Chiral_Structures = filter_input(INPUT_POST, "Chiral_Structures", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Chiral_Structures = 0;
    }
    if(isset($_POST["Electrolytes"])) {
        $Electrolytes = filter_input(INPUT_POST, "Electrolytes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Electrolytes = 0;
    }
    if(isset($_POST["Industrial_Fibers"])) {
        $Industrial_Fibers = filter_input(INPUT_POST, "Industrial_Fibers", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Industrial_Fibers = 0;
    }
    if(isset($_POST["Oxidizing_Compound"])) {
        $Oxidizing_Compound = filter_input(INPUT_POST, "Oxidizing_Compound", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Oxidizing_Compound = 0;
    }
    if(isset($_POST["Oxygen"])) {
        $Oxygen = filter_input(INPUT_POST, "Oxygen", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Oxygen = 0;
    }
    if(isset($_POST["Plasmoids"])) {
        $Plasmoids = filter_input(INPUT_POST, "Plasmoids", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Plasmoids = 0;
    }
    if(isset($_POST["Precious_Metals"])) {
        $Precious_Metals = filter_input(INPUT_POST, "Precious_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Precious_Metals = 0;
    }
    if(isset($_POST["Proteins"])) {
        $Proteins = filter_input(INPUT_POST, "Proteins", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Proteins = 0;
    }
    if(isset($_POST["Reactive_Metals"])) {
        $Reactive_Metals = filter_input(INPUT_POST, "Reactive_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Reactive_Metals = 0;
    }
    if(isset($_POST["Silicon"])) {
        $Silicon = filter_input(INPUT_POST, "Silicon", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Silicon = 0;
    }
    if(isset($_POST["Toxic_Metals"])) {
        $Toxic_Metals = filter_input(INPUT_POST, "Toxic_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Toxic_Metals = 0;
    }
    if(isset($_POST["Water"])) {
        $Water = filter_input(INPUT_POST, "Water", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Water = 0;
    }
    
    $post = array(
        'Bacteria' => $Bacteria, 
        'Biofuels' => $Biofuels,
        'Biomass' => $Biomass,
        'Chiral_Structures' => $Chiral_Structures,
        'Electrolytes' => $Electrolytes,
        'Industrial_Fibers' => $Industrial_Fibers,
        'Oxidizing_Compound' => $Oxidizing_Compound,
        'Oxygen' => $Oxygen,
        'Plasmoids' => $Plasmoids,
        'Precious_Metals' => $Precious_Metals,
        'Proteins' => $Proteins,
        'Reactive_Metals' => $Reactive_Metals,
        'Silicon' => $Silicon,
        'Toxic_Metals' => $Toxic_Metals,
        'Water' => $Water
    );
    
    $contract= PiT1ContractValue($contractTime, $corporation, $post);
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
                    PrintContractContents($contract["Number"], 'PiT1ContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    