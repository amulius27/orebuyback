<?php
    
function PrintContractListAdminDashboard() {
    $db = DBOpen();
    //Get the list of contracts from the database
    $contracts = $db->fetchRowMany('SELECT * FROM Contracts WHERE Paid= :paid', array('paid' => 0));
    
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
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'PiContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM PiContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'Ice') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'IceContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM IceContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'CompOre') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'CompOreContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM CompOreContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'Minerals') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'MineralsContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM MineralsContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'IceProduct') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'IceProductContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM IceProductContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'PiT1') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'PiT1Contractcontents'));
                $contents = $db->fetchRow('SELECT * FROM PiT1ContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'PiT2') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'PiT2Contractcontents'));
                $contents = $db->fetchRow('SELECT * FROM PiT2ContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'PiT3') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'PiT3Contractcontents'));
                $contents = $db->fetchRow('SELECT * FROM PiT3ContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'PiT4') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'PiT4Contractcontents'));
                $contents = $db->fetchRow('SELECT * FROM PiT4ContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'Fuel') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'FuelContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM FuelContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            if($contractType == 'Salvage') {
                $headers = $db->fetchColumnMany('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMSN WHERE TABLE_NAME= :table', array('table' => 'SalvageContractcontents'));
                $contents = $db->fetchRow('SELECT * FROM SalvageContractContents WHERE ContractNum= :contract', array('contract' => $contractuNumber));
            }
            $size = sizeof($headers);
            
            printf("<tr>");
            printf("<td>" . $contractNumber . "</td>");
            printf("<td>" . $contractType . "</td>");
            printf("<td>" . $contractCorporation . "</td>");
            printf("<td>" . $contractValue . "</td>");
            printf("<td><input type=\"radio\" class=\"form-control\" name=\"ContractNumber\" value=\"" . $contractNumber . "\"</td>");
            printf("<td><input type=\"submit\" value=\"Process\"></td>");
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
                    printf($contents[$headers[$i]]);
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


