<?php

function PrintRegistrationCorpSelect() {
    $db = DBOpen();
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    DBClose($db);
    printf("<select class=\"form-control\" name=\"Corporation\">");
    foreach($corps as $corp) {
        printf("<option value=\"$corp\">$corp</option>");
    }
    printf("</select>");
    
}