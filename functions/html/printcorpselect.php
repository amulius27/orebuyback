<?php

function PrintCorpSelect() {    
    //Open the session to be able to read from it
    session_start();
    if(isset($_SESSION["corporation"])) {
        $previousCorp = $_SESSION["corporation"];
    } else {
        $previousCorp = 'None';
    }
    //Open the database
    $db = DBOpen();
    //Get the list of all corps from the database
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    //Close the database
    DBClose($db);
    //Start the section to print the container and form
    printf("<div class=\"container\">");
    printf("<select class=\"form-control col-md-5\" name=\"GetCorpTax\" onload=\"setCorp()\" onchange=\"setCorp(this.value)\">");
    //Check to see if the Session is already going and if so, we want to repopulate the page
    if(isset($_SESSION["corporation"])) {
        $previousCorp = $_SESSION["corporation"];
        printf("<option value=\"$previousCorp\">$previousCorp</option>");
    } else {
        printf("<option></option>");
    }
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

