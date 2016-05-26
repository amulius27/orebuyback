<?php

function FuelContractValue($db, $update, $corporation) {
    //Get all of the values from the contract update time
   
    //Amarr Fuel
    $Amarr_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4247, 'time' => $update));
    //Caldari Fuel
    $Caldari_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4051, 'time' => $update));
    //Gallente Fuel
    $Gallente_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4312, 'time' => $update));
    //Minmatar Fuel
    $Minmatar_Fuel = $db->fetchColumn('SELECT Price FROM IceProductPrices WHERE ItemId= :id AND Time= :time', array('id' => 4246, 'time' => $update));
    
//Get the last contract number
    $lastContractNum = $db->fetchColumn('SELECT MAX(Contract_Num) FROM Contracts');
    //Set the current contract number
    $contractNum = $lastContractNum + 1;
    //Set the time for the contract being inserted into the database
    $now = date("Y-m-d H:i:s");
    //Set the initial contract value to 0.00 before adding everything up
    $contractValue = 0.00;
    //Create the ore value array for summing later
    $fuelBlockValue = array(
        "Amarr_Fuel_Block" => $_POST["Amarr_Fuel_Block"] * $Amarr_Fuel,
        "Caldari_Fuel_Block" => $_POST["Caldari_Fuel_Block"] * $Caldari_Fuel,
        "Gallente_Fuel_Block" => $_POST["Gallente_Fuel_Block"] * $Gallente_Fuel,
        "Minmatar_Fuel_Block" => $_POST["Minmatar_Fuel_Block"] * $Minmatar_Fuel,
    );
    
    //Add the contract value up from the ore
    foreach($fuelBlockValue as $value) {
       $contractValue = $contractValue + $value;
    }
   
   //Set the ore contents array up to be insert into the OreContractContents database
   $oreContents = array(
        "ContractNum" => $contractNum,
        "ContractTime" =>  $now,
        "QuoteTime" => $update,
        "Amarr_Fuel_Block" => $_POST["Amarr_Fuel_Block"],
        "Caldari_Fuel_Block" => $_POST["Caldari_Fuel_Block"],
        "Gallente_Fuel_Block" => $_POST["Gallente_Fuel_Block"],
        "Minmatar_Fuel_Block" => $_POST["Minmatar_Fuel_Block"],
    );
   
    //Create the contract value array to be inserted into the Contracts database
    $contract = array(
        "ContractNum" => $contractNum,
        "ContractType" => "Fuel",
        "Corporation" => $corporation,
        "QuoteTime" =>  $update,
        "Value" => $contractValue,
    );
   
   $db->insert('FuelBlockContractContents', $fuelBlockContents);
   $db->insert('Contracts', $contract);
   
   $contractReturn = array(
       "Value" => $contractValue,
       "Number" => $contractNum,
   );
    
    return $contractReturn;
}

?>