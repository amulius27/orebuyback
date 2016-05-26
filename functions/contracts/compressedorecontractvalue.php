<?php

function CompOreContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    //Veldspar
    $Veldspar = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1230, 'time' => $update));
    //Scordite
    $Scordite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));
    //Pyroxeres
    $Pyroxeres = $db->fetchColumn('SELECT Price from OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));
    //Plagioclase
    $Plagioclase = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));
    //Omber
    $Omber = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    //Kernite
    $Kernite = $db->fetchColumn('SELECT Price FROM  OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));
    //Jaspet
    $Jaspet = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    //Hemorphite
    $Hemorphite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    //Hedbergite
    $Hedbergite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));
    //Gneiss
    $Gneiss = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));
    //Dark Ochre
    $Dark_Ochre = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));
    //Spodumain
    $Spodumain = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));
    //Crokite
    $Crokite = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));
    //Bistot
    $Bistot = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));
    //Arkonor
    $Arkonor = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update)); 
    //Mercoxit
    $Mercoxit = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(Contract_Num) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $oreValue = array(
        "Compressed_Veldspar" => $_POST["Veldspar"] * ($Veldspar * 100),
        "Compressed_Concentrated_Veldspar" => $_POST["Concentrated_Veldspar"] * (($Veldspar * 100) * 1.05),
        "Compressed_Dense_Veldspar" => $_POST["Dense_Veldspar"] * (($Veldspar * 100) * 1.10),
        "Compressed_Scordite" => $_POST["Scordite"] * ($Scordite * 100),
        "Compressed_Condensed_Scordite" => $_POST["Condensed_Scordite"] * (($Scordite * 100) * 1.05),
        "Compressed_Massive_Scordite" => $_POST["Massive_Scordite"] * (($Scordite * 100) * 1.10),
        "Compressed_Pyroxeres" => $_POST["Pyroxeres"] * ($Pyroxeres * 100),
        "Compressed_Solid_Pyroxeres" => $_POST["Solid_Pyroxeres"] * (($Pyroxeres * 100) * 1.05),
        "Compressed_Viscous_Pyroxers" => $_POST["Viscous_Pyroxeres"] * (($Pyroxeres * 100) * 1.10),
        "Compressed_Plagioclase" => $_POST["Plagioclase"] * ($Plagioclase * 100),
        "Compressed_Azure_Plagioclase" => $_POST["Azure_Plagioclase"] * (($Plagioclase * 100) * 1.05),
        "Compressed_Rich_Plagioclase" => $_POST["Rich_Plagioclase"] * (($Plagioclase * 100) * 1.10),
        "Compressed_Omber" => $_POST["Omber"] * ($Omber * 100),
        "Compressed_Silvery_Omber" => $_POST["Silvery_Omber"] * (($Omber * 100) * 1.05),
        "Compressed_Golden_Omber" => $_POST["Golden_Omber"] * (($Omber * 100) * 1.10),
        "Compressed_Kernite" => $_POST["Kernite"] * ($Kernite * 100),
        "Compressed_Luminous_Kernite" => $_POST["Luminous_Kernite"] * (($Kernite * 100) * 1.05),
        "Compressed_Fiery_Kernite" => $_POST["Fiery_Kernite"] * (($Kernite * 100) * 1.10),
        "Compressed_Jaspet" => $_POST["Jaspet"] * ($Jaspet * 100),
        "Compressed_Pure_Jaspet" => $_POST["Pure_Jaspet"] * (($Jaspet * 100) * 1.05),
        "Compressed_Pristine_Jaspet" => $_POST["Pristine_Jaspet"] * (($Jaspet * 100) * 1.10),
        "Compressed_Hemorphite" => $_POST["Hemorphite"] * ($Hemorphite * 100),
        "Compressed_Vivid_Hemorphite" => $_POST["Vivid_Hemorphite"] * (($Hemorphite * 100) * 1.05),
        "Compressed_Radiant_Hemorphite" => $_POST["Radiant_Hemorphite"] * (($Hemorphite * 100) * 1.10),
        "Compressed_Hedbergite" => $_POST["Hedbergite"] * ($Hedbergite * 100),
        "Compressed_Vitric_Hedbergite" => $_POST["Vitric_Hedbergite"] * (($Hedbergite * 100) * 1.05),
        "Compressed_Glazed_Hedbergite" => $_POST["Glazed_Hedbergite"] * (($Hedbergite * 100) * 1.10),
        "Compressed_Gneiss" => $_POST["Gneiss"] * ($Gneiss * 100),
        "Compressed_Iridescent_Gneiss" => $_POST["Iridescent_Gneiss"] * (($Gneiss * 100) * 1.05),
        "Compressed_Prismatic_Gneiss" => $_POST["Prismatic_Gneiss"] * (($Gneiss * 100) * 1.10),
        "Compressed_Dark_Ochre" => $_POST["Dark Ochre"] * ($Dark_Ochre * 100),
        "Compressed_Onyx_Ochre" => $_POST["Onyx_Ochre"] * (($Dark_Ochre * 100) * 1.05),
        "Compressed_Obsidian_Ochre" => $_POST["Obisidian_Ochre"] * (($Dark_Ochre * 100) * 1.10),
        "Compressed_Spodumain" => $_POST["Spodumain"] * ($Spodumain * 100),
        "Compressed_Bright_Spodumain" => $_POST["Bright_Spodumain"] * (($Spodumain * 100) * 1.05),
        "Compressed_Gleaming_Spodumain" => $_POST["Gleaming_Spodumain"] * (($Spodumain * 100) * 1.10),
        "Compressed_Crokite" => $_POST["Crokite"] * ($Crokite * 100),
        "Compressed_Sharp_Crokite" => $_POST["Sharp_Crokite"] * (($Crokite * 100) * 1.05),
        "Compressed_Crystalline_Crokite" => $_POST["Crystalline_Crokite"] * (($Crokite * 100) * 1.10),
        "Compressed_Bistot" => $_POST["Bistot"] * ($Bistot * 100),
        "Compressed_Triclinic_Bistot" => $_POST["Triclinic_Bistot"] * (($Bistot * 100) * 1.05),
        "Compressed_Monoclinic_Bistot" => $_POST["Monoclinic_Bistot"] * (($Bistot * 100) * 1.10),
        "Compressed_Arkonor" => $_POST["Arkonor"] * ($Arkonor * 100),
        "Compressed_Crimson_Arkonor" => $_POST["Crimson_Arkonor"] * (($Arkonor * 100) * 1.05),
        "Compressed_Prime_Arkonor" => $_POST["Prime_Arkonor"] * (($Arkonor * 100) * 1.10),
        "Compressed_Mercoxit" => $_POST["Mercoxit"] * ($Mercoxit * 100),
        "Compressed_Magma_Mercoxit" => $_POST["Magma_Mercoxit"] * (($Mercoxit * 100) * 1.05),
        "Compressed_Vitreous_Mercoxit" => $_POST["Vitreous_Mercoxit"] * (($Mercoxit * 100) * 1.10),
    );
    
    //Add the contract value up from the ore
    foreach($oreValue as $value) {
       $contractValue = $contractValue + $value;
    }
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $oreContents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Compressed_Veldspar" => $_POST["Veldspar"],
        "Compressed_Concentrated_Veldspar" => $_POST["Concentrated_Veldspar"],
        "Compressed_Dense_Veldspar" => $_POST["Dense_Veldspar"],
        "Compressed_Scordite" => $_POST["Scordite"],
        "Compressed_Condensed_Scordite" => $_POST["Condensed_Scordite"],
        "Compressed_Massive_Scordite" => $_POST["Massive_Scordite"],
        "Compressed_Pyroxeres" => $_POST["Pyroxeres"],
        "Compressed_Solid_Pyroxeres" => $_POST["Solid_Pyroxeres"],
        "Compressed_Viscous_Pyroxers" => $_POST["Viscous_Pyroxeres"],
        "Compressed_Plagioclase" => $_POST["Plagioclase"],
        "Compressed_Azure_Plagioclase" => $_POST["Azure_Plagioclase"],
        "Compressed_Rich_Plagioclase" => $_POST["Rich_Plagioclase"],
        "Compressed_Omber" => $_POST["Omber"],
        "Compressed_Silvery_Omber" => $_POST["Silvery_Omber"],
        "Compressed_Golden_Omber" => $_POST["Golden_Omber"],
        "Compressed_Kernite" => $_POST["Kernite"],
        "Compressed_Luminous_Kernite" => $_POST["Luminous_Kernite"],
        "Compressed_Fiery_Kernite" => $_POST["Fiery_Kernite"],
        "Compressed_Jaspet" => $_POST["Jaspet"],
        "Compressed_Pure_Jaspet" => $_POST["Pure_Jaspet"],
        "Compressed_Pristine_Jaspet" => $_POST["Pristine_Jaspet"],
        "Compressed_Hemorphite" => $_POST["Hemorphite"],
        "Compressed_Vivid_Hemorphite" => $_POST["Vivid_Hemorphite"],
        "Compressed_Radiant_Hemorphite" => $_POST["Radiant_Hemorphite"],
        "Compressed_Hedbergite" => $_POST["Hedbergite"],
        "Compressed_Vitric_Hedbergite" => $_POST["Vitric_Hedbergite"],
        "Compressed_Glazed_Hedbergite" => $_POST["Glazed_Hedbergite"],
        "Compressed_Gneiss" => $_POST["Gneiss"],
        "Compressed_Iridescent_Gneiss" => $_POST["Iridescent_Gneiss"],
        "Compressed_Prismatic_Gneiss" => $_POST["Prismatic_Gneiss"],
        "Compressed_Dark_Ochre" => $_POST["Dark Ochre"],
        "Compressed_Onyx_Ochre" => $_POST["Onyx_Ochre"],
        "Compressed_Obsidian_Ochre" => $_POST["Obisidian_Ochre"],
        "Compressed_Spodumain" => $_POST["Spodumain"],
        "Compressed_Bright_Spodumain" => $_POST["Bright_Spodumain"],
        "Compressed_Gleaming_Spodumain" => $_POST["Gleaming_Spodumain"],
        "Compressed_Crokite" => $_POST["Crokite"],
        "Compressed_Sharp_Crokite" => $_POST["Sharp_Crokite"],
        "Compressed_Crystalline_Crokite" => $_POST["Crystalline_Crokite"],
        "Compressed_Bistot" => $_POST["Bistot"],
        "Compressed_Triclinic_Bistot" => $_POST["Triclinic_Bistot"],
        "Compressed_Monoclinic_Bistot" => $_POST["Monoclinic_Bistot"],
        "Compressed_Arkonor" => $_POST["Arkonor"],
        "Compressed_Crimson_Arkonor" => $_POST["Crimson_Arkonor"],
        "Compressed_Prime_Arkonor" => $_POST["Prime_Arkonor"],
        "Compressed_Mercoxit" => $_POST["Mercoxit"],
        "Compressed_Magma_Mercoxit" => $_POST["Magma_Mercoxit"],
        "Compressed_Vitreous_Mercoxit" => $_POST["Vitreous_Mercoxit"],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        "ContractNum" => $contractNum,
        "ContractType" => "CompOre",
        "Corporation" => $corporation,
        "QuoteTime" =>  $update,
        "Value" => $contractValue,
        
    );
   
   $db->insert('CompOreContractContents', $oreContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>