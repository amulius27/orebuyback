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
        printf("<div class=\"container\">
                    <div class=\"row\">          
                      <div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main\">
                          <br>
                        <h2 class=\"sub-header\">Contract Listing</h2>
                        <div class=\"table-responsive\">
                            <form action=\"functions/processes/processcorpcontract.php\" method=\"POST\">
                              <table class=\"table table-striped table-expandable\">
                                <thead>
                                  <tr>
                                    <th>Contract Number</th>
                                    <th>Corporation</th>
                                    <th>Location</th>
                                    <th>Contract Value</th>
                                    <th>Confirm Contract</th>
                                    <th>Process Payment</th>
                                  </tr>
                                </thead>
                                <tbody>");
                                    PrintCorpContractListAdminDashboard();
                         printf("</tbody>
                              </table>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>");
    } else {
        printf("<div class=\"container\">
                    <div class=\"col-md-6\">
                        <h2>
                        <span class=\"error\">You are not authorized to access this page.</span>
                        Please <a href=\"index.php\">login</a> or speak to your site administrator.
                        </h2>
                    </div>
                </div>");
    }
    
    printf("<script src=\"/../js/jquery.cookie.js\"></script> 
            <script src=\"/../js/eve-link.js\"></script>");
    printf("</body></html>");
    
    DBClose($db);
?>
