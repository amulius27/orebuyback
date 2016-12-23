<?php

    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    require_once __DIR__.'/functions/registry.php';

    $session = new Custom\AdminSession\sessions();
    if(!$session) {
        session_start();
    }

    $username = $_SESSION['username'];
    $db = DBOpen();
    $role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    
    if((login_check($mysqli) == true) AND ($role == 'SiteAdmin')) {
        PrintNavBar($username, $role);
        
        printf("<br>
       
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"<strong>Add New Corporation Form</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <form action=\"functions/processes/processnewcorp.php\" method=\"POST\">
                                <label>Corporation Name:</label>
                                <input type=\"text\" class=\"form-control\" name=\"Corporation\" />
                                <label>Tax Rate:</label>
                                <input type=\"text\" class=\"form-control\" name=\"Tax\" />
                                <br><br>
                                <input type=\"submit\" class=\"form-control\" value=\"Add New Corp\" />
                            </form>
                        </div>
                    </div>
                </div>



                <script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
    } else {
        PrintNotLogged();
    }
    
    DBClose($db);
    printf("</body></html>");
?>
