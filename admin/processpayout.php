<?php
    require_once __DIR__.'/functions/registry.php';

    $db = DBOpen();
    $contract = $_GET["ContractNumber"];
    //Add the Corporation Payout to the table for withdrawal later
    $contractData = $db->fetchRow('SELECT * FROM Contracts WHERE ContractNum= :number', array('number' => $contract));
    $contractValue = $contractData["Value"];
    $corporation = $contractData["Corporation"];
    $allianceTax = $db->fetchColumn('SELECT AllianceTax FROM Contracts WHERE ContractNum= :number', array('number' => $contract));
    $corpTax = $db->fetchColumn('SELECT CorpTax FROM Contracts WHERE ContractNum= :number', array('number' => $contract));
    
    //Calculate the taxes to be put into the database
    $tax = $contractValue * ( $taxRate / 100.00 );
    //Insert the tax into the database
    //Type = 0 for addition of taxes, and Type = 1 for taxes paid out
    $db->insert('CorporationPayouts', array('CorpName' => $corporation, 'Amount' => $corpTax, 'Type' => 0));
    $db->insert('AlliancePayouts', array('ContractNum' => $contract, 'CorpName' => $corporation, 'Amount' => $allianceTax, 'Type' => 0));

    //Update the contract as paid out for the user
    $db->update('Contracts', array("ContractNum" => $contract), array("Paid" => 1));
    
    DBClose($db);
    header("Location: dashboard.php");
?>