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
    if ((login_check($mysqli) == true) AND ($role == ('SiteAdmin'))) {
        PrintNavBar($username, $role);
        printf("<div class=\"container\">
                    <div class=\"row\">          
                      <div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main\">
                          <br>
                        <h2 class=\"sub-header\">Corporation Payouts</h2>
                        <div class=\"container\">
                            <h3>Please only process one payout at a time.</h3>
                        </div>
                        <div class=\"table-responsive\">
                            <form action=\"functions/processes/processcorppayout.php\" method=\"POST\">
                              <table class=\"table table-striped\">
                                <thead>
                                  <tr>
                                    <th>Corporation</th>
                                    <th>Account Amount</th>
                                    <th>Requested Amount</th>
                                  </tr>
                                </thead>
                                <tbody>");
        PrintCorporationPayoutListAdminDashboard(); 
                                printf("<tr>
                                        <td></td>
                                        <td><input type=\"submit\" value=\"Process Corp Payouts\"></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                          </form>
                      </div>
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
