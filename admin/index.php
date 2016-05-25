<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!--metas-->
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta content="Warped Intentions Buy Back Program Admin Dashboard" name="description">
        <meta content="index,follow" name="robots">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>W4RP Buy Back Program Admin Dashboard Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/eve-link.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            body{
                background-image:url(images/bgs/ore_bg_blur.jpg);
                background-repeat:no-repeat;
                background-attachment: fixed;
            }
            .affix {
                top: 60px;
            }
            .affix-bottom {
                position: absolute;
            }
        </style>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" class="form-control" method="post" name="login_form">
            <div class="container">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" />
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                <input type="button" value="Login" class="form-control" onclick="formhash(this.form, this.form.password);" /> 
            </div>
        </form>
        <div class="container">
            <p>If you don't have a login, please <a href="register.php">register</a></p>
            <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
            <p>You are currently logged <?php echo $logged ?>.</p>
        </div>
    </body>
</html>
