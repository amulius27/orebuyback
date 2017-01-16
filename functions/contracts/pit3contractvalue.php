<?php

function PiT3ContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $BiotechTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2358, 'time' => $update));
    $Biotech = InputItemPrice($BiotechTemp['Enabled'], $BiotechTemp['Price']);
    
    $Camera_DronesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2345, 'time' => $update));
    $Camera_Drones = InputItemPrice($Camera_DronesTemp['Enabled'], $Camera_DronesTemp['Price']);
    
    $CondensatesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2344, 'time' => $update));
    $Condensates = InputItemPrice($CondensatesTemp['Enabled'], $CondensatesTemp['Price']);
    
    $Cryoprotectant_SolutionTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2367, 'time' => $update));
    $Cryoprotectant_Solution = InputItemPrice($Cryoprotectant_SolutionTemp['Enabled'], $Cryoprotectant_SolutionTemp['Price']);
    
    $Data_ChipsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17392, 'time' => $update));
    $Data_Chips = InputItemPrice($Data_ChipsTemp['Enabled'], $Data_ChipsTemp['Price']);
    
    $Gel_Matrix_BiopasteTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2348, 'time' => $update));
    $Gel_Matrix_Biopaste = InputItemPrice($Gel_Matrix_BiopasteTemp['Enabled'], $Gel_Matrix_BiopasteTemp['Price']);
    
    $Guidance_SystemsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9834, 'time' => $update));
    $Guidance_Systems = InputItemPrice($Guidance_SystemsTemp['Enabled'], $Guidance_SystemsTemp['Price']);
    
    $Hazmat_Detection_SystemsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2366, 'time' => $update));
    $Hazmat_Detection_Systems = InputItemPrice($Hazmat_Detection_SystemsTemp['Enabled'], $Hazmat_Detection_SystemsTemp['Price']);
    
    $Hermetic_MembranesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2361, 'time' => $update));
    $Hermetic_Membranes = InputItemPrice($Hermetic_MembranesTemp['Enabled'], $Hermetic_MembranesTemp['Price']);
    
    $HighTech_TransmittersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17898, 'time' => $update));
    $HighTech_Transmitters = InputItemPrice($HighTech_TransmittersTemp['Enabled'], $HighTech_TransmittersTemp['Price']);
    
    $Industrial_ExplosivesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2360, 'time' => $update));
    $Industrial_Explosives = InputItemPrice($Industrial_ExplosivesTemp['Enabled'], $Industrial_ExplosivesTemp['Price']);
    
    $NeocomsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2354, 'time' => $update));
    $Neocoms = InputItemPrice($NeocomsTemp['Enabled'], $NeocomsTemp['Price']);
    
    $Nuclear_ReactorsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2352, 'time' => $update));
    $Nuclear_Reactors = InputItemPrice($Nuclear_ReactorsTemp['Enabled'], $Nuclear_ReactorsTemp['Price']);
    
    $Planetary_VehiclesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9846, 'time' => $update));
    $Planetary_Vehicles = InputItemPrice($Planetary_VehiclesTemp['Enabled'], $Planetary_VehiclesTemp['Price']);
    
    $RoboticsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9848, 'time' => $update));
    $Robotics = InputItemPrice($RoboticsTemp['Enabled'], $RoboticsTemp['Price']);
    
    $Smartfab_UnitsTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2351, 'time' => $update));
    $Smartfab_Units = InputItemPrice($Smartfab_UnitsTemp['Enabled'], $Smartfab_UnitsTemp['Price']);
    
    $SupercomputersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2349, 'time' => $update));
    $Supercomputers = InputItemPrice($SupercomputersTemp['Enabled'], $SupercomputersTemp['Price']);
    
    $Synthetic_SynapsesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2346, 'time' => $update));
    $Synthetic_Synapses = InputItemPrice($Synthetic_SynapsesTemp['Enabled'], $Synthetic_SynapsesTemp['Price']);
    
    $MicrocontrollersTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 12836, 'time' => $update));
    $Microcontrollers = InputItemPrice($MicrocontrollersTemp['Enabled'], $MicrocontrollersTemp['Price']);
    
    $UkomiTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17136, 'time' => $update));
    $Ukomi = InputItemPrice($UkomiTemp['Enabled'], $UkomiTemp['Price']);
    
    $VaccinesTemp = $db->fetchRow('SELECT Enabled, Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 28974, 'time' => $update));
    $Vaccines = InputItemPrice($VaccinesTemp['Enabled'], $VaccinesTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $PiT3Value = array(
        'Biotech_Research_Reports' => $post['Biotech_Research_Reports'] * $Biotech,
        'Camera_Drones' => $post['Camera_Drones'] * $Camera_Drones,
        'Condensates' => $post['Condensates'] * $Condensates,
        'Cryoprotectant_Solution' => $post['Cryoprotectant_Solution'] * $Cryoprotectant_Solution,
        'Data_Chips' => $post['Data_Chips'] * $Data_Chips,
        'Gel_Matrix_Biopaste' => $post['Gel_Matrix_Biopaste'] * $Gel_Matrix_Biopaste,
        'Guidance_Systems' => $post['Guidance_Systems'] * $Guidance_Systems,
        'Hazmat_Detection_Systems' => $post['Hazmat_Detection_Systems'] * $Hazmat_Detection_Systems,
        'Hermetic_Membranes' => $post['Hermetic_Membranes'] * $Hermetic_Membranes,
        'High_Tech_Transmitters' => $post['High_Tech_Transmitters'] * $HighTech_Transmitters,
        'Industrial_Explosives' => $post['Industrial_Explosives'] * $Industrial_Explosives,
        'Neocoms' => $post['Neocoms'] * $Neocoms,
        'Nuclear_Reactors' => $post['Nuclear_Reactors'] * $Nuclear_Reactors,
        'Planetary_Vehicles' => $post['Planetary_Vehicles'] * $Planetary_Vehicles,
        'Robotics' => $post['Robotics'] * $Robotics,
        'Smartfab_Units' => $post['Smartfab_Units'] * $Smartfab_Units,
        'Supercomputers' => $post['Supercomputers'] * $Supercomputers,
        'Synthetic_Synapses' => $post['Synthetic_Synapses'] * $Synthetic_Synapses,
        'Transcranial_Microcontrollers' => $post['Transcranial_Microcontrollers'] * $Microcontrollers,
        'Ukomi_Superconductors' => $post['Ukomi_Superconductors'] * $Ukomi,
        'Vaccines' => $post['Vaccines'] * $Vaccines,
    );
    
    //Add the contract value up from the ore
    foreach($PiT3Value as $value) {
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
   $PiT3Contents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Biotech_Research_Reports' => $post['Biotech_Research_Reports'],
        'Camera_Drones' => $post['Camera_Drones'],
        'Condensates' => $post['Condensates'],
        'Cryoprotectant_Solution' => $post['Cryoprotectant_Solution'],
        'Data_Chips' => $post['Data_Chips'],
        'Gel_Matrix_Biopaste' => $post['Gel_Matrix_Biopaste'],
        'Guidance_Systems' => $post['Guidance_Systems'],
        'Hazmat_Detection_Systems' => $post['Hazmat_Detection_Systems'],
        'Hermetic_Membranes' => $post['Hermetic_Membranes'],
        'High_Tech_Transmitters' => $post['High_Tech_Transmitters'],
        'Industrial_Explosives' => $post['Industrial_Explosives'],
        'Neocoms' => $post['Neocoms'],
        'Nuclear_Reactors' => $post['Nuclear_Reactors'],
        'Planetary_Vehicles' => $post['Planetary_Vehicles'],
        'Robotics' => $post['Robotics'],
        'Smartfab_Units' => $post['Smartfab_Units'],
        'Supercomputers' => $post['Supercomputers'],
        'Synthetic_Synapses' => $post['Synthetic_Synapses'],
        'Transcranial_Microcontrollers' => $post['Transcranial_Microcontrollers'],
        'Ukomi_Superconductors' => $post['Ukomi_Superconductors'],
        'Vaccines' => $post['Vaccines'],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'PiT3',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('PiT3ContractContents', $PiT3Contents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       'Value' => $contractValue,
       'Number' => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>