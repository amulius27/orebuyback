<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    $db = DBOpen();

    $ores = $db->fetchRowMany('SELECT * FROM ItemIds WHERE Grouping= :group', array('group' => 'Ore'));
    var_dump($ores);
    $data = array();
    
    foreach($ores as $ore) {
        $things = $db->fetchRowMany('SELCT time, Price FROM OrePrices WHERE time BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND ItemId= :item',
                                    array('item' => $ore['ItemId']));
        $size = $sizeof($things);
        for($i = 0; $i < $size; $i++) {
            $data[$ore['Name']][$i] = array('Time' => $things[$i]['time'], 'Price' => $things[$i]['Price']);
        }
    }
    
    DBClose($db);
    
?>