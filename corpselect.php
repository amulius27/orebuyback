<?php

session_start();

$corpTemp = $_REQUEST["corp"];
$_SESSION["corporation"] = $corpTemp;

echo "Corp Set";

?>