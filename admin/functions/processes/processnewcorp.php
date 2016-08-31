<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../dashboard.php';
    
    
    //Add the new corporation to the database
    if(isset($_POST["Corporation"]) AND isset($_POST["tax"])) {
        $corporation = filter_var(INPUT_POST, "Corporation", FILTER_SANITIZE_STRING);
        $tax = filter_var(INPUT_POST, "Tax", FILTER_SANITIZE_STRING);
        $tax = $tax * 1.00;
        if($tax > 100.00)
            $tax = 100.0;
        if($tax < 0.00)
            $tax = 0.00;
        
        $db = DBOpen();
        $db->insert('Corps', array('CorpName' => $corporation, 'TaxRate' => $tax));
        if($db->getRowCount() > 0) {
            DBClose($db);
            $location = $location . '?msg=newcorpsuccess';
            header("Location: $location");
        } else {
            DBClose($db);
            $location = $location . '?msg=newcorpfailure';
            header("Location: $location");
        }
        
    } else {
        $location = $location . '?msg=newcorpfailure';
        header("Location: $location");
    }
    
?>