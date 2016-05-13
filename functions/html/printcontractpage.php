<?php

function PrintContractPage($contractNumber, $contractValue) {
    PrintHeader();
    PrintNavBar();
    
    printf("<body>");
    PrintNavBar();
    printf("<div class=\"central-header\">
            <h1>Warped Intentions Buy Back Program</h1>
            <p></p>
            </div>
            <div class=\"container\">
                <table class=\"table-striped\">
                    <thhead>
                        <th>
                            Contract Information
                        </th>
                    </thhead>
                    <tbody>
                        <tr>
                            <td>Contract Number</td>
                            <td>Contract Value</td>
                            <td>Contract Type</td>
                            <td>Contract Length</td>
                        </tr>
                        <tr>
                            <td>$contractNumber</td>
                            <td>$contractValue</td>
                            <td>Private - Spatial Forces</td>
                            <td>2 weeks</td>
                        </tr>
                    </tbody>
                </table>
            </div>");
    
    PrintFooter();
    
    printf("<!-- Clipboard -->
                <script src=\"js/jquery.cookie.js\"></script>
                <script src=\"js/eve-link.js\"></script>
            </body>
            </html>");
}
