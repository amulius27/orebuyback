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
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2268));
    
    $AqueousTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2268, 'time' => $update));
    $Aqueous = InputItemPrice($AqueousTemp['Enabled'], $AqueousTemp['Price']);
    
    $IonicTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2309, 'time' => $update));
    $Ionic = InputItemPrice($IonicTemp['Enabled'], $IonicTemp['Price']);
    
    $BaseTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2267, 'time' => $update));
    $Base = InputItemPrice($BaseTemp['Enabled'], $BaseTemp['Price']);
    
    $HeavyTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2272, 'time' => $update));
    $Heavy = InputItemPrice($HeavyTemp['Enabled'], $HeavyTemp['Price']);
    
    $NobleTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2270, 'time' => $update));
    $Noble = InputItemPrice($NobleTemp['Enabled'], $NobleTemp['Price']);
    
    $CarbonTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2288, 'time' => $update));
    $Carbon = InputItemPrice($CarbonTemp['Enabled'], $CarbonTemp['Price']);
    
    $MicroTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2073, 'time' => $update));
    $Micro = InputItemPrice($MicroTemp['Enabled'], $MicroTemp['Price']);
    
    $ComplexTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2287, 'time' => $update));
    $Complex = InputItemPrice($ComplexTemp['Enabled'], $ComplexTemp['Price']);
    
    $PlankticTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2286, 'time' => $update));
    $Planktic = InputItemPrice($PlankticTemp['Enabled'], $PlankticTemp['Price']);
    
    $Noble_GasTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2310, 'time' => $update));
    $Noble_Gas = InputItemPrice($Noble_GasTemp['Enabled'], $Noble_GasTemp['Price']);
   
    $ReactiveTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2311, 'time' => $update));
    $Reactive = InputItemPrice($ReactiveTemp['Enabled'], $ReactiveTemp['Price']);
    
    $FelsicTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2307, 'time' => $update));
    $Felsic = InputItemPrice($FelsicTemp['Enabled'], $FelsicTemp['Price']);
    
    $NonTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2306, 'time' => $update));
    $Non = InputItemPrice($NonTemp['Enabled'], $NonTemp['Price']);
    
    $SuspendedTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2308, 'time' => $update));
    $Suspended = InputItemPrice($SuspendedTemp['Enabled'], $SuspendedTemp['Price']);
    
    $AutotrophsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2305, 'time' => $update));
    $Autotrophs = InputItemPrice($AutotrophsTemp['Enabled'], $AutotrophsTemp['Price']);
    
    DBClose($db);
    
    $Aqueous = $Aqueous * $value;
    $Ionic = $Ionic * $value;
    $Base = $Base * $value;
    $Heavy = $Heavy * $value;
    $Noble = $Noble * $value;
    $Carbon = $Carbon * $value;
    $Micro = $Micro * $value;
    $Complex = $Complex * $value;
    $Planktic = $Planktic * $value;
    $Noble_Gas = $Noble_Gas * $value;
    $Reactive = $Reactive * $value;
    $Felsic = $Felsic * $value;
    $Non = $Non * $value;
    $Suspended = $Suspended * $value;
    $Autotrophs = $Autotrophs * $value;
    
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var aqueous = "<?= $Aqueous ?>";
    var ionic = "<?= $Ionic ?>";
    var base = "<?= $Base ?>";
    var heavy = "<?= $Heavy ?>";
    var noble = "<?= $Noble ?>";
    var carbon = "<?= $Carbon ?>";
    var micro = "<?= $Micro ?>";
    var complex = "<?= $Complex ?>";
    var planktic = "<?= $Planktic ?>";
    var noble_gas = "<?= $Noble_Gas ?>";
    var reactive = "<?= $Reactive ?>";
    var felsic = "<?= $Felsic ?>";
    var non_cs = "<?= $Non ?>";
    var suspended = "<?= $Suspended ?>";
    var autotrophs = "<?= $Autotrophs ?>";
    var value = <?= $value ?>;
</script>
