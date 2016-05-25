<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    var_dump($contracts);
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            print("<tr>");
            printf("<td>" . $contract['ContractNum'] . "</td>");
            printf("<td>" . $contract['ContractType'] . "</td>");
            printf("<td>" . $contract['Corporation'] . "</td>");
            printf("<td>" . $contract['Value'] . "</td>");
            //printf("<td><input type=\"radio\" class=\"form-control\" name=\"" . $contract["ContractNum"] . "\"</td>");
            printf("</tr>");
        }    
    }
    
    DBClose($db);
}

?>
