<?php

function OreContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
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
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $oreValue = array(
        'Veldspar' => $post['Veldspar'] * $Veldspar,
        'Concentrated_Veldspar' => $post['Concentrated_Veldspar'] * ($Veldspar * 1.05),
        'Dense_Veldspar' => $post['Dense_Veldspar'] * ($Veldspar * 1.10),
        'Scordite' => $post['Scordite'] * $Scordite,
        'Condensed_Scordite' => $post['Condensed_Scordite'] * ($Scordite * 1.05),
        'Massive_Scordite' => $post['Massive_Scordite'] * ($Scordite * 1.10),
        'Pyroxeres' => $post['Pyroxeres'] * $Pyroxeres,
        'Solid_Pyroxeres' => $post['Solid_Pyroxeres'] * ($Pyroxeres * 1.05),
        'Viscous_Pyroxeres' => $post['Viscous_Pyroxeres'] * ($Pyroxeres * 1.10),
        'Plagioclase' => $post['Plagioclase'] * $Plagioclase,
        'Azure_Plagioclase' => $post['Azure_Plagioclase'] * ($Plagioclase * 1.05),
        'Rich_Plagioclase' => $post['Rich_Plagioclase'] * ($Plagioclase * 1.10),
        'Omber' => $post['Omber'] * $Omber,
        'Silvery_Omber' => $post['Silvery_Omber'] * ($Omber * 1.05),
        'Golden_Omber' => $post['Golden_Omber'] * ($Omber * 1.10),
        'Kernite' => $post['Kernite'] * $Kernite,
        'Luminous_Kernite' => $post['Luminous_Kernite'] * ($Kernite * 1.05),
        'Fiery_Kernite' => $post['Fiery_Kernite'] * ($Kernite * 1.10),
        'Jaspet' => $post['Jaspet'] * $Jaspet,
        'Pure_Jaspet' => $post['Pure_Jaspet'] * ($Jaspet * 1.05),
        'Pristine_Jaspet' => $post['Pristine_Jaspet'] * ($Jaspet * 1.10),
        'Hemorphite' => $post['Hemorphite'] * $Hemorphite,
        'Vivid_Hemorphite' => $post['Vivid_Hemorphite'] * ($Hemorphite * 1.05),
        'Radiant_Hemorphite' => $post['Radiant_Hemorphite'] * ($Hemorphite * 1.10),
        'Hedbergite' => $post['Hedbergite'] * $Hedbergite,
        'Vitric_Hedbergite' => $post['Vitric_Hedbergite'] * ($Hedbergite * 1.05),
        'Glazed_Hedbergite' => $post['Glazed_Hedbergite'] * ($Hedbergite * 1.10),
        'Gneiss' => $post['Gneiss'] * $Gneiss,
        'Iridescent_Gneiss' => $post['Iridescent_Gneiss'] * ($Gneiss * 1.05),
        'Prismatic_Gneiss' => $post['Prismatic_Gneiss'] * ($Gneiss * 1.10),
        'Dark_Ochre' => $post['Dark_Ochre'] * $Dark_Ochre,
        'Onyx_Ochre' => $post['Onyx_Ochre'] * ($Dark_Ochre * 1.05),
        'Obsidian_Ochre' => $post['Obsidian_Ochre'] * ($Dark_Ochre * 1.10),
        'Spodumain' => $post['Spodumain'] * $Spodumain,
        'Bright_Spodumain' => $post['Bright_Spodumain'] * ($Spodumain * 1.05),
        'Gleaming_Spodumain' => $post['Gleaming_Spodumain'] * ($Spodumain * 1.10),
        'Crokite' => $post['Crokite'] * $Crokite,
        'Sharp_Crokite' => $post['Sharp_Crokite'] * ($Crokite * 1.05),
        'Crystalline_Crokite' => $post['Crystalline_Crokite'] * ($Crokite * 1.10),
        'Bistot' => $post['Bistot'] * $Bistot,
        'Triclinic_Bistot' => $post['Triclinic_Bistot'] * ($Bistot * 1.05),
        'Monoclinic_Bistot' => $post['Monoclinic_Bistot'] * ($Bistot * 1.10),
        'Arkonor' => $post['Arkonor'] * $Arkonor,
        'Crimson_Arkonor' => $post['Crimson_Arkonor'] * ($Arkonor * 1.05),
        'Prime_Arkonor' => $post['Prime_Arkonor'] * ($Arkonor * 1.10),
        'Mercoxit' => $post['Mercoxit'] * $Mercoxit,
        'Magma_Mercoxit' => $post['Magma_Mercoxit'] * ($Mercoxit * 1.05),
        'Vitreous_Mercoxit' => $post['Vitreous_Mercoxit'] * ($Mercoxit * 1.10)
    );
    
    //Add the contract value up from the ore
    foreach($oreValue as $value) {
       $contractValue = $contractValue + $value;
    }
    
    //Get the tax rates
    $allianceTaxRate = $db->fetchColumn('SELECT allianceTaxRate FROM Configuration');
    $corpTaxRate = $db->fetchColumn('SELECT TaxRate FROM Corps WHERE Corpname= :name', array('name' => $corporation));
    //Calculate the taxes from the contract value
    $allianceTax = $contractValue * ($allianceTaxRate / 100.00);
    $corpTax = $contractValue * ($corpTaxRate / 100.00);
    //Adjust the contract value
    $contractValue = ($contractValue - $allianceTax) - $corpTax;
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $oreContents = array(
        'ContractNum' => $contractNum,
        'ContractTime' =>  $now,
        'QuoteTime' => $update,
        'Veldspar' => $post['Veldspar'],
        'Concentrated_Veldspar' => $post['Concentrated_Veldspar'],
        'Dense_Veldspar' => $post['Dense_Veldspar'],
        'Scordite' => $post['Scordite'],
        'Condensed_Scordite' => $post['Condensed_Scordite'],
        'Massive_Scordite' => $post['Massive_Scordite'],
        'Pyroxeres' => $post['Pyroxeres'],
        'Solid_Pyroxeres' => $post['Solid_Pyroxeres'],
        'Viscous_Pyroxeres' => $post['Viscous_Pyroxeres'],
        'Plagioclase' => $post['Plagioclase'],
        'Azure_Plagioclase' => $post['Azure_Plagioclase'],
        'Rich_Plagioclase' => $post['Rich_Plagioclase'],
        'Omber' => $post['Omber'],
        'Silvery_Omber' => $post['Silvery_Omber'],
        'Golden_Omber' => $post['Golden_Omber'],
        'Kernite' => $post['Kernite'],
        'Luminous_Kernite' => $post['Luminous_Kernite'],
        'Fiery_Kernite' => $post['Fiery_Kernite'],
        'Jaspet' => $post['Jaspet'],
        'Pure_Jaspet' => $post['Pure_Jaspet'],
        'Pristine_Jaspet' => $post['Pristine_Jaspet'],
        'Hemorphite' => $post['Hemorphite'],
        'Vivid_Hemorphite' => $post['Vivid_Hemorphite'],
        'Radiant_Hemorphite' => $post['Radiant_Hemorphite'],
        'Hedbergite' => $post['Hedbergite'],
        'Vitric_Hedbergite' => $post['Vitric_Hedbergite'],
        'Glazed_Hedbergite' => $post['Glazed_Hedbergite'],
        'Gneiss' => $post['Gneiss'],
        'Iridescent_Gneiss' => $post['Iridescent_Gneiss'],
        'Prismatic_Gneiss' => $post['Prismatic_Gneiss'],
        'Dark_Ochre' => $post['Dark_Ochre'],
        'Onyx_Ochre' => $post['Onyx_Ochre'],
        'Obsidian_Ochre' => $post['Obsidian_Ochre'],
        'Spodumain' => $post['Spodumain'],
        'Bright_Spodumain' => $post['Bright_Spodumain'],
        'Gleaming_Spodumain' => $post['Gleaming_Spodumain'],
        'Crokite' => $post['Crokite'],
        'Sharp_Crokite' => $post['Sharp_Crokite'],
        'Crystalline_Crokite' => $post['Crystalline_Crokite'],
        'Bistot' => $post['Bistot'],
        'Triclinic_Bistot' => $post['Triclinic_Bistot'],
        'Monoclinic_Bistot' => $post['Monoclinic_Bistot'],
        'Arkonor' => $post['Arkonor'],
        'Crimson_Arkonor' => $post['Crimson_Arkonor'],
        'Prime_Arkonor' => $post['Prime_Arkonor'],
        'Mercoxit' => $post['Mercoxit'],
        'Magma_Mercoxit' => $post['Magma_Mercoxit'],
        'Vitreous_Mercoxit' => $post['Vitreous_Mercoxit']
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'Ore',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax
    );
   
   $db->insert('OreContractContents', $oreContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
   
   DBClose($db);
    
    return $contractReturn;
}

?>