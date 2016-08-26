<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

session_start();
$username = $_SESSION['username'];
$db = DBOpen();
$role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

$corporation = $db->fetchColumn('SELECT corporation FROM member_roles WHERE username= :user', array('user' => $username));
$taxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));

$stats = GetCorpStats($corporation, $db);
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
    <?php if ((login_check($mysqli) == true) AND $role == ('Director' or 'CEO' or 'SiteAdmin')) : ?>
    <?php PrintNavBar($username); ?>
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FFF;"<strong>Add New Corporation Form</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                <form action="functions/processes/modifycorp.php" method="POST">
                    <label>Tax Rate:</label>
                    <input type="text" class="form-control" name="Tax" value="<?php echo $taxRate; ?>" />
                    <br>
                    <input type="hidden" class="form-control" name="CorpName" value="<?php echo $corporation; ?>">
                    <br><br>
                    <input type="submit" class="form-control" value="Modify Corp" />
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FFF;"><strong>Corporation Stasticis</strong></span></h3>
            </div>
            <br>
            <div class="panel-body" align="left">
                <span style="font-family: Arial; color: #FFF;">
                   Total ISK Submitted: <?php echo $stats["isk"]; ?><br>
                   Total Taxes: <?php echo $stats["taxes"]; ?><br>
                   Total Contracts Submitted: <?php echo $stats["contracts"]; ?><br>
                   Total Paid Contracts: <?php echo $stats["paid"]; ?><br>
                   Total Deleted Contracts: <?php echo $stats["deleted"]; ?><br>
                </span>
            </div>
        </div>
    </div>
    


    <script src="js/jquery.cookie.js"></script> 
    <script src="js/eve-link.js"></script>
            
    
    <?php else : ?>
            <div class="container">
                <div class="col-md-6">
                    <h2>
                    <span class="error">You are not authorized to access this page.</span>
                    Please <a href="index.php">login</a> or speak with your site's administrator.
                    </h2>
                </div>
            </div>
    <?php endif; 
        DBClose($db);
    ?>
    
  </body>
</html>
