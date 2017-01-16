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
    if(isset($_POST["Biotech_Research_Reports"])) {
        $Biotech_Research_Reports = filter_input(INPUT_POST, "Biotech_Research_Reports", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Biotech_Research_Reports = 0;
    }
    if(isset($_POST["Camera_Drones"])) {
        $Camera_Drones = filter_input(INPUT_POST, "Camera_Drones", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Camera_Drones = 0;
    }
    if(isset($_POST["Condensates"])) {
        $Condensates = filter_input(INPUT_POST, "Condensates", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Condensates = 0;
    }
    if(isset($_POST["Cryoprotectant_Solution"])) {
        $Cryoprotectant_Solution = filter_input(INPUT_POST, "Cryoprotectant_Solution", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Cryoprotectant_Solution = 0;
    }
    if(isset($_POST["Data_Chips"])) {
        $Data_Chips = filter_input(INPUT_POST, "Data_Chips", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Data_Chips = 0;
    }
    if(isset($_POST["Gel_Matrix_Biopaste"])) {
        $Gel_Matrix_Biopaste = filter_input(INPUT_POST, "Gel_Matrix_Biopaste", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Gel_Matrix_Biopaste = 0;
    }
    if(isset($_POST["Guidance_Systems"])) {
        $Guidance_Systems = filter_input(INPUT_POST, "Guidance_Systems", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Guidance_Systems = 0;
    }
    if(isset($_POST["Hazmat_Detection_Systems"])) {
        $Hazmat_Detection_Systems = filter_input(INPUT_POST, "Hazmat_Detection_Systems", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Hazmat_Detection_Systems = 0;
    }
    if(isset($_POST["Hermetic_Membranes"])) {
        $Hermetic_Membranes = filter_input(INPUT_POST, "Hermetic_Membranes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Hermetic_Membranes = 0;
    }
    if(isset($_POST["High_Tech_Transmitters"])) {
        $High_Tech_Transmitters = filter_input(INPUT_POST, "High_Tech_Transmitters", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $High_Tech_Transmitters = 0;
    }
    if(isset($_POST["Industrial_Explosives"])) {
        $Industrial_Explosives = filter_input(INPUT_POST, "Industrial_Explosives", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Industrial_Explosives = 0;
    }
    if(isset($_POST["Neocoms"])) {
        $Neocoms = filter_input(INPUT_POST, "Neocoms", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Neocoms = 0;
    }
    if(isset($_POST["Nuclear_Reactors"])) {
        $Nuclear_Reactors = filter_input(INPUT_POST, "Nuclear_Reactors", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Nuclear_Reactors = 0;
    }
    if(isset($_POST["Planetary_Vehicles"])) {
        $Planetary_Vehicles = filter_input(INPUT_POST, "Planetary_Vehicles", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Planetary_Vehicles = 0;
    }
    if(isset($_POST["Robotics"])) {
        $Robotics = filter_input(INPUT_POST, "Robotics", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Robotics = 0 ;
    }
    if(isset($_POST["Smartfab_Units"])) {
        $Smartfab_Units = filter_input(INPUT_POST, "Smartfab_Units", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Smartfab_Units = 0;
    }
    if(isset($_POST["Supercomputers"])) {
        $Supercomputers = filter_input(INPUT_POST, "Supercomputers", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Supercomputers = 0;
    }
    if(isset($_POST["Synthetic_Synapses"])) {
        $Synthetic_Synapses = filter_input(INPUT_POST, "Synthetic_Synapses", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Synthetic_Synapses = 0;
    }
    if(isset($_POST["Transcranial_Microcontrollers"])) {
        $Transcranial_Microcontrollers = filter_input(INPUT_POST, "Transcranial_Microcontrollers", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Transcranial_Microcontrollers = 0;
    }
    if(isset($_POST["Ukomi"])) {
        $Ukomi_Superconductors = filter_input(INPUT_POST, "Ukomi", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Ukomi_Superconductors = 0;
    }
    if(isset($_POST["Vaccines"])) {
        $Vaccines = filter_input(INPUT_POST, "Vaccines", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Vaccines = 0;
    }
    
    $post = array(
        'Biotech_Research_Reports' => $Biotech_Research_Reports,
        'Camera_Drones' => $Camera_Drones,
        'Condensates' => $Condensates,
        'Cryoprotectant_Solution' => $Cryoprotectant_Solution,
        'Data_Chips' => $Data_Chips,
        'Gel_Matrix_Biopaste' => $Gel_Matrix_Biopaste,
        'Guidance_Systems' => $Guidance_Systems,
        'Hazmat_Detection_Systems' => $Hazmat_Detection_Systems,
        'Hermetic_Membranes' => $Hermetic_Membranes,
        'High_Tech_Transmitters' => $High_Tech_Transmitters,
        'Industrial_Explosives' => $Industrial_Explosives,
        'Neocoms' => $Neocoms,
        'Nuclear_Reactors' => $Nuclear_Reactors,
        'Planetary_Vehicles' => $Planetary_Vehicles,
        'Robotics' => $Robotics,
        'Smartfab_Units' => $Smartfab_Units,
        'Supercomputers' => $Supercomputers,
        'Synthetic_Synapses' => $Synthetic_Synapses,
        'Transcranial_Microcontrollers' => $Transcranial_Microcontrollers,
        'Ukomi_Superconductors' => $Ukomi_Superconductors,
        'Vaccines' => $Vaccines
    );
    
    $contract= PiT3ContractValue($contractTime, $corporation, $post);
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
                    PrintContractContents($contract["Number"], 'PiT3ContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    