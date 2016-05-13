<?php

    function CalcContractValue($contractNum, $contractType, $characterName) {
        require_once __DIR__.'/../functions/registry.php';
        
        $db = DBOpen();
        
        $contractContents = $db->fetchRow('SELECT * FROM Contracts WHERE id= :id AND type= :type', array('id'  => $contractNum, 'type' => $contractType));
        
        //Each if statement calculates the contract value for each type of contract available.
        //This helps cut down on the number of recursive function calls occuring.
        if($contractType == 'ore') {
            $contractContents = $db->fetchRow('SELECT * FROM OreContracts WHERE id= :id', array('id' => $contractNum));
        }
        
        if($contractType == 'pi') {
            $contractContents = $db->fetchRow('SELECT * FROM PiContracts WHERE id= :id', array('id' => $contractNum));
        }
        
        if($contractType == 'minerals') {
            $contractContents = $db->fetchRow('SELECT * FROM MineralContracts WHERE id= :id', array('id' => $contractNum));
        }
         
        
        return $contractValue;
        
    }


?>