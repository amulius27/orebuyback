<?php
//Get the required files in order to run sql calls
require_once __DIR__.'/cronfunctions/cronregistry.php';

$ItemIDs = array(
    25595,
    25605,
    25616,
    25596,
    25600,
    25622,
    25599,
    25604,
    25623,
    25591,
    25590,
    25611,
    25597,
    25592,
    25615,
    25625,
    25601,
    25621,
    25624,
    25608,
    25620,
    25619,
    25610,
    25589,
    25603,
    25618,
    25609,
    25617,
    25613,
    25588,
    25614,
    25593,
    25594,
    25607,
    25602,
    25612,
    25598,
    25606,
);
//Get the current time
$time = date("Y-m-d H:i:s");
//Open the database
$db = DBOpen();
//Get the region limit
$regionlimit = $db->fetchColumn('SELECT marketRegion FROM Configuration');
//Get the price for each of the ice products, and then insert into the database

/* We are commenting this out to test the cURL method rather than just xml_load_file
foreach($ItemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in decimal format for the sql database
    $price = $price * 1.00;
    $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}
 * 
 */

foreach($ItemIDs as $id) {
    
    $lastUpdate = $db->fetchColumn('SELECT MAX(time) FROM SalvagePrices WHERE ItemId= :item', array('item' => $id));
    $enabled = $db->fetchColumn('SELECT Enabled FROM SalvagePrices WHERE ItemId= :item AND Time= :update', 
                                array('item' => $id, 'update' => $lastUpdate));
    
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);

    if($data === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        //Close the curl connection
        curl_close($ch);
        //Insert the new data into the database
        $xml = new SimpleXMLElement($data);
        $price = (float)$xml->marketstat->type->buy->median[0];
    }
    
    if($enabled == 1) {
        if($price > 0.00) {
            $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
        } else {
            $update = $db->fetchRow('SELECT * FROM SalvagePrices WHERE ItemId= :item AND Time= :update', array('item' => $id, 'update' => $lastUpdate));
            $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time));
        }
    } else {
        if($price > 0.00) {
            $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time, 'Enabled' => 0));
        } else {
            $update = $db->fetchRow('SELECT * FROM SalvagePrices WHERE ItemId= :item AND Time= :update', array('item' => $id, 'update' => $lastUpdate));
            $db->insert('SalvagePrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time, 'Enabled' => 0));
        }
    }
    
}

//Close the database connection
DBClose($db);

?>