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

    //Open the database connection
    $db = DBOpen();

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2329));
    
    $Biocells = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2329, 'time' => $update));
    $Construction_Blocks = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3828, 'time' => $update));
    $Consumer_Electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9836, 'time' => $update));
    $Coolant = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9832, 'time' => $update));
    $Enriched_Uranium = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 44, 'time' => $update));
    $Fertilizer = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3693, 'time' => $update));
    $Gen_Enhanced_livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 15317, 'time' => $update));
    $Livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3725, 'time' => $update));
    $Mechanical_Parts = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3689, 'time' => $update));
    $Microfiber_Shielding = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2327, 'time' => $update));
    $Miniature_Electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9842, 'time' => $update));
    $Nanites = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2463, 'time' => $update));
    $Oxides = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2317, 'time' => $update));
    $Polyaramids = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2321, 'time' => $update));
    $Polytextiles = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3695, 'time' => $update));
    $Rocket_Fuel = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9830, 'time' => $update));
    $Silicate_Glass = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3697, 'time' => $update));
    $Superconductors = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9838, 'time' => $update));
    $Supertensile_Plastics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2312, 'time' => $update));
    $Synthetic_Oil = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3691, 'time' => $update));
    $Teset_Cutlures = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2319, 'time' => $update));
    $Transmitter = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9840, 'time' => $update));
    $Viral_Agent = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3775, 'time' => $update));
    $Water_Cooled_CPU = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2328, 'time' => $update));
    
    DBClose($db);


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var biocells = <?= $Biocells ?>;
    var constructionBlocks = <?= $Construction_Blocks ?>;
    var consumerElectronics = <?= $Consumer_Electronics ?>;
    var coolant = <?= $Coolant ?>;
    var enrichedUranium = <?= $Enriched_Uranium ?>;
    var fertilizer = <?= $Fertilizer ?>;
    var genEnhancedLivestock = <?= $Gen_Enhanced_livestock ?>;
    var livestock = <?= $Livestock ?>;
    var mechanicalParts = <?= $Mechanical_Parts ?>;
    var microfibreShielding = <?= $Microfiber_Shielding ?>;
    var miniatureElectronics = <?= $Miniature_Electronics ?>;
    var nanites = <?= $Nanites ?>;
    var oxides = <?= $Oxydes ?>;
    var polyaramids = <?= $Polyaramids ?>;
    var polytextiles = <?= $Polytextiles ?>;
    var rocketFuel = <?= $Rocket_Fuel ?>;
    var silicateGlass = <?= $Silicate_Glass ?>;
    var superconductors = <?= $Superconductors ?>;
    var supertensilePlastics = <?= $Supertensile_Plastics ?>;
    var syntheticOil = <?= $Synthetic_Oil ?>;
    var testCultures = <?= $Test_Cultures ?>;
    var transmitter = <?= $Transmitter ?>;
    var viralAgent = <?= $Viral_Agent ?>;
    var waterCooledCpu = <?= $Water_Cooled_CPU ?>;
</script>
<script src="webroot/js/t2_pi_cal.js"></script>