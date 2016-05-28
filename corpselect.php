<?php

$session_name = 'obb_main';
session_name($session_name);
sec_session_start();
session_regenerate_id();


$corpTemp = $_REQUEST["corp"];
$_SESSION["corporation"] = $corpTemp;
if(isset($_SESSION["corporation"])) {
    echo "Corp Set to " . $_SESSION["corporation"];
} else {
    echo "Corp Not Set";
}

?>