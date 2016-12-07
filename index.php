<?php
    require_once __DIR__.'/functions/registry.php';
    require_once __DIR__.'/corpselect.php';
    //Start the session
    session_start();    
    if(isset($_REQUEST["corporation"])) {
        $previousCorp = $_REQUEST["corporation"];
        $_SESSION["corporation"] = $previousCorp;
    } else {
        $previousCorp = 'None';
        $_SESSION["corporation"] = 'None';
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

