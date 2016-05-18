<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session to retrieve session data
    session_start();
    //Get the corporation from the session
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corpTax = 10.00;
    }
    
    $alliance_tax = 4.00;
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );
    
    $db = DBOpen();



    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2358));
    
    $Biotech = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2358, 'time' => $update));
    $Camera_Drones = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2345, 'time' => $update));
    $Condensates = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2344, 'time' => $update));
    $Cryoprotectant_Solution = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2367, 'time' => $update));
    $Data_Chips = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17392, 'time' => $update));
    $Gel_Matrix_Biopaste = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2348, 'time' => $update));
    $Guidance_Systems = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9834, 'time' => $update));
    $Hazmat_Detection_Systems = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2366, 'time' => $update));
    $Hermetic_Membranes = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2361, 'time' => $update));
    $HighTech_Transmitters = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17898, 'time' => $update));
    $Industrial_Explosvies = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2360, 'time' => $update));
    $Necocoms = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2354, 'time' => $update));
    $Nuclear_Reactions = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2352, 'time' => $update));
    $Planetary_Vehicles = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9846, 'time' => $update));
    $Robotics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9848, 'time' => $update));
    $Smartfab_Units = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2351, 'time' => $update));
    $Supercomputers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2349, 'time' => $update));
    $Synthetic_Synapses = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2346, 'time' => $update));
    $Microcontrollers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 12836, 'time' => $update));
    $Ukomi = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17136, 'time' => $update));
    $Vaccines = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 28974, 'time' => $update));

    DBClose($db);

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
    var hightechTransmitters = <?= $Hightech_Transmitters ?>;
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
</script>