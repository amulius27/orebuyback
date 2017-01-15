/* global biocells, consumerElectronics, constructionBlocks, enrichedUranium, coolant, fertilizer, genEnhancedLivestock, mechanica, microfiberShieldinglParts, livestock, miniatureElectronics, nanites, microfiberShielding, mechanicalParts, oxides, polytextiles, polyaramids, rocketFuel, superconducto, supertensilePlasticsrs, silicateGlass, superconductors, supertensilePlastics, syntheticOil, testCultures, transmitter, viralAgent, waterCooledCpu, microfibreShielding */

$(document).ready(function() {
    calcNow();
});

$('#calc-input-Biocells_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Biocells_units-value').on('focusout', function(){
    calcInputGetValue('Biocells_units');
});
$('#calc-input-Construction_Blocks_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Construction_Blocks_units-value').on('focusout', function(){
    calcInputGetValue('Construction_Blocks_units');
});
$('#calc-input-Consumer_Electronics_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Consumer_Electronics_units-value').on('focusout', function(){
    calcInputGetValue('Consumer_Electronics_units');
});
$('#calc-input-Coolant_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Coolant_units-value').on('focusout', function(){
    calcInputGetValue('Coolant_units');
});
$('#calc-input-Enriched_Uranium_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Enriched_Uranium_units-value').on('focusout', function(){
    calcInputGetValue('Enriched_Uranium_units');
});
$('#calc-input-Fertilizer_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Fertilizer_units-value').on('focusout', function(){
    calcInputGetValue('Fertilizer_units');
});
$('#calc-input-Gen_Enhanced_Livestock_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Gen_Enhanced_Livestock_units-value').on('focusout', function(){
    calcInputGetValue('Gen_Enhanced_Livestock_units');
});
$('#calc-input-Livestock_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Livestock_units-value').on('focusout', function(){
    calcInputGetValue('Livestock_units');
});
$('#calc-input-Mechanical_Parts_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Mechanical_Parts_units-value').on('focusout', function(){
    calcInputGetValue('Mechanical_Parts_units');
});
$('#calc-input-Microfiber_Shielding_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Microfiber_Shielding_units-value').on('focusout', function(){
    calcInputGetValue('Microfiber_Shielding_units');
});
$('#calc-input-Miniature_Electronics_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Miniature_Electronics_units-value').on('focusout', function(){
    calcInputGetValue('Miniature_Electronics_units');
});
$('#calc-input-Nanites_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Nanites_units-value').on('focusout', function(){
    calcInputGetValue('Nanites_units');
});
$('#calc-input-Oxides_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Oxides_units-value').on('focusout', function(){
    calcInputGetValue('Oxides_units');
});
$('#calc-input-Polyaramids_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Polyaramids_units-value').on('focusout', function(){
    calcInputGetValue('Polyaramids_units');
});
$('#calc-input-Polytextiles_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Polytextiles_units-value').on('focusout', function(){
    calcInputGetValue('Polytextiles_units');
});
$('#calc-input-Rocket_Fuel_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Rocket_Fuel_units-value').on('focusout', function(){
    calcInputGetValue('Rocket_Fuel_units');
});
$('#calc-input-Silicate_Glass_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Silicate_Glass_units-value').on('focusout', function(){
    calcInputGetValue('Silicate_Glass_units');
});
$('#calc-input-Superconductors_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Superconductors_units-value').on('focusout', function(){
    calcInputGetValue('Superconductors_units');
});
$('#calc-input-Supertensile_Plastics_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Supertensile_Plastics_units-value').on('focusout', function(){
    calcInputGetValue('Supertensile_Plastics_units');
});
$('#calc-input-Synthetic_Oil_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Synthetic_Oil_units-value').on('focusout', function(){
    calcInputGetValue('Synthetic_Oil_units');
});
$('#calc-input-Test_Cultures_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Test_Cultures_units-value').on('focusout', function(){
    calcInputGetValue('Test_Cultures_units');
});
$('#calc-input-Transmitter_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Transmitter_units-value').on('focusout', function(){
    calcInputGetValue('Transmitter_units');
});
$('#calc-input-Viral_Agent_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Viral_Agent_units-value').on('focusout', function(){
    calcInputGetValue('Viral_Agent_units');
});
$('#calc-input-Water_Cooled_CPU_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Water_Cooled_CPU_units-value').on('focusout', function(){
    calcInputGetValue('Water_Cooled_CPU_units');
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

    var biocellsUnits = calcInputGetValue('Biocells_units');
    var constructionBlocksUnits = calcInputGetValue('Construction_Blocks_units');
    var consumerElectronicsUnits = calcInputGetValue('Consumer_Electronics_units');
    var coolantUnits = calcInputGetValue('Coolant_units');
    var enrichedUraniumUnits = calcInputGetValue('Enriched_Uranium_units');
    var fertilizerUnits = calcInputGetValue('Fertilizer_units');
    var genEnhancedLivestockUnits = calcInputGetValue('Gen_Enhanced_Livestock_units');
    var livestockUnits = calcInputGetValue('Livestock_units');
    var mechanicalPartsUnits = calcInputGetValue('Mechanical_Parts_units');
    var microfiberShieldingUnits = calcInputGetValue('Microfiber_Shielding_units');
    var miniatureElectronicsUnits = calcInputGetValue('Miniature_Electronics_units');
    var nanitesUnits = calcInputGetValue('Nanites_units');
    var oxidesUnits = calcInputGetValue('Oxides_units');
    var polyaramidsUnits = calcInputGetValue('Polyaramids_units');
    var polytextilesUnits = calcInputGetValue('Polytextiles_units');
    var rocketFuelUnits = calcInputGetValue('Rocket_Fuel_units');
    var silicateGlassUnits = calcInputGetValue('Silicate_Glass_units');
    var superconductorsUnits = calcInputGetValue('Superconductors_units');
    var supertensilePlasticsUnits = calcInputGetValue('Supertensile_Plastics_units');
    var syntheticOilUnits = calcInputGetValue('Synthetic_Oil_units');
    var testCulturesUnits = calcInputGetValue('Test_Cultures_units');
    var transmitterUnits = calcInputGetValue('Transmitter_units');
    var viralAgentUnits = calcInputGetValue('Viral_Agent_units');
    var waterCooledCpuUnits = calcInputGetValue('Water_Cooled_CPU_units');

    var biocellsReward = biocellsUnits * biocells;
    var constructionBlocksReward = constructionBlocksUnits * constructionBlocks;
    var consumerElectronicsReward = consumerElectronicsUnits * consumerElectronics;
    var coolantReward = coolantUnits * coolant;
    var enrichedUraniumReward = enrichedUraniumUnits * enrichedUranium;
    var fertilizerReward = fertilizerUnits * fertilizer;
    var genEnhancedLivestockReward = genEnhancedLivestockUnits * genEnhancedLivestock;
    var livestockReward = livestockUnits * livestock;
    var mechanicalPartsReward = mechanicalPartsUnits * mechanicalParts;
    var microfiberShieldingReward = microfiberShieldingUnits * microfibreShielding;
    var miniatureElectronicsReward = miniatureElectronicsUnits * miniatureElectronics;
    var nanitesReward = nanitesUnits * nanites;
    var oxidesReward = oxidesUnits * oxides;
    var polyaramidsReward = polyaramidsUnits * polyaramids;
    var polytextilesReward = polytextilesUnits * polytextiles;
    var rocketFuelReward = rocketFuelUnits * rocketFuel;
    var silicateGlassReward = silicateGlassUnits * silicateGlass;
    var superconductorsReward = superconductorsUnits * superconductors;
    var supertensilePlasticsReward = supertensilePlasticsUnits * supertensilePlastics;
    var syntheticOilReward = syntheticOilUnits * syntheticOil;
    var testCulturesReward = testCulturesUnits * testCultures;
    var transmitterReward = transmitterUnits * transmitter;
    var viralAgentReward = viralAgentUnits * viralAgent;
    var waterCooledCpuReward = waterCooledCpuUnits * waterCooledCpu;

    var totalReward = (biocellsReward+constructionBlocksReward+consumerElectronicsReward+coolantReward+enrichedUraniumReward+fertilizerReward+genEnhancedLivestockReward+livestockReward+mechanicalPartsReward+
            microfiberShieldingReward+miniatureElectronicsReward+nanitesReward+oxidesReward+polyaramidsReward+polytextilesReward+rocketFuelReward+silicateGlassReward+
            superconductorsReward+supertensilePlasticsReward+syntheticOilReward+testCulturesReward+transmitterReward+viralAgentReward+waterCooledCpuReward);

    var reward = totalReward.toFixed(2);

    $('#calc-output-biocells-value').html(number_format(biocellsReward) + ' ISK');
    $('#calc-output-construction_blocks-value').html(number_format(constructionBlocksReward) + ' ISK');
    $('#calc-output-consumer_electronics-value').html(number_format(consumerElectronicsReward) + ' ISK');
    $('#calc-output-coolant-value').html(number_format(coolantReward) + ' ISK');
    $('#calc-output-enriched_uranium-value').html(number_format(enrichedUraniumReward) + ' ISK');
    $('#calc-output-fertilizer-value').html(number_format(fertilizerReward) + ' ISK');
    $('#calc-output-gen_enhanced_livestock-value').html(number_format(genEnhancedLivestockReward) + ' ISK');
    $('#calc-output-livestock-value').html(number_format(livestockReward) + ' ISK');
    $('#calc-output-mechanical_parts-value').html(number_format(mechanicalPartsReward) + ' ISK');
    $('#calc-output-microfiber_shielding-value').html(number_format(microfiberShieldingReward) + ' ISK');
    $('#calc-output-miniature_electronics-value').html(number_format(miniatureElectronicsReward) + ' ISK');
    $('#calc-output-nanites-value').html(number_format(nanitesReward) + ' ISK');
    $('#calc-output-oxides-value').html(number_format(oxidesReward) + ' ISK');
    $('#calc-output-polyaramids-value').html(number_format(polyaramidsReward) + ' ISK');
    $('#calc-output-polytextiles-value').html(number_format(polytextilesReward) + ' ISK');
    $('#calc-output-rocket_fuel-value').html(number_format(rocketFuelReward) + ' ISK');
    $('#calc-output-silicate_glass-value').html(number_format(silicateGlassReward) + ' ISK');
    $('#calc-output-superconductors-value').html(number_format(superconductorsReward) + ' ISK');
    $('#calc-output-supertensile_plastics-value').html(number_format(supertensilePlasticsReward) + ' ISK');
    $('#calc-output-synthetic_oil-value').html(number_format(syntheticOilReward) + ' ISK');
    $('#calc-output-test_cultures-value').html(number_format(testCulturesReward) + ' ISK');
    $('#calc-output-transmitter-value').html(number_format(transmitterReward) + ' ISK');
    $('#calc-output-viral_agent-value').html(number_format(viralAgentReward) + ' ISK');
    $('#calc-output-cpu-value').html(number_format(waterCooledCpuReward) + ' ISK');

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