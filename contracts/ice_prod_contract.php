<?php  
    require_once __DIR__.'/../functions/registry.php';
    
    if(isset($_POST["Quote_Time"])) {
        $contractTime = filter_input(INPUT_POST, "Quote_Time", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $db = DBOpen();
        $contractTime = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 16274));
        DBClose($db);
    }
    if(isset($_POST["Corporation"])) {
        $corporation = filter_input(INPUT_POST, "Corporation", FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $corporation = 'None';
    }
    if(isset($_POST["Helium_Isotopes"])){
        $Helium_Isotopes = filter_input(INPUT_POST, "Helium_Isotopes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Helium_Isotopes = 0;
    }
    if(isset($_POST["Hydrogen_Isotopes"])){
        $Hydrogen_Isotopes = filter_input(INPUT_POST, "Hydrogen_Isotopes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Hydrogen_Isotopes = 0;
    }
    if(isset($_POST["Nitrogen_Isotopes"])){
        $Nitrogen_Isotopes = filter_input(INPUT_POST, "Nitrogen_Isotopes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Nitrogen_Isotopes = 0;
    }
    if(isset($_POST["Oxygen_Isotopes"])){
        $Oxygen_Isotopes = filter_input(INPUT_POST, "Oxygen_Isotopes", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Oxygen_Isotopes = 0;
    }
    if(isset($_POST["Heavy_Water"])){
        $Heavy_Water = filter_input(INPUT_POST, "Heavy_Water", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Heavy_Water = 0;
    }
    if(isset($_POST["Liquid_Ozone"])){
        $Liquid_Ozone = filter_input(INPUT_POST, "Liquid_Ozone", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Liquid_Ozone = 0;
    }
    if(isset($_POST["Strontium_Clathrates"])){
        $Strontium_Clathrates = filter_input(INPUT_POST, "Strontium_Clathrates", FILTER_SANITIZE_NUMBER_INT);
    } else {
        $Strontium_Clathrates = 0;
    }
    
    $post = array(
        'Helium_Isotopes' => $Helium_Isotopes,
        'Hydrogen_Isotopes' => $Hydrogen_Isotopes,
        'Nitrogen_Isotopes' => $Nitrogen_Isotopes,
        'Oxygen_Isotopes' => $Oxygen_Isotopes,
        'Heavy_Water' => $Heavy_Water,
        'Liquid_Ozone' => $Liquid_Ozone,
        'Strontium_Clathrates' => $Strontium_Clathrates
    );
    
    $contract = IceProdContractValue($contractTime, $corporation, $post);
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
                    PrintContractContents($contract["Number"], 'IceProdContractContents');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
    