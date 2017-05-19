<?php

function PiT2ContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $biocellsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2329, 'time' => $update));
    $biocells = InputItemPrice($biocellsTemp['Enabled'], $biocellsTemp['Price']);
    
    $construction_blocksTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3828, 'time' => $update));
    $construction_blocks = InputItemPrice($construction_blocksTemp['Enabled'], $construction_blocksTemp['Price']);
    
    $consumer_electronicsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9836, 'time' => $update));
    $consumer_electronics = InputItemPrice($consumer_electronicsTemp['Enabled'], $consumer_electronicsTemp['Price']);
    
    $coolantTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9832, 'time' => $update));
    $coolant = InputItemPrice($coolantTemp['Enabled'], $coolantTemp['Price']);
    
    $enriched_uraniumTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 44, 'time' => $update));
    $enriched_uranium = InputItemPrice($enriched_uraniumTemp['Enabled'], $enriched_uraniumTemp['Price']);
    
    $fertilizerTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3693, 'time' => $update));
    $fertilizer = InputItemPrice($fertilizerTemp['Enabled'], $fertilizerTemp['Price']);
    
    $gen_enhanced_livestockTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 15317, 'time' => $update));
    $gen_enhanced_livestock = InputItemPrice($gen_enhanced_livestockTemp['Enabled'], $gen_enhanced_livestockTemp['Price']);
    
    $livestockTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3725, 'time' => $update));
    $livestock = InputItemPrice($livestockTemp['Enabled'], $livestockTemp['Price']);
    
    $mechanical_partsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3689, 'time' => $update));
    $mechanical_parts = InputItemPrice($mechanical_partsTemp['Enabled'], $mechanical_partsTemp['Price']);
    
    $microfiber_shieldingTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2327, 'time' => $update));
    $microfiber_shielding = InputItemPrice($microfiber_shieldingTemp['Enabled'], $microfiber_shieldingTemp['Price']);
    
    $miniature_electronicsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9842, 'time' => $update));
    $miniature_electronics = InputItemPrice($miniature_electronicsTemp['Enabled'], $miniature_electronicsTemp['Price']);
    
    $nanitesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2463, 'time' => $update));
    $nanites = InputItemPrice($nanitesTemp['Enabled'], $nanitesTemp['Price']);
    
    $oxidesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2317, 'time' => $update));
    $oxides = InputItemPrice($oxidesTemp['Enabled'], $oxidesTemp['Price']);
    
    $polyaramidsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2321, 'time' => $update));
    $polyaramids = InputItemPrice($polyaramidsTemp['Enabled'], $polyaramidsTemp['Price']);
    
    $polytextilesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3695, 'time' => $update));
    $polytextiles = InputItemPrice($polytextilesTemp['Enabled'], $polytextilesTemp['Price']);
    
    $rocket_fuelTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9830, 'time' => $update));
    $rocket_fuel = InputItemPrice($rocket_fuelTemp['Enabled'], $rocket_fuelTemp['Price']);
    
    $silicate_glassTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3697, 'time' => $update));
    $silicate_glass = InputItemPrice($silicate_glassTemp['Enabled'], $silicate_glassTemp['Price']);
    
    $superconductorsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9838, 'time' => $update));
    $superconductors = InputItemPrice($superconductorsTemp['Enabled'], $superconductorsTemp['Price']);
    
    $supertensile_plasticsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2312, 'time' => $update));
    $supertensile_plastics = InputItemPrice($supertensile_plasticsTemp['Enabled'], $supertensile_plasticsTemp['Price']);
    
    $synthetic_oilTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3691, 'time' => $update));
    $synthetic_oil = InputItemPrice($synthetic_oilTemp['Enabled'], $synthetic_oilTemp['Price']);
    
    $testculturesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2319, 'time' => $update));
    $testcultures = InputItemPrice($testculturesTemp['Enabled'], $testculturesTemp['Price']);
    
    $transmitterTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9840, 'time' => $update));
    $transmitter = InputItemPrice($transmitterTemp['Enabled'], $transmitterTemp['Price']);
    
    $viral_agentTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3775, 'time' => $update));
    $viral_agent = InputItemPrice($viral_agentTemp['Enabled'], $viral_agentTemp['Price']);
    
    $water_cooled_cpuTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2328, 'time' => $update));
    $water_cooled_cpu = InputItemPrice($water_cooled_cpuTemp['Enabled'], $water_cooled_cpuTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $Pit2Value = array(
        'Biocells' => $post['Biocells'] * $biocells,
        'Construction_Blocks' => $post['Construction_Blocks'] * $construction_blocks,
        'Consumer_Electronics' => $post['Consumer_Electronics'] * $consumer_electronics,
        'Coolant' => $post['Coolant'] * $coolant,
        'Enriched_Uranium' => $post['Enriched_Uranium'] * $enriched_uranium,
        'Fertilizer' => $post['Fertilizer'] * $fertilizer,
        'Genetically_Enhanced_Livestock' => $post['Genetically_Enhanced_Livestock'] * $gen_enhanced_livestock,
        'Livestock' => $post['Livestock'] * $livestock,
        'Mechanical_Parts' => $post['Mechanical_Parts'] * $mechanical_parts,
        'Microfiber_Shielding' => $post['Microfiber_Shielding'] * $microfiber_shielding,
        'Miniature_Electronics' => $post['Miniature_Electronics'] * $miniature_electronics,
        'Nanites' => $post['Nanites'] * $nanites,
        'Oxides' => $post['Oxides'] * $oxides,
        'Polyaramids' => $post['Polyaramids'] * $polyaramids,
        'Polytextiles' => $post['Polytextiles'] * $polytextiles,
        'Rocket_Fuel' => $post['Rocket_Fuel'] * $rocket_fuel,
        'Silicate_Glass' => $post['Silicate_Glass'] * $silicate_glass,
        'Superconductors' => $post['Superconductors'] * $superconductors,
        'Supertensile_Plastics' => $post['Supertensile_Plastics'] * $supertensile_plastics,
        'Synthetic_Oil' => $post['Synthetic_Oil'] * $synthetic_oil,
        'Test_Cultures' => $post['Test_Cultures'] * $testcultures,
        'Transmitter' => $post['Transmitter'] * $transmitter,
        'Viral_Agent' => $post['Viral_Agent'] * $viral_agent,
        'Water_Cooled_CPU' => $post['Water_Cooled_CPU'] * $water_cooled_cpu,
    );
    
    //Add the contract value up from the ore
    foreach($Pit2Value as $value) {
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
   $Pit2Contents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Biocells' => $post['Biocells'],
        'Construction_Blocks' => $post['Construction_Blocks'],
        'Consumer_Electronics' => $post['Consumer_Electronics'],
        'Coolant' => $post['Coolant'],
        'Enriched_Uranium' => $post['Enriched_Uranium'],
        'Fertilizer' => $post['Fertilizer'],
        'Genetically_Enhanced_Livestock' => $post['Genetically_Enhanced_Livestock'],
        'Livestock' => $post['Livestock'],
        'Mechanical_Parts' => $post['Mechanical_Parts'],
        'Microfiber_Shielding' => $post['Microfiber_Shielding'],
        'Miniature_Electronics' => $post['Miniature_Electronics'],
        'Nanites' => $post['Nanites'],
        'Oxides' => $post['Oxides'],
        'Polyaramids' => $post['Polyaramids'],
        'Polytextiles' => $post['Polytextiles'],
        'Rocket_Fuel' => $post['Rocket_Fuel'],
        'Silicate_Glass' => $post['Silicate_Glass'],
        'Superconductors' => $post['Superconductors'],
        'Supertensile_Plastics' => $post['Supertensile_Plastics'],
        'Synthetic_Oil' => $post['Synthetic_Oil'],
        'Test_Cultures' => $post['Test_Cultures'],
        'Transmitter' => $post['Transmitter'],
        'Viral_Agent' => $post['Viral_Agent'],
        'Water_Cooled_CPU' => $post['Water_Cooled_CPU'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'PiT2',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('PiT2ContractContents', $Pit2Contents);
   $db->insert('Contracts', $contract);
   
    $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
    );
    
    DBClose($db);
    
    return $contractReturn;
}

?>