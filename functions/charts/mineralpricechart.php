<?php
    //Call the required files for database and other functions
    require_once __DIR__.'/../../functions/registry.php';
    //Set the header type for the content to be json
    header('Content-Type: application/json');
    //Open the database connection
    $db = DBOpen();
    //Set the array of ItemIDs in order to get the past prices for the last month
    $ItemIDs = array(
        "Tritanium" => 34,
        "Pyerite" => 35,
        "Mexallon" => 36,
        "Isogen" => 37,
        "Nocxium" => 38,
        "Zydrine" => 39,
        "Megacyte" => 40,
        "Morphite" => 11399
    );
    
    $data = array();

    foreach($ItemIDs as $key => $item) {
        $things = $db->fetchRowMany('SELECT time, Price FROM MineralPrices WHERE time BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND ItemId= :item',
                                  array('item' => $item));
        $size = sizeof($things);
        for($i = 0; $i < $size; $i++) {
            $data[$key][$i] = array('Time' => $things[$i]['time'], 'Price' => $things[$i]['Price']);
        }
    }   
    
    //Print out the data
    print json_encode($data);
    
    //Close the database connection
    DBClose($db);

?>