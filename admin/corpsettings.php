<?php

    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    require_once __DIR__.'/functions/registry.php';
    use Khill\Lavacharts;

    $session = new Custom\AdminSession\sessions();
    if(!$session) {
        session_start();
    }

    $username = $_SESSION['username'];
    $db = DBOpen();
    $role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

    $corporation = $db->fetchColumn('SELECT corporation FROM member_roles WHERE username= :user', array('user' => $username));
    $taxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE CorpName= :corp', array('corp' => $corporation));

    $stats = GetCorpStats($corporation, $db);

    //Get contents for chart below here
    //Initialize the lavachart
    $chart = new LavaCharts;
    //Setup the data table to insert data into
    $data = $chart->DataTable();
    //Add the two columns for the donut chart
    $data->addStringColumn('Contract Type');
    $data->addNumberColumn('Number');
    //Get the types of contracts
    $data->addRow(['Minerals', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Mineral'))]);
    $data->addRow(['Ore', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Ore'))]);
    $data->addRow(['Comp Ore', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'CompOre'))]);
    $data->addRow(['Ice', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Ice'))]);
    $data->addRow(['Ice Products', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'IceProd'))]);
    $data->addRow(['Fuel', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Fuel'))]);
    $data->addRow(['Pi', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Pi'))]);
    $data->addRow(['PiT1', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'PiT1'))]);
    $data->addRow(['PiT2', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'PiT2'))]);
    $data->addRow(['PiT3', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'PiT3'))]);
    $data->addRow(['PiT4', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'PiT4'))]);
    $data->addRow(['Salvage', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'Salvage'))]);
    $data->addRow(['WGas', $db->fetchColumn('SELECT COUNT(*) FROM Contracts WHERE Corporation= :corp AND ContractType= :type', array('corp' => $corporation, 'type' => 'WGas'))]);
    
    //Set the name and attributes of the chart
    $chart->BarChart('Buyback Contracts', $data, [
            'title' => 'Contracts Submitted',
            'backgroundColor' => '#FFCD00',
            'height' => 600,
    ]);
    
    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    if ((login_check($mysqli) == true) AND $role == ('Director' or 'CEO' or 'SiteAdmin')) {
        PrintNavBar($username, $role);
        printf("<br>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"<strong>Add New Corporation Form</strong></span><br></h3>
                        </div>
                        <div class=\"panel-body\" align=\"center\">
                            <form action=\"functions/processes/modifycorp.php\" method=\"POST\">
                                <label>Tax Rate:</label>
                                <input type=\"text\" class=\"form-control\" name=\"Tax\" id=\"Tax\" placeholder=\"<?php echo $taxRate; ?>\" />
                                <br>
                                <input type=\"hidden\" class=\"form-control\" name=\"CorpName\" id=\"CorpName\" value=\"<?php echo $corporation; ?>\">
                                <br>
                                <input type=\"submit\" class=\"form-control\" value=\"Modify Corp\" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"><strong>Corporation Stastics</strong></span></h3>
                        </div>
                        <br>
                        <div class=\"panel-body\" align=\"left\">
                            <span style=\"font-family: Arial; color: #FFF;\">
                               Total ISK Submitted: " . $stats["isk"] . " ISK<br>
                               Total Taxes: " . $stats["taxes"] . " ISK<br>
                               Total Contracts Submitted: " . $stats["contracts"] . "<br>
                               Total Paid Contracts: " . $stats["paid"] . "<br>
                               Total Deleted Contracts: " . $stats["deleted"] . "<br>
                            </span>
                        </div>
                    </div>
                </div>
                <div class=\"container\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\" align=\"center\">
                            <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FFF;\"><strong><Contract Statistics</strong></span></h3>
                        </div>
                        <br>
                        <div class=\"panel-body\" align=\"left\">
                             <div id=\"chart-div\"></div>
                        </div>
                    </div>
                </div>



                <script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
    
    } else {
        PrintNotLogged();
    }
    
    DBClose($db);
?>

<?=
    $chart->render('BarChart', 'Number', 'chart-div');
?>

<?php
    printf("</body>
        </html>");
?>

