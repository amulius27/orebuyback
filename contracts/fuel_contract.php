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
    if(isset($_POST["Amarr_Fuel_Block"])) {
        $Amarr_Fuel_Block = filter_input(INPUT_POST, "Amarr_Fuel_Block", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Amarr_Fuel_Block = 0;
    }
    if(isset($_POST["Caldari_Fuel_Block"])) {
        $Caldari_Fuel_Block = filter_input(INPUT_POST, "Caldari_Fuel_Block", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Caldari_Fuel_Block = 0;
    }
    if(isset($_POST["Gallente_Fuel_Block"])) {
        $Gallente_Fuel_Block = filter_input(INPUT_POST, "Gallente_Fuel_Block", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Gallente_Fuel_Block = 0;
    }
    if(isset($_POST["Minmatar_Fuel_Block"])) {
        $Minmatar_Fuel_Block = filter_input(INPUT_POST, "Minmatar_Fuel_Block", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Minmatar_Fuel_Block = 0;
    }
    
    $post = array(
        'Amarr_Fuel_Block' => $Amarr_Fuel_Block,
        'Caldari_Fuel_Block' => $Caldari_Fuel_Block,
        'Gallente_Fuel_Block' => $Gallente_Fuel_Block,
        'Minmatar_Fuel_Block' => $Minmatar_Fuel_Block
    );
    
    $contract = FuelContractValue($contractTime, $corporation, $post);
    
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
                    PrintContractContents($contract["Number"], 'FuelContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    