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
    //Lets get the current configuration of the site.  This should only return 1 row
    $configuration = $db->fetchRow('SELECT * FROM Configuration');
    $refineRate = $configuration['refineRate'];
    $allianceTax = $configuration['allianceTaxRate'];
    $marketRegion = $configuration['marketRegion'];
    $mineralTax = $configuration['mineralTaxRate'];
    
    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    if ((login_check($mysqli) == true) AND ($role == 'SiteAdmin')) {
        PrintNavBar($username, $role);
        printf("<br>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FF2A2A;\"><strong>Modify Site Settings</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            - Modify the site settings below.<br>
                            - Refine Rate is the average Refine Rate to use for Ore, Compressed Ore, and Ice.  This number should be a whole number greater than 0.<br>
                            - Alliance Tax Rate is the tax set by the alliance.<br>
                            - Market Region is the region prices will be pulled from Eve-Central during nightly updates.<br>
                        </div>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"row\">
                        <form action=\"functions/system/updateconfiguration.php\" method=\"POST\">
                            <label>Refine Rate</label>
                            <div class=\"input-group form-control\" id=\"RefineRate\" style=\"padding: 0; border: none;\">
                                <input type=\"text\" class=\"form-control text-left typeahead\" name=\"RefineRate\" placeholder=\"" .  $refineRate . "\">
                            </div>
                            <label>Alliance Tax Rate</label>
                            <div class=\"input-group form-control\" id=\"AllianceTaxRate\" style=\"padding: 0; border: none;\">
                                <input type=\"text\" class=\"form-control text-left typeahead\" name=\"AllianceTaxRate\" placeholder=\"" . $allianceTax . "\">
                            </div>
                            <label>Mineral Tax Rate</label>
                            <div class=\"input-group form-control\" id=\"MineralTaxRate\" style=\"padding: 0; border: none;\">
                                <input type=\"text\" class=\"form-control text-left typeahead\" name=\"MineralTaxRate\" placeholder=\"" . $mineralTax . "\">
                            </div>
                            <label>Market Region</label>
                            <div class=\"input-group form-control\" id=\"MarketRegion\" style=\"padding: 0; border: none;\">
                                <input type=\"text\" class=\"form-control text-left typeahead\" name=\"MarketRegion\" placeholder=\"" . $marketRegion . "\">
                                <input type=\"hidden\" class=\"form-control\" name=\"UpdatedBy\" value=\"" . $username . "\">
                            </div><br>
                            <div class=\"input-group form-control\" id=\"SubmitSettings\" style=\"padding: 0; border: none;\">
                                <input class=\"form-control pull-left\" type=\"submit\" value=\"Update Settings\">
                            </div>
                        </form>
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
