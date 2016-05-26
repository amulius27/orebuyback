<?php

function PrintContractListOreExpandable($headers, $contents) {
    //Get the size of the contract header contents
    $size = sizeof($headers);
    $oreContent = array(
        "Veldspar" => $contents["Veldspar"],
        "Concentrated_Veldspar" => $contents["Concentrated_Veldspar"],
        "Dense_Veldspar" => $contents["Dense_Veldspar"],
        "Scordite" => $contents["Scordite"],
        "Condensed_Scordite" => $contents["Condensed_Scordite"],
        "Massive_Scordite" => $contents["Massive_Scordite"],
        "Pyroxeres" => $contents["Pyroxeres"],
        "Solid_Pyroxeres" => $contents["Solid_Pyroxeres"],
        "Viscous_Pyroxers" => $contents["Viscous_Pyroxeres"],
        "Plagioclase" => $contents["Plagioclase"],
        "Azure_Plagioclase" => $contents["Azure_Plagioclase"],
        "Rich_Plagioclase" => $contents["Rich_Plagioclase"],
        "Omber" => $contents["Omber"],
        "Silvery_Omber" => $contents["Silvery_Omber"],
        "Golden_Omber" => $contents["Golden_Omber"],
        "Kernite" => $contents["Kernite"],
        "Luminous_Kernite" => $contents["Luminous_Kernite"],
        "Fiery_Kernite" => $contents["Fiery_Kernite"],
        "Jaspet" => $contents["Jaspet"],
        "Pure_Jaspet" => $contents["Pure_Jaspet"],
        "Pristine_Jaspet" => $contents["Pristine_Jaspet"],
        "Hemorphite" => $contents["Hemorphite"],
        "Vivid_Hemorphite" => $contents["Vivid_Hemorphite"],
        "Radiant_Hemorphite" => $contents["Radiant_Hemorphite"],
        "Hedbergite" => $contents["Hedbergite"],
        "Vitric_Hedbergite" => $contents["Vitric_Hedbergite"],
        "Glazed_Hedbergite" => $contents["Glazed_Hedbergite"],
        "Gneiss" => $contents["Gneiss"],
        "Iridescent_Gneiss" => $contents["Iridescent_Gneiss"],
        "Prismatic_Gneiss" => $contents["Prismatic_Gneiss"],
        "Dark_Ochre" => $contents["Dark Ochre"],
        "Onyx_Ochre" => $contents["Onyx_Ochre"],
        "Obsidian_Ochre" => $contents["Obisidian_Ochre"],
        "Spodumain" => $contents["Spodumain"],
        "Bright_Spodumain" => $contents["Bright_Spodumain"],
        "Gleaming_Spodumain" => $contents["Gleaming_Spodumain"],
        "Crokite" => $contents["Crokite"],
        "Sharp_Crokite" => $contents["Sharp_Crokite"],
        "Crystalline_Crokite" => $contents["Crystalline_Crokite"],
        "Bistot" => $contents["Bistot"],
        "Triclinic_Bistot" => $contents["Triclinic_Bistot"],
        "Monoclinic_Bistot" => $contents["Monoclinic_Bistot"],
        "Arkonor" => $contents["Arkonor"],
        "Crimson_Arkonor" => $contents["Crimson_Arkonor"],
        "Prime_Arkonor" => $contents["Prime_Arkonor"],
        "Mercoxit" => $contents["Mercoxit"],
        "Magma_Mercoxit" => $contents["Magma_Mercoxit"],
        "Vitreous_Mercoxit" => $contents["Vitreous_Mercoxit"],
    );
    
    
    for($i = 2; $i < $size - 1; $i++) {
        $header[$i] = str_replace('_', ' ', $headers[$i]);
        printf("<li>");
        printf($header[$i]);
        printf(": ");
        var_dump($contents[$headers[$i]]);
        printf("</li>"); 
    }
}

?>