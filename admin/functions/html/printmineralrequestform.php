<?php

function PrintMineralRequestForm($corporation) {
    //Get the latest price of the minerals from the database to print in the labels
    $db = DBOpen();
    
    $update = $db->fetchColumn('SELECT MAX(time) FROM MineralPrices WHERE ItemId= :item', array('item' => 34));
    //Tritanium
    $Tritanium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 34, 'time' => $update));
    //Pyerite
    $Pyerite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 35, 'time' => $update));
    //Mexallon
    $Mexallon = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 36, 'time' => $update));
    //Nocxium
    $Nocxium = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 38, 'time' => $update));
    //Isogen
    $Isogen = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 37, 'time' => $update));
    //Megacyte
    $Megacyte = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 40, 'time' => $update));
    //Zydrine
    $Zydrine = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 39, 'time' => $update));
    //Morphite
    $Morphite = $db->fetchColumn('SELECT Price FROM MineralPrices WHERE ItemId= :id AND Time= :time', array('id' => 11399, 'time' => $update));
    
    //Calculate the updated price to reflect markup
    $Tritanium = $Tritanium * 1.01;
    $Pyerite = $Pyerite * 1.01;
    $Mexallon = $Mexallon * 1.01;
    $Isogen = $Isogen * 1.01;
    $Nocxium = $Nocxium * 1.01;
    $Megacyte = $Megacyte * 1.01;
    $Zydrine = $Zydrine * 1.01;
    $Morphite = $Morphite * 1.01;
    
    //Mineral request form for admin dashboard
    printf("<form action=\"functions/processes/corpmineralrequest.php\" method=\"POST\">
            <label>Tritanium: " . $Tritanium . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Tritanium\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Tritanium\" placeholder=\"Units of Tritanium\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Tritanium . "\">
            </div>
            <label>Pyerite: " . $Pyerite . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Pyerite\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Pyerite\" placeholder=\"Units of Pyerite\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Pyerite . "\">
            </div>
            <label>Isogen: " . $Isogen . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Isogen\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Isogen\" placeholder=\"Units of Isogen\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Isogen . "\">
            </div>
            <label>Mexallon: " . $Mexallon . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Mexallon\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Mexallon\" placeholder=\"Units of Mexallon\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Mexallon . "\">
            </div>'ContractNum' => $contractNum
            <label>Nocxium: " . $Nocxium . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Nocxium\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Nocxium\" placeholder=\"Units of Nocxium\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Nocxium . "\">
            </div>
            <label>Zydrine: " . $Zydrine . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Zydrine\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Zydrine\" placeholder=\"Units of Zydrine\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Zydrine . "\">
            </div>
            <label>Megacyte: " . $Megacyte . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Megacyte\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Megacyte\" placeholder=\"Units of Megacyte\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Megacyte . "\">
            </div>
            <label>Morphite: " . $Morphite . " ISK/Unit</label>
            <div class=\"input-group form-control\" id=\"Morphite\" style=\"padding: 0; border: none;\">
                <input type=\"number\" class=\"form-control text-right typeahead\" name=\"Morphite\" placeholder=\"Units of Morphite\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"TritaniumPrice\" value=\"" . $Morphite . "\">
                <input type=\"hidden\" class=\"form-control text-right typeahead\" name=\"Corporation\" value=\"" . $corporation . "\">
            </div>
            <label>Location</label>
            <div class=\"input-group form-control\" id=\"Location\" style=\"padding: 0; border: none;\">
                <input type=\"text\" class=\"form-control text-right typeahead\" name=\"Location\" placeholder\"System Name\">
            </div>
            <br>
            <input class=\"form-control pull-left\" type=\"submit\" value=\"Submit Mineral Request\">
            </form>");
    
    DBClose($db);
}

?>