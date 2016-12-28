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
    
    //Check login and display the page
    if(login_check($mysqli) == true) {
        PrintNavBar($username, $role);
        printf("<br>
                <div class=\"container\">
                    <h2>Welcome to the Warped Intentions Buy Back Program Dashboard, <?php echo" .  $username . "; ?></h2>
                    <h3>
                        <p>Select an option from the navigation bar at the top of the screen.</p>     
                    </h3>
                </div>");
        //Display whether a new corp was added if the variable is set.
        if(isset($_GET["msg"])) {
            if($_GET["msg"] == 'newcorpsuccess') {
                printf("Added new corp.");
            }
            if($_GET["msg"] == 'newcorpfailure') {
                printf("Failed to add new corp.");
            }
        }
        
        //Print the rest of the html for the logged in Dashboard
        printf("<br><hr><br>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FF2A2A;\"><strong>Buyback Utilization of Corps</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <canvas id=\"UtilizationChart\" height=\"600\" width=\"600\"></canvas>
                        </div>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FF2A2A;\"><strong>Types of Contracts Submitted</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <canvas id=\"ContractsChart\" height=\"400\" width=\"400\"></canvas>
                        </div>
                    </div>
                </div>

                <script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js\"></script>
                <script src=\"js/admindashboardcharts.js\"></script>");
        
    } else {
        //Print the not logged in text
        printf("<div class=\"container\">
                    <div class=\"col-md-6\">
                        <span class=\"error\">You are not authorized to access this page.</span>
                        Please <a href=\"index.php\">login</a> or speak to your site administrator.
                    </div>
                </div>");
    }
    
    printf("</body></html>");
    
    DBClose($db);
    
?>