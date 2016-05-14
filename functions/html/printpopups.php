<?php

function PrintPopups() {
    printf("<!-- Popups -->
            <div class=\"hide\" id=\"popchar\" style=\"background:white;\">
              <table style='border: 1px solid;'>
                <thead>
                  <tr style='border-bottom: 1px solid;'>
                    <th colspan='3' style='padding-left:2px;' id=\"popchar-name\">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width='64' height='64' background='img/loaderb32.gif' style='padding:2px; background-repeat:no-repeat; background-position:center;' id=\"popchar-image\">&nbsp;</td>
                    <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id=\"popchar-content-1\">&nbsp;</td>
                    <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id=\"popchar-content-2\">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class=\"hide\" id=\"popcorp\" style=\"background:white;\">
              <table style='border: 1px solid;'>
                <thead>
                  <tr style='border-bottom: 1px solid;'>
                    <th colspan='3' style='padding-left:2px;' id=\"popcorp-name\">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width='64' height='64' style='padding:2px; background-repeat:no-repeat; background-position:center;' id=\"popcorp-image\">&nbsp;</td>
                    <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id=\"popcorp-content-1\">&nbsp;</td>
                    <td style='padding-left:5px; padding-right:5px; padding-top:3px; vertical-align:top;' id=\"popcorp-content-2\">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Popups --> ");
}

?>