<?php

function PiT4ContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $BroadcastTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2867, 'time' => $update));
    $Broadcast = InputItemPrice($BroadcastTemp['Enabled'], $BroadcastTemp['Price']);
    
    $Response_DronesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2868, 'time' => $update));
    $Response_Drones = InputItemPrice($Response_DronesTemp['Enabled'], $Response_DronesTemp['Price']);
    
    $NanoFactoryTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2869, 'time' => $update));
    $NanoFactory = InputItemPrice($NanoFactoryTemp['Enabled'], $NanoFactoryTemp['Price']);
    
    $Organic_Mortar_ApplicatorsTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2870, 'time' => $update));
    $Organic_Mortar_Applicators = InputItemPrice($Organic_Mortar_ApplicatorsTemp['Enabled'], $Organic_Mortar_ApplicatorsTemp['Price']);
    
    $Recursive_ComputingTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2871, 'time' => $update));
    $Recursive_Computing = InputItemPrice($Recursive_ComputingTemp['Enabled'], $Recursive_ComputingTemp['Price']);
    
    $Power_CoreTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2872, 'time' => $update));
    $Power_Core = InputItemPrice($Power_CoreTemp['Enabled'], $Power_CoreTemp['Price']);
    
    $Sterile_ConduitsTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2875, 'time' => $update));
    $Sterile_Conduits = InputItemPrice($Sterile_ConduitsTemp['Enabled'], $Sterile_ConduitsTemp['Price']);
    
    $MainframeTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 2876, 'time' => $update));
    $Mainframe = InputItemPrice($MainframeTemp['Enabled'], $MainframeTemp['Price']);
    
    //Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $PiT4Value = array(
        //Make the array with the number gotten from the page then multiply by the price.
        'Broadcast_Node' => $post['Broadcast_Node'] * $BroadcastPrice,
        'Integrity_Response_Drones' => $post['Integrity_Response_Drones'] * $Response_DronesPrice,
        'NanoFactory' => $post['NanoFactory'] * $NanoFactoryPrice,
        'Organic_Mortar_Applicators' => $post['Organic_Mortar_Applicators'] * $Organic_Mortar_ApplicatorsPrice,
        'Recursive_Computing_Module' => $post['Recursive_Computing_Module'] * $Recursive_ComputingPrice,
        'Self_Harmonizing_Power_Core' => $post['Self_Harmonizing_Power_Core'] * $Power_CorePrice,
        'Sterile_Conduits' => $post['Sterile_Conduits'] * $Sterile_ConduitsPrice,
        'Wetware_Mainframe' => $post['Wetware_Mainframe'] * $MainframePrice,
    );
    
    //Add the contract value up from the PiT4 Parts
    foreach($PiT4Value as $value) {
       $contractValue = $contractValue + $value;
    }
    
     //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE CorpName= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * ($allianceTaxRate / 100.0);
    $corpTax = $contractValue * ($corpTaxRate / 100.0);
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $piT4Contents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Broadcast_Node' => $post['Broadcast_Node'],
        'Integrity_Response_Drones' => $post['Integrity_Response_Drones'],
        'NanoFactory' => $post['NanoFactory'],
        'Organic_Mortar_Applicators' => $post['Organic_Mortar_Applicators'],
        'Recursive_Computing_Module' => $post['Recursive_Computing_Module'],
        'Self_Harmonizing_Power_Core' => $post['Self_Harmonizing_Power_Core'],
        'Sterile_Conduits' => $post['Sterile_Conduits'],
        'Wetware_Mainframe' => $post['Wetware_Mainframe'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'PiT4',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('PiT4ContractContents', $piT4Contents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>