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

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2329));
    
    $biocellsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2329, 'time' => $update));
    $biocells = InputItemPrice($biocellsTemp['Enabled'], $biocellsTemp['Price']);
    
    $construction_blocksTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3828, 'time' => $update));
    $construction_blocks = InputItemPrice($construction_blocksTemp['Enabled'], $construction_blocksTemp['Price']);
    
    $consumer_electronicsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9836, 'time' => $update));
    $consumer_electronics = InputItemPrice($consumer_electronicsTemp['Enabled'], $consumer_electronicsTemp['Price']);
    
    $coolantTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9832, 'time' => $update));
    $coolant = InputItemPrice($coolantTemp['Enabled'], $coolantTemp['Price']);
    
    $enriched_uraniumTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 44, 'time' => $update));
    $enriched_uranium = InputItemPrice($enriched_uraniumTemp['Enabled'], $enriched_uraniumTemp['Price']);
    
    $fertilizerTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3693, 'time' => $update));
    $fertilizer = InputItemPrice($fertilizerTemp['Enabled'], $fertilizerTemp['Price']);
    
    $gen_enhanced_livestockTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 15317, 'time' => $update));
    $gen_enhanced_livestock = InputItemPrice($gen_enhanced_livestockTemp['Enabled'], $gen_enhanced_livestockTemp['Price']);
    
    $livestockTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3725, 'time' => $update));
    $livestock = InputItemPrice($livestockTemp['Enabled'], $livestockTemp['Price']);
    
    $mechanical_partsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3689, 'time' => $update));
    $mechanical_parts = InputItemPrice($mechanical_partsTemp['Enabled'], $mechanical_partsTemp['Price']);
    
    $microfiber_shieldingTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2327, 'time' => $update));
    $microfiber_shielding = InputItemPrice($microfiber_shieldingTemp['Enabled'], $microfiber_shieldingTemp['Price']);
    
    $miniature_electronicsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9842, 'time' => $update));
    $miniature_electronics = InputItemPrice($miniature_electronicsTemp['Enabled'], $miniature_electronicsTemp['Price']);
    
    $nanitesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2463, 'time' => $update));
    $nanites = InputItemPrice($nanitesTemp['Enabled'], $nanitesTemp['Price']);
    
    $oxidesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2317, 'time' => $update));
    $oxides = InputItemPrice($oxidesTemp['Enabled'], $oxidesTemp['Price']);
    
    $polyaramidsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2321, 'time' => $update));
    $polyaramids = InputItemPrice($polyaramidsTemp['Enabled'], $polyaramidsTemp['Price']);
    
    $polytextilesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3695, 'time' => $update));
    $polytextiles = InputItemPrice($polytextilesTemp['Enabled'], $polytextilesTemp['Price']);
    
    $rocket_fuelTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9830, 'time' => $update));
    $rocket_fuel = InputItemPrice($rocket_fuelTemp['Enabled'], $rocket_fuelTemp['Price']);
    
    $silicate_glassTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3697, 'time' => $update));
    $silicate_glass = InputItemPrice($silicate_glassTemp['Enabled'], $silicate_glassTemp['Price']);
    
    $superconductorsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9838, 'time' => $update));
    $superconductors = InputItemPrice($superconductorsTemp['Enabled'], $superconductorsTemp['Price']);
    
    $supertensile_plasticsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2312, 'time' => $update));
    $supertensile_plastics = InputItemPrice($supertensile_plasticsTemp['Enabled'], $supertensile_plasticsTemp['Price']);
    
    $synthetic_oilTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3691, 'time' => $update));
    $synthetic_oil = InputItemPrice($synthetic_oilTemp['Enabled'], $synthetic_oilTemp['Price']);
    
    $testculturesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2319, 'time' => $update));
    $testcultures = InputItemPrice($testculturesTemp['Enabled'], $testculturesTemp['Price']);
    
    $transmitterTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9840, 'time' => $update));
    $transmitter = InputItemPrice($transmitterTemp['Enabled'], $transmitterTemp['Price']);
    
    $viral_agentTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3775, 'time' => $update));
    $viral_agent = InputItemPrice($viral_agentTemp['Enabled'], $viral_agentTemp['Price']);
    
    $water_cooled_cpuTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2328, 'time' => $update));
    $water_cooled_cpu = InputItemPrice($water_cooled_cpuTemp['Enabled'], $water_cooled_cpuTemp['Price']);
    
    DBClose($db);
    
    $biocells = $biocells * $value;
    $construction_blocks = $construction_blocks * $value;
    $consumer_electronics = $consumer_electronics * $value;
    $coolant = $coolant * $value;
    $enriched_uranium = $enriched_uranium * $value;
    $fertilizer = $fertilizer * $value;
    $gen_enhanced_livestock = $gen_enhanced_livestock * $value;
    $livestock = $livestock * $value;
    $mechanical_parts = $mechanical_parts * $value;
    $microfiber_shielding = $microfiber_shielding * $value;
    $miniature_electronics = $miniature_electronics * $value;
    $nanites = $nanites * $value;
    $oxides = $oxides * $value;
    $polyaramids = $polyaramids * $value;
    $rocket_fuel = $rocket_fuel * $value;
    $silicate_glass = $silicate_glass * $value;
    $superconductors = $superconductors * $value;
    $supertensile_plastics = $supertensile_plastics * $value;
    $synthetic_oil = $synthetic_oil * $value;
    $testcultures = $testcultures * $value;
    $transmitter = $transmitter * $value;
    $viral_agent = $viral_agent * $value;
    $water_cooled_cpu = $water_cooled_cpu * $value;
    
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