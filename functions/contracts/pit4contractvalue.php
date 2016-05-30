<?php

function PiT4ContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    $Broadcast = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2867, 'time' => $update));
    $Response_Drones = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2868, 'time' => $update));
    $Nanofactory = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2869, 'time' => $update));
    $Organic_Mortar = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2870, 'time' => $update));
    $Recursive_Computing = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2871, 'time' => $update));
    $Power_Core = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2872, 'time' => $update));
    $Sterile_Conduits = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2875, 'time' => $update));
    $Mainframe = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2876, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $mineralValue = array(
        'Broadcast_Node' => $post['Broadcast_Node'] * $Broadcast,
        'Integrity_Response_Drones' => $post['Integrity_Response_Drones'] * $Response_Drones,
        'Nanofactory' => $post['Nanofactory'] * $Nanofactory,
        'Organic_Mortar_Applicator' => $post['Organic_Mortar_Applicator'] * $Organic_Mortar,
        'Recursive_Computing_Module' => $post['Recursive_Computing_Module'] * $Recursive_Computing,
        'Self-Harmonizing_Power_Core' => $post['Self-Harmonizing_Power_Core'] * $Power_Core,
        'Sterile_Conduits' => $post['Sterile_Conduits'] * $Sterile_Conduits,
        'Wetware_Mainframe' => $post['Wetware_Mainframe'] * $Mainframe,
    );
    
    //Add the contract value up from the ore
    foreach($mineralValue as $value) {
       $contractValue = $contractValue + $value;
    }
    
    //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE Corpname= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * ($allianceTaxRate / 100.0);
    $corpTax = $contractValue * ($corpTaxRate / 100.0);
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $mineralContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Broadcast_Node' => $post['Broadcast_Node'],
        'Integrity_Response_Drones' => $post['Integrity_Response_Drones'],
        'Nanofactory' => $post['Nanofactory'],
        'Organic_Mortar_Applicator' => $post['Organic_Mortar_Applicator'],
        'Recursive_Computing_Module' => $post['Recursive_Computing_Module'],
        'Self-Harmonizing_Power_Core' => $post['Self-Harmonizing_Power_Core'],
        'Sterile_Conduits' => $post['Sterile_Conduits'],
        'Wetware_Mainframe' => $post['Wetware_Mainframe'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Mineral',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('PiT4ContractContents', $mineralContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>