<?php
    require_once __DIR__.'/../../functions/registry.php';
    //Open the database connection
    $db = DBOpen();
    //Get the corp name from the previous page
    $corpName = filter_input(INPUT_POST, "corporation", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FORCE_ARRAY);
    //Get the taxes from the previous page
    $taxes = filter_input(INPUT_POST, "taxes", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FORCE_ARRAY);
	//Get rid of anything not a number in $taxes
	foreach($taxes as $tax) {
		if($tax != NULL) {
			$tax = $tax * 1.00;
		}
	}
    //Combine our two post arrays to make it easier to work with in the foreach statement below
    $array = array_combine($corpName, $taxes);
    //Run through the possibilites and insert all calls into the database
    foreach($array as $corpName => $taxes) {
        if($taxes > 0.00) {
            $taxesInTemp = (float)$db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corpName, 'ty' => 0));
            $paidInTaxes = 0.00;
            if($taxesInTemp != false) {
                foreach($taxesInTemp as $taxIn) {
                    $paidInTaxes = $paidInTaxes + $taxIn;
                }
            }
            $taxesOutTemp = (float)$db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corpName, 'ty' => 1));
            $paidOutTaxes = 0.00;
            if($taxesOutTemp != false) {
                foreach($taxesOutTemp as $taxOut) {
                    $paidOutTaxes = $paidOutTaxes + $taxOut;
                }
            }
            //Calculate the temporary taxes paid in and out in order to know how much can be taken out.
            $tempTaxes = $paidInTaxes - $paidOutTaxes; 
            if($corpName[$taxes] <= $tempTaxes) {
                //Insert a new line into the CorporationPayouts table as the payout is paid
                $db->insert('CorporationPayouts', array('CorpName' => $corpName, 'Amount' => $taxes, 'Type' => 1));    
            }   
        }
         
    }
       
    //Close the database connection   
    DBClose($db);
    //Return back to the corppayouts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../corppayouts.php';
    header("Location: $location");
    
?>
