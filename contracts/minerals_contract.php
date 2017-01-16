<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = filter_input(INPUT_POST, "Quote_Time", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM OrePrices WHERE ItemId= :item', array('item' => 1230));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Tritanium"])) {
        $Tritanium = filter_input(INPUT_POST, "Tritanium", FILTER_SANITIZE_NUMBER_INT); 
    } else {
        $Tritanium = 0;
    }
    if(isset($_POST["Pyerite"])) {
        $Pyerite = filter_input(INPUT_POST, "Pyerite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pyerite = 0;
    }
    if(isset($_POST["Mexallon"])) {
        $Mexallon = filter_input(INPUT_POST, "Mexallon", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Mexallon = 0;
    }
    if(isset($_POST["Nocxium"])) {
        $Nocxium = filter_input(INPUT_POST, "Nocxium", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Nocxium = 0;
    }
    if(isset($_POST["Isogen"])) {
        $Isogen = filter_input(INPUT_POST, "Isogen", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Isogen = 0;
    }
    if(isset($_POST["Megacyte"])) {
        $Megacyte = filter_input(INPUT_POST, "Megacyte", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Megacyte = 0;
    }
    if(isset($_POST["Zydrine"])) {
        $Zydrine = filter_input(INPUT_POST, "Zydrine", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Zydrine = 0;
    }
    if(isset($_POST["Morphite"])) {
        $Morphite = filter_input(INPUT_POST, "Morphite", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Morphite = 0;
    }
    
    $post = array(
        'Tritanium' => $Tritanium,
        'Pyerite' => $Pyerite,
        'Mexallon' => $Mexallon,
        'Nocxium' => $Nocxium,
        'Isogen' => $Isogen,
        'Megacyte' => $Megacyte,
        'Zydrine' => $Zydrine,
        'Morphite' => $Morphite
    );
    
    $contract= MineralsContractValue($contractTime, $corporation, $post);
    PrintContractHTMLHeader('/../images/bgs/ore_bg_blur.jpg');
    printf("<body>");

    PrintNavBarContracts($corporation);
    PrintTitle();
?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title"><span style="font-family: Arial; color: #FF2A2A;"><strong>Contract Instruction Sheet</strong></span><br></h3>
            </div>
            <div class="panel-body" align="center">
                - The area below displays the details of the contract to make out to Spatial Forcese.<br>
                - The Contract To is whom you make out the contract to.<br>
                - Contract Type should <strong>always</strong> be Item Exchange and Private.<br>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Contract Details</strong><br></h3>
            </div>
            <div class="panel-body">
                <table class="table-bordered table-striped">
                    <tr>
                        <td>Contract To</td>
                        <td>Contract Type</td>
                        <td>Contract Length</td>
                        <td>Contract Value</td>
                    </tr>
                    <tr>
                        <td>Spatial Forces</td>
                        <td>Private</td>
                        <td>2 weeks</td>
                        <td><?php echo number_format($contract["Value"], 2, '.', ','); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><strong>Contract Contents</strong><br></h1>
            </div>
        </div>
            <div class="panel-body">
                <?php 
                    PrintContractContents($contract["Number"], 'MineralContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    