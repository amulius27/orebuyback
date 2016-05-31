<?php

function IceContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    $Clear_Icicle = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16262, 'time' => $update));
    $Enriched_Clear_Icicle = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17978, 'time' => $update));
    $Glacial_Mass = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16263, 'time' => $update));
    $Smooth_Glacial_Mass = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17977, 'time' => $update));
    $White_Glaze = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16265, 'time' => $update));
    $Pristine_White_Glaze = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17976, 'time' => $update));
    $Blue_Ice = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16264, 'time' => $update));
    $Thick_Blue_Ice = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17975, 'time' => $update));
    $Glare_Crust = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16266, 'time' => $update));
    $Dark_Glitter = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16267, 'time' => $update));
    $Gelidus = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16268, 'time' => $update));
    $Krystallos = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16269, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $iceValue = array(
        'Clear_Icicle' => $post['Clear_Icicle'] * $Clear_Icicle,
        'Enriched_Clear_Icicle' => $post['Enriched_Clear_Icicle'] * $Enriched_Clear_Icicle,
        'Glacial_Mass' => $post['Glacial_Mass'] * $Glacial_Mass,
        'Smooth_Glacial_Mass' => $post['Smooth_Glacial_Mass'] * $Smooth_Glacial_Mass,
        'White_Glaze' => $post['White_Glaze'] * $White_Glaze,
        'Pristine_White_Glaze' => $post['Pristine_White_Glaze'] * $Pristine_White_Glaze,
        'Blue_Ice' => $post['Blue_Ice'] * $Blue_Ice,
        'Thick_Blue_Ice' => $post['Thick_Blue_Ice'] * $Thick_Blue_Ice,
        'Glare_Crust' => $post['Glare_Crust'] * $Glare_Crust,
        'Dark_Glitter' => $post['Dark_Glitter'] * $Dark_Glitter,
        'Gelidus' => $post['Gelidus'] * $Gelidus,
        'Krystallos' => $post['Krystallos'] * $Krystallos,
    );
    
    //Add the contract value up from the ore
    foreach($iceValue as $value) {
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
   $iceContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Clear_Icicle' => $post['Clear_Icicle'],
        'Enriched_Clear_Icicle' => $post['Enriched_Clear_Icicle'],
        'Glacial_Mass' => $post['Glacial_Mass'],
        'Smooth_Glacial_Mass' => $post['Smooth_Glacial_Mass'],
        'White_Glaze' => $post['White_Glaze'],
        'Pristine_White_Glaze' => $post['Pristine_White_Glaze'],
        'Blue_Ice' => $post['Blue_Ice'],
        'Thick_Blue_Ice' => $post['Thick_Blue_Ice'],
        'Glare_Crust' => $post['Glare_Crust'],
        'Dark_Glitter' => $post['Dark_Glitter'],
        'Gelidus' => $post['Gelidus'],
        'Krystallos' => $post['Krystallos'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Ice',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('IceContractContents', $iceContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>