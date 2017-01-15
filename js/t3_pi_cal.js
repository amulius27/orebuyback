$(document).ready(function() {
    calcNow();
});

$('#calc-input-Biotech_Research_Reports_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Biotech_Research_Reports_units-value').on('focusout', function(){
    calcInputGetValue('Biotech_Research_Reports_units');
});
$('#calc-input-Camera_Drones_Blocks_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Camera_Drones_Blocks_units-value').on('focusout', function(){
    calcInputGetValue('Camera_Drones_Blocks_units');
});
$('#calc-input-Condensates_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Condensates_units-value').on('focusout', function(){
    calcInputGetValue('Condensates_units');
});
$('#calc-input-Cryoprotectant_Solution_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Cryoprotectant_Solution_units-value').on('focusout', function(){
    calcInputGetValue('Cryoprotectant_Solution_units');
});
$('#calc-input-Data_Chips_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Data_Chips_units-value').on('focusout', function(){
    calcInputGetValue('Data_Chips_units');
});
$('#calc-input-Gel_Matrix_Biopaste_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Gel_Matrix_Biopaste_units-value').on('focusout', function(){
    calcInputGetValue('Gel_Matrix_Biopaste_units');
});
$('#calc-input-Guidance_Systems_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Guidance_Systems_units-value').on('focusout', function(){
    calcInputGetValue('Guidance_Systems_units');
});
$('#calc-input-Hazmat_Detection_Systems_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Hazmat_Detection_Systems_units-value').on('focusout', function(){
    calcInputGetValue('Hazmat_Detection_Systems_units');
});
$('#calc-input-Hermetic_Membranes_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Hermetic_Membranes_units-value').on('focusout', function(){
    calcInputGetValue('Hermetic_Membranes_units');
});
$('#calc-input-High_Tech_Transmitters_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-High_Tech_Transmitters_units-value').on('focusout', function(){
    calcInputGetValue('High_Tech_Transmitters_units');
});
$('#calc-input-Industrial_Explosives_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Industrial_Explosives_units-value').on('focusout', function(){
    calcInputGetValue('Industrial_Explosives_units');
});
$('#calc-input-Neocoms_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Neocoms_units-value').on('focusout', function(){
    calcInputGetValue('Neocoms_units');
});
$('#calc-input-Nuclear_Reactors_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Nuclear_Reactors_units-value').on('focusout', function(){
    calcInputGetValue('Nuclear_Reactors_units');
});
$('#calc-input-Planetary_Vehicles_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Planetary_Vehicles_units-value').on('focusout', function(){
    calcInputGetValue('Planetary_Vehicles_units');
});
$('#calc-input-Robotics_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Robotics_units-value').on('focusout', function(){
    calcInputGetValue('Robotics_units');
});
$('#calc-input-Smartfab_Units_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Smartfab_Units_units-value').on('focusout', function(){
    calcInputGetValue('Smartfab_Units_units');
});
$('#calc-input-Supercomputers_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Supercomputers_units-value').on('focusout', function(){
    calcInputGetValue('Supercomputers_units');
});
$('#calc-input-Synthetic_Synapses_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Synthetic_Synapses_units-value').on('focusout', function(){
    calcInputGetValue('Synthetic_Synapses_units');
});
$('#calc-input-Transcranial_Microcontrollers_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Transcranial_Microcontrollers_units-value').on('focusout', function(){
    calcInputGetValue('Transcranial_Microcontrollers_units');
});
$('#calc-input-Ukomi_Superconductors_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Ukomi_Superconductors_units-value').on('focusout', function(){
    calcInputGetValue('Ukomi_Superconductors_units');
});
$('#calc-input-Vaccines_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Vaccines_units-value').on('focusout', function(){
    calcInputGetValue('Vaccines_units');
});

function calcInputClear(objname) {
    $('#calc-input-' + objname + '-form').removeClass('has-error');
    $('#calc-input-' + objname + '-error').html('');
    $('#calc-input-' + objname + '-incursion').addClass('hidden');
}

function calcInputError(objname, text) {
    $('#calc-input-' + objname + '-form').addClass('has-error');
    $('#calc-input-' + objname + '-error').html(text);
}

function calcInputGetValue(name) {

    calcInputClear(name);

    var value = $('#calc-input-' + name + '-value').val();

    return value;
}

function calcNow() {

    var biotechUnits = calcInputGetValue('Biotech_Research_Reports_units');
    var cameraDronesUnits = calcInputGetValue('Camera_Drones_Blocks_units');
    var condensatesUnits = calcInputGetValue('Condensates_units');
    var cryoprotectantUnits = calcInputGetValue('Cryoprotectant_Solution_units');
    var dataChipsUnits = calcInputGetValue('Data_Chips_units');
    var gelMatrixUnits = calcInputGetValue('Gel_Matrix_Biopaste_units');
    var guidanceSystemsUnits = calcInputGetValue('Guidance_Systems_units');
    var hazmatUnits = calcInputGetValue('Hazmat_Detection_Systems_units');
    var hermeticMembranesUnits = calcInputGetValue('Hermetic_Membranes_units');
    var highTechTransmittersUnits = calcInputGetValue('High_Tech_Transmitters_units');
    var industrialExplosivesUnits = calcInputGetValue('Industrial_Explosives_units');
    var neocomsUnits = calcInputGetValue('Neocoms_units');
    var nuclearReactorsUnits = calcInputGetValue('Nuclear_Reactors_units');
    var planetaryVehiclesUnits = calcInputGetValue('Planetary_Vehicles_units');
    var roboticsUnits = calcInputGetValue('Robotics_units');
    var smartfabUnits = calcInputGetValue('Smartfab_Units_units');
    var supercomputersUnits = calcInputGetValue('Supercomputers_units');
    var syntheticSynapsesUnits = calcInputGetValue('Synthetic_Synapses_units');
    var transcranialUnits = calcInputGetValue('Transcranial_Microcontrollers_units');
    var ukomiUnits = calcInputGetValue('Ukomi_Superconductors_units');
    var vaccinesUnits = calcInputGetValue('Vaccines_units');

    var biotechReward = biotechUnits * biotech;
    var cameraDronesReward = cameraDronesUnits * cameraDrones;
    var condensatesReward = condensatesUnits * condensates;
    var cryoprotectantReward = cryoprotectantUnits * cryoprotectant;
    var dataChipsReward = dataChipsUnits * dataChips;
    var gelMatrixReward = gelMatrixUnits * biopaste;
    var guidanceSystemsReward = guidanceSystemsUnits * guidanceSystems;
    var hazmatReward = hazmatUnits * hazmatDetection;
    var hermeticMembranesReward = hermeticMembranesUnits * hermeticMembranes;
    var hightechTransmittersReward = highTechTransmittersUnits * hightechTransmitters;
    var industrialExplosivesReward = industrialExplosivesUnits * industrialExplosives;
    var neocomsReward = neocomsUnits * neocoms;
    var nuclearReactorsReward = nuclearReactorsUnits * nuclearReactors;
    var planetaryVehiclesReward = planetaryVehiclesUnits * planetaryVehicles;
    var roboticsReward = roboticsUnits * robotics;
    var smartfabReward = smartfabUnits * smartfab;
    var supercomputersReward = supercomputersUnits * supercomputers;
    var syntheticSynapsesReward = syntheticSynapsesUnits * syntheticSynapses;
    var transcranialReward = transcranialUnits * microcontrollers;
    var ukomiReward = ukomiUnits * ukomi;
    var vaccinesReward = vaccinesUnits * vaccines;

    var totalReward = (biotechReward+cameraDronesReward+condensatesReward+cryoprotectantReward+dataChipsReward+gelMatrixReward+
            guidanceSystemsReward+hazmatReward+hermeticMembranesReward+hightechTransmittersReward+industrialExplosivesReward+
            neocomsReward+nuclearReactorsReward+planetaryVehiclesReward+roboticsReward+smartfabReward+supercomputersReward+syntheticSynapsesReward+
            transcranialReward+ukomiReward+vaccinesReward);

    var reward = totalReward.toFixed(2);

    $('#calc-output-biotech-value').html(number_format(biotechReward) + ' ISK');
    $('#calc-output-camera_drones-value').html(number_format(cameraDronesReward) + ' ISK');
    $('#calc-output-condensates-value').html(number_format(condensatesReward) + ' ISK');
    $('#calc-output-cryoprotectant-value').html(number_format(cryoprotectantReward) + ' ISK');
    $('#calc-output-data_chips-value').html(number_format(dataChipsReward) + ' ISK');
    $('#calc-output-gel_matrix-value').html(number_format(gelMatrixReward) + ' ISK');
    $('#calc-output-guidance_systems-value').html(number_format(guidanceSystemsReward) + ' ISK');
    $('#calc-output-hazmat_systems-value').html(number_format(hazmatReward) + ' ISK');
    $('#calc-output-hermetic_membranes-value').html(number_format(hermeticMembranesReward) + ' ISK');
    $('#calc-output-hightech_transmitters-value').html(number_format(hightechTransmittersReward) + ' ISK');
    $('#calc-output-industrial_explosives-value').html(number_format(industrialExplosivesReward) + ' ISK');
    $('#calc-output-neocoms-value').html(number_format(neocomsReward) + ' ISK');
    $('#calc-output-nuclear_reactors-value').html(number_format(nuclearReactorsReward) + ' ISK');
    $('#calc-output-planetary_vehicles-value').html(number_format(planetaryVehiclesReward) + ' ISK');
    $('#calc-output-robotics-value').html(number_format(roboticsReward) + ' ISK');
    $('#calc-output-smartfab_units-value').html(number_format(smartfabReward) + ' ISK');
    $('#calc-output-supercomputers-value').html(number_format(supercomputersReward) + ' ISK');
    $('#calc-output-sythetic_synapses-value').html(number_format(syntheticSynapsesReward) + ' ISK');
    $('#calc-output-microcontrollers-value').html(number_format(transcranialReward) + ' ISK');
    $('#calc-output-superconductors-value').html(number_format(ukomiReward) + ' ISK');
    $('#calc-output-vaccines-value').html(number_format(vaccinesReward) + ' ISK');

    $('#calc-output-reward-value').html(number_format(totalReward) + ' ISK');


    return reward;
}

function number_format (number, decimals, dec_point, thousands_sep)
{
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 2 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}