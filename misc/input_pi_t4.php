<!-- Connect to DB -->
<?php
    require_once __DIR__.'/../functions/registry.php';
    
    if(!defined('indexes')) {
        die('Direct access not permitted');
    }
    
    $db = DBOpen();

    //Update timestamp
    $update = $db->fetchColumn('SELECT MAX(Time) FROM PiPrices WHERE ItemId= :id', array('id' => 2867));
    
    $Broadcast = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2867, 'time' => $update));
    $Response_Drones = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2868, 'time' => $update));
    $Nanofactory = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2869, 'time' => $update));
    $Organic_Mortar = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2870, 'time' => $update));
    $Recursive_Computing = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2871, 'time' => $update));
    $Power_Core = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2872, 'time' => $update));
    $Sterile_Conduits = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2875, 'time' => $update));
    $Mainframe = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2876, 'time' => $update));
    
    DBClose($db);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var broadcast = <?= $Broadcast ?>;
    var responseDrones = <?= $Response_Drones ?>;
    var nanoFactory = <?= $Nanofactory ?>;
    var organicMortar = <?= $Organic_Mortar ?>;
    var recursiveComputing = <?= $Recursive_Computing ?>;
    var powerCore = <?= $Power_Core ?>;
    var sterileConduits = <?= $Sterile_Conduits ?>;
    var Mainframe = <?= $Mainframe ?>;
</script>
<script src="webroot/js/t4_pi_cal.js"></script>