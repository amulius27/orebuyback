<?php

function PrintPiT4ContractContents($contractNum) {
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT4ContractContents'));
    $contents = $db->fetchRow('SELECT * FROM PiT4ContractContents WHERE ContractNum= :number', array('number' => $contractNum));
    var_dump($columns);
    $columnsNum = sizeof($columns);
    var_dump($columnsNum);
    
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
        else {
            printf("0");
        }
        printf("</td>");
        printf("</tr>");
        //if($contents[$columns[$i]] > 0) {
        //    printf("<tr>");
        //    printf("<td>");
        //    printf($header);
        //    printf("</td>");
        //    printf("<td>");
        //    printf($contents[$columns[$i]]);
        //    printf("</td>");
        //    printf("</tr>");
        //}
    }
    printf("</table>");
    
    DBClose($db);
}

?>
