<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/corpselect.php';
    //Start the session
    $session = new Custom\Sessions\sessions();
    //If the database session isn't available then start a regular session
    if(!$session) {
        session_start();
    }
    
    if(isset($_REQUEST["corporation"])) {
        $previousCorp = $_REQUEST["corporation"];
    } else {
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

