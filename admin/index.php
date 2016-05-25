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
                background-image:url(images/bgs/EVE_asteroid_ice.jpg);
                background-repeat:no-repeat;
                background-attachment: fixed;
            }
        </style>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?>
        <div class="container">
            <div class="row">          
              <div class="col-sm-9 col-md-10 main">
                  <br>
                <h2 class="sub-header">Dashboard Login</h2>
                <form action="includes/process_login.php" class="form-control" method="post" name="login_form">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" />
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                        <input type="button" class="form-control" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                    </div>
                </form>
          
              </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <p>If you don't have a login, please <a href="register.php">register</a></p>
                <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
                <p>You are currently logged <?php echo $logged ?>.</p>
                </div>
            </div>
        </div>
    </body>
</html>
