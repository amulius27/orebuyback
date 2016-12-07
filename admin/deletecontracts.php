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
    <link href="/../css/bootstrap-table-expandable.css" rel="stylesheet">
    <link href="/../css/style.css" rel="stylesheet" type="text/css">
    <link href="/../css/custom.css" rel="stylesheet">
    <link href="/../css/eve-link.css" rel="stylesheet">
    <link rel="shortcut icon" href="/../images/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/../js/bootstrap-table-expandable.js"></script>
    <style type="text/css">
        body{
            background-image:url(/../images/bgs/ore_bg_blur.jpg);
            background-repeat:no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <?php if ((login_check($mysqli) == true) AND ($role == 'SiteAdmin')) : ?>
    <?php PrintNavBar($username, $role); ?>
    <div class="container">
      <div class="row">          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
            <br>
          <h2 class="sub-header">Contract Listing</h2>
          <div class="table-responsive">
              <form action="functions/processes/deletecontract.php" method="POST">
                <table class="table table-striped table-expandable">
                  <thead>
                    <tr>
                      <th>Contract Number</th>
                      <th>Contract Type</th>
                      <th>Corporation</th>
                      <th>Contract Value</th>
                      <th>Delete Contract</th>
                      <th>Process Payment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php PrintDeleteContractListAdminDashboard(); ?>
                  </tbody>
                </table>
              </form>
          </div>
        </div>
      </div>
    </div>


    <script src="/../js/jquery.cookie.js"></script> 
    <script src="/../js/eve-link.js"></script>
            
    
    <?php else : ?>
            <div class="container">
                <div class="col-md-6">
                    <h2>
                    <span class="error">You are not authorized to access this page.</span>
                    Please <a href="index.php">login</a> or speak to your site administrator.
                    </h2>
                </div>
            </div>
    <?php endif; 
        DBClose($db);
    ?>
    
  </body>
</html>
