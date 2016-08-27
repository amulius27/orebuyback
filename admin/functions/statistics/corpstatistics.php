<?php

function GetCorpStats($corp, \Simplon\Mysql\Mysql $db) {
    $isk = $db->fetchColumn('SELECT SUM(Value) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    $contracts = $db->fetchColumn('SELECT COUNT(ContractNum) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    $deleted = $db->fetchColumn('SELECT COUNT(Deleted) FROM Contracts WHERE Corporation= :corp AND Deleted= :del', array('corp' => $corp, 'del' => 1));
    $paid = $db->fetchColumn('SELECT COUNT(Paid) FROM Contracts WHERE Corporation= :corp AND Paid= :paid AND Deleted= :del', array('corp' => $corp, 'paid' => 1, 'del' => 0));
    
    //Calculate the corp taxes
    $taxesInTemp = (float)$db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corp, 'ty' => 0));
    $paidInTaxes = 0.00;
    if($taxesInTemp != false) {
        foreach($taxesInTemp as $taxIn) {
            $paidInTaxes = $paidInTaxes + $taxIn;
        }
    }
    $taxesOutTemp = (float)$db->fetchColumnMany('SELECT Amount FROM CorporationPayouts WHERE CorpName= :corp AND Type= :ty', array('corp' => $corp, 'ty' => 1));
    $paidOutTaxes = 0.00;
    if($taxesOutTemp != false) {
        foreach($taxesOutTemp as $taxOut) {
            $paidOutTaxes = $paidOutTaxes + $taxOut;
        }
    }
    $taxes = $paidInTaxes - $paidOutTaxes; 
    
    $statistics = array(
        "isk" => number_format($isk, 2, '.', ','),
        "taxes" => number_format($taxes, 2, '.', ','),
        "contracts" => number_format($contracts, 0, '.', ','),
        "deleted" => number_format($deleted, 0, '.', ','),
        "paid" => number_format($paid, 0, '.', ',')
    );
    
    return $statistics;
}

?>
