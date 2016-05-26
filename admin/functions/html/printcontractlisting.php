<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            $contractNumber = $contract['ContractNum'];
            $contractType = $contract['ContractType'];
            $contractCorporation = $contract['Corporation'];
            $contractValue = $contract['Value'];
            if($contractType == 'Ore') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'OreContractContents'));
                $contents = $db->fetchRow('SELECT * FROM OreContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            $size = sizeof($headers);
            
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contractType . "</td>");
            printf("<td>" . $contractCorporation . "</td>");
            printf("<td>" . $contractValue . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process\"></td>");
            printf("</tr>");
            
            //Print the expandable contents for each row
            printf("<tr>");
            printf("<td colspan=\"5\">");
            printf("<h4>Contract Details</h4>");
            printf("<ul>");
            if($contractType == 'Ore') {
                for($i = 2; $i < $size - 1; $i++) {
                    $header[$i] = str_replace('_', ' ', $headers[$i]);
                    printf("<li>");
                    printf($header[$i]);
                    printf(": ");
                    printf($contents[$headers[$i]]);
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

