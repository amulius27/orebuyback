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
    $corporation = $db->fetchColumn('SELECT corporation FROM member_roles WHERE username= :user', array('user' => $username));
    
    //Print HTML Header
    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    
    if((login_check($mysqli) == true) AND (($role == 'CEO') OR ($role == 'SiteAdmin'))) {
        //Print the Navigation Bar
        PrintNavBar($username, $role);
        //Print the page
        printf("<div class=\"container\">
                    <div class=\"row\">          
                      <div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main\">
                          <br>
                        <h2 class=\"sub-header\">Request Minerals</h2>");
        PrintMineralRequestForm($corporation);
        printf("<script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
                                  
    } else {
        //Print the not logged in screen
        printf("<div class=\"container\">
                    <div class=\"col-md-6\">
                        <h2>
                        <span class=\"error\">You are not authorized to access this page.</span>
                        Please <a href=\"index.php\">login</a> or speak to your site administrator.
                        </h2>
                    </div>
                </div>");
    }
    
    DBClose($db);
    printf("</body></html>");
?> 

