<?php

function PiContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $AqueousTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2268, 'time' => $update));
    $Aqueous = InputItemPrice($AqueousTemp['Enabled'], $AqueousTemp['Price']);
    
    $IonicTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2309, 'time' => $update));
    $Ionic = InputItemPrice($IonicTemp['Enabled'], $IonicTemp['Price']);
    
    $BaseTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2267, 'time' => $update));
    $Base = InputItemPrice($BaseTemp['Enabled'], $BaseTemp['Price']);
    
    $HeavyTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2272, 'time' => $update));
    $Heavy = InputItemPrice($HeavyTemp['Enabled'], $HeavyTemp['Price']);
    
    $NobleTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2270, 'time' => $update));
    $Noble = InputItemPrice($NobleTemp['Enabled'], $NobleTemp['Price']);
    
    $CarbonTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2288, 'time' => $update));
    $Carbon = InputItemPrice($CarbonTemp['Enabled'], $CarbonTemp['Price']);
    
    $MicroTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2073, 'time' => $update));
    $Micro = InputItemPrice($MicroTemp['Enabled'], $MicroTemp['Price']);
    
    $ComplexTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2287, 'time' => $update));
    $Complex = InputItemPrice($ComplexTemp['Enabled'], $ComplexTemp['Price']);
    
    $PlankticTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2286, 'time' => $update));
    $Planktic = InputItemPrice($PlankticTemp['Enabled'], $PlankticTemp['Price']);
    
    $Noble_GasTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2310, 'time' => $update));
    $Noble_Gas = InputItemPrice($Noble_GasTemp['Enabled'], $Noble_GasTemp['Price']);
   
    $ReactiveTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2311, 'time' => $update));
    $Reactive = InputItemPrice($ReactiveTemp['Enabled'], $ReactiveTemp['Price']);
    
    $FelsicTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2307, 'time' => $update));
    $Felsic = InputItemPrice($FelsicTemp['Enabled'], $FelsicTemp['Price']);
    
    $NonTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2306, 'time' => $update));
    $Non = InputItemPrice($NonTemp['Enabled'], $NonTemp['Price']);
    
    $SuspendedTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2308, 'time' => $update));
    $Suspended = InputItemPrice($SuspendedTemp['Enabled'], $SuspendedTemp['Price']);
    
    $AutotrophsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2305, 'time' => $update));
    $Autotrophs = InputItemPrice($AutotrophsTemp['Enabled'], $AutotrophsTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $PiValue = array(
        'Aqueous_Liquids' => $post['Aqueous_Liquids'] * $Aqueous,
        'Ionic_Solutions' => $post['Ionic_Solutions'] * $Ionic,
        'Base_Metals' => $post['Base_Metals'] * $Base,
        'Heavy_Metals' => $post['Heavy_Metals'] * $Heavy,
        'Noble_Metals' => $post['Noble_Metals'] * $Noble,
        'Carbon_Compounds' => $post['Carbon_Compounds'] * $Carbon,
        'Micro_Organisms' => $post['Micro_Organisms'] * $Micro,
        'Complex_Organisms' => $post['Complex_Organisms'] * $Complex,
        'Planktic_Colonies' => $post['Planktic_Colonies'] * $Planktic,
        'Noble_Gas' => $post['Noble_Gas'] * $Noble,
        'Reactive_Gas' => $post['Reactive_Gas'] * $Reactive,
        'Felsic_Magma' => $post['Felsic_Magma'] * $Felsic,
        'Non_CS_Crystals' => $post['Non_CS_Crystals'] * $Non,
        'Suspended_Plasma' => $post['Suspended_Plasma'] * $Suspended,
        'Autotrophs' => $post['Autotrophs'] * $Autotrophs,
    );
    
    //Add the contract value up from the ore
    foreach($PiValue as $value) {
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
   $PiContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Aqueous_Liquids' => $post['Aqueous_Liquids'],
        'Ionic_Solutions' => $post['Ionic_Solutions'],
        'Base_Metals' => $post['Base_Metals'],
        'Heavy_Metals' => $post['Heavy_Metals'],
        'Noble_Metals' => $post['Noble_Metals'],
        'Carbon_Compounds' => $post['Carbon_Compounds'],
        'Micro_Organisms' => $post['Micro_Organisms'],
        'Complex_Organisms' => $post['Complex_Organisms'],
        'Planktic_Colonies' => $post['Planktic_Colonies'],
        'Noble_Gas' => $post['Noble_Gas'],
        'Reactive_Gas' => $post['Reactive_Gas'],
        'Felsic_Magma' => $post['Felsic_Magma'],
        'Non_CS_Crystals' => $post['Non_CS_Crystals'],
        'Suspended_Plasma' => $post['Suspended_Plasma'],
        'Autotrophs' => $post['Autotrophs'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Pi',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('PiContractContents', $PiContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>