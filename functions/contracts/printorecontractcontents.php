<?php

function PrintOreContractContents($contractNum, \Simplon\Mysql\Mysql $db) {
    $columns = $db->executeSql('SELECT COLUMN_NAME FROM INFORMATION_SCHEME.COLUMNS WHERE TABLE_NAME = `OreContractContents`');
    $contents = $db->fetchRow('SELECT * FROM `OreContractContents` WHERE Contract_Num= :number', array('number' => $contractNum));
    
    $columnsNum = sizeof($colums);
    
    printf("<table class=\"table-striped\">");
    printf("<tr>");
    
    for($i = 2; $i < $columnsNum; $i++) {
        printf("<td>");
        printf($columns[$i]);
        printf("</td>");
        printf("<td>");
        printf($contents[$i]);
        printf("</td>");
        
    }
    
    printf("</tr>");
    printf("</table>");
}