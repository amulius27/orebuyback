<?php
    require_once __DIR__.'/../functions/registry.php';
    //Start the session
    session_start();
    $_SESSION['corporation'] = "none";
        
    PrintHeader();
    PrintHeaderCorpSelectScript();
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

