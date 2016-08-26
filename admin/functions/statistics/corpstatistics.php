<?php

function GetCorpStats($corp, \Simplon\Mysql\Mysql $db) {
    $isk = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    $taxes = $db->fetchColumn('SELECT SUM(CorpTax) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    $contracts = $db->fetchColumn('SELECT COUNT(ContractNum) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    $deleted = $db->fetchColumn('SELECT COUNT(Deleted) FROM Contracts WHERE Corporation= :corp AND Deleted= :del', array('corp' => $corp, 'del' => 1));
    $paid = $db->fetchColumn('SELECT COUNT(Paid) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    
    $statistics = array(
        "isk" => $isk,
        "taxes" => $taxes,
        "contracts" => $contracts,
        "deleted" => $deleted,
        "paid" => $paid
    );
    
    return $statistics;
}

?>