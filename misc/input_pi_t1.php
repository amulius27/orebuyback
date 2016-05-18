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

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2393));

    $Bacteria = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2393, 'time' => $update));
    $Biofuels = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2396, 'time' => $update));
    $Biomass = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3779, 'time' => $update));
    $Chiral_Structures = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2401, 'time' => $update));
    $Electrolytes = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2390, 'time' => $update));
    $Industrial_Fibers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2397, 'time' => $update));
    $Oxidizing_Compound = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2392, 'time' => $update));
    $Oxygen = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3683, 'time' => $update));
    $Plasmoids = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2389, 'time' => $update));
    $Precious_metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2399, 'time' => $update));
    $Proteins = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2395, 'time' => $update));
    $Reactive_metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2398, 'time' => $update));
    $Silicon = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9828, 'time' => $update));
    $Toxic_Metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2400, 'time' => $update));
    $Water = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3645, 'time' => $update));
    
    DBClose($db);

?>

<script>
    var bacteria = <?= $Bacteria ?>;
    var biofuels = <?= $Biofuels ?>;
    var biomass = <?= $Biomass ?>;
    var chiralStructures = <?= $Chiral_Structures ?>;
    var electrolytes = <?= $Electrolytes ?>;
    var industrialFibers = <?= $Industrial_Fibers ?>;
    var oxidizingCompound = <?= $oxidizing_compound ?>;
    var oxygenPI2 = <?= $Oxygen ?>;
    var plasmoids = <?= $Plasmoids ?>;
    var preciousMetals = <?= $Precious_Metals ?>;
    var proteins = <?= $Proteins ?>;
    var reactiveMetals = <?= $Reactive_Metals ?>;
    var silicon = <?= $Silicon ?>;
    var toxicMetals = <?= $Toxic_Metals ?>;
    var water = <?= $Water ?>;
</script>

<script src="js/t1_pi_cal.js"></script>
