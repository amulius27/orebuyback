<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            $contractNumber = $contract['ContractNum'];
            if($contract['ContractType'] == "Ore") {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'OreContractContents'));
                $contents = $db->fetchRow('SELECT * FROM OreContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            $size = sizeof($headers);
            
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contract['ContractType'] . "</td>");
            printf("<td>" . $contract['Corporation'] . "</td>");
            printf("<td>" . $contract['Value'] . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contract["ContractNum"] . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process\"></td>");
            printf("</tr>");
            
            //Print the expandable contents for each row
            printf("<tr>");
            printf("<td colspan=\"5\">");
            printf("<h4>Contract Details</h4>");
            printf("<ul>");
            for($i = 0; $i < $size - 1; $i++) {
                $headers[$i] = str_replace('_', ' ', $headers[$i]);
                   printf("<li>");
                    printf($headers[$i]);
                    printf(": ");
                    printf($contents[$i]);
                    printf("</li>"); 
            }
            //foreach( $headers as $index => $header ) {
            //    
            //}
            printf("</ul>");
            printf("</td>");
            
        }    
    }
    
    DBClose($db);
}

?>

