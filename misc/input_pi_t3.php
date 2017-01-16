<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session
    $session = new Custom\Sessions\sessions();
    //If the database session isn't available then start a regular session
    if(!$session) {
        session_start();
    }
    
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if (isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation != 'None') {
            $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
        } else {
            $corporation = 'None';
            $corpTax = $defaultTax;
        }
    } else {
        $corporation = 'None';
        $corpTax = $defaultTax;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    
    $db = DBOpen();



    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2358));
    
    $BiotechTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2358, 'time' => $update));
    $Biotech = InputItemPrice($BiotechTemp['Enabled'], $BiotechTemp['Price']);
    
    $Camera_DronesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2345, 'time' => $update));
    $Camera_Drones = InputItemPrice($Camera_DronesTemp['Enabled'], $Camera_DronesTemp['Price']);
    
    $CondensatesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2344, 'time' => $update));
    $Condensates = InputItemPrice($CondensatesTemp['Enabled'], $CondensatesTemp['Price']);
    
    $Cryoprotectant_SolutionTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2367, 'time' => $update));
    $Cryoprotectant_Solution = InputItemPrice($Cryoprotectant_SolutionTemp['Enabled'], $Cryoprotectant_SolutionTemp['Price']);
    
    $Data_ChipsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17392, 'time' => $update));
    $Data_Chips = InputItemPrice($Data_ChipsTemp['Enabled'], $Data_ChipsTemp['Price']);
    
    $Gel_Matrix_BiopasteTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2348, 'time' => $update));
    $Gel_Matrix_Biopaste = InputItemPrice($Gel_Matrix_BiopasteTemp['Enabled'], $Gel_Matrix_BiopasteTemp['Price']);
    
    $Guidance_SystemsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9834, 'time' => $update));
    $Guidance_Systems = InputItemPrice($Guidance_SystemsTemp['Enabled'], $Guidance_SystemsTemp['Price']);
    
    $Hazmat_Detection_SystemsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2366, 'time' => $update));
    $Hazmat_Detection_Systems = InputItemPrice($Hazmat_Detection_SystemsTemp['Enabled'], $Hazmat_Detection_SystemsTemp['Price']);
    
    $Hermetic_MembranesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2361, 'time' => $update));
    $Hermetic_Membranes = InputItemPrice($Hermetic_MembranesTemp['Enabled'], $Hermetic_MembranesTemp['Price']);
    
    $HighTech_TransmittersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17898, 'time' => $update));
    $HighTech_Transmitters = InputItemPrice($HighTech_TransmittersTemp['Enabled'], $HighTech_TransmittersTemp['Price']);
    
    $Industrial_ExplosivesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2360, 'time' => $update));
    $Industrial_Explosives = InputItemPrice($Industrial_ExplosivesTemp['Enabled'], $Industrial_ExplosivesTemp['Price']);
    
    $NeocomsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2354, 'time' => $update));
    $Neocoms = InputItemPrice($NeocomsTemp['Enabled'], $NeocomsTemp['Price']);
    
    $Nuclear_ReactorsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2352, 'time' => $update));
    $Nuclear_Reactors = InputItemPrice($Nuclear_ReactorsTemp['Enabled'], $Nuclear_ReactorsTemp['Price']);
    
    $Planetary_VehiclesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9846, 'time' => $update));
    $Planetary_Vehicles = InputItemPrice($Planetary_VehiclesTemp['Enabled'], $Planetary_VehiclesTemp['Price']);
    
    $RoboticsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9848, 'time' => $update));
    $Robotics = InputItemPrice($RoboticsTemp['Enabled'], $RoboticsTemp['Price']);
    
    $Smartfab_UnitsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2351, 'time' => $update));
    $Smartfab_Units = InputItemPrice($Smartfab_UnitsTemp['Enabled'], $Smartfab_UnitsTemp['Price']);
    
    $SupercomputersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2349, 'time' => $update));
    $Supercomputers = InputItemPrice($SupercomputersTemp['Enabled'], $SupercomputersTemp['Price']);
    
    $Synthetic_SynapsesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2346, 'time' => $update));
    $Synthetic_Synapses = InputItemPrice($Synthetic_SynapsesTemp['Enabled'], $Synthetic_SynapsesTemp['Price']);
    
    $MicrocontrollersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 12836, 'time' => $update));
    $Microcontrollers = InputItemPrice($MicrocontrollersTemp['Enabled'], $MicrocontrollersTemp['Price']);
    
    $UkomiTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17136, 'time' => $update));
    $Ukomi = InputItemPrice($UkomiTemp['Enabled'], $UkomiTemp['Price']);
    
    $VaccinesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 28974, 'time' => $update));
    $Vaccines = InputItemPrice($VaccinesTemp['Enabled'], $VaccinesTemp['Price']);

    DBClose($db);
    
    $Biotech = $Biotech * $value;
    $Camera_Drones = $Camera_Drones * $value;
    $Condensates = $Condensates * $value;
    $Cryoprotectant_Solution = $Cryoprotectant_Solution * $value;
    $Data_Chips = $Data_Chips * $value;
    $Gel_Matrix_Biopaste = $Gel_Matrix_Biopaste * $value;
    $Guidance_Systems = $Guidance_Systems * $value;
    $Hazmat_Detection_Systems = $Hazmat_Detection_Systems * $value;
    $Hermetic_Membranes = $Hermetic_Membranes * $value;
    $HighTech_Transmitters = $HighTech_Transmitters * $value;
    $Industrial_Explosives = $Industrial_Explosives * $value;
    $Neocoms = $Neocoms * $value;
    $Nuclear_Reactors = $Nuclear_Reactors * $value;
    $Planetary_Vehicles = $Planetary_Vehicles * $value;
    $Robotics = $Robotics * $value;
    $Smartfab_Units = $Smartfab_Units * $value;
    $Synthetic_Synapses = $Synthetic_Synapses * $value;
    $Microcontrollers = $Microcontrollers * $value;
    $Ukomi = $Ukomi * $value;
    $Vaccines = $Vaccines * $value;

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    
    var biotech = <?= $Biotech ?>;
    var cameraDrones = <?= $Camera_Drones ?>;
    var condensates = <?= $Condensates ?>;
    var cryoprotectant = <?= $Cryoprotectant_Solution ?>;
    var dataChips = <?= $Data_Chips ?>;
    var biopaste = <?= $Gel_Matrix_Biopaste ?>;
    var guidanceSystems = <?= $Guidance_Systems ?>;
    var hazmatDetection = <?= $Hazmat_Detection_Systems ?>;
    var hermeticMembranes = <?= $Hermetic_Membranes ?>;
    var hightechTransmitters = <?= $HighTech_Transmitters ?>;
    var industrialExplosives = <?= $Industrial_Explosives ?>;
    var neocoms = <?= $Neocoms ?>;
    var nuclearReactors = <?= $Nuclear_Reactors ?>;
    var planetaryVehicles = <?= $Planetary_Vehicles ?>;
    var robotics = <?= $Robotics ?>;
    var smartfab = <?= $Smartfab_Units ?>;
    var supercomputers = <?= $Supercomputers ?>;
    var syntheticSynapses = <?= $Synthetic_Synapses ?>;
    var microcontrollers = <?= $Microcontrollers ?>;
    var ukomi = <?= $Ukomi ?>;
    var vaccines = <?= $Vaccines ?>;
    var value = <?= $value ?>;
</script>