<?php
//Get the required files in order to run sql calls
require_once __DIR__.'/cronfunctions/cronregistry.php';

$ItemIDs = array(
    // Raw PI
    2268,
    2309,
    2267,
    2272,
    2270,
    2288,
    2073,
    2287,
    2286,
    2310,
    2311,
    2398,
    2307,
    2306,
    2308,
    2305,
    // Tier1 PI
    2393,
    2396,
    3779,
    2401,
    2390,
    2397,
    2392,
    3683,
    2389,
    2399,
    2395,
    2398,
    9828,
    2400,
    3645,
    // Tier2 PI
    2329,
    3828,
    9836,
    9832,
    44,
    3693,
    15317,
    3725,
    3689,
    2327,
    9842,
    2463,
    2317,
    2321,
    3695,
    9830,
    3697,
    9838,
    2312,
    3691,
    2319,
    9840,
    3775,
    2328,
    // Tier3 PI
    2358,
    2345,
    2344,
    2367,
    17392,
    2348,
    9834,
    2366,
    2361,
    17898,
    2360,
    2354,
    2352,
    9846,
    9848,
    2351,
    2349,
    2346,
    12836,
    17136,
    28974,
    // Tier4 PI
    2867,
    2868,
    2869,
    2870,
    2871,
    2872,
    2875,
    2876,
);
//Get the current time
$time = date("Y-m-d H:i:s");
//Open the database connection
$db = DBOpen();
//Get the region limit
$regionlimit = $db->fetchColumn('SELECT marketRegion FROM Configuration');
//Get the price for each of the ice products, and then insert into the database
foreach($ItemIDs as $id) {
    
    $lastUpdate = $db->fetchColumn('SELECT MAX(time) FROM PiPrices WHERE ItemId= :item', array('item' => $id));
    $enabled = $db->fetchColumn('SELECT Enabled FROM PiPrices WHERE ItemId= :item AND Time= :update', array('item' => $id, 'update' => $lastUpdate));  
    
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
            $db->insert('PiPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
        } else {
            $update = $db->fetchRow('SELECT MAX(time) FROM PiPrices WHERE ItemId= :item', array('item' => $id));
            $db->insert('PiPrices', array('ItemId' => $id, 'Price' => $update['Price'], 'Time' => $time));
        }
    } else {
        $db->insert('PiPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time, 'Enabled' => 0));
    }
    
    
}
//Close the database connection
DBClose($db);

?>