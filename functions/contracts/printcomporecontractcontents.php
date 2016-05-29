<?php

function PrintCompOreContractContents($contractNum) {
    $db = DBOpen();
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COUMNS WHERE TABLE_NAME= :table', array('table' => 'CompOreContractContents'));
    $contents = $db->fetchRow('SELECT * FROM CompOreContractContents WHERE ContractNum= :number', array('number' => $contractNum));
    
    $columnsNum = sizeof($colums);
    
    printf("<table class=\"table-striped\">");
    for($i = 0; $i < $columnsNum - 1; $i++) {
        $header = str_replace('_', ' ', $column);
        printf("<tr>");
        printf("<td>");
        printf($header);
        printf("</td>");
        printf("<td>");
        printf($contents[$column]);
        printf("</td>");
        printf("</tr>");
    }
    printf("</table>");
    
    DBClose($db);
}

?>
