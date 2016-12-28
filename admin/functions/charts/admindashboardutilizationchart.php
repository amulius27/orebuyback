<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    //header('Content-Type: application/json');
    header('Content-Type: application/json');
    
    $db = DBOpen();
    
    $isk = array();
    $data = array();
  
    //Get the list of corps for the data set to be set into the json variable
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :del', array('del' => 0));
    $size = sizeof($corps);
	//Set variable j in order to build array without any spaces
	$j = 0;
    
    for($i = 0; $i < $size; $i++) {
        $isk[$i] = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corps[$i], 'paid' => 1, 'del' => 0));
		if($isk[$i] != "") {
			$isk[$i] *= 1;
			$data[$j] = array('corp' => $corps[$i], 'isk' => $isk[$i]);
			$j++;
		}
    }
    
    DBClose($db);
    //Encode the json data	
    print json_encode(array_values($data));
    
?>