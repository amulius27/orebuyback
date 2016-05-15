<?php
//Get the required files in order to run sql calls
require_once __DIR__.'/cronfunctions/cronregistry.php';

//Set our region for EVE-Central
$regionlimit = 10000043;

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
//Get the price for each of the ice products, and then insert into the database
foreach($ItemIDs as $id) {
    $url = "http://api.eve-central.com/api/marketstat?typeid=" . $id . "&regionlimit=" . $regionlimit;
    $xml = simplexml_load_file($url);
    $price = $xml->marketstat->type->buy->median[0];
    //Multiply the price by 1.00 to put it in decimal format for the sql database
    $price = $price * 1.00;
    $db->insert('PiPrices', array('ItemId' => $id, 'Price' => $price, 'Time' => $time));
}
//Close the database connection
DBClose($db);

?>