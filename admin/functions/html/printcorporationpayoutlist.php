<?php

function PrintCorporationPayoutListAdminDashboard() {
    $db = DBOpen();
    
    $corporations = $db->fetchRowMany('SELECT * FROM Corps');
    
    foreach($corporations as $corporation) {
        $corporationName = $corporation["CorpName"];
        $paidTaxes = $db->fetchColumn('SELECT SUM(Amount) WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 0));
        $paidOutTaxes = $db->fetchColum('SELECT SUM(Amount) WHERE CorpName= :corpname AND Type= :type', array('corpname' => $corporationName, 'type' => 1));
        var_dump($corporationName);
        var_dump($paidTaxes);
        var_dump($paidoutTaxes);
        $taxes = $paidTaxes - $paidOutTaxes;
        if($taxes > 0.00) {
            printf("<tr>");
            printf("<td>" . $corporationName . "</td>");
            printf("<td>" . $taxes . "</td>");
            printf("<td><input type=\"number\" class=\"form-control\" name=\"taxes\"><input type=\"hidden\" name=\"corporation\" value=\"" . $corporationName . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process Corp Payout\"</td>");
            printf("</tr>"); 
        }
        
    }
    
    
    DBClose($db);
}

?>
