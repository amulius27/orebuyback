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
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <!--metas-->
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta content="Warped Intentions Buy Back Program Admin Dashboard Registration" name="description">
        <meta content="index,follow" name="robots">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>W4RP Buy Back Program Admin Dashboard Registration</title>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Dashboard Registration</strong></h3>
                            <?php
                                if (!empty($error_msg)) {
                                    echo $error_msg;
                                }
                            ?>
                        </div>
                        <div class="panel-body">
                                <ul>
                                    <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
                                    <li>Emails must have a valid email format</li>
                                    <li>Passwords must be at least 6 characters long</li>
                                    <li>Passwords must contain
                                        <ul>
                                            <li>At least one upper case letter (A..Z)</li>
                                            <li>At least one lower case letter (a..z)</li>
                                            <li>At least one number (0..9)</li>
                                        </ul>
                                    </li>
                                    <li>Your password and confirmation must match exactly</li>
                                </ul>
                                <form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
                                    Username: <input type='text' class="form-control text-left typeahead" name='username' id='username' /><br>
                                    Email: <input type="text" class="form-control text-left typeahead" name="email" id="email" /><br>
                                    Password: <input type="password" class="form-control text-left typeahead" name="password" id="password"/><br>
                                    Confirm password: <input type="password" class="form-control text-left typeahead" name="confirmpwd" id="confirmpwd" /><br>
                                    <input type="button" class="form-control" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" /> 
                                </form>
                                <p>Return to the <a href="index.php">login page</a>.</p>

                                <label>Email</label>
                                <input type="text" class="form-control text-left typeahead" name="email" id="email">
                                <label>Password</label>
                                <input type="password" class="form-control text-left typeahead" name="password" id="password">
                                <input type="button" class="form-control" value="Login" onclick="formhash(this.form, this.form.password);">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        
        
    </body>
</html>
