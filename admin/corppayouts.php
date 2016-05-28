<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

sec_session_start();
$username = $_SESSION['username'];
$db = DBOpen();
$role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));
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
</head>
<body>
    <?php if ((login_check($mysqli) == true) AND ($role == ('SiteAdmin'))) : ?>
    <div class="navbar navbar-inverse navbar-fixed-top" style="height: 60px;" role="navigation">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse pull-left">
            <ul class="nav navbar-nav">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="contracts.php">Contracts</a></li>
                <li><a href="corppayouts.php">Corp Payouts</a></li>
                <li><a href="corpsettings">Corp Settings</a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">
                <li><?php echo $username ?></li>
                <li><a href="includes/logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
      <div class="row">          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
            <br>
          <h2 class="sub-header">Corporation Payouts</h2>
          <div class="container">
              <h3>Please only process one payout at a time.</h3>
          </div>
          <div class="table-responsive">
              <form action="processcorppayout.php" method="GET">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Corporation</th>
                      <th>Account Amount</th>
                      <th>Requested Amount</th>
                      <th>Process Payout</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php PrintCorporationPayoutListAdminDashboard(); ?>
                  </tbody>
                </table>
              </form>
          </div>
        </div>
      </div>
    </div>


    <script src="js/jquery.cookie.js"></script> 
    <script src="js/eve-link.js"></script>
            
    
    <?php else : ?>
            <div class="container">
                <div class="col-md-6">
                    <span class="error">You are not authorized to access this page.</span>
                    Please <a href="index.php">login</a>.
                </div>
            </div>
    <?php endif; 
        DBClose($db);
    ?>
    
  </body>
</html>
