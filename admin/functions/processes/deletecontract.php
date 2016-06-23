<?php
    require_once __DIR__.'/../../functions/registry.php';
    //Open the database
    $db = DBOpen();
    $contract = $_POST["ContractNumber"];
    //Mark the contract as deleted
    $db->update('Contracts', array('ContractNum' => $contract), array('Deleted' => 1));
    
    DBClose($db);
    //Return to the Delete Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../deletecontracts.php';
    header("Location: $location");
?>