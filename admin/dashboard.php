<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Warped Intentions Buy Back Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="/js/sha512.js" type="text/javascript"></script>
    <script src="/js/forms.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->   
  </head>

  <body>
    <?php if (login_check($mysqli) == true) : ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        Welcome <?php echo htmlentities($_SESSION['username']); ?>!
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/../index.php">Warped Intentions Buy Back Program</a>
        </div>
        <div id="navbar" class="navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="contracts.php">Contracts</a></li>
            <li><a href="corppayouts.php">Corp Payouts</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="profile.php">Profile</a></li>
          </ul>
        </div>
      </div>
    </nav>

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    
    <?php else : ?>
            <div class="container">
                <div class="col-md-6">
                    <span class="error">You are not authorized to access this page.</span>
                    Please <a href="index.php">login</a>.
                </div>
            </div>
    <?php endif; ?>
    
  </body>
</html>
