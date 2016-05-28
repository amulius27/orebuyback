<?php

function PiContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    //Aqueous Liquids
    $Aqueous = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2268, 'time' => $update));
    //Ionic Solutions
    $Ionic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2309, 'time' => $update));
    //Base Metals
    $Base = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2267, 'time' => $update));
    //Heavy Metals
    $Heavy = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2272, 'time' => $update));
    //Noble Metals
    $Noble = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2270, 'time' => $update));
    //Carbon Compounds
    $Carbon = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2288, 'time' => $update));
    //Microorganisms
    $Micro = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2073, 'time' => $update));
    //Complex Organisms
    $Complex = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2287, 'time' => $update));
    //Planktic Colonies
    $Planktic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2286, 'time' => $update));
    //Noble Gas
    $Noble_Gas = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2310, 'time' => $update));
    //Reactive Metals
    $Reactive = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2398, 'time' => $update));
    //Felsic Magma
    $Felsic = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2307, 'time' => $update));
    //Non-CS Crystals
    $Non = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2306, 'time' => $update));
    //Suspended Plasma
    $Suspended = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2308, 'time' => $update));
    //Autotrophs
    $Autotrophs = $db->fetchColumn('SELECT Price FROM PiPrices WHERE ItemId= :id AND Time= :time', array('id' => 2305, 'time' => $update));
    
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
        "Aqueous_Liquids" => $_POST["Aqueous_Liquids"] * $Aqueous,
        "Ionic_Solutions" => $_POST["Ionic_Solutions"] * $Ionic,
        "Base_Metals" => $_POST["Base_Metals"] * $Base,
        "Heavy_Metals" => $_POST["Heavy_Metals"] * $Heavy,
        "Noble_Metals" => $_POST["Noble_Metals"] * $Noble,
        "Carbon_Compounds" => $_POST["Carbon_Compounds"] * $Carbon,
        "Micro_Organisms" => $_POST["Micro_Organisms"] * $Micro,
        "Complex_Organisms" => $_POST["Complex_Organisms"] * $Complex,
        "Planktic_Colonies" => $_POST["Planktic_Colonies"] * $Planktic,
        "Noble_Gas" => $_POST["Noble_Gas"] * $Noble,
        "Reactive_Metals" => $_POST["Reactive_Metals"] * $Reactive,
        "Felsic_Magma" => $_POST["Felsic_Magma"] * $Felsic,
        "Non-CS_Materials" => $_POST["Non-CS_Materials"] * $Non,
        "Suspended_Plasma" => $_POST["Suspended_Plasma"] * $Suspended,
        "Autotrophs" => $_POST["Autotrophs"] * $Autotrophs,
    );
    
    //Add the contract value up from the ore
    foreach($PiValue as $value) {
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
   $PiContents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Aqueous_Liquids" => $_POST["Aqueous_Liquids"],
        "Ionic_Solutions" => $_POST["Ionic_Solutions"],
        "Base_Metals" => $_POST["Base_Metals"],
        "Heavy_Metals" => $_POST["Heavy_Metals"],
        "Noble_Metals" => $_POST["Noble_Metals"],
        "Carbon_Compounds" => $_POST["Carbon_Compounds"],
        "Micro_Organisms" => $_POST["Micro_Organisms"],
        "Complex_Organisms" => $_POST["Complex_Organisms"],
        "Planktic_Colonies" => $_POST["Planktic_Colonies"],
        "Noble_Gas" => $_POST["Noble_Gas"],
        "Reactive_Metals" => $_POST["Reactive_Metals"],
        "Felsic_Magma" => $_POST["Felsic_Magma"],
        "Non-CS_Materials" => $_POST["Non-CS_Materials"],
        "Suspended_Plasma" => $_POST["Suspended_Plasma"],
        "Autotrophs" => $_POST["Autotrophs"],
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
   
   $db->insert('PiContractContents', $PiContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>