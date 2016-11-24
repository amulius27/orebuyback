<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

session_start();
$username = $_SESSION['username'];
$db = DBOpen();
$role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

DBClose($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <!--metas-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Warped Intentions Buy Back Program" name="description">
    <meta content="index,follow" name="robots">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>W4RP Buy Back Program</title>
    <link href="/../css/bootstrap.min.css" rel="stylesheet">
    <link href="/../css/style.css" rel="stylesheet" type="text/css">
    <link href="/../css/custom.css" rel="stylesheet">
    <link href="/../css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="/../images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/canvasjs.min.js"></script>
    <style type="text/css">
        body{
            background-image:url(/../images/bgs/ore_bg_blur.jpg);
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
</head>
<body>
    <?php if (login_check($mysqli) == true) : ?>
    <?php PrintNavBar($username, $role); ?>
    <br>
    <div class="container">
        <h2>Welcome to the Warped Intentions Buy Back Program Dashboard, <?php echo $username; ?></h2>
        <h3>
            <p>Select an option from the navigation bar at the top of the screen.  This screen</p>
            <p>will be used for statistics in a future release.</p>      
        </h3>
    </div>
    <?php
        if(isset($_GET["msg"])) {
            if($_GET["msg"] == 'newcorpsuccess') {
                printf("Added new corp.");
            }
            if($_GET["msg"] == 'newcorpfailure') {
                printf("Failed to add new corp.");
            }
        }
    ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Buyback Utilization of Corps</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                <?php PrintDonutChart(); ?>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
    


    <script src="/../js/jquery.cookie.js"></script> 
    <script src="/../js/eve-link.js"></script>
            
    
    <?php else : ?>
            <div class="container">
                <div class="col-md-6">
                    <span class="error">You are not authorized to access this page.</span>
                    Please <a href="index.php">login</a> or speak to your site administrator.
                </div>
            </div>
    <?php endif; 
        DBClose($db);
    ?>
    
  </body>
</html>
