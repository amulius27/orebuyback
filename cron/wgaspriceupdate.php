<?php

//Register the necessary functions
require_once __DIR__.'/cronfunctions/cronregistry.php';
//Open the database connection
$db = DBOpen();
//Get the region limit
$regionlimit = $db->fetchColumn('SELECT marketRegion FROM Configuration');
//Create the array for ItemIDs
$ItemIDs = array(
    30370,
    30371,
    30372,
    30373,
    30374,
    30375,
    30376,
    30377,
    30378
);
//Get the current time for the update
$time = date("Y-m-d H:i:s");
//Get the price for each of the ice products, and then insert into the database
/* We are commenting out this section to try the cURL method of getting pricing data
foreach($ItemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in decimal format for the sql database
    $price = $price * 1.00;
    $db->insert('IceProductPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}
 * 
 */

foreach($ItemIDs as $id) {
    
    $lastUpdate = $db->fetchColumn('SELECT MAX(time) FROM WGasPrices WHERE ItemId= :item', array('item' => $id));
    $enabled = $db->fetchColumn('SELECT Enabled FROM WGasPrices WHERE ItemItd= :item AND Time= :update', array('item' => $id, 'Time' => $lastUpdate));
    //If its enabled update the price, otherwise set it to 0.00
    if($enabled == 1) {
    
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
            if($price > 0.00) {
                $db->insert('WGasPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
            } else {
                $update = $db->fetchRow('SELECT * FROM WGasPrices WHERE ItemId= :item AND Time= :update', array('item' => $id, 'update' => $lastUpdate));
                $db->insert('WGasPrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time));
            }

        }
    } else {
        $db->insert('WGasPrices', array('ItemId' => $id, 'Price' => 0.00, 'Time' => $time, 'Enabled' => 0));
    }
    
    
}

DBClose($db);

?>