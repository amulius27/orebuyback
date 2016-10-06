<?php

function WGasContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    //Wormhole Gas
    //C50
    $C50 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30370, 'time' => $update));
    //C60
    $C60 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30371, 'time' => $update));
    //C70
    $C70 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30372, 'time' => $update));
    //C72
    $C72 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30373, 'time' => $update));
    //C84
    $C84 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30374, 'time' => $update));
    //C28
    $C28 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30375, 'time' => $update));
    //C32
    $C32 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30376, 'time' => $update));
    //C320
    $C320 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30377, 'time' => $update));
    //C540
    $C540 = $db->fetchColumn('SELECT Price From WGasPrices WHERE ItemId= :id AND Time= :time', array('id' => 30378, 'time' => $update));
    
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
        'C50_Value' => $post['C50_Gas'] * $C50,
        'C60_Value' => $post['C60_Gas'] * $C60,
        'C70_Value' => $post['C70_Gas'] * $C70,
        'C72_Value' => $post['C72_Gas'] * $C72,
        'C84_Value' => $post['C84_Gas'] * $C84,
        'C28_Value' => $post['C28_Gas'] * $C28,
        'C32_Value' => $post['C32_Gas'] * $C32,
        'C320_Value' => $post['C320_Gas'] * $C320,
        'C540_Value' => $post['C540_Gas'] * $C540
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
   $WGasContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'C50' => $post['C50_Gas'],
        'C60' => $post['C60_Gas'],
        'C70' => $post['C70_Gas'],
        'C72' => $post['C72_Gas'],
        'C84' => $post['C84_Gas'],
        'C28' => $post['C28_Gas'],
        'C32' => $post['C32_Gas'],
        'C320' => $post['C320_Gas'],
        'C540' => $post['C540_Gas'],
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
   
   $db->insert('WGasContractContents', $WGasContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>