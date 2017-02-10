<?php
    require_once __DIR__.'/../registry.php';
    //Set the variables to their starting point
    $refineRate = filter_input(INPUT_POST, 'RefineRate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $allianceTax = filter_input(INPUT_POST, 'AllianceTaxRate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $marketRegion = filter_input(INPUT_POST, 'MarketRegion', FILTER_SANITIZE_NUMBER_INT);
    $mineralTax = filter_input(INPUT_POST, 'MineralTaxRate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    //Get from the previous page whom is updating the settings
    $updatedBy = filter_input(INPUT_POST, 'UpdatedBy', FILTER_SANITIZE_SPECIAL_CHARS);
    $updateOccurred = FALSE;
    //Open the database connection
    $db = DBOpen();
    
    
    //Use the old Updated By as a guide to find the correct row
    $lastUpdate = $db->fetchColumn('SELECT updatedBy FROM Configuration');
    //Update the refine rate if applicable
    if($refineRate != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('refineRate' => $refineRate));
        $updateOccurred = TRUE;
    }
    //Update the alliance tax if applicable
    if($allianceTax != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('allianceTaxRate' => $allianceTax));
        $updateOccurred = TRUE;
    }
    //Update the market region if applicable
    if($marketRegion != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('marketRegion' => $marketRegion));
        $updateOccurred = TRUE;
    }
    //Update the mineral tax rate if application
    if($mineralTax != NULL) {
        $db->update('Configuration', array('updatedBy' => $lastUpdate), array('mineralTaxRate' => $mineralTax));
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