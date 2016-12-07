<?php

//Start the session if needed
$session = new Custom\Sessions\sessions();
//If the database session isn't available then use the old way
if(!$session) {
    session_start();
}

$corpTemp = $_REQUEST["corp"];
$_SESSION["corporation"] = $corpTemp;
if(isset($_SESSION["corporation"])) {
    echo "Corp Set to " . $_SESSION["corporation"];
} else {
    $_SESSION["corporation"] = 'None';
    echo "Corp Not Set";
}
//Close the write session
session_write_close();

?>