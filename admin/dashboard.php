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

    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    
    //Check login and display the page
    if(login_check($mysqli) == true) {
        PrintNavBar($username, $role);
        printf("<br>
                <div class=\"container\">
                    <h2>Welcome to the Warped Intentions Buy Back Program Dashboard, <?php echo" .  $username . "; ?></h2>
                    <h3>
                        <p>Select an option from the navigation bar at the top of the screen.</p>     
                    </h3>
                </div>");
        //Display whether a new corp was added if the variable is set.
        if(isset($_GET["msg"])) {
            if($_GET["msg"] == 'newcorpsuccess') {
                printf("Added new corp.");
            }
            if($_GET["msg"] == 'newcorpfailure') {
                printf("Failed to add new corp.");
            }
        }
        
        //Print the rest of the html for the logged in Dashboard
        printf("<br><hr><br>
                <div class=\"container md-col-6\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FF2A2A;\"><strong>Buyback Utilization of Corps</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <div id=\"chart-div\"></div>
                        </div>
                    </div>
                </div>	

                <script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
        
    } else {
        //Print the not logged in text
        printf("<div class=\"container\">
                    <div class=\"col-md-6\">
                        <span class=\"error\">You are not authorized to access this page.</span>
                        Please <a href=\"index.php\">login</a> or speak to your site administrator.
                    </div>
                </div>");
    }
    DBClose($db);
?>

<?=
    $chart->render('DonutChart', 'Buyback', 'chart-div');
?>

<?php
    printf("</body>
        </html>");
?>
