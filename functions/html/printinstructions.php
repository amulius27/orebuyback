<?php

function PrintInstructions($update, $corporation, $total_tax) {
    printf("<div class=\"container\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\" align=\"center\">
                        <h3 class=\"panel-title\"><span style=\"font-family: Arial; color: #FF2A2A;\"><strong>Instruction Sheet</strong></span><br></h3>
                    </div>
                    <div class=\"panel-body\" align=\"center\">
                        - In the Calculator below you can enter the amounts for each Ore that you want to sell.<br>
                        - Once done click on the <strong>Invoice</strong> price to submit the contract.<br>
                        - The contract will be submitted to the database, and contract details will be printed on the next page.<br>
                        <span style=\"font-family: Arial; color: #FF2A2A;\"><strong>- Contract max is 500m ISK at a time, will allow for faster processing of the contracts.</strong></span>
                        <hr>
                        <span style=\"font-family: Arial; color: #8FEF2F;\"><strong>Database was last updated on: $update</strong></span><br>
                        <span style=\"font-family: Arial; color: #8FEF2F;\"><strong>Ore prices are mineral based</strong></span><br>
                        <span style=\"font-family: Arial; color: white;\"<strong>Corporation: </strong> $corporation</span><br>
                        <span style=\"font-family: Arial; color: white;\"<strong>Tax Rate: </strong>  $total_tax %</span><br>
                    </div>
                </div>
            </div>");
}

?>
