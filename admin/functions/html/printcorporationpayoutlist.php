<?php

function PrintCorporationPayoutListAdminDashboard() {
    $db = DBOpen();
    
    $corporations = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :deleted', array('deleted' => 0));
    
    foreach($corporations as $corporation) {
        $corporationName = $corporation["CorpName"];
        $paidTaxes = $db->fetchColumn('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 0));
        $paidOutTaxes = $db->fetchColum('SELECT sum(Amount) as taxes FROM Corps WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 1));
        $taxes = $paidTaxes - $paidOutTaxes;
        if($taxes > 0.00) {
            printf("<tr>");
            printf("<td>" . $corporationName . "</td>");
            printf("<td>" . $taxes . "</td>");
            printf("<td><input type=\"number\" class=\"form-control\" name=\"taxes\"><input type=\"hidden\" name=\"corporation\" value=\"" . $corporationName . "\"></td>");
            printf("<td><input type=\"submit\" value=\"Process Corp Payout\"</td>");
            printf("</tr>"); 
        }
        
    }
    
    
    DBClose($db);
}

?>
