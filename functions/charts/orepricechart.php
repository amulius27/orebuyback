<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    $db = DBOpen();
    $data = array();

    $ItemIDs = array(
            'Veldspar' => 1230,
            'Scordite' => 1228,
    );
		
    foreach($ItemIDs as $key => $item) {
        var_dump($key);
        var_dump($item);
        $things = $db->fetchRowMany('SELECT Time, Price FROM OrePrices WHERE Time BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND ItemId= :item',
                                  array('item' => $item));
	
        $size = sizeof($things);
        for($i = 0; $i < $size; $i++) {
            $data[$key][$i] = array('Time' => $things[$i]['Time'], 'Price' => $things[$i]['Price']);
        }
    } 
    
    DBClose($db);
    
    print json_encode($data);
    
?>