<?php

require_once __DIR__.'/functions/registry.php';

//Start the session if needed
$session = new Custom\Sessions\sessions();
//If the database session isn't available then use the old way
if(!$session) {
    session_start();
}
 
$_SESSION["corporation"] = $_POST['GetCorpTax'];
$headerString = 'Location: index.php?corp=' . $_SESSION["corporation"];
header($headerString);
exit;

?>