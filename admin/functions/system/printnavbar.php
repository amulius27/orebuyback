<?php

function PrintNavBar($username, $role) {
    
    //Print the nav bar based on the username and its roles
    if($role == 'SiteAdmin') {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 60px;\" role=\"navigation\">
                    <div class=\"navbar-header\">
                        <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                    </div>
                    <div class=\"collapse navbar-collapse pull-left\">
                        <ul class=\"nav navbar-nav\">
                            <li><a href=\"dashboard.php\">Dashboard</a></li>
                            <li class=\"dropdown\"><a data-toggle=\"dropdown\" class=\"dropdown-toggle\">Contracts<b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"contracts.php\">Payout Contracts</a></li>
                                    <li><a href=\"modifycontracts.php\">Modify Contracts</a></li>
                                    <li><a href=\"deletecontracts.php\">Delete Contracts</a></li>
                                </ul>
                            </li>
                            <li class=\"dropdown\"><a data-toggle=\"dropdown\" class=\"dropdown-toggle\">Corp Contracts<b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"requestminerals.php\">Request Minerals</a></li>
                                    <li><a href=\"completemineralrequest.php\">Complete Request</a></li>
                                    <li><a href=\"deletecorpcontract.php\">Delete Corp Contract Request</a></li>
                                </ul>
                            </li>
                            <li><a href=\"corppayouts.php\">Corp Payouts</a></li>
                            <li><a href=\"corpsettings.php\">Corp Settings</a></li>
                            <li><a href=\"addnewcorp.php\">Add New Corp</a></li>
                            <li><a href=\"modifyuser.php\">Modify User</a></li>
                            <li class=\"dropdown\"><a data-toggle=\"dropdown\" class=\"dropdown-toggle\">Update Settings<b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"setconfig.php\">Update Settings</a></li>
                                    <li><a href=\"enable/minerals.php\">Enable Minerals</a></li>
                                    <li><a href=\"enable/ore.php\">Enable Ore</a></li>
                                    <li><a href=\"enable/ice.php\">Enable Fuel</a></li>
                                    <li><a href=\"enable/pi.php\">Enable PI Materials</a></li>
                                    <li><a href=\"enable/wgas.php\">Enable W-Gas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class=\"collapse navbar-collapse pull-right\">
                        <ul class=\"nav navbar-nav\">
                            <li><h2>" .  $username . " </h2></li>
                            <li><a href=\"includes/logout.php\">Log Out</a></li>
                        </ul>
                    </div>
                </div>");
    } else if ($role == 'CEO') {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 60px;\" role=\"navigation\">
                    <div class=\"navbar-header\">
                        <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                    </div>
                    <div class=\"collapse navbar-collapse pull-left\">
                        <ul class=\"nav navbar-nav\">
                            <li><a href=\"dashboard.php\">Dashboard</a></li>
                            <li><a href=\"requestminerals.php\">Request Minerals</a></li>
                            <li><a href=\"corpsettings.php\">Corp Settings</a></li>
                        </ul>
                    </div>
                    <div class=\"collapse navbar-collapse pull-right\">
                        <ul class=\"nav navbar-nav\">
                            <li><h2>" .  $username . " </h2></li>
                            <li><a href=\"includes/logout.php\">Log Out</a></li>
                        </ul>
                    </div>
                </div>");
    } else if ($role == 'Director') {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 60px;\" role=\"navigation\">
                    <div class=\"navbar-header\">
                        <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                    </div>
                    <div class=\"collapse navbar-collapse pull-left\">
                        <ul class=\"nav navbar-nav\">
                            <li><a href=\"dashboard.php\">Dashboard</a></li>
                            <li><a href=\"requestminerals.php\">Request Minerals</a></li>
                            <li><a href=\"corpsettings.php\">Corp Settings</a></li>
                        </ul>
                    </div>
                    <div class=\"collapse navbar-collapse pull-right\">
                        <ul class=\"nav navbar-nav\">
                            <li><h2>" .  $username . " </h2></li>
                            <li><a href=\"includes/logout.php\">Log Out</a></li>
                        </ul>
                    </div>
                </div>");
    } else {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 60px;\" role=\"navigation\">
                    <div class=\"navbar-header\">
                        <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                        </button>
                    </div>
                    <div class=\"collapse navbar-collapse pull-left\">
                        <ul class=\"nav navbar-nav\">
                            <li><a href=\"dashboard.php\">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class=\"collapse navbar-collapse pull-right\">
                        <ul class=\"nav navbar-nav\">
                            <li><h2>" .  $username . " </h2></li>
                            <li><a href=\"includes/logout.php\">Log Out</a></li>
                        </ul>
                    </div>
                </div>");
    }
    
}
