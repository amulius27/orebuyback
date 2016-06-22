<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/corpselect.php';
    //Start the session
    session_start();    
    if(isset($_SESSION["corporation"])) {
        $previousCorp = $_SESSION["corporation"];
    } else {
        $previousCorp = 'None';
    }
    PrintHeader();
    PrintHeaderCloseTag();
    PrintBodyTag();
    PrintNavBar();
    PrintTitle();
    PrintCorpSelect($previousCorp);
    PrintIndexPage();
    PrintFooter();
    PrintPopups();    
    PrintCloseIndexPage();
?>

