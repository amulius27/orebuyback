/**
 * Author:  Chris Mancuso
 * Created: May 20, 2016
 */

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orebuyback`
--

--
-- Table structure for `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
    `id` varchar(32) NOT NULL,
    `access` int(10) unsigned DEFAULT NULL,
    `data` text,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Configuration`
--

CREATE TABLE IF NOT EXISTS `Configuration` (
  `refineRate` decimal(5,2) NOT NULL,
  `allianceTaxRate` decimal (5,2) NOT NULL,
  `allianceMineralTaxRate` decimal(5,2) NOT NULL,
  `marketRegion` int(12) NOT NULL,
  `updatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Configuration`
--

INSERT INTO `Configuration` (`refineRate`, `allianceTaxRate`, `marketRegion`, `updatedBy`) VALUES (80.00, 4.00, 10000002, 'Initial Setup');

--
-- Table structure for table `Corps`
--

CREATE TABLE IF NOT EXISTS `Corps` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `member_roles`
-- Roles are Member, Director, CEO, and SiteAdmin
--

CREATE TABLE IF NOT EXISTS `member_roles` (
    `id` int(11) NOT NULL,
    `username` varchar(30) NOT NULL,
    `corporation` varchar(50) DEFAULT 'None',
    `role` varchar(20) NOT NULL DEFAULT 'Member', 
    `canChangeCorpTax` tinyint(1) NOT NULL DEFAULT '0',
    `canChangeRefineRate` tinyint(1) NOT NULL DEFAULT '0',
    `canChangeAllianceTaxRate` tinyint(1) NOT NULL DEFAULT '0',
    `canAddNewCorp` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `Contracts`
--

CREATE TABLE IF NOT EXISTS `Contracts` (
  `ContractNum` int(11) NOT NULL AUTO_INCREMENT,
  `ContractType` varchar(50) NOT NULL,
  `Corporation` varchar(50) NOT NULL DEFAULT 'None',
  `QuoteTime` timestamp NOT NULL,
  `Value` decimal(20,2) DEFAULT NULL,
  `AllianceTax` decimal(20,2) NOT NULL DEFAULT '0.00',
  `CorpTax` decimal (20,2) NOT NULL DEFAULT '0.00',
  `Paid` tinyint(1) NOT NULL DEFAULT '0',
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ContractNum`),
  UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `CorpContracts`
--

CREATE TABLE IF NOT EXISTS `CorpContracts` (
    `ContractNum` int(11) NOT NULL,
    `Corporation` varchar(50) NOT NULL,
    `Location` varchar(50) NOT NULL,
    `Value` decimal (20,2) NOT NULL,
    `Paid` tinyint(1) NOT NULL DEFAULT '0',
    `Deleted` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `CorpContractContents`
--

CREATE TABLE IF NOT EXISTS `CorpContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `Tritanium` int(20) NOT NULL DEFAULT '0',
    `Pyerite` int(20) NOT NULL DEFAULT '0',
    `Isogen` int(20) NOT NULL DEFAULT '0',
    `Mexallon` int(20) NOT NULL DEFAULT '0',
    `Nocxium` int(20) NOT NULL DEFAULT '0',
    `Zydrine` int(20) NOT NULL DEFAULT '0',
    `Megacyte` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `CorpContractPayouts`
--

CREATE TABLE IF NOT EXISTS `CorpContractPayouts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ContractNum` int(12) NOT NULL,
    `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
    `Amount` decimal(12,2) DEFAULT '0.00',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table 'OreContractContents`
--

CREATE TABLE IF NOT EXISTS `OreContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Veldspar` int(20) NOT NULL DEFAULT '0',
    `Concentrated_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Dense_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Scordite` int(20) NOT NULL DEFAULT '0',
    `Condensed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Massive_Scordite` int(20) NOT NULL DEFAULT '0',
    `Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Solid_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Viscous_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Azure_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Rich_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Omber` int(20) NOT NULL DEFAULT '0',
    `Silvery_Omber` int(20) NOT NULL DEFAULT '0',
    `Golden_Omber` int(20) NOT NULL DEFAULT '0',
    `Kernite` int(20) NOT NULL DEFAULT '0',
    `Luminous_Kernite` int(20) NOT NULL DEFAULT '0',
    `Fiery_Kernite` int(20) NOT NULL DEFAULT '0',
    `Jaspet` int(20) NOT NULL DEFAULT '0',
    `Pure_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Pristine_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Vivid_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Radiant_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Vitric_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Glazed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Gneiss` int(20) NOT NULL DEFAULT '0',
    `Iridescent_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Prismatic_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Dark_Ochre` int(20) NOT NULL DEFAULT '0',
    `Onyx_Ochre` int(20) NOT NULL DEFAULT '0',
    `Obsidian_Ochre` int(20) NOT NULL DEFAULT '0',
    `Spodumain` int(20) NOT NULL DEFAULT '0',
    `Bright_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Gleaming_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Crokite` int(20) NOT NULL DEFAULT '0',
    `Sharp_Crokite` int(20) NOT NULL DEFAULT '0',
    `Crystalline_Crokite` int(20) NOT NULL DEFAULT '0',
    `Bistot` int(20) NOT NULL DEFAULT '0',
    `Triclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Monoclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Arkonor` int(20) NOT NULL DEFAULT '0',
    `Crimson_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Prime_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Magma_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Vitreous_Mercoxit` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'CompOreContractContents`
--

CREATE TABLE IF NOT EXISTS `CompOreContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Compressed_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Concentrated_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Dense_Veldspar` int(20) NOT NULL DEFAULT '0',
    `Compressed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Condensed_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Massive_Scordite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Compressed_Solid_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Compressed_Viscous_Pyroxeres` int(20) NOT NULL DEFAULT '0',
    `Compressed_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Azure_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Rich_Plagioclase` int(20) NOT NULL DEFAULT '0',
    `Compressed_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Silvery_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Golden_Omber` int(20) NOT NULL DEFAULT '0',
    `Compressed_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Luminous_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Fiery_Kernite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pure_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Pristine_Jaspet` int(20) NOT NULL DEFAULT '0',
    `Compressed_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vivid_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Radiant_Hemorphite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vitric_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Glazed_Hedbergite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Iridescent_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Prismatic_Gneiss` int(20) NOT NULL DEFAULT '0',
    `Compressed_Dark_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Onyx_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Obsidian_Ochre` int(20) NOT NULL DEFAULT '0',
    `Compressed_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Bright_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Gleaming_Spodumain` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Sharp_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crystalline_Crokite` int(20) NOT NULL DEFAULT '0',
    `Compressed_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Triclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Monoclinic_Bistot` int(20) NOT NULL DEFAULT '0',
    `Compressed_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Crimson_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Prime_Arkonor` int(20) NOT NULL DEFAULT '0',
    `Compressed_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Compressed_Magma_Mercoxit` int(20) NOT NULL DEFAULT '0',
    `Compressed_Vitreous_Mercoxit` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'FuelContractContents`
--

CREATE TABLE IF NOT EXISTS `FuelContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Amarr_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Caldari_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Gallente_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    `Minmatar_Fuel_Block` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'IceContractContents`
--

CREATE TABLE IF NOT EXISTS `IceContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Clear_Icicle` int(20) NOT NULL DEFAULT '0',
    `Enriched_Clear_Icicle` int(20) NOT NULL DEFAULT '0',
    `Glacial_Mass` int(20) NOT NULL DEFAULT '0',
    `Smooth_Glacial_Mass` int(20) NOT NULL DEFAULT '0',
    `White_Glaze` int(20) NOT NULL DEFAULT '0',
    `Pristine_White_Glaze` int(20) NOT NULL DEFAULT '0',
    `Blue_Ice` int(20) NOT NULL DEFAULT '0',
    `Thick_Blue_Ice` int(20) NOT NULL DEFAULT '0',
    `Glare_Crust` int(20) NOT NULL DEFAULT '0',
    `Dark_Glitter` int(20) NOT NULL DEFAULT '0',
    `Gelidus` int(20) NOT NULL DEFAULT '0',
    `Krystallos` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'IceProdContractContents`
--

CREATE TABLE IF NOT EXISTS `IceProdContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Helium_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Hydrogen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Nitrogen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Oxygen_Isotopes` int(20) NOT NULL DEFAULT '0',
    `Heavy_Water` int(20) NOT NULL DEFAULT '0',
    `Liquid_Ozone` int(20) NOT NULL DEFAULT '0',
    `Strontium_Clathrates` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'MineralContractContents`
--

CREATE TABLE IF NOT EXISTS `MineralContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Tritanium` int(20) NOT NULL DEFAULT '0',
    `Pyerite` int(20) NOT NULL DEFAULT '0',
    `Mexallon` int(20) NOT NULL DEFAULT '0',
    `Nocxium` int(20) NOT NULL DEFAULT '0',
    `Isogen` int(20) NOT NULL DEFAULT '0',
    `Megacyte` int(20) NOT NULL DEFAULT '0',
    `Zydrine` int(20) NOT NULL DEFAULT '0',
    `Morphite` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiContractContents`
--

CREATE TABLE IF NOT EXISTS `PiContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Aqueous_Liquids` int(20) NOT NULL DEFAULT '0',
    `Ionic_Solutions` int(20) NOT NULL DEFAULT '0',
    `Base_Metals` int(20) NOT NULL DEFAULT '0',
    `Heavy_Metals` int(20) NOT NULL DEFAULT '0',
    `Noble_Metals` int(20) NOT NULL DEFAULT '0',
    `Carbon_Compounds` int(20) NOT NULL DEFAULT '0',
    `Micro_Organisms` int(20) NOT NULL DEFAULT '0',
    `Complex_Organisms` int(20) NOT NULL DEFAULT '0',
    `Planktic_Colonies` int(20) NOT NULL DEFAULT '0',
    `Noble_Gas` int(20) NOT NULL DEFAULT '0',
    `Reactive_Gas` int(20) NOT NULL DEFAULT '0',
    `Felsic_Magma` int(20) NOT NULL DEFAULT '0',
    `Non_CS_Crystals` int(20) NOT NULL DEFAULT '0',
    `Suspended_Plasma` int(20) NOT NULL DEFAULT '0',
    `Autotrophs` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'PiT1ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT1ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Bacteria` int(20) NOT NULL DEFAULT '0', 
    `Biofuels` int(20) NOT NULL DEFAULT '0',
    `Biomass` int(20) NOT NULL DEFAULT '0',
    `Chiral_Structures` int(20) NOT NULL DEFAULT '0',
    `Electrolytes` int(20) NOT NULL DEFAULT '0',
    `Industrial_Fibers` int(20) NOT NULL DEFAULT '0',
    `Oxidizing_Compound` int(20) NOT NULL DEFAULT '0',
    `Oxygen` int(20) NOT NULL DEFAULT '0',
    `Plasmoids` int(20) NOT NULL DEFAULT '0',
    `Precious_Metals` int(20) NOT NULL DEFAULT '0',
    `Proteins` int(20) NOT NULL DEFAULT '0',
    `Reactive_Metals` int(20) NOT NULL DEFAULT '0',
    `Silicon` int(20) NOT NULL DEFAULT '0',
    `Toxic_Metals` int(20) NOT NULL DEFAULT '0',
    `Water` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiT2ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT2ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Biocells` int(20) NOT NULL DEFAULT '0',
    `Construction_Blocks` int(20) NOT NULL DEFAULT '0',
    `Consumer_Electronics` int(20) NOT NULL DEFAULT '0',
    `Coolant` int(20) NOT NULL DEFAULT '0',
    `Enriched_Uranium` int(20) NOT NULL DEFAULT '0',
    `Fertilizer` int(20) NOT NULL DEFAULT '0',
    `Genetically_Enhanced_Livestock` int(20) NOT NULL DEFAULT '0',
    `Livestock` int(20) NOT NULL DEFAULT '0',
    `Mechanical_Parts` int(20) NOT NULL DEFAULT '0',
    `Microfiber_Shielding` int(20) NOT NULL DEFAULT '0',
    `Miniature_Electronics` int(20) NOT NULL DEFAULT '0',
    `Nanites` int(20) NOT NULL DEFAULT '0',
    `Oxides` int(20) NOT NULL DEFAULT '0',
    `Polyaramids` int(20) NOT NULL DEFAULT '0',
    `Polytextiles` int(20) NOT NULL DEFAULT '0',
    `Rocket_Fuel` int(20) NOT NULL DEFAULT '0',
    `Silicate_Glass` int(20) NOT NULL DEFAULT '0',
    `Superconductors` int(20) NOT NULL DEFAULT '0',
    `Supertensile_Plastics` int(20) NOT NULL DEFAULT '0',
    `Synthetic_Oil` int(20) NOT NULL DEFAULT '0',
    `Test_Cultures` int(20) NOT NULL DEFAULT '0',
    `Transmitter` int(20) NOT NULL DEFAULT '0',
    `Viral_Agent` int(20) NOT NULL DEFAULT '0',
    `Water_Cooled_CPU` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


--
-- Table structure for table 'PiT3ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT3ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Biotech_Research_Reports` int(20) NOT NULL DEFAULT '0',
    `Camera_Drones` int(20) NOT NULL DEFAULT '0',
    `Condensates` int(20) NOT NULL DEFAULT '0',
    `Cryoprotectant_Solution` int(20) NOT NULL DEFAULT '0',
    `Data_Chips` int(20) NOT NULL DEFAULT '0',
    `Gel_Matrix_Biopaste` int(20) NOT NULL DEFAULT '0',
    `Guidance_Systems` int(20) NOT NULL DEFAULT '0',
    `Hazmat_Detection_Systems` int(20) NOT NULL DEFAULT '0',
    `Hermetic_Membranes` int(20) NOT NULL DEFAULT '0',
    `High_Tech_Transmitters` int(20) NOT NULL DEFAULT '0',
    `Industrial_Explosives` int(20) NOT NULL DEFAULT '0',
    `Neocoms` int(20) NOT NULL DEFAULT '0',
    `Nuclear_Reactors` int(20) NOT NULL DEFAULT '0',
    `Planetary_Vehicles` int(20) NOT NULL DEFAULT '0',
    `Robotics` int(20) NOT NULL DEFAULT '0',
    `Smartfab_Units` int(20) NOT NULL DEFAULT '0',
    `Supercomputers` int(20) NOT NULL DEFAULT '0',
    `Synthetic_Synapses` int(20) NOT NULL DEFAULT '0',
    `Transcranial_Microcontrollers` int(20) NOT NULL DEFAULT '0',
    `Ukomi_Superconductors` int(20) NOT NULL DEFAULT '0',
    `Vaccines` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table 'PiT4ContractContents`
--

CREATE TABLE IF NOT EXISTS `PiT4ContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Broadcast_Node` int(20) NOT NULL DEFAULT '0',
    `Integrity_Response_Drones` int(20) NOT NULL DEFAULT '0',
    `Nanofactory` int(20) NOT NULL DEFAULT '0',
    `Organic_Mortar_Applicators` int(20) NOT NULL DEFAULT '0',
    `Recursive_Computing_Module` int(20) NOT NULL DEFAULT '0',
    `Self_Harmonizing_Power_Core` int(20) NOT NULL DEFAULT '0',
    `Sterile_Conduits` int(20) NOT NULL DEFAULT '0',
    `Wetware_Mainframe` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `SalvageContractContents`
-- 

CREATE TABLE IF NOT EXISTS `SalvageContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `Alloyed_Tritanium_Bar` int(20) NOT NULL DEFAULT '0',
    `Armor_Plates` int(20) NOT NULL DEFAULT '0',
    `Artificial_Neural_Network` int(20) NOT NULL DEFAULT '0',
    `Broken_Drone_Transceiver` int(20) NOT NULL DEFAULT '0',
    `Burned_Logic_Circuit` int(20) NOT NULL DEFAULT '0',
    `Capacitor_Circuit_Console` int(20) NOT NULL DEFAULT '0',
    `Charred_Micro_Circuit` int(20) NOT NULL DEFAULT '0',
    `Conductive_Polymer` int(20) NOT NULL DEFAULT '0',
    `Conductive_Thermoplastic` int(20) NOT NULL DEFAULT '0',
    `Contaminated_Lorrentz_Fluid` int(20) NOT NULL DEFAULT '0',
    `Contaminated_Nanite_Compound` int(20) NOT NULL DEFAULT '0',
    `Current_Pump` int(20) NOT NULL DEFAULT '0',
    `Damaged_Artificial_Neural_Network` int(20) NOT NULL DEFAULT '0',
    `Defective_Current_Pump` int(20) NOT NULL DEFAULT '0',
    `Drone_Transceiver` int(20) NOT NULL DEFAULT '0',
    `Enhanced_Ward_Console` int(20) NOT NULL DEFAULT '0',
    `Fried_Interface_Circuit` int(20) NOT NULL DEFAULT '0',
    `Impetus_Console` int(20) NOT NULL DEFAULT '0',
    `Intact_Armor_Plates` int(20) NOT NULL DEFAULT '0',
    `Intact_Shield_Emitter` int(20) NOT NULL DEFAULT '0',
    `Interface_Circuit` int(20) NOT NULL DEFAULT '0',
    `Logic_Circuit` int(20) NOT NULL DEFAULT '0',
    `Lorrentz_Fluid` int(20) NOT NULL DEFAULT '0',
    `Malfunctioning_Shield_Emitter` int(20) NOT NULL DEFAULT '0',
    `Melted_Capacitor_Console` int(20) NOT NULL DEFAULT '0',
    `Micro_Circuit` int(20) NOT NULL DEFAULT '0',
    `Nanite_Compound` int(20) NOT NULL DEFAULT '0',
    `Power_Circuit` int(20) NOT NULL DEFAULT '0',
    `Power_Conduit` int(20) NOT NULL DEFAULT '0',
    `Scorched_Telemetry_Processor` int(20) NOT NULL DEFAULT '0',
    `SCS_IBeam` int(20) NOT NULL DEFAULT '0',
    `Smashed_Trigger_Unit` int(20) NOT NULL DEFAULT '0',
    `Tangled_Power_Conduit` int(20) NOT NULL DEFAULT '0',
    `Telemetry_Processor` int(20) NOT NULL DEFAULT '0',
    `Thruster_Console` int(20) NOT NULL DEFAULT '0',
    `Trigger_Unit` int(20) NOT NULL DEFAULT '0',
    `Tripped_Power_Circuit` int(20) NOT NULL DEFAULT '0',
    `Ward_Console` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `WGasContractContents`
--

CREATE TABLE IF NOT EXISTS `WGasContractContents` (
    `ContractNum` int(11) NOT NULL,
    `ContractTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `QuoteTime` timestamp NOT NULL,
    `C50` int(20) NOT NULL DEFAULT '0',
    `C60` int(20) NOT NULL DEFAULT '0',
    `C70` int(20) NOT NULL DEFAULT '0',
    `C72` int(20) NOT NULL DEFAULT '0',
    `C84` int(20) NOT NULL DEFAULT '0',
    `C28` int(20) NOT NULL DEFAULT '0',
    `C32` int(20) NOT NULL DEFAULT '0',
    `C320` int(20) NOT NULL DEFAULT '0',
    `C540` int(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ContractNum`),
    UNIQUE KEY `ContractNum` (`ContractNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `CorporationPayouts`
-- Type = 0 for adding, and Type = 1 for subtracting
--

CREATE TABLE IF NOT EXISTS `CorporationPayouts` (
    `index` int(11) NOT NULL AUTO_INCREMENT,
    `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
    `Amount` decimal(22,2) DEFAULT '0.00',
    `Type` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `AlliancePayouts`
-- Type = 0 for adding, and Type = 1 for subtracting
--

CREATE TABLE IF NOT EXISTS `AlliancePayouts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ContractNum` int(12) NOT NULL,
    `CorpName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
    `Amount` decimal(12,2) DEFAULT '0.00',
    `Type` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `itemComposition`
--

CREATE TABLE IF NOT EXISTS `itemComposition` (
    `Name` varchar(31) DEFAULT NULL,
    `ItemId` int(10) NOT NULL,
    `BatchSize` int(12) NOT NULL DEFAULT '100',
    `TritaniumNum` int(12) DEFAULT '0',
    `PyeriteNum` int(12) DEFAULT '0',
    `MexallonNum` int(12) DEFAULT '0',
    `IsogenNum` int(12) DEFAULT '0',
    `NocxiumNum` int(12) DEFAULT '0',
    `ZydrineNum` int(12) DEFAULT '0',
    `MegacyteNum` int(12) DEFAULT '0',
    `MorphiteNum` int(12) DEFAULT '0',
    `HeavyWaterNum` int(11) NOT NULL DEFAULT '0',
    `LiquidOzoneNum` int(11) NOT NULL DEFAULT '0',
    `NitrogenIsotopesNum` int(11) NOT NULL DEFAULT '0',
    `HeliumIsotopesNum` int(11) NOT NULL DEFAULT '0',
    `HydrogenIsotopesNum` int(11) NOT NULL DEFAULT '0',
    `OxygenIsotopesNum` int(11) NOT NULL DEFAULT '0',
    `StrontiumClathratesNum` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `oreName` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itemComposition`
--

INSERT INTO `itemComposition` (`Name`, `ItemId`, `BatchSize`, `TritaniumNum`, `PyeriteNum`, `MexallonNum`, `IsogenNum`, `NocxiumNum`, `ZydrineNum`, `MegacyteNum`, `MorphiteNum`, `HeavyWaterNum`, `LiquidOzoneNum`, `NitrogenIsotopesNum`, `HeliumIsotopesNum`, `HydrogenIsotopesNum`, `OxygenIsotopesNum`, `StrontiumClathratesNum`) VALUES
('Veldspar', 1230, 100, 415, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Concentrated Veldpsar', 17470, 100, 436, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dense Veldspar', 17471, 100, 457, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Scordite', 1228, 100, 346, 173, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Condensed Scordite', 17463, 100, 363, 182, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Massive Scordite', 17464, 100, 380, 190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pyroxeres', 1224, 100, 351, 25, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Solid Pyroxeres', 17459, 100, 368, 26, 53, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Viscous Pyroxeres', 17460, 100, 385, 27, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Plagioclase', 18, 100, 107, 213, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Azure Plagioclase', 17455, 100, 112, 224, 112, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Rich Plagioclase', 17456, 100, 117, 234, 117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Omber', 1227, 100, 85, 34, 0, 85, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Silvery Omber', 17867, 100, 89, 36, 0, 89, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Golden Omber', 17868, 100, 94, 38, 0, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Kernite', 20, 100, 134, 0, 267, 134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Luminous Kernite', 17452, 100, 140, 0, 281, 140, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Fiery Kernite', 17453, 100, 147, 0, 294, 147, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Jaspet', 1226, 100, 0, 0, 350, 0, 75, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pure Jaspet', 17448, 100, 0, 0, 367, 0, 78, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Pristine Jaspet', 17449, 100, 0, 0, 385, 0, 82, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hemorphite', 1231, 100, 2200, 0, 0, 100, 120, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Vivid Hemorphite', 17444, 100, 2310, 1155, 0, 210, 105, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Radiant Hemorphite', 17445, 100, 2420, 0, 0, 110, 132, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Hedbergite', 21, 100, 0, 1100, 0, 200, 100, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Vitric Hedbergite', 17440, 100, 0, 1155, 0, 210, 105, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Glazed Hedbergite', 17441, 100, 0, 1270, 0, 220, 110, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Gneiss', 1229, 100, 0, 2200, 2400, 300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Iridescent Gneiss', 17865, 100, 0, 2310, 2520, 315, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Prismatic Gneiss', 17866, 100, 0, 2420, 2640, 330, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Dark Ochre', 1232, 100, 10000, 0, 0, 1600, 120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Onyx Ochre', 17436, 100, 10500, 0, 0, 1680, 126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Obsidian Ochre', 17437, 100, 11000, 0, 0, 1760, 132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Spodumain', 19, 100, 56000, 12050, 2100, 450, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Bright Spodumain', 17466, 100, 58800, 12652, 2205, 472, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Gleaming Spodumain', 17467, 100, 61600, 13255, 2310, 495, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Crokite', 1225, 100, 21000, 0, 0, 0, 760, 135, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Sharp Crokite', 17432, 100, 22050, 0, 0, 0, 798, 141, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Crystalline Crokite', 17433, 100, 23100, 0, 0, 0, 836, 148, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('Bistot', 1223, 100, 0, 12000, 0, 0, 0, 450, 100, 0, 0, 0, 0, 0, 0, 0, 0),
('Triclinic Bistot', 17428, 100, 0, 12600, 0, 0, 0, 472, 105, 0, 0, 0, 0, 0, 0, 0, 0),
('Monoclinic Bistot', 17429, 100, 0, 13200, 0, 0, 0, 495, 110, 0, 0, 0, 0, 0, 0, 0, 0),
('Arkonor', 22, 100, 22000, 0, 2500, 0, 0, 0, 320, 0, 0, 0, 0, 0, 0, 0, 0),
('Crimson Arkonor', 17425, 100, 23100, 0, 2625, 0, 0, 0, 336, 0, 0, 0, 0, 0, 0, 0, 0),
('Prime Arkonor', 17426, 100, 24200, 0, 2750, 0, 0, 0, 352, 0, 0, 0, 0, 0, 0, 0, 0),
('Mercoxit', 11396, 100, 0, 0, 0, 0, 0, 0, 0, 300, 0, 0, 0, 0, 0, 0, 0),
('Magma Mercoxit', 17869, 100, 0, 0, 0, 0, 0, 0, 0, 315, 0, 0, 0, 0, 0, 0, 0),
('Vitreous Mercoxit', 17870, 100, 0, 0, 0, 0, 0, 0, 0, 330, 0, 0, 0, 0, 0, 0, 0),
('Blue Ice', 16264, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 0, 0, 414, 1),
('Thick Blue Ice', 17975, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 0, 0, 483, 1),
('Glacial Mass', 16263, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 0, 414, 0, 1),
('Smooth Glacial Mass', 17977, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 0, 483, 0, 0),
('White Glaze', 16265, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 414, 0, 0, 0, 1),
('Pristine White Glaze', 17976, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 483, 0, 0, 0, 1),
('Clear Icicle', 16262, 1, 0, 0, 0, 0, 0, 0, 0, 0, 69, 35, 0, 414, 0, 0, 1),
('Enriched Clear Icicle', 17978, 1, 0, 0, 0, 0, 0, 0, 0, 0, 104, 55, 0, 483, 0, 0, 0),
('Glare Crust', 16266, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1381, 691, 0, 0, 0, 0, 35),
('Dark Glitter', 16267, 1, 0, 0, 0, 0, 0, 0, 0, 0, 691, 1381, 0, 0, 0, 0, 69),
('Gelidus', 16268, 1, 0, 0, 0, 0, 0, 0, 0, 0, 345, 691, 0, 0, 0, 0, 104),
('Krystallos', 16269, 1, 0, 0, 0, 0, 0, 0, 0, 0, 173, 691, 0, 0, 0, 0, 173);

--
-- Table structure for Item Names and ItemId
--

CREATE TABLE IF NOT EXISTS `ItemIds` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ItemId` int(11) DEFAULT NOT NULL,
    `Name` varchar(31) DEFAULT NOT NULL,
    `Grouping` varchar(16) DEFAULT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table Insert for Item Names and ItemId
--

INSERT INTO `ItemIds` (`Name`, `ItemId`, `Grouping`) VALUES
('Veldspar', 1230, 'Ore'),
('Concentrated Veldpsar', 17470, 'Ore'),
('Dense Veldspar', 17471, 'Ore'),
('Scordite', 1228, 'Ore'),
('Condensed Scordite', 17463, 'Ore'),
('Massive Scordite', 17464, 'Ore'),
('Pyroxeres', 1224, 'Ore'),
('Solid Pyroxeres', 17459, 'Ore'),
('Viscous Pyroxeres', 17460, 'Ore'),
('Plagioclase', 18, 'Ore'),
('Azure Plagioclase', 17455, 'Ore'),
('Rich Plagioclase', 17456, 'Ore'),
('Omber', 1227, 'Ore'),
('Silvery Omber', 17867, 'Ore'),
('Golden Omber', 17868, 'Ore'),
('Kernite', 20, 'Ore'),
('Luminous Kernite', 17452, 'Ore'),
('Fiery Kernite', 17453, 'Ore'),
('Jaspet', 1226, 'Ore'),
('Pure Jaspet', 17448, 'Ore'),
('Pristine Jaspet', 17449, 'Ore'),
('Hemorphite', 1231, 'Ore'),
('Vivid Hemorphite', 17444, 'Ore'),
('Radiant Hemorphite', 17445, 'Ore'),
('Hedbergite', 21, 'Ore'),
('Vitric Hedbergite', 17440, 'Ore'),
('Glazed Hedbergite', 17441, 'Ore'),
('Gneiss', 1229, 'Ore'),
('Iridescent Gneiss', 17865, 'Ore'),
('Prismatic Gneiss', 17866, 'Ore'),
('Dark Ochre', 1232, 'Ore'),
('Onyx Ochre', 17436, 'Ore'),
('Obsidian Ochre', 17437, 'Ore'),
('Spodumain', 19, 'Ore'),
('Bright Spodumain', 17466, 'Ore'),
('Gleaming Spodumain', 17467, 'Ore'),
('Crokite', 1225, 'Ore'),
('Sharp Crokite', 17432, 'Ore'),
('Crystalline Crokite', 17433, 'Ore'),
('Bistot', 1223, 'Ore'),
('Triclinic Bistot', 17428, 'Ore'),
('Monoclinic Bistot', 17429, 'Ore'),
('Arkonor', 22, 'Ore'),
('Crimson Arkonor', 17425, 'Ore'),
('Prime Arkonor', 17426, 'Ore'),
('Mercoxit', 11396, 'Ore'),
('Magma Mercoxit', 17869, 'Ore'),
('Vitreous Mercoxit', 17870, 'Ore'),
('Blue Ice', 16264, 'Ice'),
('Thick Blue Ice', 17975, 'Ice'),
('Glacial Mass', 16263, 'Ice'),
('Smooth Glacial Mass', 17977, 'Ice'),
('White Glaze', 16265, 'Ice'),
('Pristine White Glaze', 17976, 'Ice'),
('Clear Icicle', 16262, 'Ice'),
('Enriched Clear Icicle', 17978, 'Ice'),
('Glare Crust', 16266, 'Ice'),
('Dark Glitter', 16267, 'Ice'),
('Gelidus', 16268, 'Ice'),
('Krystallos', 16269, 'Ice'),
('Compressed Veldspar', 1230, 'CompOre'),
('Compressed Concentrated Veldpsar', 17470, 'CompOre'),
('Compressed Dense Veldspar', 17471, 'CompOre'),
('Compressed Scordite', 1228, 'CompOre'),
('Compressed Condensed Scordite', 17463, 'CompOre'),
('Compressed Massive Scordite', 17464, 'CompOre'),
('Compressed Pyroxeres', 1224, 'CompOre'),
('Compressed Solid Pyroxeres', 17459, 'CompOre'),
('Compressed Viscous Pyroxeres', 17460, 'CompOre'),
('Compressed Plagioclase', 18, 'CompOre'),
('Compressed Azure Plagioclase', 17455, 'CompOre'),
('Compressed Rich Plagioclase', 17456, 'CompOre'),
('Compressed Omber', 1227, 'CompOre'),
('Compressed Silvery Omber', 17867, 'CompOre'),
('Compressed Golden Omber', 17868, 'CompOre'),
('Compressed Kernite', 20, 'CompOre'),
('Compressed Luminous Kernite', 17452, 'CompOre'),
('Compressed Fiery Kernite', 17453, 'CompOre'),
('Compressed Jaspet', 1226, 'CompOre'),
('Compressed Pure Jaspet', 17448, 'CompOre'),
('Compressed Pristine Jaspet', 17449, 'CompOre'),
('Compressed Hemorphite', 1231, 'CompOre'),
('Compressed Vivid Hemorphite', 17444, 'CompOre'),
('Compressed Radiant Hemorphite', 17445, 'CompOre'),
('Compressed Hedbergite', 21, 'CompOre'),
('Compressed Vitric Hedbergite', 17440, 'CompOre'),
('Compressed Glazed Hedbergite', 17441, 'CompOre'),
('Compressed Gneiss', 1229, 'CompOre'),
('Compressed Iridescent Gneiss', 17865, 'CompOre'),
('Compressed Prismatic Gneiss', 17866, 'CompOre'),
('Compressed Dark Ochre', 1232, 'CompOre'),
('Compressed Onyx Ochre', 17436, 'CompOre'),
('Compressed Obsidian Ochre', 17437, 'CompOre'),
('Compressed Spodumain', 19, 'CompOre'),
('Compressed Bright Spodumain', 17466, 'CompOre'),
('Compressed Gleaming Spodumain', 17467, 'CompOre'),
('Compressed Crokite', 1225, 'CompOre'),
('Compressed Sharp Crokite', 17432, 'CompOre'),
('Compressed Crystalline Crokite', 17433, 'CompOre'),
('Compressed Bistot', 1223, 'CompOre'),
('Compressed Triclinic Bistot', 17428, 'CompOre'),
('Compressed Monoclinic Bistot', 17429, 'CompOre'),
('Compressed Arkonor', 22, 'CompOre'),
('Compressed Crimson Arkonor', 17425, 'CompOre'),
('Compressed Prime Arkonor', 17426, 'CompOre'),
('Compressed Mercoxit', 11396, 'CompOre'),
('Compressed Magma Mercoxit', 17869, 'CompOre'),
('Compressed Vitreous Mercoxit', 17870, 'CompOre'),
('Tritanium', 34, 'Minerals'),
('Pyerite', 35, 'Minerals'),
('Mexallon', 36, 'Minerals'),
('Isogen', 37, 'Minerals'),
('Nocxium', 38, 'Minerals'),
('Zydrine', 39, 'Minerals'),
('Megacyte', 40, 'Minerals'),
('Morphite', 11399, 'Minerals'),
('Helium Isotopes', 16274, 'Minerals'),
('Nitrogen Isotopes', 17888, 'Minerals'),
('Oxygen Isotopes', 17887, 'Minerals'),
('Hydrogen Isotopes', 17889, 'Minerals'),
('Liquid Ozone', 16273, 'Minerals'),
('Heavy Water', 16272, 'Minerals'),
('Strontium Clathrates', 16275, 'Minerals'),
('C50', 30370, 'WGas'),
('C60', 30371, 'WGas'),
('C70', 30372, 'WGas'),
('C72', 30373, 'WGas'),
('C84', 30374, 'WGas'),
('C28', 30375, 'WGas'),
('C32', 30376, 'WGas'),
('C320', 30377, 'WGas'),
('C540', 30378, 'WGas'),
('Aqueuous Liquids', 2268, 'Pi'),
('Ionic Solutions', 2309, 'Pi'),
('Base Metals', 2267, 'Pi'),
('Heavy Metals', 2272, 'Pi'),
('Noble Metals', 2270, 'Pi'),
('Carbon Compounds', 2288, 'Pi'),
('Microorganisms', 2073, 'Pi'),
('Complex Organisms', 2287, 'Pi'),
('Planktic Colonies', 2286, 'Pi'),
('Noble Gas', 2310, 'Pi'),
('Reactive Gas', 2311, 'Pi'),
('Felsic Magma', 2307, 'Pi'),
('Non-CS Crystals', 2306, 'Pi'),
('Suspended Plasma', 2308, 'Pi'),
('Autotrophs', 2305, 'Pi'),
('Bacteria', 2393, 'Pi'),
('Biofuels', 2396, 'Pi'),
('Biomass', 3779, 'Pi'),
('Chiral Structures', 2401, 'Pi'),
('Electrolytes', 2390, 'Pi'),
('Industrial Fibers', 2397, 'Pi'),
('Oxidizing Compound', 2392, 'Pi'),
('Oxygen', 3683, 'Pi'),
('Plasmoids', 2389, 'Pi'),
('Precious Metals', 2399, 'Pi'),
('Proteins', 2395, 'Pi'),
('Reactive Metals', 2398, 'Pi'),
('Silicon', 9828, 'Pi'),
('Toxic Metals', 2400, 'Pi'),
('Water', 3645, 'Pi'),
('Biocells', 2329, 'Pi'),
('Construction Blocks', 3828, 'Pi'),
('Consumer Electronics', 9836, 'Pi'),
('Coolant', 9832, 'Pi'),
('Enriched Uranium', 44, 'Pi'),
('Fertilizer', 3693, 'Pi'),
('Genetically Enchanced Livestock', 15317, 'Pi'),
('Livestock', 3725, 'Pi'),
('Mechanical Parts', 3689, 'Pi'),
('Microfiber Shielding', 2327, 'Pi'),
('Miniature Electronics', 9842, 'Pi'),
('Nanites', 2463, 'Pi'),
('Oxides', 2317, 'Pi'),
('Polyaramids', 2321, 'Pi'),
('Polytextiles', 3695, 'Pi'),
('Rocket Fuel', 9830, 'Pi'),
('Silicate Glass', 3697, 'Pi'),
('Superconductors', 9838, 'Pi'),
('Supertensile Plastics', 2312, 'Pi'),
('Synthetic Oil', 3691, 'Pi'),
('Testcultures', 2319, 'Pi'),
('Transmitter', 9840, 'Pi'),
('Viral Agent', 3775, 'Pi'),
('Water Cooled CPU', 2328, 'Pi'),
('Biotech Research Reports', 2358, 'Pi'),
('Camera Drones', 2345, 'Pi'),
('Condensates', 2344, 'Pi'),
('Cryoprotectant Solution', 2367, 'Pi'),
('Data Chips', 17392, 'Pi'),
('Gel Matrix Biopaste', 2348, 'Pi'),
('Guidance Systems', 9834, 'Pi'),
('Hazmat Detection Systems', 2366, 'Pi'),
('Hermetic Membranes', 2361, 'Pi'),
('HighTech Transmitters', 17898, 'Pi'),
('Industrial Explosives', 2360, 'Pi'),
('Neocoms', 2354, 'Pi'),
('Nuclear Reactors', 2352, 'Pi'),
('Planetary Vehicles', 9846, 'Pi'),
('Robotics', 9848, 'Pi'),
('Smartfab Units', 2351, 'Pi'),
('Supercomputers', 2349, 'Pi'),
('Synthetic Synapses', 2346, 'Pi'),
('Microcontrollers', 12836, 'Pi'),
('Ukomi Superconductors', 17136, 'Pi'),
('Vaccines', 28974, 'Pi'),
('Broadcast Nodes', 2867, 'Pi'),
('Response Drones', 2868, 'Pi'),
('NanoFactory', 2869, 'Pi'),
('Organic Mortar Applicators', 2870, 'Pi'),
('Recursive Computing', 2871, 'Pi'),
('Power Core', 2872, 'Pi'),
('Sterile Conduits', 2875, 'Pi'),
('Mainframe', 2876, 'Pi');

--
-- Table structure for table `IceProductPrices`
--

CREATE TABLE IF NOT EXISTS `IceProductPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`),
  KEY `index_2` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `MineralPrices`
--

CREATE TABLE IF NOT EXISTS `MineralPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`),
  KEY `index_2` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `OrePrices`
--

CREATE TABLE IF NOT EXISTS `OrePrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `PiPrices`
--

CREATE TABLE IF NOT EXISTS `PiPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `SalvagePrices`
--

CREATE TABLE IF NOT EXISTS `SalvagePrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(5) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for tabe `WGasPrices`
--

CREATE TABLE IF NOT EXISTS `WGasPrices` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemId` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`index`),
  UNIQUE KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;