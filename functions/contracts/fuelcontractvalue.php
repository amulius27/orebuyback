<?php

function FuelContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $Amarr_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4247, 'time' => $update));
    $Amarr_Fuel = InputItemPrice($Amarr_FuelTemp['Enabled'], $Amarr_FuelTemp['Price']);
    
    $Caldari_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4051, 'time' => $update));
    $Caldari_Fuel = InputItemPrice($Caldari_FuelTemp['Enabled'], $Caldari_FuelTemp['Price']);
    
    $Gallente_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4312, 'time' => $update));
    $Gallente_Fuel = InputItemPrice($Gallente_FuelTemp['Enabled'], $Gallente_FuelTemp['Price']);
    
    $Minmatar_FuelTemp = $db->fetchRow('SELECT Enabled, Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4246, 'time' => $update));
    $Minmatar_Fuel = InputItemPrice($Minmatar_FuelTemp['Enabled'], $Minmatar_FuelTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $fuelBlockValue = array(
        'Amarr_Fuel_Block' => $post['Amarr_Fuel_Block'] * $Amarr_Fuel,
        'Caldari_Fuel_Block' => $post['Caldari_Fuel_Block'] * $Caldari_Fuel,
        'Gallente_Fuel_Block' => $post['Gallente_Fuel_Block'] * $Gallente_Fuel,
        'Minmatar_Fuel_Block' => $post['Minmatar_Fuel_Block'] * $Minmatar_Fuel,
    );
    
    //Add the contract value up from the ore
    foreach($fuelBlockValue as $value) {
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
   $fuelBlockContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Amarr_Fuel_Block' => $post['Amarr_Fuel_Block'],
        'Caldari_Fuel_Block' => $post['Caldari_Fuel_Block'],
        'Gallente_Fuel_Block' => $post['Gallente_Fuel_Block'],
        'Minmatar_Fuel_Block' => $post['Minmatar_Fuel_Block'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Fuel',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('FuelContractContents', $fuelBlockContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>