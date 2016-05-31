<?php

function PrintPiT4ContractContents($contractNum) {
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'SalvageContractContents'));
    $contents = $db->fetchRow('SELECT * FROM SalvageContractContents WHERE ContractNum= :number', array('number' => $contractNum));
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    for($i = 0; $i < $columnsNum - 1; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        if($contents[$columns[$i]] > 0) {
            printf("<tr>");
            printf("<td>");
            printf($header);
            printf("</td>");
            printf("<td>");
            printf($contents[$columns[$i]]);
            printf("</td>");
            printf("</tr>");
        }
    }
    printf("</table>");
    
    DBClose($db);
}

?>
