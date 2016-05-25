<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            print("<tr>");
            printf("<td>" . $contract['ContractNum'] . "</td>");
            printf("<td>" . $contract['ContractType'] . "</td>");
            printf("<td>" . $contract['Corporation'] . "</td>");
            printf("<td>" . $contract['Value'] . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"" . $contract["ContractNum"] . " value=\"" . $contract["ContractNum"] . "\"</td>");
            printf("<input type=\"submit\" value=\"Process\">");
            printf("</tr>");
        }    
    }
    
    DBClose($db);
}

?>
