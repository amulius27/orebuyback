<?php
    
    include_once '/../../includes/db_connect.php';
    include_once '/../../includes/functions.php';
    require_once __DIR__.'/../../functions/registry.php';

    $session = new Custom\AdminSession\sessions();
    if(!$session) {
        session_start();
    }
    
    $db = DBOpen();
    
    $username = $_SESSION['username'];
    $db = DBOpen();
    $role = $db->fetchColumn('SELECT role FROM member_roles WHERE username= :user', array('user' => $username));

    //Get the data from the $_POST variable
    if(isset($_POST['Tritanium'])) {
        $tritanium_num = filter_input(INPUT_POST, 'Tritanium', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Pyerite'])) {
        $pyerite_num = filter_input(INPUT_POST, 'Pyerite', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Isogen'])) {
        $isogen_num = filter_input(INPUT_POST, 'Isogen', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Mexallon'])) {
        $mexallon_num = filter_input(INPUT_POST, 'Mexallon', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Nocxium'])) {
        $nocxium_num = filter_input(INPUT_POST, 'Nocxium', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Zydrine'])) {
        $zydrine_num = filter_input(INPUT_POST, 'Zydrine', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Megacyte'])) {
        $megacyte_num = filter_input(INPUT_POST, 'Megacyte', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    if(isset($_POST['Morphite'])) {
        $morphite_num = filter_input(INPUT_POST, 'Morphite', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $tritanium_num = 0;
    }
    //Get the data from the $_POST variable for mineral prices.
    //This value will always be present unless there is a database issue
    $tritanium_price = filter_input(INPUT_POST, 'TritaniumPrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $pyerite_price = filter_input(INPUT_POST, 'PyeritePrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $isogen_price = filter_input(INPUT_POST, 'IsogenPrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $mexallon_price = filter_input(INPUT_POST, 'MexallonPrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $nocxium_price = filter_input(INPUT_POST, 'NocxiumPrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $zydrine_price = filter_input(INPUT_POST, 'ZydrinePrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $megacyte_price = filter_input(INPUT_POST, 'MegacytePrice', FILTER_SANITIZE_SPECIAL_CHARS);
    $morphite_price = filter_input(INPUT_POST, 'MorphitePrice', FILTER_SANITIZE_SPECIAL_CHARS);
    
    if(isset($_POST['Corporation'])) {
        $corporation = filter_input(INPUT_POST, 'Corporation', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    
    if(isset($_POST['Location'])) {
        $location = filter_input(INPUT_POST, 'Location', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $location = 'E-YCML';
    }
    
    //Calculate the mineral price total
    $tritanium_total = $tritanium_num * $tritanium_price;
    $pyerite_total = $pyerite_num * $pyerite_price;
    $isogen_total = $isogen_num * $isogen_price;
    $mexallon_total = $mexallon_num * $mexallon_price;
    $nocxium_total = $nocxium_num * $nocxium_price;
    $zydrine_total = $zydrine_num * $zydrine_price;
    $megacyte_total = $megacyte_num * $megacyte_price;
    $morphite_total = $morphite_num * $morphite_price;
    
    //Caclulate the contract price total
    $contract_total = $tritanium_total + $pyerite_total + $isogen_total + $mexallon_total + $nocxium_total + $zydrine_total + $megacyte_total + $morphite_total;
    
    //Insert the contract into the database.
    //Contract number is derived from the last contract entered
    $contractNumLast = $db->fetchColumn('SELECT MAX(ContractNum) FROM CorpContracts');
    $contractNum = $contractNumLast + 1;
    $db->insert('CorpContracts', array('ContractNum' => $contractNum,'Corporation' => $corporation, 'Location' => $location, 'Value' => $contract_total));
    $db->insert('CorpContractContents', array('Tritanium' => $tritanium_num, 'Pyerite' => $pyerite_num, 'Isogen' => $isogen_num, 
                                              'Mexallon' => $mexallon_num, 'Nocxium' => $nocxium_num, 'Zydrine' => $zydrine_num,
                                              'Megacyte' => $megacyte_num, 'Morphite' => $morphite_num, 'ContractNum' => $contractNum));
    
    //Get the data for printing out the table
    $columns = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'CorpContractContents'));
    $contents = $db->fetchRow('SELECT * FROM CorpContractContents WHERE ContractNum', array('number' => $contractNum));
    
    //Print the page details
    PrintHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");
    PrintNavBar($username, $role);
    
    printf("<br>
               <div class=\"container\">
                   <h2>Corporation Mineral Request</h2>
               </div><br>");
    
    $columnsNum = sizeof($columns);
    
    printf("<table class=\"table-striped\">");
    //Print the first row which is the Contract Number
    printf("<tr>");
    printf("<td>");
    printf("Contract Number");
    printf("</td>");
    printf("<td>");
    printf($contents[$columns[0]]);
    printf("</td>");
    printf("</tr>");
    //Print the second row which is Contract Time
    printf("<tr>");
    printf("<td>");
    printf($columns[1]);
    printf("</td>");
    printf("<td>");
    printf($contents[$columns[1]]);
    printf("</td>");
    printf("</tr>");
    //Run through the rest of the items and print the table
    for($i = 2; $i < $columnsNum; $i++) {
        $header = str_replace('_', ' ', $columns[$i]);
        $number = number_format($contents[$columns[$i]], 0, '.', ',');
                
        printf("<tr>");
        printf("<td>");
        printf($header);
        printf("</td>");
        printf("<td>");
        if($contents[$columns[$i]] > 0) {
            printf($number);
        } else {
            printf("--");
        }
        printf("</td>");
        printf("</tr>");
    }
    printf("</table>");    
    
    printf("<script src=\"/../js/jquery.cookie.js\"></script> 
                <script src=\"/../js/eve-link.js\"></script>");
    printf("</body></html>");
    
    
    
    DBClose($db);
?>

