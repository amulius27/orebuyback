<?php

function PrintContractContents($contractNum, $type) {
    $query = 'SELECT * FROM ' . $type . ' WHERE ContractNum= :number';
    
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => $type));
    $contents = $db->fetchRow($query, array('number' => $contractNum));
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    //Print the first row which is the Contract Number
    printf("<tr>");
    printf("<td>");
    printf($columns[0]);
    printf("</td>");
    printf("<td>");
    printf($contents[$columns[0]]);
    printf("</td>");
    printf("</tr>");
    //Print the second row which is Contract Time
    printf("<tr>");
    printf("<td>");
    printf($columns[1]);
    printf("</td>");
    printf("<td>");
    printf($contents[$columns[1]]);
    printf("</td>");
    printf("</tr>");
    //Print the third row which is Quote Time
    printf("<tr>");
    printf("<td>");
    printf($columns[2]);
    printf("</td>");
    printf("<td>");
    printf($contents[$columns[2]]);
    printf("</td>");
    printf("</tr>");
    //Run through the rest of the items and print the table
    for($i = 3; $i < $columnsNum; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        $number = number_format($contents[$columns[$i]], 0, '.', ',');
                
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