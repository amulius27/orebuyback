<?php

//Register the necessary functions
require_once __DIR__.'/cronfunctions/cronregistry.php';
//Open the database connection
$db = DBOpen();
//Get the region limit
$regionlimit = $db->fetchColumn('SELECT marketRegion FROM Configuration');
//Create the array for ItemIDs
$ItemIDs = array(
    16262,
    17978,
    16263,
    17977,
    16265,
    17976,
    16264,
    17975,
    16266,
    16267,
    16268,
    16269,
    4247,
    4051,
    4312,
    4246,
    16274,
    17889,
    17888,
    17887,
    16272,
    16273,
    16275,
);
//Get the current time for the update
$time = date("Y-m-d H:i:s");
//Get the price for each of the ice products, and then insert into the database
foreach($ItemIDs as $id) {
    $lastUpdate = $db->fetchColumn('SELECT MAX(time) FROM IceProductPrices WHERE ItemId= :item', array('item' => $id));
    $enabled = $db->fetchColumn('SELECT Enabled FROM IceProductPrices WHERE ItemId= :item AND Time= :update', array('item' => $id, 'update' => $lastUpdate));
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
                $db->insert('IceProductPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
            } else {
                $update = $db->fetchRow('SELECT * FROM IceProductPrices WHERE ItemId= :item AND Time=: update', array('item' => $id, 'update' => $lastUpdate));
                $db->insert('IceProductPrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time));
            }

        } 
        
    } else {
        $db->insert('IceProductPrices', array('ItemId' => $id, 'Price' => 0.00, 'Time' => $time, 'Enabled' => 0));
    }
    
    
    
    
}

DBClose($db);

?>