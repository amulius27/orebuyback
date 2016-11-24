<?php

//Autoloader for includes
require_once __DIR__.'/../../vendor/autoload.php';
//Database Functions
require_once __DIR__.'/../functions/database/dbclose.php';
require_once __DIR__.'/../functions/database/dbopen.php';
//HTML Functions
require_once __DIR__.'/../functions/html/printcontractlisting.php';
require_once __DIR__.'/../functions/html/printcorporationpayoutlist.php';
require_once __DIR__.'/../functions/html/printcorpselect.php';
require_once __DIR__.'/../functions/html/printmodifycontractlisting.php';
require_once __DIR__.'/../functions/html/printdeletecontractlisting.php';
require_once __DIR__.'/../functions/html/printuserdropdown.php';
//System Functions
require_once __DIR__.'/../functions/system/printnavbar.php';
//Statistic Functions
require_once __DIR__.'/../functions/statistics/corpstatistics.php';
//Chart Functions
require_once __DIR__.'/../functions/charts/printdonutchart.php';

?>