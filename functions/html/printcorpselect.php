<?php

function PrintCorpSelect() {    
    $db = DBOpen();
    
    $corps = $db->fetchColumnMany('SELECT * FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    printf("<div class=\"container\">");
    printf("<select class=\"form-control\" name=\"corpselect\" onchange=\"setCorp(this.value)\">");
    printf("<option> </option");
    foreach($corps['CorpName'] as $corp) {
        printf("<option>$corp</option>");
    }
    printf("</select>");
    printf("</div>");
    
    DBClose($db);
}
