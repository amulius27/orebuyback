<?php
    require_once __DIR__.'/../functions/registry.php';
    $contractNum = $_POST[contractNum];
    $contractType = $_POST[contractType];
    
    $db = DBOpen();
    
    if(isset($_POST[characterName])) {
        $characterName = $_POST[characterName];
    } elseif(session_is_registered("username")) {
        $characterName = $_SESSION["username"];
    } else {
        $characterName = " ";
    }
    
    $contractTemp = $db->fetchColum('SELECT MAX(Contract Number) FROM Contracts');
    $contractNumber = $contractTemp + 1;
    
    if($contractType == 'ore') {
        $contractData = array(
            'Contract Number' => $contractNumber,
            'Character Name' => $characterName,
            'Veldspar' => $_POST[veldspar_units],
            'Concentrated Veldspar' => $_POST[veldspar_units_5],
            'Dense Veldspar' => $_POST[vedlspar_units_10],
            'Scordite' => $_POST[scordite_units],
            'Condensed Scordite' => $_POST[scordite_units_5],
            'Massive Scordite' => $_POST[scordite_units_10],
            'Pyroxeres' => $_POST[pyroxeres_units],
            'Solid Pyroxeres' => $_POST[pyroxeres_units_5],
            'Viscous Pyroxeres' => $_POST[pyroxeres_units_10],
            'Plagioclase' => $_POST[plagioclase_units],
            'Azure Plagioclase' => $_POST[plagioclase_units_5],
            'Rich Plagioclase' => $_POST[plagioclase_units_10],
            'Omber' => $_POST[omber_units],
            'Silvery Omber' => $_POST[omber_units_5],
            'Golden Omber' => $_POST[omber_units_10],
            'Gneiss' => $_POST[gneiss_units],
            'Iridescent Gneiss' => $_POST[gneiss_units_5],
            'Prismatic Gneiss' => $_POST[gneiss_units_10],
            'Kernite' => $_POST[kernite_units],
            'Luminous Kernite' => $_POST[kernite_units_5],
            'Fiery Kernite' => $_POST[kernite_units_10],
            'Jaspet' => $_POST[jaspet_units],
            'Pure Jaspet' => $_POST[jaspet_units_5],
            'Pristine Jaspet' => $_POST[jaspet_units_10],
            'Spodumain' => $_POST[spodumain_units],
            'Bright Spodumain' => $_POST[spodumain_units_5],
            'Gleaming Spodumain' => $_POST[spodumain_units_10],
            'Hemorphite' => $_POST[hemorphite_units],
            'Vivid Hemorphite' => $_POST[hemorphite_units_5],
            'Radiant Hemorphite' => $_POST[hemorphite_units_10],
            'Hebergite' => $_POST[hedbergite_units],
            'Vitric Hedbergite' => $_POST[hedbergite_units_5],
            'Glazed Hedbergite' => $_POST[hedbergite_units_10],
            'Dark Ochre' => $_POST[ochre_units],
            'Onyx Ochre' => $_POST[ochre_units_5],
            'Obsidian Ochre' => $_POST[ochre_units_10],
            'Crokite' => $_POST[crokite_units],
            'Sharp Crokite' => $_POST[crokite_units_5],
            'Crystalline Crokite' => $_POST[crokite_units_10],
            'Bistot' => $_POST[bistot_units],
            'Triclinic Bistot' => $_POST[bistot_units_5],
            'Monoclinic Bistot' => $_POST[bistot_units_10],
            'Arkonor' => $_POST[arkonor_units],
            'Crimson Arkonor' => $_POST[arkonor_units_5],
            'Prime Arkonor' => $_POST[arkonor_units_10],
            'Mercoxit' => $_POST[mercoxit_units],
            'Magma Mercoxit' => $_POST[mercoxit_units_5],
            'Vitreous Mercoxit' => $_POST[mercoxit_units_10],
        );
        
        $result = $db->insert('OreContracts', $contractData);
        if($result) {
            $contractValue = CalcContractValue($contractNumber, 'ore', $characterName);
            PrintContractPage($contractNumber, $contractValue);
        }
    }
    
    if($contractType == 'pi') {
        
    } 
?>
