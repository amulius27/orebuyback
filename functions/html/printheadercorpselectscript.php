<?php

function PrintHeaderCorpSelectScript() {
    printf("<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js\"></script>");
    printf("<script type=\"text/javascript\">
                function setCorp(corp) {
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.open(\"GET\", \"corpselect.php=?corporation=\" + corp, true);
                    xmlhttp.send();
                }
            </script>");
    
}

?>