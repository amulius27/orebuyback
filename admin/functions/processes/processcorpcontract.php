<?php
    require_once __DIR__.'/../../functions/registry.php';

    $db = DBOpen();
    $contract = filter_input(INPUT_POST, "ContractNumber", FILTER_SANITIZE_NUMBER_INT);
    //Add the Corporation Payout to the table for withdrawal later
    $contractData = $db->fetchRow('SELECT * FROM CorpContracts WHERE ContractNum= :number', array('number' => $contract));
    $contractValue = $contractData["Value"];
    $corporation = $contractData["Corporation"];
   
    //Insert the paid contract into the database for stastics reporting later
    $db->insert('CorpContractPayouts', array('ContractNum' => $contract,'CorpName' => $corporation, 'Amount' => $value));

    //Update the contract as paid out for the user
    $db->update('CorpContracts', array("ContractNum" => $contract), array("Paid" => 1));
    
    DBClose($db);
    //Return to the Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../completemineralrequest.php';
    header("Location: $location");
    
?>
