<?php

function IceContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $Clear_IcicleTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16262, 'time' => $update));
    $Clear_Icicle = InputItemPrice($Clear_IcicleTemp['Enabled'], $Clear_IcicleTemp['Price']);
    
    $Enriched_Clear_IcicleTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17978, 'time' => $update));
    $Enriched_Clear_Icicle = InputItemPrice($Enriched_Clear_IcicleTemp['Enabled'], $Enriched_Clear_IcicleTemp['Price']);
    
    $Glacial_MassTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16263, 'time' => $update));
    $Glacial_Mass = InputItemPrice($Glacial_MassTemp['Enabled'], $Glacial_MassTemp['Price']);
    
    $Smooth_Glacial_MassTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17977, 'time' => $update));
    $Smooth_Glacial_Mass = InputItemPrice($Smooth_Glacial_MassTemp['Enabled'], $Smooth_Glacial_MassTemp['Price']);
    
    $White_GlazeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16265, 'time' => $update));
    $White_Glaze = InputItemPrice($White_GlazeTemp['Enabled'], $White_GlazeTemp['Price']);
    
    $Pristine_White_GlazeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17976, 'time' => $update));
    $Pristine_White_Glaze = InputItemPrice($Pristine_White_GlazeTemp['Enabled'], $Pristine_White_GlazeTemp['Price']);
    
    $Blue_IceTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16264, 'time' => $update));
    $Blue_Ice = InputItemPrice($Blue_IceTemp['Enabled'], $Blue_IceTemp['Price']);
    
    $Thick_Blue_IceTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17975, 'time' => $update));
    $Thick_Blue_Ice = InputItemPrice($Thick_Blue_IceTemp['Enabled'], $Thick_Blue_IceTemp['Price']);
    
    $Glare_CrustTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' =>16266, 'time' => $update));
    $Glare_Crust = InputItemPrice($Glare_CrustTemp['Enabled'], $Glare_CrustTemp['Price']);
    
    $Dark_GlitterTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16267, 'time' => $update));
    $Dark_Glitter = InputItemPrice($Dark_GlitterTemp['Enabled'], $Dark_GlitterTemp['Price']);
    
    $GelidusTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16268, 'time' => $update));
    $Gelidus = InputItemPrice($GelidusTemp['Enabled'], $GelidusTemp['Price']);
    
    $KrystallosTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16269, 'time' => $update));
    $Krystallos = InputItemPrice($KrystallosTemp['Enabled'], $KrystallosTemp['Price']);
    
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