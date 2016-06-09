<?php

    require_once __DIR__.'/../../functions/registry.php';
    
    $corporation = filter_var(INPUT_POST, $_POST["Corporation"], FILTER_SANITIZE_STRING);
    $tax = filter_var(INPUT_POST, $_POST["Tax"], FILTER_SANITIZE_NUMBER_FLOAT);
    
    //Add the new corporation to the database
    if(is_float($tax)) {
        $db = DBOpen();
        $db->insert('Corps', array('CorpName' => $corporation, 'TaxRate' => $tax));
        DBClose($db);
        header('Location: /../../dashboard.php?msg=newcorpsuccess');
    } else {
        header('Location: /../../dashboard.php?msg=newcorpfailure');
    }

?>