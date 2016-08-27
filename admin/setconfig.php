<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once __DIR__.'/functions/registry.php';

session_start();
$username = $_SESSION['username'];
$db = DBOpen();
$role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));
//Lets get the current configuration of the site.  This should only return 1 row
$configuration = $db->fetchRow('SELECT * FROM Configuration');
$refineRate = $configuration['refineRate'];
$allianceTax = $configuration['allianceTaxRate'];
$marketRegion = $configuration['marketRegion'];
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
    <?php if ((login_check($mysqli) == true) AND ($role == 'SiteAdmin')) : ?>
    <?php PrintNavBar($username, $role); ?>
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Modify Site Settings</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                - Modify the site settings below.<br>
                - Refine Rate is the average Refine Rate to use for Ore, Compressed Ore, and Ice.  This number should be a whole number greater than 0.<br>
                - Alliance Tax Rate is the tax set by the alliance.<br>
                - Market Region is the region prices will be pulled from Eve-Central during nightly updates.<br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="functions/system/updateconfiguration.php" method="POST">
                <label>Refine Rate</label>
                <div class="input-group form-control" id="RefineRate" style="padding: 0; border: none;">
                    <input type="text" class="form-control text-left typeahead" name="RefineRate" placeholder="<?php echo $refineRate; ?>">
                </div>
                <label>Alliance Tax Rate</label>
                <div class="input-group form-control" id="AllianceTaxRate" style="padding: 0; border: none;">
                    <input type="text" class="form-control text-left typeahead" name="AllianceTaxRate" placeholder="<?php echo $allianceTax; ?>">
                </div>
                <label>Market Region</label>
                <div class="input-group form-control" id="MarketRegion" style="padding: 0; border: none;">
                    <input type="text" class="form-control text-left typeahead" name="MarketRegion" placeholder="<?php echo $marketRegion; ?>">
                    <input type="hidden" class="form-control" name="UpdatedBy" value="<?php echo $username; ?>">
                </div><br>
                <div class="input-group form-control" id="SubmitSettings" style="padding: 0; border: none;">
                    <input class="form-control pull-left" type="submit" value="Update Settings">
                </div>
            </form>
        </div>
    </div>
    


    <script src="/../js/jquery.cookie.js"></script> 
    <script src="/../js/eve-link.js"></script>
            
    
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
