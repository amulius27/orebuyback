<?php

function PiT1ContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    $bacteria = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2393, 'time' => $update));
    $biofuels = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2396, 'time' => $update));
    $biomass = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3779, 'time' => $update));
    $chiral_structures = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2401, 'time' => $update));
    $electrolytes = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2390, 'time' => $update));
    $industrial_fibers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2397, 'time' => $update));
    $oxidizing_compound = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2392, 'time' => $update));
    $oxygen = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3683, 'time' => $update));
    $plasmoids = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2389, 'time' => $update));
    $precious_metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2399, 'time' => $update));
    $proteins = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2395, 'time' => $update));
    $reactive_metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2398, 'time' => $update));
    $silicon = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9828, 'time' => $update));
    $toxic_metals = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2400, 'time' => $update));
    $water = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3645, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $PiT1Value = array(
        'Bacteria' => $post['Bacteria'] * $bacteria, 
        'Biofuels' => $post['Biofuels'] * $biofuels,
        'Biomass' => $post['Biomass'] * $biomass,
        'Chiral_Structures' => $post['Chiral_Structures'] * $chiral_structures,
        'Electrolytes' => $post['Electrolytes'] * $electrolytes,
        'Industrial_Fibers' => $post['Industrial_Fibers'] * $industrial_fibers,
        'Oxidizing_Compound' => $post['Oxidizing_Compound'] * $oxidizing_compound,
        'Oxygen' => $post['Oxygen'] * $oxygen,
        'Plasmoids' => $post['Plasmoids'] * $plasmoids,
        'Precious_Metals' => $post['Precious_Metals'] * $precious_metals,
        'Proteins' => $post['Proteins'] * $proteins,
        'Reactive_Metals' => $post['Reactive_Metals'] * $reactive_metals,
        'Silicon' => $post['Silicon'] * $silicon,
        'Toxic_Metals' => $post['Toxic_Metals'] * $toxic_metals,
        'Water' => $post['Water'] * $water,
    );
    
    //Add the contract value up from the ore
    foreach($PiT1Value as $value) {
       $contractValue = $contractValue + $value;
    }
    
    //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE Corpname= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * $allianceTaxRate;
    $corpTax = $contractValue * $corpTaxRate;
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $PiT1Contents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Bacteria' => $post['Bacteria'], 
        'Biofuels' => $post['Biofuels'],
        'Biomass' => $post['Biomass'],
        'Chiral_Structures' => $post['Chiral_Structures'],
        'Electrolytes' => $post['Electrolytes'],
        'Industrial_Fibers' => $post['Industrial_Fibers'],
        'Oxidizing_Compound' => $post['Oxidizing_Compound'],
        'Oxygen' => $post['Oxygen'],
        'Plasmoids' => $post['Plasmoids'],
        'Precious_Metals' => $post['Precious_Metals'],
        'Proteins' => $post['Proteins'],
        'Reactive_Metals' => $post['Reactive_Metals'],
        'Silicon' => $post['Silicon'],
        'Toxic_Metals' => $post['Toxic_Metals'],
        'Water' => $post['Water'],
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
   
   $db->insert('PiT1ContractContents', $PiT1Contents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>