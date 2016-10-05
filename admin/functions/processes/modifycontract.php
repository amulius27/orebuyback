<?php
    require_once __DIR__.'/../../functions/registry.php';

    //Get the input arrays
    $contracts = filter_input(INPUT_POST, "ContractNumber", FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
    $corporations = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $amounts = filter_input(INPUT_POST, "ContractValue", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    //Open the database connection
    $db = DBOpen();
    //Set a variable to keep all of the post arrays in sync
    $i = 0;
    //Modify each contract's data as necessary
    foreach($contracts as $contract) {
        $current = $db->fetchRow('SELECT * FROM Contracts WHERE ContractNum= :number', array('number' => $contract));
        //If the values in the current entry in the database are different than the POST values, then change the contracts
        if(($current['Corporation'] != $corporations[$i]) OR ($current['Value'] != $amounts[$i])) {
           $corporations[$i] = str_replace('+', ' ', $corporations[$i]);
           $db->update('Contracts', array('ContractNum' => $contract), array('Corporation' => $corporations[$i], 'Value' => $amounts[$i])); 
        }
        
        //Increment our value to keep the contracts in sync
        $i++;
    }
    //Close the database connection
    DBClose($db);
    //Return to the Modify Contracts page
    $location = 'http://' . $_SERVER['HTTP_HOST'];
    $location = $location . dirname($_SERVER['PHP_SELF']) . '/../../modifycontracts.php';
    header("Location: $location");
?>