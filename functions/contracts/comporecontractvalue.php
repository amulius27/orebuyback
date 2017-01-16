<?php

function CompOreContractValue($update, $corporation, $post) {
    //Get all of the values from the contract update time
    $db = DBOpen();
    
    $VeldsparTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1230, 'time' => $update));
    $Veldspar = InputItemPrice($VeldsparTemp['Enabled'], $VeldsparTemp['Price']);
    
    $ScorditeTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1228, 'time' => $update));
    $Scordite = InputItemPrice($ScorditeTemp['Enabled'], $ScorditeTemp['Price']);
    
    $PyroxeresTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1224, 'time' => $update));
    $Pyroxeres = InputItemPrice($PyroxeresTemp['Enabled'], $PyroxeresTemp['Price']);
    
    $PlagioclaseTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 18, 'time' => $update));
    $Plagioclase = InputItemPrice($PlagioclaseTemp['Enabled'], $PlagioclaseTemp['Price']);
    
    $OmberTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1227, 'time' => $update));
    $Omber = InputItemPrice($OmberTemp['Enabled'], $OmberTemp['Price']);
    
    $KerniteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 20, 'time' => $update));
    $Kernite = InputItemPrice($KerniteTemp['Enabled'], $KerniteTemp['Price']);
    
    $JaspetTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1226, 'time' => $update));
    $Jaspet = InputItemPrice($JaspetTemp['Enabled'], $JaspetTemp['Price']);
    
    $HemorphiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1231, 'time' => $update));
    $Hemorphite = InputItemPrice($HemorphiteTemp['Enabled'], $HemorphiteTemp['Price']);
    
    $HedbergiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 21, 'time' => $update));
    $Hedbergite = InputItemPrice($HedbergiteTemp['Enabled'], $HedbergiteTemp['Price']);
    
    $GneissTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1229, 'time' => $update));
    $Gneiss = InputItemPrice($GneissTemp['Enabled'], $GneissTemp['Price']);
    
    $Dark_OchreTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1232, 'time' => $update));
    $Dark_Ochre = InputItemPrice($Dark_OchreTemp['Enabled'], $Dark_OchreTemp['Price']);
    
    $SpodumainTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 19, 'time' => $update));
    $Spodumain = InputItemPrice($SpodumainTemp['Enabled'], $SpodumainTemp['Price']);
    
    $CrokiteTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1225, 'time' => $update));
    $Crokite = InputItemPrice($CrokiteTemp['Enabled'], $CrokiteTemp['Price']);
    
    $BistotTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 1223, 'time' => $update));
    $Bistot = InputItemPrice($BistotTemp['Enabled'], $BistotTemp['Price']);
    
    $ArkonorTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 22, 'time' => $update));
    $Arkonor = InputItemPrice($ArkonorTemp['Enabled'], $ArkonorTemp['Price']);
    
    $MercoxitTemp = $db->fetchRow('SELECT Enabled, Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 11396, 'time' => $update));
    $Mercoxit = InputItemPrice($MercoxitTemp['Enabled'], $MercoxitTemp['Price']);
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(ContractNum) FROM Contracts');
    if($lastContractNum == NULL) {
        $lastContractNum = 0;
    }
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $compOreValue = array(
        'Compressed_Veldspar' => $post['Compressed_Veldspar'] * ($Veldspar * 100),
        'Compressed_Concentrated_Veldspar' => $post['Compressed_Concentrated_Veldspar'] * (($Veldspar * 100) * 1.05),
        'Compressed_Dense_Veldspar' => $post['Compressed_Dense_Veldspar'] * (($Veldspar * 100) * 1.10),
        'Compressed_Scordite' => $post['Compressed_Scordite'] * ($Scordite * 100),
        'Compressed_Condensed_Scordite' => $post['Compressed_Condensed_Scordite'] * (($Scordite * 100) * 1.05),
        'Compressed_Massive_Scordite' => $post['Compressed_Massive_Scordite'] * (($Scordite * 100) * 1.10),
        'Compressed_Pyroxeres' => $post['Compressed_Pyroxeres'] * ($Pyroxeres * 100),
        'Compressed_Solid_Pyroxeres' => $post['Compressed_Solid_Pyroxeres'] * (($Pyroxeres * 100) * 1.05),
        'Compressed_Viscous_Pyroxers' => $post['Compressed_Viscous_Pyroxeres'] * (($Pyroxeres * 100) * 1.10),
        'Compressed_Plagioclase' => $post['Compressed_Plagioclase'] * ($Plagioclase * 100),
        'Compressed_Azure_Plagioclase' => $post['Compressed_Azure_Plagioclase'] * (($Plagioclase * 100) * 1.05),
        'Compressed_Rich_Plagioclase' => $post['Compressed_Rich_Plagioclase'] * (($Plagioclase * 100) * 1.10),
        'Compressed_Omber' => $post['Compressed_Omber'] * ($Omber * 100),
        'Compressed_Silvery_Omber' => $post['Compressed_Silvery_Omber'] * (($Omber * 100) * 1.05),
        'Compressed_Golden_Omber' => $post['Compressed_Golden_Omber'] * (($Omber * 100) * 1.10),
        'Compressed_Kernite' => $post['Compressed_Kernite'] * ($Kernite * 100),
        'Compressed_Luminous_Kernite' => $post['Compressed_Luminous_Kernite'] * (($Kernite * 100) * 1.05),
        'Compressed_Fiery_Kernite' => $post['Compressed_Fiery_Kernite'] * (($Kernite * 100) * 1.10),
        'Compressed_Jaspet' => $post['Compressed_Jaspet'] * ($Jaspet * 100),
        'Compressed_Pure_Jaspet' => $post['Compressed_Pure_Jaspet'] * (($Jaspet * 100) * 1.05),
        'Compressed_Pristine_Jaspet' => $post['Compressed_Pristine_Jaspet'] * (($Jaspet * 100) * 1.10),
        'Compressed_Hemorphite' => $post['Compressed_Hemorphite'] * ($Hemorphite * 100),
        'Compressed_Vivid_Hemorphite' => $post['Compressed_Vivid_Hemorphite'] * (($Hemorphite * 100) * 1.05),
        'Compressed_Radiant_Hemorphite' => $post['Compressed_Radiant_Hemorphite'] * (($Hemorphite * 100) * 1.10),
        'Compressed_Hedbergite' => $post['Compressed_Hedbergite'] * ($Hedbergite * 100),
        'Compressed_Vitric_Hedbergite' => $post['Compressed_Vitric_Hedbergite'] * (($Hedbergite * 100) * 1.05),
        'Compressed_Glazed_Hedbergite' => $post['Compressed_Glazed_Hedbergite'] * (($Hedbergite * 100) * 1.10),
        'Compressed_Gneiss' => $post['Compressed_Gneiss'] * ($Gneiss * 100),
        'Compressed_Iridescent_Gneiss' => $post['Compressed_Iridescent_Gneiss'] * (($Gneiss * 100) * 1.05),
        'Compressed_Prismatic_Gneiss' => $post['Compressed_Prismatic_Gneiss'] * (($Gneiss * 100) * 1.10),
        'Compressed_Dark_Ochre' => $post['Compressed_Dark_Ochre'] * ($Dark_Ochre * 100),
        'Compressed_Onyx_Ochre' => $post['Compressed_Onyx_Ochre'] * (($Dark_Ochre * 100) * 1.05),
        'Compressed_Obsidian_Ochre' => $post['Compressed_Obsidian_Ochre'] * (($Dark_Ochre * 100) * 1.10),
        'Compressed_Spodumain' => $post['Compressed_Spodumain'] * ($Spodumain * 100),
        'Compressed_Bright_Spodumain' => $post['Compressed_Bright_Spodumain'] * (($Spodumain * 100) * 1.05),
        'Compressed_Gleaming_Spodumain' => $post['Compressed_Gleaming_Spodumain'] * (($Spodumain * 100) * 1.10),
        'Compressed_Crokite' => $post['Compressed_Crokite'] * ($Crokite * 100),
        'Compressed_Sharp_Crokite' => $post['Compressed_Sharp_Crokite'] * (($Crokite * 100) * 1.05),
        'Compressed_Crystalline_Crokite' => $post['Compressed_Crystalline_Crokite'] * (($Crokite * 100) * 1.10),
        'Compressed_Bistot' => $post['Compressed_Bistot'] * ($Bistot * 100),
        'Compressed_Triclinic_Bistot' => $post['Compressed_Triclinic_Bistot'] * (($Bistot * 100) * 1.05),
        'Compressed_Monoclinic_Bistot' => $post['Compressed_Monoclinic_Bistot'] * (($Bistot * 100) * 1.10),
        'Compressed_Arkonor' => $post['Compressed_Arkonor'] * ($Arkonor * 100),
        'Compressed_Crimson_Arkonor' => $post['Compressed_Crimson_Arkonor'] * (($Arkonor * 100) * 1.05),
        'Compressed_Prime_Arkonor' => $post['Compressed_Prime_Arkonor'] * (($Arkonor * 100) * 1.10),
        'Compressed_Mercoxit' => $post['Compressed_Mercoxit'] * ($Mercoxit * 100),
        'Compressed_Magma_Mercoxit' => $post['Compressed_Magma_Mercoxit'] * (($Mercoxit * 100) * 1.05),
        'Compressed_Vitreous_Mercoxit' => $post['Compressed_Vitreous_Mercoxit'] * (($Mercoxit * 100) * 1.10),
    );
    
    //Add the contract value up from the ore
    foreach($compOreValue as $value) {
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
   $compOreContents = array(
        'ContractNum' => (integer)$contractNum,
        'QuoteTime' => (string)$update,
        'Compressed_Veldspar' => (integer)$post['Compressed_Veldspar'],
        'Compressed_Concentrated_Veldspar' => (integer)$post['Compressed_Concentrated_Veldspar'],
        'Compressed_Dense_Veldspar' => (integer)$post['Compressed_Dense_Veldspar'],
        'Compressed_Scordite' => (integer)$post['Compressed_Scordite'],
        'Compressed_Condensed_Scordite' => (integer)$post['Compressed_Condensed_Scordite'],
        'Compressed_Massive_Scordite' => (integer)$post['Compressed_Massive_Scordite'],
        'Compressed_Pyroxeres' => (integer)$post['Compressed_Pyroxeres'],
        'Compressed_Solid_Pyroxeres' => (integer)$post['Compressed_Solid_Pyroxeres'],
        'Compressed_Viscous_Pyroxeres' => (integer)$post['Compressed_Viscous_Pyroxeres'],
        'Compressed_Plagioclase' => (integer)$post['Compressed_Plagioclase'],
        'Compressed_Azure_Plagioclase' => (integer)$post['Compressed_Azure_Plagioclase'],
        'Compressed_Rich_Plagioclase' => (integer)$post['Compressed_Rich_Plagioclase'],
        'Compressed_Omber' => (integer)$post['Compressed_Omber'],
        'Compressed_Silvery_Omber' => (integer)$post['Compressed_Silvery_Omber'],
        'Compressed_Golden_Omber' => (integer)$post['Compressed_Golden_Omber'],
        'Compressed_Kernite' => (integer)$post['Compressed_Kernite'],
        'Compressed_Luminous_Kernite' => (integer)$post['Compressed_Luminous_Kernite'],
        'Compressed_Fiery_Kernite' => (integer)$post['Compressed_Fiery_Kernite'],
        'Compressed_Jaspet' => (integer)$post['Compressed_Jaspet'],
        'Compressed_Pure_Jaspet' => (integer)$post['Compressed_Pure_Jaspet'],
        'Compressed_Pristine_Jaspet' => (integer)$post['Compressed_Pristine_Jaspet'],
        'Compressed_Hemorphite' => (integer)$post['Compressed_Hemorphite'],
        'Compressed_Vivid_Hemorphite' => (integer)$post['Compressed_Vivid_Hemorphite'],
        'Compressed_Radiant_Hemorphite' => (integer)$post['Compressed_Radiant_Hemorphite'],
        'Compressed_Hedbergite' => (integer)$post['Compressed_Hedbergite'],
        'Compressed_Vitric_Hedbergite' => (integer)$post['Compressed_Vitric_Hedbergite'],
        'Compressed_Glazed_Hedbergite' => (integer)$post['Compressed_Glazed_Hedbergite'],
        'Compressed_Gneiss' => (integer)$post['Compressed_Gneiss'],
        'Compressed_Iridescent_Gneiss' => (integer)$post['Compressed_Iridescent_Gneiss'],
        'Compressed_Prismatic_Gneiss' => (integer)$post['Compressed_Prismatic_Gneiss'],
        'Compressed_Dark_Ochre' => (integer)$post['Compressed_Dark_Ochre'],
        'Compressed_Onyx_Ochre' => (integer)$post['Compressed_Onyx_Ochre'],
        'Compressed_Obsidian_Ochre' => (integer)$post['Compressed_Obsidian_Ochre'],
        'Compressed_Spodumain' => (integer)$post['Compressed_Spodumain'],
        'Compressed_Bright_Spodumain' => (integer)$post['Compressed_Bright_Spodumain'],
        'Compressed_Gleaming_Spodumain' => (integer)$post['Compressed_Gleaming_Spodumain'],
        'Compressed_Crokite' => (integer)$post['Compressed_Crokite'],
        'Compressed_Sharp_Crokite' => (integer)$post['Compressed_Sharp_Crokite'],
        'Compressed_Crystalline_Crokite' => (integer)$post['Compressed_Crystalline_Crokite'],
        'Compressed_Bistot' => (integer)$post['Compressed_Bistot'],
        'Compressed_Triclinic_Bistot' => (integer)$post['Compressed_Triclinic_Bistot'],
        'Compressed_Monoclinic_Bistot' => (integer)$post['Compressed_Monoclinic_Bistot'],
        'Compressed_Arkonor' => (integer)$post['Compressed_Arkonor'],
        'Compressed_Crimson_Arkonor' => (integer)$post['Compressed_Crimson_Arkonor'],
        'Compressed_Prime_Arkonor' => (integer)$post['Compressed_Prime_Arkonor'],
        'Compressed_Mercoxit' => (integer)$post['Compressed_Mercoxit'],
        'Compressed_Magma_Mercoxit' => (integer)$post['Compressed_Magma_Mercoxit'],
        'Compressed_Vitreous_Mercoxit' => (integer)$post['Compressed_Vitreous_Mercoxit']
    );
   
   
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        'ContractNum' => $contractNum,
        'ContractType' => 'CompOre',
        'Corporation' => $corporation,
        'QuoteTime' =>  $update,
        'Value' => $contractValue,
        'AllianceTax' => $allianceTax,
        'CorpTax' => $corpTax        
    );
   
   $db->insert('CompOreContractContents', $compOreContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
   DBClose($db);
   
   return $contractReturn;
}

?>