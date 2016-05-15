<?php

session_start();


$corpTemp = $_REQUEST["corp"];
$_SESSION["corporation"] = $corpTemp;
if(isset($_SESSION["corporation"])) {
    echo "Corp Set";
} else {
    echo "Corp Not Set";
}

?>