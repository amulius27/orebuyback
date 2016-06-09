<?php
    require_once __DIR__.'/../../functions/registry.php';
    //Open the database connection
    $db = DBOpen();
    //Get the corp name from the previous page
    $corpName = $_POST["corporation"];
    //Get the taxes from the previous page
    $taxes = $_POST["taxes"];
    
    $taxesInTemp = $db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corpName, 'ty' => 0));
    $paidInTaxes = 0.00;
    if($taxesInTemp != false) {
        foreach($taxesInTemp as $taxIn) {
            $paidInTaxes = $paidInTaxes + $taxIn;
        }
    }
    $taxesOutTemp = $db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corpName, 'ty' => 1));
    $paidOutTaxes = 0.00;
    if($taxesOutTemp != false) {
        foreach($taxesOutTemp as $taxOut) {
            $paidOutTaxes = $paidOutTaxes + $taxOut;
        }
    }
    //Calculate the taxes
    $tempTaxes = $paidInTaxes - $paidOutTaxes;
    if($taxes <= $tempTaxes) {
        //Insert a new line into the CorporationPayouts table as the payout is paid
        $db->insert('CorporationPayouts', array('CorpName' => $corpName, 'Amount' => $taxes, 'Type' => 1));    
    }
    
    //Close the database connection   
    DBClose($db);
    //Return back to the corppayouts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../corppayouts.php';
    header("Location: $location");
    
?>
