<?php
    require_once '/functions/registry.php';

    $db = DBOpen();
    $contract = $_GET["ContractNumber"];
        
    $db->update('Contracts', array("ContractNum" => $contract), array("Paid" => 1));
    
    DBClose($db);
    header("Location: dashboard.php");
?>