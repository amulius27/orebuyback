<?php
use Khill\Lavacharts\Lavacharts;

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

//Get a list of corps
$corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :del', array('del' => 0));
//Initialize the lavachart
$chart = new LavaCharts;
//Setup the data table to insert data into
$data = $chart->DataTable();
//Add the two columns for the donut chart
$data->addStringColumn('Corp Name');
$data->addNumberColumn('ISK');
foreach($corps as $corp) {
	$isk = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
	//If there is a value of ISK received from the query, add it to the data table for the chart
	if($isk != "") {
		//Typecast the value into a floating point number
		$isk = $isk * 1.00;
		//Add the corp name (string) and the isk (float) to the data table
		$data->addRow([$corp, $isk]);
	}
}
//Set the name and attributes of the chart
$chart->DonutChart('Buyback', $data, [
	'title' => 'Buyback Utilization',
	'backgroundColor' => '#FFCD00',
	'height' => 600,
]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <!--metas-->
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
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
	<br><hr><br>
    <div class="container md-col-6">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Buyback Utilization of Corps</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                <div id="chart-div"></div>
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
	<?=
		$chart->render('DonutChart', 'Buyback', 'chart-div');
	?>
    
  </body>
</html>
