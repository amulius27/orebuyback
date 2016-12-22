<?php

function PrintCorpSelect($previousCorp) {
    //Open the database
    $db = DBOpen();
    //Get the list of all corps from the database
    $corps = $db->fetchColumnMany('SELECT CorpName FROM Corps WHERE Deleted= :quit', array('quit' => 0));
    
	
    //Start the section to print the container and form
    printf("<div class=\"container\" align=\"center\">");
	printf("<div class=\"row\">");
	printf("<form method=\"POST\" action=\"corpselect.php\" name=\"getcorp\" align=\"center\">");
    printf("<select class=\"form-control\" name=\"GetCorpTax\" onload=\"$previousCorp\" onchange=\"document.getcorp.submit()\">");
    //Check to see if the Session is already going and if so, we want to repopulate the page
    printf("<option value=\"$previousCorp\">$previousCorp</option>");
    foreach($corps as $corp) {
        if($previousCorp != $corp) {
            printf("<option value=\"$corp\">$corp</option>");
        }
    }
	
	if(isset($_SESSION["corporation"])) {
		$former = $_SESSION["corporation"];
	} else {
		$former = 'None';
	}
	
    printf("</select>");
	printf("</form>");
    printf("<p><span id=\"text\">" . $_SESSION["corporation"] . "</span></p>");
    printf("</div></div>");
	
	//Close the database
    DBClose($db);
}

