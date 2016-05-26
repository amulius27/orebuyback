<?php

function PrintIceContractContents($contractNum, \Simplon\Mysql\Mysql $db) {
    $columns = $db->executeSql('SELECT COLUMN_NAME FROM INFORMATION_SCHEME.COLUMNS WHERE TABLE_NAME = `IceProdContractContents`');
    $contents = $db->fetchRow('SELECT * FROM `IceProdContractContents` WHERE Contract_Num= :number', array('number' => $contractNum));
    
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
}

?>
