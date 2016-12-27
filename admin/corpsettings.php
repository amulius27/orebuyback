<?php

    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    require_once __DIR__.'/functions/registry.php';

    $session = new Custom\AdminSession\sessions();

    $username = $_SESSION['username'];
    $db = DBOpen();
    $role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

    $corporation = $db->fetchColumn('SELECT corporation FROM member_roles WHERE username= :user', array('user' => $username));
    $taxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));

    $stats = GetCorpStats($corporation, $db);
 
    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    if ((login_check($mysqli) == true) AND $role == ('Director' or 'CEO' or 'SiteAdmin')) {
        PrintNavBar($username, $role);
        printf("<br>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"<strong>Add New Corporation Form</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <form action=\"functions/processes/modifycorp.php\" method=\"POST\">
                                <label>Tax Rate:</label>
                                <input type=\"text\" class=\"form-control\" name=\"Tax\" id=\"Tax\" placeholder=\"" . $taxRate . "\" />
                                <br>
                                <input type=\"hidden\" class=\"form-control\" name=\"CorpName\" id=\"CorpName\" value=\"" . $corporation . "\">
                                <br>
                                <input type=\"submit\" class=\"form-control\" value=\"Modify Corp\" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"><strong>Corporation Stastics</strong></span></h3>
                        </div>
                        <br>
                        <div class=\"panel-body\" align=\"left\">
                            <span style=\"font-family: Arial; color: #FFF;\">
                               Total ISK Submitted: " . $stats["isk"] . " ISK<br>
                               Total Taxes: " . $stats["taxes"] . " ISK<br>
                               Total Contracts Submitted: " . $stats["contracts"] . "<br>
                               Total Paid Contracts: " . $stats["paid"] . "<br>
                               Total Deleted Contracts: " . $stats["deleted"] . "<br>
                            </span>
                        </div>
                    </div>
                </div>

                <script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
    
    } else {
        PrintNotLogged();
    }
    
    DBClose($db);

    printf("</body>
        </html>");
?>

