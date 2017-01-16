<?php
    require_once __DIR__.'/functions/registry.php';    
    //Start the session
    $session = new Custom\Sessions\sessions();
    //If the database session isn't available then start a regular session
    if($session == false) {
		printf("Starting Normal Session");
        session_start();
    }

	
    $previousCorp = $_SESSION["corporation"];
    if($previousCorp == NULL) {
        if(isset($_GET["corp"])) {
                $previousCorp = $_GET["corp"];
        } else {
                $previousCorp = 'None';
        }
    }  else {
        $previousCorp = 'None';
    }
    
    PrintHeader();
    PrintHeaderCloseTag();
    PrintBodyTag();
    PrintNavBar();
    PrintTitle();
	
    PrintCorpSelect($previousCorp);
    PrintIndexPage($previousCorp);
    PrintFooter();
    PrintPopups();    
    PrintCloseIndexPage();
?>

