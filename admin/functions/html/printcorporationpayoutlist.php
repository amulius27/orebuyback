<?php

function PrintCorporationPayoutListAdminDashboard() {
  
    //Open the database connection
    $db = DBOpen();
    //Get all of the corporations from the list
    $corporations = $db->fetchRowMany('SELECT * FROM Corps WHERE Deleted= :deleted', array('deleted' => 0));
    
    foreach($corporations as $corp) {
        $corporationName = $corp["CorpName"];
        $taxesInTemp = $db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corporationName, 'ty' => 0));
        $paidInTaxes = 0.00;
        if($taxesInTemp != false) {
            foreach($taxesInTemp as $taxIn) {
                $paidInTaxes = $paidInTaxes + $taxIn;
            }
        }
        $taxesOutTemp = $db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corporationName, 'ty' => 1));
        $paidOutTaxes = 0.00;
        if($taxesOutTemp != false) {
            foreach($taxesOutTemp as $taxOut) {
                $paidOutTaxes = $paidOutTaxes + $taxOut;
            }
        }
        //Calculate the taxes
        $taxes = $paidInTaxes - $paidOutTaxes;
        //If the taxes are greater than zero, then display the table row for each corporation
        
        if($taxes > 0.00) {
            printf("<tr>");
            printf("<td>" . $corporationName . "</td>");
            printf("<td>" . number_format($taxes, '2', '.', ',') . "</td>");
            printf("<td><input type=\"text\" class=\"form-control\" name=\"taxes[]\"><input type=\"hidden\" class=\"form-control\" name=\"corporation[]\" value=\"" . $corporationName . "\"></td>");
            printf("</tr>"); 
        }
        
    }
    //Close the database connection
    DBClose($db);

}

?>