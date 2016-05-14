<?php

function PrintCorpSelect() {    
    $db = DBOpen();
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    DBClose($db);
    printf("<div class=\"container\">");
    printf("<select class=\"form-control col-md-5\" onchange=\"setCorp(this.value)\">");
    foreach($corps as $corp) {
        printf("<option value=\"$corp\">$corp</option>");
    }
    printf("</select>");
    printf("</div>");
    
    
}
