<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    //Open the database
    $db = DBOpen();
    //Start the session in order to retrieve data
    
    session_start();
    //Get the corporation from the session
    if(isset($_SESSION["corporation"])) {
        $corporation = $_SESSION["corporation"];
        $corporation = str_replace('"', "", $corporation);
        $corpTax = $db->fetchColumn('SELECT `TaxRate` FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));
    } else {
        $corpTax = 10.00;
    }
    
    $alliance_tax = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $total_tax = $alliance_tax + $corpTax;
    $value = 1.00 - ( $total_tax / 100.00 );

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2268));
    //Aqueous Liquids
    $Aqueous = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2268, 'time' => $update));
    //Ionic Solutions
    $Ionic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2309, 'time' => $update));
    //Base Metals
    $Base = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2267, 'time' => $update));
    //Heavy Metals
    $Heavy = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2272, 'time' => $update));
    //Noble Metals
    $Noble = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2270, 'time' => $update));
    //Carbon Compounds
    $Carbon = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2288, 'time' => $update));
    //Microorganisms
    $Micro = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2073, 'time' => $update));
    //Complex Organisms
    $Complex = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2287, 'time' => $update));
    //Planktic Colonies
    $Planktic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2286, 'time' => $update));
    //Noble Gas
    $Noble_Gas = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2310, 'time' => $update));
    //Reactive Metals
    $Reactive = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2398, 'time' => $update));
    //Felsic Magma
    $Felsic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2307, 'time' => $update));
    //Non CS Materials
    $Non = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2306, 'time' => $update));
    //Suspended Plasma
    $Suspended = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2308, 'time' => $update));
    //Autotrophs
    $Autotrophs = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2305, 'time' => $update));
    
    DBClose($db);
    
    
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
