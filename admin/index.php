<?php

    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    require_once __DIR__.'/functions/registry.php';

    $session = new Custom\AdminSession\sessions();
    if(!$session) {
        session_start();
    }


    if (login_check($mysqli) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
    
    printf("<!DOCTYPE html>
            <html>
                <head>
                    <!--metas-->
                    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
                    <meta content=\"Warped Intentions Buy Back Program Admin Dashboard\" name=\"description\">
                    <meta content=\"index,follow\" name=\"robots\">
                    <meta content=\"width=device-width, initial-scale=1\" name=\"viewport\">
                    <title>W4RP Buy Back Program Admin Dashboard Login</title>
                    <link href=\"/../css/bootstrap.min.css\" rel=\"stylesheet\">
                    <link href=\"/../css/style.css\" rel=\"stylesheet\" type=\"text/css\">
                    <link href=\"/../css/custom.css\" rel=\"stylesheet\">
                    <link href=\"/../css/eve-link.css\" rel=\"stylesheet\">
                    <link rel=\"shortcut icon\" href=\"/../images/favicon.ico\" type=\"image/x-icon\">
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
                    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
                    <style type=\"text/css\">
                        body{
                            background-image:url(/../images/bgs/EVE_asteroid_ice.jpg);
                            background-repeat:no-repeat;
                            background-attachment: fixed;
                        }
                    </style>
                    <script type=\"text/JavaScript\" src=\"js/sha512.js\"></script> 
                    <script type=\"text/JavaScript\" src=\"js/forms.js\"></script> 
                </head>
                <body>");
    if(isset($_GET['error'])) {
        echo '<p class="error">Error Logging In!</p>';
    }
    
    printf("<div class=\"container\">
            <div class=\"row\">
                <form action=\"includes/process_login.php\" method=\"POST\" name=\"login_form\">
                    <div class=\"col-md-6 col-md-offset-2\">
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\"><strong>Dashboard Login</strong></h3>
                            </div>
                            <div class=\"panel-body\">
                                <p>
                                    <label>Username</label>
                                    <input type=\"text\" class=\"form-control text-left typeahead\" name=\"username\" id=\"email\">
                                    <label>Password</label>
                                    <input type=\"password\" class=\"form-control text-left typeahead\" name=\"password\" id=\"password\">
                                    <br>
                                    <input type=\"button\" class=\"form-control\" value=\"Login\" onclick=\"formhash(this.form, this.form.password);\">
                                </p>
                                <br>
                                <p>If you don't have a login, please <a href=\"register.php\">register</a></p>
                                <p>If you are done, please <a href=\"includes/logout.php\">log out</a>.</p>
                                <p>You are currently logged " .  $logged . ".</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>");
    
    
?>
