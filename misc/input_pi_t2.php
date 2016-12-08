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
    if(isset($_REQUEST["corporation"])) {
        $corporation = $_REQUEST["corporation"];
        if($corporation == 'None') {
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        if($corporation == 'None') {
            $corpTax = 10.00;
        }
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corporation = 'None';
        $corpTax = 10.00;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );

    //Open the database connection
    $db = DBOpen();

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2329));
    
    $biocells = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2329, 'time' => $update));
    $construction_blocks = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3828, 'time' => $update));
    $consumer_electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9836, 'time' => $update));
    $coolant = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9832, 'time' => $update));
    $enriched_uranium = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 44, 'time' => $update));
    $fertilizer = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3693, 'time' => $update));
    $gen_enhanced_livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 15317, 'time' => $update));
    $livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3725, 'time' => $update));
    $mechanical_parts = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3689, 'time' => $update));
    $microfiber_shielding = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2327, 'time' => $update));
    $miniature_electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9842, 'time' => $update));
    $nanites = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2463, 'time' => $update));
    $oxides = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2317, 'time' => $update));
    $polyaramids = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2321, 'time' => $update));
    $polytextiles = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3695, 'time' => $update));
    $rocket_fuel = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9830, 'time' => $update));
    $silicate_glass = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3697, 'time' => $update));
    $superconductors = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9838, 'time' => $update));
    $supertensile_plastics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2312, 'time' => $update));
    $synthetic_oil = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3691, 'time' => $update));
    $testcultures = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2319, 'time' => $update));
    $transmitter = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9840, 'time' => $update));
    $viral_agent = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3775, 'time' => $update));
    $water_cooled_cpu = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2328, 'time' => $update));
    
    DBClose($db);


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    
    var biocells = <?= $biocells ?>;
    var constructionBlocks = <?= $construction_blocks ?>;
    var consumerElectronics = <?= $consumer_electronics ?>;
    var coolant = <?= $coolant ?>;
    var enrichedUranium = <?= $enriched_uranium ?>;
    var fertilizer = <?= $fertilizer ?>;
    var genEnhancedLivestock = <?= $gen_enhanced_livestock ?>;
    var livestock = <?= $livestock ?>;
    var mechanicalParts = <?= $mechanical_parts ?>;
    var microfibreShielding = <?= $microfiber_shielding ?>;
    var miniatureElectronics = <?= $miniature_electronics ?>;
    var nanites = <?= $nanites ?>;
    var oxides = <?= $oxides ?>;
    var polyaramids = <?= $polyaramids ?>;
    var polytextiles = <?= $polytextiles ?>;
    var rocketFuel = <?= $rocket_fuel ?>;
    var silicateGlass = <?= $silicate_glass ?>;
    var superconductors = <?= $superconductors ?>;
    var supertensilePlastics = <?= $supertensile_plastics ?>;
    var syntheticOil = <?= $synthetic_oil ?>;
    var testCultures = <?= $testcultures ?>;
    var transmitter = <?= $transmitter ?>;
    var viralAgent = <?= $viral_agent ?>;
    var waterCooledCpu = <?= $water_cooled_cpu ?>;
    var value = <?= $value ?>;
</script>