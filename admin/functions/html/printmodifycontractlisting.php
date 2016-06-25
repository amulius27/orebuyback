<?php
    
function PrintModifyContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid AND Deleted= :deleted', array('paid' => 0, 'deleted' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            $contractNumber = $contract['ContractNum'];
            $contractType = $contract['ContractType'];
            $contractCorporation = $contract['Corporation'];
            $contractValue = $contract['Value'];
            //Print out the table values for the contracts which we can modify            
            printf("<tr>");
            printf("<td>" . $contractNumber . "<input type=\"hidden\" class=\"form-control\" name=\"ContractNumber[]\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"text\" class=\"form-control\" name=\"Corporation[]\" value=\"" . $contractCorporation . "\"</td>");
            printf("<td><input type=\"text\" class=\"form-control\" name=\"ContractValue[]\" value=\"" . $contractValue . "\"</td>");
            printf("</tr>");            
        }    
    }
    
    DBClose($db);
}

?>
