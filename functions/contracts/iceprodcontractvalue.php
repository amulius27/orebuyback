<?php

function IceProdContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $Helium_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16274, 'time' => $update));
    $Helium_Isotopes = InputItemPrice($Helium_IsotopesTemp['Enabled'], $Helium_IsotopesTemp['Price']);
    
    $Hydrogen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17889, 'time' => $update));
    $Hydrogen_Isotopes = InputItemPrice($Hydrogen_IsotopesTemp['Enabled'], $Hydrogen_IsotopesTemp['Price']);
    
    $Nitrogen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17888, 'time' => $update));
    $Nitrogen_Isotopes = InputItemPrice($Nitrogen_IsotopesTemp['Enabled'], $Nitrogen_IsotopesTemp['Price']);
    
    $Oxygen_IsotopesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 17887, 'time' => $update));
    $Oxygen_Isotopes = InputItemPrice($Oxygen_IsotopesTemp['Enabled'], $Oxygen_IsotopesTemp['Price']);
    
    $Heavy_WaterTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16272, 'time' => $update));
    $Heavy_Water = InputItemPrice($Heavy_WaterTemp['Enabled'], $Heavy_WaterTemp['Price']);
    
    $Liquid_OzoneTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16273, 'time' => $update));
    $Liquid_Ozone = InputItemPrice($Liquid_OzoneTemp['Enabled'], $Liquid_OzoneTemp['Price']);
    
    $Strontium_ClathratesTemp = $db->fetchRow('SELECT Enabled, Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 16275, 'time' => $update));
    $Strontium_Clathrates = InputItemPrice($Strontium_ClathratesTemp['Enabled'], $Strontium_ClathratesTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $iceProdValue = array(
        'Helium_Isotopes' => $post['Helium_Isotopes'] * $Helium_Isotopes,
        'Hydrogen_Isotopes' => $post['Hydrogen_Isotopes'] * $Hydrogen_Isotopes,
        'Nitrogen_Isotopes' => $post['Nitrogen_Isotopes'] * $Nitrogen_Isotopes,
        'Oxygen_Isotopes' => $post['Oxygen_Isotopes'] * $Oxygen_Isotopes,
        'Heavy_Water' => $post['Heavy_Water'] * $Heavy_Water,
        'Liquid_Ozone' => $post['Liquid_Ozone'] * $Liquid_Ozone,
        'Strontium_Clathrates' => $post['Strontium_Clathrates'] * $Strontium_Clathrates,
    );
    
    //Add the contract value up from the ore
    foreach($iceProdValue as $value) {
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
   $iceProdContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Helium_Isotopes' => $post['Helium_Isotopes'],
        'Hydrogen_Isotopes' => $post['Hydrogen_Isotopes'],
        'Nitrogen_Isotopes' => $post['Nitrogen_Isotopes'],
        'Oxygen_Isotopes' => $post['Oxygen_Isotopes'],
        'Heavy_Water' => $post['Heavy_Water'],
        'Liquid_Ozone' => $post['Liquid_Ozone'],
        'Strontium_Clathrates' => $post['Strontium_Clathrates'],
        
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'IceProd',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('IceProdContractContents', $iceProdContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>