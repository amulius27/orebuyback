<?php

function PrintPiT3ContractContents($contractNum) {
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT3ContractContents'));
    $contents = $db->fetchRow('SELECT * FROM PiT3ContractContents WHERE ContractNum= :number', array('number' => $contractNum));
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    for($i = 0; $i < $columnsNum; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        printf("<tr>");
        printf("<td>");
        printf($header);
        printf("</td>");
        printf("<td>");
        if($contents[$columns[$i]] > 0) {
            printf($contents[$columns[$i]]);
        }
        printf("</td>");
        printf("</tr>");
    }
    printf("</table>");
    
    DBClose($db);
}

?>
