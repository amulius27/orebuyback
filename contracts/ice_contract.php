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
    if(isset($_POST["Clear_Icicle"])) {
        $Clear_Icicle = filter_input(INPUT_POST, "Clear_Icicle", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Clear_Icicle = 0;
    }
    if(isset($_POST["Enriched_Clear_Icicle"])) {
        $Enriched_Clear_Icicle = filter_input(INPUT_POST, "Enriched_Clear_Icicle", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Enriched_Clear_Icicle = 0;
    }
    if(isset($_POST["Glacial_Mass"])) {
        $Glacial_Mass = filter_input(INPUT_POST, "Glacial_Mass", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Glacial_Mass = 0;
    }
    if(isset($_POST["Smooth_Glacial_Mass"])) {
        $Smooth_Glacial_Mass = filter_input(INPUT_POST, "Smooth_Glacial_Mass", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Smooth_Glacial_Mass = 0;
    }
    if(isset($_POST["White_Glaze"])) {
        $White_Glaze = filter_input(INPUT_POST, "White_Glaze", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $White_Glaze = 0;
    }
    if(isset($_POST["Pristine_White_Glaze"])) {
        $Pristine_White_Glaze = filter_input(INPUT_POST, "Pristine_White_Glaze", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Pristine_White_Glaze = 0;
    }
    if(isset($_POST["Blue_Ice"])) {
        $Blue_Ice = filter_input(INPUT_POST, "Blue_Ice", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Blue_Ice = 0;
    }
    if(isset($_POST["Thick_Blue_Ice"])) {
        $Thick_Blue_Ice = filter_input(INPUT_POST, "Thick_Blue_Ice", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Thick_Blue_Ice = 0;
    }
    if(isset($_POST["Glare_Crust"])) {
        $Glare_Crust = filter_input(INPUT_POST, "Glare_Crust", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Glare_Crust = 0;
    }
    if(isset($_POST["Dark_Glitter"])) {
        $Dark_Glitter = filter_input(INPUT_POST, "Dark_Glitter", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Dark_Glitter = 0;
    }
    if(isset($_POST["Gelidus"])) {
        $Gelidus = filter_input(INPUT_POST, "Gelidus", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Gelidus = 0;
    }
    if(isset($_POST["Krystallos"])) {
        $Krystallos = filter_input(INPUT_POST, "Krystallos", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Krystallos = 0;
    }
    
    $post = array(
        'Clear_Icicle' => $Clear_Icicle,
        'Enriched_Clear_Icicle' => $Enriched_Clear_Icicle,
        'Glacial_Mass' => $Glacial_Mass,
        'Smooth_Glacial_Mass' => $Smooth_Glacial_Mass,
        'White_Glaze' => $White_Glaze,
        'Pristine_White_Glaze' => $Pristine_White_Glaze,
        'Blue_Ice' => $Blue_Ice,
        'Thick_Blue_Ice' => $Thick_Blue_Ice,
        'Glare_Crust' => $Glare_Crust,
        'Dark_Glitter' => $Dark_Glitter,
        'Gelidus' => $Gelidus,
        'Krystallos' => $Krystallos
    );
    
    $contract= IceContractValue($contractTime, $corporation, $post);
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
                PrintContractContents($contract["Number"], 'IceContractContents');
            ?>
        </div>
    </div>    
</body>
</html>
    