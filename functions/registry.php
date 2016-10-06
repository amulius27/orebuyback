<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Autoload functionality
require_once __DIR__.'/../vendor/autoload.php';

//Database functionality
require_once __DIR__.'/../functions/database/dbclose.php';
require_once __DIR__.'/../functions/database/dbopen.php';

//HTML functionality
require_once __DIR__.'/../functions/html/printnavbar.php';
require_once __DIR__.'/../functions/html/printnavbarcontracts.php';
require_once __DIR__.'/../functions/html/printfooter.php';
require_once __DIR__.'/../functions/html/printheader.php';
require_once __DIR__.'/../functions/html/printcontractpage.php';
require_once __DIR__.'/../functions/html/printbodytag.php';
require_once __DIR__.'/../functions/html/printtitle.php';
require_once __DIR__.'/../functions/html/printpopups.php';
require_once __DIR__.'/../functions/html/printcorpselect.php';
require_once __DIR__.'/../functions/html/printheaderclosetag.php';
require_once __DIR__.'/../functions/html/printheadercorpselectscript.php';
require_once __DIR__.'/../functions/html/printcloseindexpage.php';
require_once __DIR__.'/../functions/html/printindexpage.php';
require_once __DIR__.'/../functions/html/printinstructions.php';

//Contract Functionality
require_once __DIR__.'/../functions/contracts/comporecontractvalue.php';
require_once __DIR__.'/../functions/contracts/fuelcontractvalue.php';
require_once __DIR__.'/../functions/contracts/icecontractvalue.php';
require_once __DIR__.'/../functions/contracts/iceprodcontractvalue.php';
require_once __DIR__.'/../functions/contracts/mineralcontractvalue.php';
require_once __DIR__.'/../functions/contracts/orecontractvalue.php';
require_once __DIR__.'/../functions/contracts/picontractvalue.php';
require_once __DIR__.'/../functions/contracts/pit1contractvalue.php';
require_once __DIR__.'/../functions/contracts/pit2contractvalue.php';
require_once __DIR__.'/../functions/contracts/pit3contractvalue.php';
require_once __DIR__.'/../functions/contracts/pit4contractvalue.php';
require_once __DIR__.'/../functions/contracts/wgascontractvalue.php';
require_once __DIR__.'/../functions/contracts/printcontractcontents.php';
require_once __DIR__.'/../functions/contracts/printcomporecontractcontents.php';
require_once __DIR__.'/../functions/contracts/printfuelcontractcontents.php';
require_once __DIR__.'/../functions/contracts/printicecontractcontents.php';
require_once __DIR__.'/../functions/contracts/printiceprodcontractcontents.php';
require_once __DIR__.'/../functions/contracts/printmineralcontractcontents.php';
require_once __DIR__.'/../functions/contracts/printorecontractcontents.php';
require_once __DIR__.'/../functions/contracts/printpicontractcontents.php';
require_once __DIR__.'/../functions/contracts/printpit1contractcontents.php';
require_once __DIR__.'/../functions/contracts/printpit2contractcontents.php';
require_once __DIR__.'/../functions/contracts/printpit3contractcontents.php';
require_once __DIR__.'/../functions/contracts/printpit4contractcontents.php';
require_once __DIR__.'/../functions/contracts/wgascontractcontents.php';

$contractLimit = '500m ISK';

?>