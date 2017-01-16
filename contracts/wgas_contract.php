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
    if(isset($_POST["C50"])) {
        $C50_Gas = filter_input(INPUT_POST, "C50", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C50_Gas = 0;
    }
    if(isset($_POST["C60"])) {
        $C60_Gas = filter_input(INPUT_POST, "C60", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C60_Gas = 0;
    }
    if(isset($_POST["C70"])) {
        $C70_Gas = filter_input(INPUT_POST, "C70", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C70_Gas = 0;
    }
    if(isset($_POST["C72"])) {
        $C72_Gas = filter_input(INPUT_POST, "C72", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C72_Gas = 0;
    }
    if(isset($_POST["C84"])) {
        $C84_Gas = filter_input(INPUT_POST, "C84", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C84_Gas = 0;
    }
    if(isset($_POST["C28"])) {
        $C28_Gas = filter_input(INPUT_POST, "C28", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C28_Gas = 0;
    }
    if(isset($_POST["C32"])) {
        $C32_Gas = filter_input(INPUT_POST, "C32", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C32_Gas = 0;
    }
    if(isset($_POST["C320"])) {
        $C320_Gas = filter_input(INPUT_POST, "C320", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C320_Gas = 0;
    }
    if(isset($_POST["C540"])) {
        $C540_Gas = filter_input(INPUT_POST, "C540", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $C540_Gas = 0;
    }
    
    $post = array(
        'C50_Gas' => $C50_Gas,
        'C60_Gas' => $C60_Gas,
        'C70_Gas' => $C70_Gas,
        'C72_Gas' => $C72_Gas,
        'C84_Gas' => $C84_Gas,
        'C28_Gas' => $C28_Gas,
        'C32_Gas' => $C32_Gas,
        'C320_Gas' => $C320_Gas,
        'C540_Gas' => $C540_Gas
    );
    
    $contract = WGasContractValue($contractTime, $corporation, $post);
    PrintContractHTMLHeader('/../images/bgs/EVE_asteroid_ice.jpg');
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
                    PrintContractContents($contract["Number"], 'WGasContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    