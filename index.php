<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/functions/misc/corpselect.php';
    //Start the session
    session_start();
        
    PrintHeader();
    PrintHeaderCloseTag();
    PrintBodyTag();
    PrintNavBar();
    PrintTitle();
    PrintCorpSelect();
    PrintIndexPage();
    PrintFooter();
    PrintPopups();
    PrintCloseIndexPage();
?>

