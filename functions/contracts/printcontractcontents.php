<?php

function PrintContractContents($contractNum, $type) {
    $query = 'SELECT * FROM ' . $type . ' WHERE ContractNum= :number';
    
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => $type));
    $contents = $db->fetchRow($query, array('number' => $contractNum));
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    for($i = 0; $i < $columnsNum; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        if($header === ("QuoteTime" OR "ContractTime")) {
            $number = $contents[$columns[$i]];
        } else {
            $number = number_format($contents[$columns[$i]], 0, '.', ',');
        }
        
        printf("<tr>");
        printf("<td>");
        printf($header);
        printf("</td>");
        printf("<td>");
        if($contents[$columns[$i]] > 0) {
            printf($number);
        } else {
            printf("--");
        }
        printf("</td>");
        printf("</tr>");
    }
    printf("</table>");
    
    DBClose($db);
}

?>