<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            if($contract['ContractType'] == "Ore") {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'OreContractContents'));
                $contents = $db->fetchRow('SELECT * FROM OreContractContents WHERE ContractNum= :contract', array('contract' => $contract['ContractNum']));
            }
            
            printf("<tr>");
            printf("<td>" . $contract['ContractNum'] . "</td>");
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
            foreach( $headers as $index => $header ) {
                $header = str_replace('_', ' ', $header);
                if($contents[$index] != (NULL OR 0)) {
                   printf("<li>");
                    printf($header);
                    printf(": ");
                    printf($contents[$index]);
                    printf("</li>"); 
                } 
            }
            printf("</ul>");
            printf("</td>");
            
        }    
    }
    
    DBClose($db);
}

?>

