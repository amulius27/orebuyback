<?php

function PrintDeleteCorpContractListAdminDashboard() {
    $db = DBOpen();
    
    $contracts = $db->fetchRowMany('SELECT * FROM CorpContracts WHERE Paid= :paid AND Deleted= :deleted', array('paid' => 0, 'deleted' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            $contractNumber = $contract['ContractNum'];
            $contractLocation = $contract['Location'];
            $contractCorporation = $contract['Corporation'];
            $contractValue = $contract['Value'];
            
            $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'CorpContractContents'));
            $contents = $db->fetchRow('SELECT * FROM CorpContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            
            $size = sizeof($headers);
            
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contractCorporation . "</td>");
            printf("<td>" . $contractLocation . "</td>");
            printf("<td>" . $contractValue . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Delete\"></td>");
            printf("</tr>");
            
            //Print the expandable contents for each row
            printf("<tr>");
            printf("<td>");
            printf("<h4>Contract Details</h4>");
            printf("<ul class=\"col-md-offset-1\">");
            for($i = 2; $i < $size - 1; $i++) {
                if($contents[$headers[$i]] > 0){
                    $header[$i] = str_replace('_', ' ', $headers[$i]);
                    printf("<li>");
                    printf($header[$i]);
                    printf(": ");
                    if(is_numeric($contents[$headers[$i]])) {
                        printf(number_format($contents[$headers[$i]], 2, '.', ','));
                    } else {
                        printf($contents[$headers[$i]]);
                    }
                    
                    printf("</li>"); 
                }
            }
            printf("</ul>");
            printf("</td>");
            printf("</tr>");
        }
    }
    
    DBClose($db);
}

?>