<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    header('Content-Type: application/json');
    
    $db = DBOpen();
    
    $isk = array();
    $data = array();
  
    //Get the list of corps for the data set to be set into the json variable
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :del', array('del' => 0));
    $size = sizeof($corps);
    
    for($i = 0; $i < $size -1; $i++) {
        $isk[$i] = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corps[$i], 'paid' => 1, 'del' => 0));
    }
    //Combine our two arrays
    $data = array_combine($corps, $isk); 
    
    DBClose($db);
    //Encode the json data
    print json_encode($data);
    
?>