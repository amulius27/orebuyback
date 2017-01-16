<?php

function MineralsContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $TritaniumTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $update));
    $Tritanium = InputItemPrice($TritaniumTemp['Enabled'], $TritaniumTemp['Price']);
    
    $PyeriteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $update));
    $Pyerite = InputItemPrice($PyeriteTemp['Enabled'], $PyeriteTemp['Price']);
    
    $MexallonTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $update));
    $Mexallon = InputItemPrice($MexallonTemp['Enabled'], $MexallonTemp['Price']);
    
    $NocxiumTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $update));
    $Nocxium = InputItemPrice($NocxiumTemp['Enabled'], $NocxiumTemp['Price']);
    
    $IsogenTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $update));
    $Isogen = InputItemPrice($IsogenTemp['Enabled'], $IsogenTemp['Price']);
    
    $MegacyteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $update));
    $Megacyte = InputItemPrice($MegacyteTemp['Enabled'], $MegacyteTemp['Price']);
    
    $ZydrineTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $update));
    $Zydrine = InputItemPrice($ZydrineTemp['Enabled'], $ZydrineTemp['Price']);
    
    $MorphiteTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $update));
    $Morphite = InputItemPrice($MorphiteTemp['Enabled'], $MorphiteTemp['Price']);
    
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
        'Tritanium' => $post['Tritanium'] * $Tritanium,
        'Pyerite' => $post['Pyerite'] * $Pyerite,
        'Mexallon' => $post['Mexallon'] * $Mexallon,
        'Nocxium' => $post['Nocxium'] * $Nocxium,
        'Isogen' => $post['Isogen'] * $Isogen,
        'Megacyte' => $post['Megacyte'] * $Megacyte,
        'Zydrine' => $post['Zydrine'] * $Zydrine,
        'Morphite' => $post['Morphite'] * $Morphite,
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
        'Tritanium' => $post['Tritanium'],
        'Pyerite' => $post['Pyerite'],
        'Mexallon' => $post['Mexallon'],
        'Nocxium' => $post['Nocxium'],
        'Isogen' => $post['Isogen'],
        'Megacyte' => $post['Megacyte'],
        'Zydrine' => $post['Zydrine'],
        'Morphite' => $post['Morphite'],
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
   
   $db->insert('MineralContractContents', $mineralContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>