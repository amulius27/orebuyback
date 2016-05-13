<?php
/*if(!defined('indexes')) {
        die('Direct access not permitted');
    }*/
mysqli_report(MYSQLI_REPORT_ALL);
/* Connect to Database */
try {

    
    function db_connect() {
        static $connection;
        
        if (!isset($connection)) {
            $config = parse_ini_file('config.ini');
            $connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['dbname']);
        }

        
        if ($connection === false) {
            return mysqli_connect_error();
        }

        return $connection;
    }

    
    function db_error() {
        $connection = db_connect();
        return mysqli_error($connection);
    }

    
    function db_query($query) {
        $connection = db_connect();
        $result = mysqli_query($connection,$query);
        return $result;
    }

    
    function db_select($query) {
        $rows = array();
        $result = db_query($query);
        
        if($result === false) {
            return false;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

	//Update timestamp
	$update = db_select("SELECT `update_time` FROM `item_prices` WHERE itemid=34");
	
//Ice
//Tritanium
$Tritanium = db_select("SELECT `price` FROM `item_prices` WHERE itemid=34");
if($Tritanium === false) {
    $error = db_error();
}
//Pyerite
$Pyerite = db_select("SELECT `price` FROM `item_prices` WHERE itemid=35");
if($Pyerite === false) {
    $error = db_error();
}
//Mexallon
$Mexallon = db_select("SELECT `price` FROM `item_prices` WHERE itemid=36");
if($Mexallon === false) {
    $error = db_error();
}
//Nocxium
$Nocxium = db_select("SELECT `price` FROM `item_prices` WHERE itemid=38");
if($Nocxium === false) {
    $error = db_error();
}
//Isogen
$Isogen = db_select("SELECT `price` FROM `item_prices` WHERE itemid=37");
if($Isogen === false) {
    $error = db_error();
}
//Megacyte
$Megacyte = db_select("SELECT `price` FROM `item_prices` WHERE itemid=40");
if($Megacyte === false) {
    $error = db_error();
}
//Zydrine
$Zydrine = db_select("SELECT `price` FROM `item_prices` WHERE itemid=39");
if($Zydrine === false) {
    $error = db_error();
}
//Morphite
$Morphite = db_select("SELECT `price` FROM `item_prices` WHERE itemid=11399");
if($Morphite === false) {
    $error = db_error();
}

}
catch (Exception $e) {
        echo $e;
    }

	//Calculate Corp Price
$string=implode(".",$Tritanium[0]); $tritanium = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Pyerite[0]); $pyerite = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Mexallon[0]); $mexallon = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Nocxium[0]); $nocxium = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Isogen[0]); $isogen = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Megacyte[0]); $megacyte = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Zydrine[0]); $zydrine = number_format($string*0.875 , 2, ".", ""); //Tritanium
$string=implode(".",$Morphite[0]); $morphite = number_format($string*0.875 , 2, ".", ""); //Tritanium

$Veldspar = number_format(($tritanium*415)/100*0.8*0.875 , 2, ".", "");
$Scordite = number_format(($tritanium*346+$pyerite*173)/100*0.8*0.875 , 2, ".", "");
$Pyroxeres = number_format(($tritanium*351+$pyerite*25+$mexallon*50+$nocxium*5)/100*0.8*0.875 , 2, ".", "");
$Plagioclase = number_format(($tritanium*107+$pyerite*213+$mexallon*107)/100*0.8*0.875 , 2, ".", "");
$Omber = number_format(($tritanium*800+$pyerite*100+$isogen*85)/100*0.8*0.875 , 2, ".", "");
$Kernite = number_format(($tritanium*134+$mexallon*267+$isogen*134)/100*0.8*0.875 , 2, ".", "");
$Jaspet = number_format(($mexallon*350+$nocxium*75+$zydrine*8)/100*0.8*0.875 , 2, ".", "");
$Hemorphite = number_format(($tritanium*2200+$isogen*100+$nocxium*120+$zydrine*15)/100*0.8*0.875 , 2, ".", "");
$Hedbergite = number_format(($pyerite*1000+$isogen*200+$nocxium*100+$zydrine*19)/100*0.8*0.875 , 2, ".", "");
$Gneiss = number_format(($pyerite*2200+$mexallon*2400+$isogen*300)/100*0.8*0.875 , 2, ".", "");
$Dark_Ochre = number_format(($tritanium*10000+$isogen*1600+$nocxium*120)/100*0.8*0.875 , 2, ".", "");
$Spodumain = number_format(($tritanium*56000+$pyerite*12050+$mexallon*2100+$isogen*450)/100*0.8*0.875 , 2, ".", "");
$Crokite = number_format(($tritanium*21000+$nocxium*760+$zydrine*135)/100*0.8*0.875 , 2, ".", "");
$Bistot = number_format(($pyerite*12000+$zydrine*450+$megacyte*100)/100*0.8*0.875 , 2, ".", "");
$Arkonor = number_format(($tritanium*22000+$mexallon*2500+$megacyte*320)/100*0.8*0.875 , 2, ".", "");
$Mercoxit = number_format(($morphite*300)/100*0.8*0.875 , 2, ".", "");

$Veldspar_comp = number_format(($tritanium*415)*0.8*0.875 , 2, ".", "");
$Scordite_comp = number_format(($tritanium*346+$pyerite*173)*0.8*0.875 , 2, ".", "");
$Pyroxeres_comp = number_format(($tritanium*351+$pyerite*25+$mexallon*50+$nocxium*5)*0.8*0.875 , 2, ".", "");
$Plagioclase_comp = number_format(($tritanium*107+$pyerite*213+$mexallon*107)*0.8*0.875 , 2, ".", "");
$Omber_comp = number_format(($tritanium*800+$pyerite*100+$isogen*85)*0.8*0.875 , 2, ".", "");
$Kernite_comp = number_format(($tritanium*134+$mexallon*267+$isogen*134)*0.8*0.875 , 2, ".", "");
$Jaspet_comp = number_format(($mexallon*350+$nocxium*75+$zydrine*8)*0.8*0.875 , 2, ".", "");
$Hemorphite_comp = number_format(($tritanium*2200+$isogen*100+$nocxium*120+$zydrine*15)*0.8*0.875 , 2, ".", "");
$Hedbergite_comp = number_format(($pyerite*1000+$isogen*200+$nocxium*100+$zydrine*19)*0.8*0.875 , 2, ".", "");
$Gneiss_comp = number_format(($pyerite*2200+$mexallon*2400+$isogen*300)*0.8*0.875 , 2, ".", "");
$Dark_Ochre_comp = number_format(($tritanium*10000+$isogen*1600+$nocxium*120)*0.8*0.875 , 2, ".", "");
$Spodumain_comp = number_format(($tritanium*56000+$pyerite*12050+$mexallon*2100+$isogen*450)*0.8*0.875 , 2, ".", "");
$Crokite_comp = number_format(($tritanium*21000+$nocxium*760+$zydrine*135)*0.8*0.875 , 2, ".", "");
$Bistot_comp = number_format(($pyerite*12000+$zydrine*450+$megacyte*100)*0.8*0.875 , 2, ".", "");
$Arkonor_comp = number_format(($tritanium*22000+$mexallon*2500+$megacyte*320)*0.8*0.875 , 2, ".", "");
$Mercoxit_comp = number_format(($morphite*300)*0.8*0.875 , 2, ".", "");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    var tritanium = <?= $tritanium ?>;
    var pyerite = <?= $pyerite ?>;
    var mexallon = <?= $mexallon ?>;
    var nocxium = <?= $nocxium ?>;
    var isogen = <?= $isogen ?>;
    var megacyte = <?= $megacyte ?>;
    var zydrine = <?= $zydrine ?>;
    var morphite = <?= $morphite ?>;
</script>

<script src="webroot/js/min_cal.js"></script>

<script>
	var veldspar = <?= $Veldspar ?>;
	var scordite = <?= $Scordite ?>;
	var pyroxeres = <?= $Pyroxeres ?>;
	var plagioclase = <?= $Plagioclase ?>;
	var omber = <?= $Omber ?>;
	var kernite = <?= $Kernite ?>;
	var jaspet = <?= $Jaspet ?>;
	var hemorphite = <?= $Hemorphite ?>;
	var hedbergite = <?= $Hedbergite ?>;	
	var gneiss = <?= $Gneiss ?>;
	var dark_ochre = <?= $Dark_Ochre ?>;
	var spodumain = <?= $Spodumain ?>;
	var crokite = <?= $Crokite ?>;
	var bistot = <?= $Bistot ?>;
	var arkonor = <?= $Arkonor ?>;
	var mercoxit = <?= $Mercoxit ?>;
	
	var veldspar_comp = <?= $Veldspar_comp ?>;
	var scordite_comp = <?= $Scordite_comp ?>;
	var pyroxeres_comp = <?= $Pyroxeres_comp ?>;
	var plagioclase_comp = <?= $Plagioclase_comp ?>;
	var omber_comp = <?= $Omber_comp ?>;
	var kernite_comp = <?= $Kernite_comp ?>;
	var jaspet_comp = <?= $Jaspet_comp ?>;
	var hemorphite_comp = <?= $Hemorphite_comp ?>;
	var hedbergite_comp = <?= $Hedbergite_comp ?>;	
	var gneiss_comp = <?= $Gneiss_comp ?>;
	var dark_ochre_comp = <?= $Dark_Ochre_comp ?>;
	var spodumain_comp = <?= $Spodumain_comp ?>;
	var crokite_comp = <?= $Crokite_comp ?>;
	var bistot_comp = <?= $Bistot_comp ?>;
	var arkonor_comp = <?= $Arkonor_comp ?>;
	var mercoxit_comp = <?= $Mercoxit_comp ?>;
</script>

<script src="webroot/js/ore_cal.js"></script>
<script src="webroot/js/ore_comp_cal.js"></script>
