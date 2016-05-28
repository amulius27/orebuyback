<?php

function PiT3ContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    $Biotech = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2358, 'time' => $update));
    $Camera_Drones = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2345, 'time' => $update));
    $Condensates = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2344, 'time' => $update));
    $Cryoprotectant_Solution = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2367, 'time' => $update));
    $Data_Chips = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17392, 'time' => $update));
    $Gel_Matrix_Biopaste = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2348, 'time' => $update));
    $Guidance_Systems = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9834, 'time' => $update));
    $Hazmat_Detection_Systems = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2366, 'time' => $update));
    $Hermetic_Membranes = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2361, 'time' => $update));
    $HighTech_Transmitters = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17898, 'time' => $update));
    $Industrial_Explosives = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2360, 'time' => $update));
    $Neocoms = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2354, 'time' => $update));
    $Nuclear_Reactors = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2352, 'time' => $update));
    $Planetary_Vehicles = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9846, 'time' => $update));
    $Robotics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9848, 'time' => $update));
    $Smartfab_Units = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2351, 'time' => $update));
    $Supercomputers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2349, 'time' => $update));
    $Synthetic_Synapses = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2346, 'time' => $update));
    $Microcontrollers = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 12836, 'time' => $update));
    $Ukomi = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 17136, 'time' => $update));
    $Vaccines = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 28974, 'time' => $update));
    
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
        "Biotech_Research_Reports" => $_POST["Biotech_Research_Reports"] * $Biotech,
        "Camera_Drones" => $_POST["Camera_Drones"] * $Camera_Drones,
        "Cryprotectant_Solution" => $_POST["Cryoprotectant_Solution"] * $Cryoprotectant_Solution,
        "Data_Chips" => $_POST["Data_Chips"] * $Data_Chips,
        "Gel-Matrix_Biopaste" => $_POST["Gel-Matrix_Biopaste"] * $Gel_Matrix_Biopaste,
        "Guidance_Systems" => $_POST["Guidance_Systems"] * $Guidance_Systems,
        "Hazmat_Detection_Systems" => $_POST["Hazmat_Detection_System"] * $Hazmat_Detection_Systems,
        "Hermetic_Membranes" => $_POST["Hermetic_Membranes"] * $Hermetic_Membranes,
        "High-Tech_Transmitters" => $_POST["High-Tech_Transmitters"] * $HighTech_Transmitters,
        "Industrial_Explosives" => $_POST["Industrial_Explosives"] * $Industrial_Explosives,
        "Necoms" => $_POST["Neocoms"] * $Neocoms,
        "Nuclear_Reactors" => $_POST["Nuclear_Reactors"] * $Nuclear_Reactors,
        "Planetary_Vehicles" => $_POST["Planetary_Vehicles"] * $Planetary_Vehicles,
        "Robotics" => $_POST["Robotics"] * $Robotics,
        "Smartfab_Units" => $_POST["Smartfab_Units"] * $Smartfab_Units,
        "Supercomputers" => $_POST["Supercomputers"] * $Supercomputers,
        "Synthetic_Synapses" => $_POST["Synthetic_Synapses"] * $Synthetic_Synapses,
        "Transcranial_Microcontrollers" => $_POST["Transcranial_Microcontrollers"] * $Microcontrollers,
        "Ukomi_Superconductors" => $_POST["Ukomi"] * $Ukomi,
        "Vaccines" => $_POST["Vaccines"] * $Vaccines,
    );
    
    //Add the contract value up from the ore
    foreach($mineralValue as $value) {
       $contractValue = $contractValue + $value;
    }
    
    //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT corpTaxRate FROM Corps WHERE Corpname= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * $allianceTaxRate;
    $corpTax = $contractValue * $corpTaxRate;
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $PiT3Contents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Biotech_Research_Reports" => $_POST["Biotech_Research_Reports"],
        "Camera_Drones" => $_POST["Camera_Drones"],
        "Cryprotectant_Solution" => $_POST["Cryoprotectant_Solution"],
        "Data_Chips" => $_POST["Data_Chips"],
        "Gel-Matrix_Biopaste" => $_POST["Gel-Matrix_Biopaste"],
        "Guidance_Systems" => $_POST["Guidance_Systems"],
        "Hazmat_Detection_Systems" => $_POST["Hazmat_Detection_System"],
        "Hermetic_Membranes" => $_POST["Hermetic_Membranes"],
        "High-Tech_Transmitters" => $_POST["High-Tech_Transmitters"],
        "Industrial_Explosives" => $_POST["Industrial_Explosives"],
        "Necoms" => $_POST["Neocoms"],
        "Nuclear_Reactors" => $_POST["Nuclear_Reactors"],
        "Planetary_Vehicles" => $_POST["Planetary_Vehicles"],
        "Robotics" => $_POST["Robotics"],
        "Smartfab_Units" => $_POST["Smartfab_Units"],
        "Supercomputers" => $_POST["Supercomputers"],
        "Synthetic_Synapses" => $_POST["Synthetic_Synapses"],
        "Transcranial_Microcontrollers" => $_POST["Transcranial_Microcontrollers"],
        "Ukomi_Superconductors" => $_POST["Ukomi"],
        "Vaccines" => $_POST["Vaccines"],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        "ContractNum" => $contractNum,
        "ContractType" => "Mineral",
        "Corporation" => $corporation,
        "QuoteTime" =>  $update,
        "Value" => $contractValue,
        "AllianceTax" => $allianceTax,
        "CorpTax" => $corpTax
    );
   
   $db->insert('PiT3ContractContents', $PiT3Contents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>