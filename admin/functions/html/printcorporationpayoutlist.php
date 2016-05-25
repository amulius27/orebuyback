<?php

function PrintCorporationPayoutListAdminDashboard() {
    //Open the database connection
    $db = DBOpen();
    //Get all of the corporations from the list
    $corporations = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :deleted', array('deleted' => 0));
    
    foreach($corporations as $corp) {
        $corporationName = $corp["CorpName"];
        $paidTaxes = $db->fetchColumn('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 0));
        $paidOutTaxes = $db->fetchColum('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 1));
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
}

?>
