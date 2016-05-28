<?php

function PiT2ContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    $biocells = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2329, 'time' => $update));
    $construction_blocks = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3828, 'time' => $update));
    $consumer_electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9836, 'time' => $update));
    $coolant = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9832, 'time' => $update));
    $enriched_uranium = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 44, 'time' => $update));
    $fertilizer = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3693, 'time' => $update));
    $gen_enhanced_livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 15317, 'time' => $update));
    $livestock = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3725, 'time' => $update));
    $mechanical_parts = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 3689, 'time' => $update));
    $microfiber_shielding = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2327, 'time' => $update));
    $miniature_electronics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 9842, 'time' => $update));
    $nanites = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2463, 'time' => $update));
    $oxides = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2317, 'time' => $update));
    $polyaramids = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2321, 'time' => $update));
    $polytextiles = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3695, 'time' => $update));
    $rocket_fuel = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9830, 'time' => $update));
    $silicate_glass = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3697, 'time' => $update));
    $superconductors = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9838, 'time' => $update));
    $supertensile_plastics = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2312, 'time' => $update));
    $synthetic_oil = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3691, 'time' => $update));
    $testcultures = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2319, 'time' => $update));
    $transmitter = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 9840, 'time' => $update));
    $viral_agent = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 3775, 'time' => $update));
    $water_cooled_cpu = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id and Time= :time', array('id' => 2328, 'time' => $update));
    
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
        "Biocells" => $_POST["Biocells"] * $biocells,
        "Construction_Blocks" => $_POST["Construction_Blocks"] * $construction_blocks,
        "Consumer_Electronics" => $_POST["Consumer_Electronics"] * $consumer_electronics,
        "Coolant" => $_POST["Coolant"] * $coolant,
        "Enriched_Uranium" => $_POST["Enriched_Uranium"] * $enriched_uranium,
        "Fertilizer" => $_POST["Fertilizer"] * $fertilizer,
        "Genetically_Enhanced_Livestock" => $_POST["Gen_Enhanced_Livestock"] * $gen_enhanced_livestock,
        "Livestock" => $_POST["Livestock"] * $livestock,
        "Mechanical_Parts" => $_POST["Mechanical_Parts"] * $mechanical_parts,
        "Microfiber_Shielding" => $_POST["Microfiber_Shielding"] * $microfiber_shielding,
        "Miniature_Electronics" => $_POST["Miniature_Electronics"] * $miniature_electronics,
        "Nanites" => $_POST["Nanites"] * $nanites,
        "Oxides" => $_POST["Oxides"] * $oxides,
        "Polyaramids" => $_POST["Polyaramids"] * $polyaramids,
        "Polytextiles" => $_POST["Polytextiles"] * $polytextiles,
        "Rocket_Fuel" => $_POST["Rocket_Fuel"] * $rocket_fuel,
        "Silicate_Glass" => $_POST["Silicate_Glass"] * $silicate_glass,
        "Superconductors" => $_POST["Superconductors"] * $superconductors,
        "Synthetic_Oil" => $_POST["Synthetic_Oil"] * $synthetic_oil,
        "Test_Cultures" => $_POST["Test_Cultures"] * $testcultures,
        "Transmitter" => $_POST["Transmitter"] * $transmitter,
        "Viral_Agent" => $_POST["Viral_Agent"] * $viral_agent,
        "Water-Cooled_CPU" => $_POST["Water-Cooled_CPU"] * $water_cooled_cpu,
    );
    
    //Add the contract value up from the ore
    foreach($Pit2Value as $value) {
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
   $Pit2Contents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Biocells" => $_POST["Biocells"],
        "Construction_Blocks" => $_POST["Construction_Blocks"],
        "Consumer_Electronics" => $_POST["Consumer_Electronics"],
        "Coolant" => $_POST["Coolant"],
        "Enriched_Uranium" => $_POST["Enriched_Uranium"],
        "Fertilizer" => $_POST["Fertilizer"],
        "Genetically_Enhanced_Livestock" => $_POST["Gen_Enhanced_Livestock"],
        "Livestock" => $_POST["Livestock"],
        "Mechanical_Parts" => $_POST["Mechanical_Parts"],
        "Microfiber_Shielding" => $_POST["Microfiber_Shielding"],
        "Miniature_Electronics" => $_POST["Miniature_Electronics"],
        "Nanites" => $_POST["Nanites"],
        "Oxides" => $_POST["Oxides"],
        "Polyaramids" => $_POST["Polyaramids"],
        "Polytextiles" => $_POST["Polytextiles"],
        "Rocket_Fuel" => $_POST["Rocket_Fuel"],
        "Silicate_Glass" => $_POST["Silicate_Glass"],
        "Superconductors" => $_POST["Superconductors"],
        "Synthetic_Oil" => $_POST["Synthetic_Oil"],
        "Test_Cultures" => $_POST["Test_Cultures"],
        "Transmitter" => $_POST["Transmitter"],
        "Viral_Agent" => $_POST["Viral_Agent"],
        "Water-Cooled_CPU" => $_POST["Water-Cooled_CPU"],
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
   
   $db->insert('PiT2ContractContents', $Pit2Contents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>