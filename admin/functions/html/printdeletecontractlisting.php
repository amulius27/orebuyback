<?php
    
function PrintDeleteContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid AND Deleted= :deleted', array('paid' => 0, 'deleted' => 0));
    
    if( $db->getRowCount() > 0 ) {
        foreach($contracts as $contract) {
            $contractNumber = $contract['ContractNum'];
            $contractType = $contract['ContractType'];
            $contractCorporation = $contract['Corporation'];
            $contractValue = $contract['Value'];
            if($contractType == 'Ore') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'OreContractContents'));
                $contents = $db->fetchRow('SELECT * FROM OreContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'Pi') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiContractContents'));
                $contents = $db->fetchRow('SELECT * FROM PiContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'Ice') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'IceContractContents'));
                $contents = $db->fetchRow('SELECT * FROM IceContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'IceProd') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'IceProdContractContents'));
                $contents = $db->fetchRow('SELECT * FROM IceProdContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'CompOre') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'CompOreContractContents'));
                $contents = $db->fetchRow('SELECT * FROM CompOreContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'Mineral') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'MineralContractContents'));
                $contents = $db->fetchRow('SELECT * FROM MineralContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'PiT1') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT1ContractContents'));
                $contents = $db->fetchRow('SELECT * FROM PiT1ContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'PiT2') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT2ContractContents'));
                $contents = $db->fetchRow('SELECT * FROM PiT2ContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'PiT3') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT3ContractContents'));
                $contents = $db->fetchRow('SELECT * FROM PiT3ContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'PiT4') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'PiT4ContractContents'));
                $contents = $db->fetchRow('SELECT * FROM PiT4ContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'Fuel') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'FuelContractContents'));
                $contents = $db->fetchRow('SELECT * FROM FuelContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'Salvage') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'SalvageContractContents'));
                $contents = $db->fetchRow('SELECT * FROM SalvageContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            if($contractType == 'WGas') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= :table', array('table' => 'WGasContractContents'));
                $contents = $db->fetchRow('SELECT * FROM WGasContractContents WHERE ContractNum= :contract', array('contract' => $contractNumber));
            }
            $size = sizeof($headers);
            
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contractType . "</td>");
            printf("<td>" . $contractCorporation . "</td>");
            printf("<td>" . $contractValue . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Delete\"></td>");
            printf("</tr>");
            
            //Print the expandable contents for each row
            printf("<tr>");
            printf("<td>");
            printf("<h4>Contract Details</h4>");
            printf("<ul class=\"col-md-offset-1\">");
            for($i = 2; $i < $size - 1; $i++) {
                if($contents[$headers[$i]] > 0){
                    $header[$i] = str_replace('_', ' ', $headers[$i]);
                    printf("<li>");
                    printf($header[$i]);
                    printf(": ");
                    printf(number_format($contents[$headers[$i]], 2, '.', ','));
                    printf("</li>"); 
                }
            }
            printf("</ul>");
            printf("</td>");
            printf("</tr>");
            
        }    
    }
    
    DBClose($db);
}

?>
