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
    if(isset($_POST["Aqueous_Liquids"])) {
        $Aqueous_Liquids = filter_input(INPUT_POST, "Aqueous_Liquids", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Aqueous_Liquids = 0;
    }
    if(isset($_POST["Ionic_Solutions"])) {
        $Ionic_Solutions = filter_input(INPUT_POST, "Ionic_Solutions", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Ionic_Solutions = 0;
    }
    if(isset($_POST["Base_Metals"])) {
        $Base_Metals = filter_input(INPUT_POST, "Base_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Base_Metals = 0;
    }
    if(isset($_POST["Heavy_Metals"])) {
        $Heavy_Metals = filter_input(INPUT_POST, "Heavy_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Heavy_Metals = 0;
    }
    if(isset($_POST["Noble_Metals"])) {
        $Noble_Metals = filter_input(INPUT_POST, "Noble_Metals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Noble_Metals = 0;
    }
    if(isset($_POST["Carbon_Compounds"])) {
        $Carbon_Compounds = filter_input(INPUT_POST, "Carbon_Compounds", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Carbon_Compounds = 0;
    }
    if(isset($_POST["Micro_Organisms"])) {
        $Micro_Organisms = filter_input(INPUT_POST, "Micro_Organisms", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Micro_Organisms = 0;
    }
    if(isset($_POST["Complex_Organisms"])) {
        $Complex_Organisms = filter_input(INPUT_POST, "Complex_Organisms", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Complex_Organisms = 0;
    }
    if(isset($_POST["Planktic_Colonies"])) {
        $Planktic_Colonies = filter_input(INPUT_POST, "Planktic_Colonies", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Planktic_Colonies = 0;
    }
    if(isset($_POST["Noble_Gas"])) {
        $Noble_Gas = filter_input(INPUT_POST, "Noble_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Noble_Gas = 0;
    }
    if(isset($_POST["Reactive_Gas"])) {
        $Reactive_Gas = filter_input(INPUT_POST, "Reactive_Gas", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Reactive_Gas = 0;
    }
    if(isset($_POST["Felsic_Magma"])) {
        $Felsic_Magma = filter_input(INPUT_POST, "Felsic_Magma", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Felsic_Magma = 0;
    }
    if(isset($_POST["Non-CS_Crystals"])) {
        $NonCS_Crystals = filter_input(INPUT_POST, "Non-CS_Crystals", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $NonCS_Crystals = 0;
    }
    if(isset($_POST["Suspended_Plasma"])) {
        $Suspended_Plasma = filter_input(INPUT_POST, "Suspended_Plasma", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Suspended_Plasma = 0;
    }
    if(isset($_POST["Autotrophs"])) {
        $Autotrophs = filter_input(INPUT_POST, "Autotrophs", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Autotrophs = 0;
    }
    
    $post = array(
        'Aqueous_Liquids' => $Aqueous_Liquids,
        'Ionic_Solutions' => $Ionic_Solutions,
        'Base_Metals' => $Base_Metals,
        'Heavy_Metals' => $Heavy_Metals,
        'Noble_Metals' => $Noble_Metals,
        'Carbon_Compounds' => $Carbon_Compounds,
        'Micro_Organisms' => $Micro_Organisms,
        'Complex_Organisms' => $Complex_Organisms,
        'Planktic_Colonies' => $Planktic_Colonies,
        'Noble_Gas' => $Noble_Gas,
        'Reactive_Gas' => $Reactive_Gas,
        'Felsic_Magma' => $Felsic_Magma,
        'Non_CS_Crystals' => $NonCS_Crystals,
        'Suspended_Plasma' => $Suspended_Plasma,
        'Autotrophs' => $Autotrophs
    );
    
    $contract= PiContractValue($contractTime, $corporation, $post);
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
                    PrintContractContents($contract["Number"], 'PiContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    