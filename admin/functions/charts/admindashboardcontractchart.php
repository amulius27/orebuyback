<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    //header('Content-Type: application/json');
    header('Content-Type: application/json');
    
    $db = DBOpen();
    
    $contracts = array();
    $contractTypes = array(
        'Mineral',
        'Ore',
        'Compressed Ore',
        'Ice',
        'Ice Products',
        'Fuel',
        'Pi',
        'PiT1',
        'PiT2',
        'PiT3',
        'PiT4',
        'Salvage',
        'Wormhole Gas'
    );
    $data = array();
    
    $i = 0;
    foreach($contractTypes as $contractType) {
        if($contractType === 'Compressed Ore') {
            $type = 'CompOre';
        } else if($contractType === 'Ice Products') {
            $type = 'IceProd';
        } else if($contractType === 'Wormhole Gas') {
            $type = 'WGas';
        } else {
            $type = $contractType;
        }
        //Call the database to count the number of contracts
        $tempNum = $db->fetchColumn('SELECT COUNT(ContractNum) FROM Contracts WHERE ContractType= :type AND Paid= :paid AND Deleted= :del',
                                    array('type' => $type, 'paid' => 1, 'del' => 0));
        
        if($tempNum > 0) {
           $data[$i] = array('Type' => $contractType, 'Number' => $tempNum);
            $i++; 
        }
        
        
    }
    
    DBClose($db);
    //Encode the json data	
    print json_encode(array_values($data));
    //Close the database
    DBClose($db);
    
?>