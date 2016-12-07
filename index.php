<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/corpselect.php';
    //Start the session
    $session = new Custom\Sessions\sessions();
    
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

