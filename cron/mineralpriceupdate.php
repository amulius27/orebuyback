<?php
//Load the required functions for the sql calls
require_once __DIR__.'/cronfunctions/cronregistry.php';

$itemIDs = array(
    "tritanium" => 34,
    "pyerite" => 35,
    "mexallon" => 36,
    "isogen" => 37,
    "nocxium" => 38,
    "zydrine" => 39,
    "megacyte" => 40,
    "morphite" => 11399,
    "heliumIsotopes" => 16274,
    "nitrogenIsotopes" => 17888,
    "oxygenIsotopes" => 17887,
    "hydrogenIsotopes" => 17889,
    "liquidOzone" => 16273,
    "heavyWater" => 16272,
    "strontiumClathrates" => 16275,  
);
//Open the database
$db = DBOpen();
//Get the region from the database
$regionlimit = $db->fetchColumn('SELECT marketRegion FROM Configuration');
//Get the current time
$time = date("Y-m-d H:i:s");
/* We are commenting out this section to test the cURL method of getting price data
foreach($itemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in a float format for the database.  The
    //database is expecting a decimal and not a character
    $price = $price * 1.00;
    $db->insert('MineralPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}
 * 
 */

foreach($ItemIDs as $id) {
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
            $db->insert('MineralPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
        } else {
            $update = $db->fetchRow('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => $id));
            $db->insert('MineralPrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time));
        }
        
    }
    
    
}

DBClose($db);

?>