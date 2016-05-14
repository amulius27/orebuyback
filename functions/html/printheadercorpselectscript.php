<?php

function PrintHeaderCorpSelectScript() {
    printf("<script type='text/javascript'>
                function setCorp(corp) {
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.open(\"GET\", \"/misc/corpselect.php=?corporation=\" + corp, true);
                    xmlhttp.send();
                }
            </script>");
    
}
