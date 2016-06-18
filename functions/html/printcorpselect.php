<?php

function PrintCorpSelect() {    
    session_start();
    if(isset($_SESSION["corporation"])) {
        $previousCorp = $_SESSION["corporation"];
    } else {
        $previousCorp = 'None';
    }
    
    $db = DBOpen();
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    DBClose($db);
    printf("<div class=\"container\">");
    printf("<select class=\"form-control col-md-5\" name=\"GetCorpTax\" onchange=\"setCorp(this.value)\">");
    printf("<option value=\"$previousCorp\">$previousCorp</option>");
    foreach($corps as $corp) {
        printf("<option value=\"$corp\">$corp</option>");
    }
    printf("</select>");
    printf("<p><span id=\"text\">Corp not selected</span></p>");
    printf("<script>
            function setCorp(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById(\"text\").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open(\"GET\", \"corpselect.php?corp=\"+str, true);
                xmlhttp.send();
            }
            </script>");
    printf("</div>");  
}

