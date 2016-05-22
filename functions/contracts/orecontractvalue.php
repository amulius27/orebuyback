<?php

function OreContractValue($db, $update) {
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
        "Veldspar" => $_POST["Veldspar"] * $Veldspar,
        "Concentrated_Veldspar" => $_POST["Concentrated_Veldspar"] * ($Veldspar * 1.05),
        "Dense_Veldspar" => $_POST["Dense_Veldspar"] * ($Veldspar * 1.10),
        "Scordite" => $_POST["Scordite"] * $Scordite,
        "Condensed_Scordite" => $_POST["Condensed_Scordite"] * ($Scordite * 1.05),
        "Massive_Scordite" => $_POST["Massive_Scordite"] * ($Scordite * 1.10),
        "Pyroxeres" => $_POST["Pyroxeres"] * $Pyroxeres,
        "Solid_Pyroxeres" => $_POST["Solid_Pyroxeres"] * ($Pyroxeres * 1.05),
        "Viscous_Pyroxers" => $_POST["Viscous_Pyroxeres"] * ($Pyroxeres * 1.10),
        "Plagioclase" => $_POST["Plagioclase"] * $Plagioclase,
        "Azure_Plagioclase" => $_POST["Azure_Plagioclase"] * ($Plagioclase * 1.05),
        "Rich_Plagioclase" => $_POST["Rich_Plagioclase"] * ($Plagioclase * 1.10),
        "Omber" => $_POST["Omber"] * $Omber,
        "Silvery_Omber" => $_POST["Silvery_Omber"] * ($Omber * 1.05),
        "Golden_Omber" => $_POST["Golden_Omber"] * ($Omber * 1.10),
        "Kernite" => $_POST["Kernite"] * $Kernite,
        "Luminous_Kernite" => $_POST["Luminous_Kernite"] * ($Kernite * 1.05),
        "Fiery_Kernite" => $_POST["Fiery_Kernite"] * ($Kernite * 1.10),
        "Jaspet" => $_POST["Jaspet"] * $Jaspet,
        "Pure_Jaspet" => $_POST["Pure_Jaspet"] * ($Jaspet * 1.05),
        "Pristine_Jaspet" => $_POST["Pristine_Jaspet"] * ($Jaspet * 1.10),
        "Hemorphite" => $_POST["Hemorphite"] * $Hemorphite,
        "Vivid_Hemorphite" => $_POST["Vivid_Hemorphite"] * ($Hemorphite * 1.05),
        "Radiant_Hemorphite" => $_POST["Radiant_Hemorphite"] * ($Hemorphite * 1.10),
        "Hedbergite" => $_POST["Hedbergite"] * $Hedbergite,
        "Vitric_Hedbergite" => $_POST["Vitric_Hedbergite"] * ($Hedbergite * 1.05),
        "Glazed_Hedbergite" => $_POST["Glazed_Hedbergite"] * ($Hedbergite * 1.10),
        "Gneiss" => $_POST["Gneiss"] * $Gneiss,
        "Iridescent_Gneiss" => $_POST["Iridescent_Gneiss"] * ($Gneiss * 1.05),
        "Prismatic_Gneiss" => $_POST["Prismatic_Gneiss"] * ($Gneiss * 1.10),
        "Dark_Ochre" => $_POST["Dark Ochre"] * $Dark_Ochre,
        "Onyx_Ochre" => $_POST["Onyx_Ochre"] * ($Dark_Ochre * 1.05),
        "Obsidian_Ochre" => $_POST["Obisidian_Ochre"] * ($Dark_Ochre * 1.10),
        "Spodumain" => $_POST["Spodumain"] * $Spodumain,
        "Bright_Spodumain" => $_POST["Bright_Spodumain"] * ($Spodumain * 1.05),
        "Gleaming_Spodumain" => $_POST["Gleaming_Spodumain"] * ($Spodumain * 1.10),
        "Crokite" => $_POST["Crokite"] * $Crokite,
        "Sharp_Crokite" => $_POST["Sharp_Crokite"] * ($Crokite * 1.05),
        "Crystalline_Crokite" => $_POST["Crystalline_Crokite"] * ($Crokite * 1.10),
        "Bistot" => $_POST["Bistot"] * $Bistot,
        "Triclinic_Bistot" => $_POST["Triclinic_Bistot"] * ($Bistot * 1.05),
        "Monoclinic_Bistot" => $_POST["Monoclinic_Bistot"] * ($Bistot * 1.10),
        "Arkonor" => $_POST["Arkonor"] * $Arkonor,
        "Crimson_Arkonor" => $_POST["Crimson_Arkonor"] * ($Arkonor * 1.05),
        "Prime_Arkonor" => $_POST["Prime_Arkonor"] * ($Arkonor * 1.10),
        "Mercoxit" => $_POST["Mercoxit"] * $Mercoxit,
        "Magma_Mercoxit" => $_POST["Magma_Mercoxit"] * ($Mercoxit * 1.05),
        "Vitreous_Mercoxit" => $_POST["Vitreous_Mercoxit"] * ($Mercoxit * 1.10),
    );
    
    //Add the contract value up from the ore
    foreach($oreValue as $value) {
       $contractValue = $contractValue + $value;
    }
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $oreContents = array(
        "Contract_Num" => $contractNum,
        "Contract_Time" =>  $now,
        "Quote_Time" => $update,
        "Veldspar" => $_POST["Veldspar"],
        "Concentrated_Veldspar" => $_POST["Concentrated_Veldspar"],
        "Dense_Veldspar" => $_POST["Dense_Veldspar"],
        "Scordite" => $_POST["Scordite"],
        "Condensed_Scordite" => $_POST["Condensed_Scordite"],
        "Massive_Scordite" => $_POST["Massive_Scordite"],
        "Pyroxeres" => $_POST["Pyroxeres"],
        "Solid_Pyroxeres" => $_POST["Solid_Pyroxeres"],
        "Viscous_Pyroxers" => $_POST["Viscous_Pyroxeres"],
        "Plagioclase" => $_POST["Plagioclase"],
        "Azure_Plagioclase" => $_POST["Azure_Plagioclase"],
        "Rich_Plagioclase" => $_POST["Rich_Plagioclase"],
        "Omber" => $_POST["Omber"],
        "Silvery_Omber" => $_POST["Silvery_Omber"],
        "Golden_Omber" => $_POST["Golden_Omber"],
        "Kernite" => $_POST["Kernite"],
        "Luminous_Kernite" => $_POST["Luminous_Kernite"],
        "Fiery_Kernite" => $_POST["Fiery_Kernite"],
        "Jaspet" => $_POST["Jaspet"],
        "Pure_Jaspet" => $_POST["Pure_Jaspet"],
        "Pristine_Jaspet" => $_POST["Pristine_Jaspet"],
        "Hemorphite" => $_POST["Hemorphite"],
        "Vivid_Hemorphite" => $_POST["Vivid_Hemorphite"],
        "Radiant_Hemorphite" => $_POST["Radiant_Hemorphite"],
        "Hedbergite" => $_POST["Hedbergite"],
        "Vitric_Hedbergite" => $_POST["Vitric_Hedbergite"],
        "Glazed_Hedbergite" => $_POST["Glazed_Hedbergite"],
        "Gneiss" => $_POST["Gneiss"],
        "Iridescent_Gneiss" => $_POST["Iridescent_Gneiss"],
        "Prismatic_Gneiss" => $_POST["Prismatic_Gneiss"],
        "Dark_Ochre" => $_POST["Dark Ochre"],
        "Onyx_Ochre" => $_POST["Onyx_Ochre"],
        "Obsidian_Ochre" => $_POST["Obisidian_Ochre"],
        "Spodumain" => $_POST["Spodumain"],
        "Bright_Spodumain" => $_POST["Bright_Spodumain"],
        "Gleaming_Spodumain" => $_POST["Gleaming_Spodumain"],
        "Crokite" => $_POST["Crokite"],
        "Sharp_Crokite" => $_POST["Sharp_Crokite"],
        "Crystalline_Crokite" => $_POST["Crystalline_Crokite"],
        "Bistot" => $_POST["Bistot"],
        "Triclinic_Bistot" => $_POST["Triclinic_Bistot"],
        "Monoclinic_Bistot" => $_POST["Monoclinic_Bistot"],
        "Arkonor" => $_POST["Arkonor"],
        "Crimson_Arkonor" => $_POST["Crimson_Arkonor"],
        "Prime_Arkonor" => $_POST["Prime_Arkonor"],
        "Mercoxit" => $_POST["Mercoxit"],
        "Magma_Mercoxit" => $_POST["Magma_Mercoxit"],
        "Vitreous_Mercoxit" => $_POST["Vitreous_Mercoxit"],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        "Contract_Num" => $contractNum,
        "Quote_Time" =>  $update,
        "Value" => $contractValue,
        
    );
   
   $db->insert('OreContractContents', $oreContents);
   $db->insert('Contracts', $contract);
   
    
    return $contractValue;
}

?>