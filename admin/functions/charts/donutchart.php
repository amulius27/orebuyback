<?php

function DonutChart($chart) {
    
    $db = DBOpen();
    //Get the corps for the chart
    $corps = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :del', array('del' => 0));
    $data = $chart->DataTable();
    $data->addStringColumn('Buyback Program');
    $data->addNumberColumn('ISK');
    foreach($corps as $corp) {
        $isk = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid', array('corp' => $corp["CorpName"], 'paid' => 1));
        if($isk == "") {
            $isk = 0;
        } else {
            $data->addRow([$corp["CorpName"], $isk]);
        }
        
        
    }
    
    DBClose($db);
    
    return $data;    
}

?>


