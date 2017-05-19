<?php
    require_once __DIR__.'/../../functions/registry.php';

    $db = DBOpen();

    $Items = $db->fetchRowMany('SELECT * FROM ItemIds WHERE Grouping= :group', array('group' => 'WGas'));
    $lastUpdate = $db->fetchColumn('SELECT MAX(Time) FROM WGasPrices');

    foreach($Items as $item) {
        if(isset($_POST[$item["ItemId"]])) {
            $enabled = 1;
            $lastEnable = $db->fetchColumn('SELECT Enabled FROM WGasPrices WHERE ItemId= :item AND Time= :time', array('item' => $item["ItemId"], 'time' => $lastUpdate));
            if($enabled != $lastEnable) {
                $db->update('WGasPrices', array('ItemId' => $item["ItemId"], 'Time' => $lastUpdate), array('Enabled' => $enabled));
            }
        } else {
            $enabled = 0;
            $lastEnable = $db->fetchColumn('SELECT Enabled FROM WGasPrices WHERE ItemId= :item AND Time= :time', array('item' => $item["ItemId"], 'time' => $lastUpdate));
            if($enabled != $lastEnable) {
                $db->update('WGasPrices', array('ItemId' => $item["ItemId"], 'Time' => $lastUpdate), array('Enabled' => $enabled));
            }
		}

}
	DBClose($db);

    //Return to the Dashboard page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../dashboard.php';
    header("Location: $location");

?>