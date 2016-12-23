<?php

    require_once __DIR__.'/../../functions/registry.php';
    //Open the database
    $db = DBOpen();
    $contract = filter_input(INPUT_POST, "ContractNumber", FILTER_SANITIZE_NUMBER_INT);
    //Mark the contract as deleted
    $db->update('CorpContracts', array('ContractNum' => $contract), array('Deleted' => 1));
    
    DBClose($db);
    //Return to the Delete Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../deletecorpcontract.php';
    header("Location: $location");

?>