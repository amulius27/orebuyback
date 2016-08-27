<?php
    require_once __DIR__.'/../registry.php';
    //Set the variables to their starting point
    $refineRate = filter_input(INPUT_POST, 'RefineRate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $allianceTax = filter_input(INPUT_POST, 'AllianceTaxRate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $marketRegion = filter_input(INPUT_POST, 'MarketRegion', FILTER_SANITIZE_NUMBER_INT);
    $updatedBy = filter_input(INPUT_POST, 'UpdatedBy', FILTER_SANITIZE_SPECIAL_CHARS);
    
    //Open the database connection
    $db = DBOpen();
    //Get the post variables and store them in local variables
    //Get the Refine Rate if it changed
    
    //Set the last updated by
    $updatedBy = $_POST['UpdatedBy'];
    $updateOccurred = FALSE;
    
    //Use the old Updated By as a guide to find the correct row
    $lastUpdate = $db->fetchColumn('SELECT updatedBy FROM Configuration');
    //Update the refine rate if applicable
    if($refineRate != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('refineRate' => $refineRate));
        $updateOccurred = TRUE;
    }
    //Update the alliance tax if applicable
    if($allianceTax != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('allianceTax' => $allianceTax));
        $updateOccurred = TRUE;
    }
    //Update the market region if applicable
    if($marketRegion != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('marketRegion' => $marketRegion));
        $updateOccurred = TRUE;
    }
    //If an update occurred then update the UpdateBy resource in the table
    if($updateOccurred == TRUE) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('updatedBy' => $updatedBy));
    }
    //Close the database connection to free up resources
    DBClose($db);
    //Return to the Site Configuration page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../setconfig.php';
    header("Location: $location");
	
    
?>