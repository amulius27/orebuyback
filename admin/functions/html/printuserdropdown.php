<?php

function PrintUserDropDownMenu(\Simplon\Mysql\Mysql $db) {
    $members = $db->fetchColumnMany('SELECT username FROM member_roles');
    
    printf("<form action=\"functions/processes/processmodifyuser.php\" method=\"POST\">
                <select name=\"users\">");  
    foreach($members as $user) {
            printf("<option value=\"$user\">$user</option>");
    }
    printf("    </select>");
        printf("<select name=\"role\">
                    <option value=\"SiteAdmin\">SiteAdmin</option>
                    <option value=\"CEO\">CEO</option>
                    <option value=\"Director\">Director</option>
                    <option value=\"None\">None</option>
                </select>");
    printf("</form>");
  
}

?>
