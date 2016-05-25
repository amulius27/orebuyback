<?php

function PrintCorporationPayoutListAdminDashboard() {
/*    
//Open the database connection
    $db = DBOpen();
    //Get all of the corporations from the list
    $corporations = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :deleted', array('deleted' => 0));
    
    foreach($corporations as $corp) {
        $corporationName = $corp["CorpName"];
        //Get the taxes paid into the corporation's account
        $paidTaxes = $db->fetchColumn('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 0));
        //Get the taxes already paid out to the corporation
        $paidOutTaxes = $db->fetchColum('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 1));
        //Calculate the taxes left over that are not paid out.
        $taxes = $paidTaxes - $paidOutTaxes;
        //If the taxes are greater than zero, then display the table row for each corporation
        if($taxes > 0.00) {
            printf("<tr>");
            printf("<td>" . $corporationName . "</td>");
            printf("<td>" . $taxes . "</td>");
            printf("<td><input type=\"number\" class=\"form-control\" name=\"taxes\"><input type=\"hidden\"  class=\"form-control\" name=\"corporation\" value=\"" . $corporationName . "\"></td>");
            printf("<td><input type=\"submit\" value=\"Process Corp Payout\"</td>");
            printf("</tr>"); 
        }
        
    }
    //Close the database connection
    DBClose($db);
 *
 */
    
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
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contract["ContractNum"] . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process\"></td>");
            printf("</tr>");
        }    
    }
    
    DBClose($db);
}

?>
