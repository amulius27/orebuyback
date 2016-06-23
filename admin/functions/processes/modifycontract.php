<?php
    require_once __DIR__.'/../../functions/registry.php';

    $db = DBOpen();
    $contract = $_POST["ContractNumber"];
    $corporation = $_POST["Corporation"];
    $amount = $_POST["ContractValue"];
    //Modify the contract's data
    $db->update('Contracts', array('ContractNum' => $contract), array('Corporation' => $corporation, 'Value' => $amount));
    
    DBClose($db);
    //Return to the Modify Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../modifycontracts.php';
    header("Location: $location");
?>