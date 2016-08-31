<?php
    require_once __DIR__.'/../../functions/registry.php';
    if(isset($_POST["Tax"])) {
        //Get the corporation name
        $corporation = filter_input(INPUT_POST, "CorpName", FILTER_SANITIZE_SPECIAL_CHARS);
        //Sanitize the input filter
        $taxRate = filter_input(INPUT_POST, 'Tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if($taxRate < 0.00) {
            $taxRate = 0.00;
        }
        if($taxRate > 100.0) {
            $taxRate = 100.00;
        }
        //Open a database connection
        $dbh = DBOpen();
        //Update the corporation settings
        $dbh->update('Corps', array('CorpName' => $corporation), array('TaxRate' => $taxRate));
        //Close the database connection
        DBClose($dbh);
    }
    
    //Return to the Corp Settings page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../corpsettings.php';
    header("Location: $location");
?>