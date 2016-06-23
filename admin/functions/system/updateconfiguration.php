<?php
    require_once __DIR__.'/../registry.php';
  
    //Open the database connection
    $db = DBOpen();
    //Get the post variables and store them in local variables
    $refineRate = (float)$_POST['RefineRate'];
    $allianceTax = (float)$_POST['AllianceTaxRate'];
    $marketRegion = $_POST['MarketRegion'];
    $updatedBy = $_POST['UpdatedBy'];
    
    //Use the old Updated By as a guide to find the correct row
    $lastUpdate = $db->fetchColumn('SELECT updatedBy FROM Configuration');
    
    //Check the Refine Rate to make sure its a number between 0 and 100.
    if(($refineRate >= 0.00) AND ($refineRate <= 100.00)) {
        $refineGood = TRUE;
    } else {
        $refineGood = FALSE;
    }
    //Check the Alliance Tax Rate to make sure its a number between 0 and 100.
    if(($allianceTax >= 0.00) AND ($allianceTax <= 100.00)) {
        $allianceTaxGood = TRUE;
    } else {
        $allianceTaxGood = FALSE;
    }
    //Update the row
    if(($refineGood === TRUE) AND ($allianceTaxGood === TRUE)) {
        $db->update('Configuration', array('updatedBy' => $updatedBy), array('refineRate' => $refineRate, 'allianceTax' => $allianceTax, 'marketRegion' => $marketRegion, 'updatedBy' => $updatedBy));
    } else if($refineGood === TRUE) {
        $db->update('Configuration', array('updatedBy' => $updatedBy), array('refineRate' => $refineRate, 'marketRegion' => $marketRegion, 'updatedBy' => $updatedBy));
    } else if($allianceTaxGood === TRUE) {
        $db->update('Configuration', array('updatedBy' => $updatedBy), array('allianceTax' => $allianceTax, 'marketRegion' => $marketRegion, 'updatedBy' => $updatedBy));
    } else {
        $db->update('Configuration', array('updatedBy' => $updatedBy), array('marketRegion' => $marketRegion, 'updatedBy' => $updatedBy));
    }
    //Close the database connection to free up resources
    DBClose($db);
    //Return to the Delete Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../setconfig.php';
    header("Location: $location");
    
?>