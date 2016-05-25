<?php
    require_once __DIR__.'/functions/registry.php';
    //Open the database connection
    $db = DBOpen();
    //Get the corp name from the previous page
    $corpName = $_GET["CorpName"];
    //Get the taxes from the previous page
    $taxes = $_GET["taxes"];
    //Insert a new line into the CorporationPayouts table as the payout is paid
    $db->insert('CorporationPayouts', array('CorpName' => $corpName, 'Amount' => $taxes, 'Type' => 1));
    //Close the database connection   
    DBClose($db);
    //Return back to the corppayouts page
    header("Location: corppayouts.php");
    
?>
