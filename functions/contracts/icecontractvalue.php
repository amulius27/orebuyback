<?php

function IceContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    $Clear_Icicle = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16262, 'time' => $update));
    $Enriched_Clear_Icicle = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17978, 'time' => $update));
    $Glacial_Mass = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16263, 'time' => $update));
    $Smooth_Glacial_Mass = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17977, 'time' => $update));
    $White_Glaze = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16265, 'time' => $update));
    $Pristine_White_Glaze = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17976, 'time' => $update));
    $Blue_Ice = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16264, 'time' => $update));
    $Thick_Blue_Ice = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 17975, 'time' => $update));
    $Glare_Crust = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16266, 'time' => $update));
    $Dark_Glitter = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16267, 'time' => $update));
    $Gelidus = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16268, 'time' => $update));
    $Krystallos = $db->fetchColumn('SELECT Price FROM OrePrices WHERE ItemId= :id AND Time= :time', array('id' => 16269, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(Contract_Num) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $iceValue = array(
        "Clear_Icicle" => $_POST["Clear_Icicle"] * $Clear_Icicle,
        "Enriched_Clear_Icicle" => $_POST["Enriched_Clear_Icicle"] * $Enriched_Clear_Icicle,
        "Glacial_Mass" => $_POST["Glacial_Mass"] * $Glacial_Mass,
        "Smooth_Glacial_Mass" => $_POST["Smooth_Glacial_Mass"] * $Smooth_Glacial_Mass,
        "White_Glaze" => $_POST["White_Glaze"] * $White_Glaze,
        "Pristine_White_Glaze" => $_POST["Pristine_White_Glaze"] * $Pristine_White_Glaze,
        "Blue_Ice" => $_POST["Blue_Ice"] * $Blue_Ice,
        "Thick_Blue_Ice" => $_POST["Thick_Blue_Ice"] * $Thick_Blue_Ice,
        "Glare_Crust" => $_POST["Glare_Crust"] * $Glare_Crust,
        "Dark_Glitter" => $_POST["Dark_Glitter"] * $Dark_Glitter,
        "Gelidus" => $_POST["Gelidus"] * $Gelidus,
        "Krystallos" => $_POST["Krystallos"] * $Krystallos,
    );
    
    //Add the contract value up from the ore
    foreach($iceValue as $value) {
       $contractValue = $contractValue + $value;
    }
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $iceContents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Clear_Icicle" => $_POST["Clear_Icicle"],
        "Enriched_Clear_Icicle" => $_POST["Enriched_Clear_Icicle"],
        "Glacial_Mass" => $_POST["Glacial_Mass"],
        "Smooth_Glacial_Mass" => $_POST["Smooth_Glacial_Mass"],
        "White_Glaze" => $_POST["White_Glaze"],
        "Pristine_White_Glaze" => $_POST["Pristine_White_Glaze"],
        "Blue_Ice" => $_POST["Blue_Ice"],
        "Thick_Blue_Ice" => $_POST["Thick_Blue_Ice"],
        "Glare_Crust" => $_POST["Glare_Crust"],
        "Dark_Glitter" => $_POST["Dark_Glitter"],
        "Gelidus" => $_POST["Gelidus"],
        "Krystallos" => $_POST["Krystallos"],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        "ContractNum" => $contractNum,
        "ContractType" => "Ice",
        "Corporation" => $corporation,
        "QuoteTime" =>  $update,
        "Value" => $contractValue,
    );
   
   $db->insert('IceContractContents', $iceContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>