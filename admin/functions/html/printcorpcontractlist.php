<?php

function PrintCorpContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    
    $contracts = $db->fetchRowMany('SELECT * FROM CorpContracts WHERE Paid= :paid AND Deleted= :deleted', array('paid' => 0, 'deleted' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            //Set contract variables for printing
            $contractNumber = $contract['ContractNum'];
            $contractCorporation = $contract['Corporation'];
            $contractValue = $contract['Value'];
            $contractLocation = $contract['Location'];
            $contractV = number_format($contractValue, 2, '.', ',');
            //Get the contents of the contract
            $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'CorpContractContents'));
            $contents = $db->fetchRow('SELECT * FROM CorpContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            $size = sizeof($headers);
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contractCorporation . "</td>");
            printf("<td>" . $contractLocation . "</td>");
            printf("<td>" . $contractV . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process\"></td>");
            printf("</tr>");
            
            //Print the expandable contents for each row
            printf("<tr>");
            printf("<td>");
            printf("<h4>Contract Details</h4>");
            printf("<ul class=\"col-md-offset-1\">");
            for($i = 2; $i < $size; $i++) {
                $number = number_format($contents[$headers[$i]], 0, '.', ',');
                if($contents[$headers[$i]] > 0){
                    printf("<li>");
                    printf($headers[$i]);
                    printf(": ");
                    printf($number);
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