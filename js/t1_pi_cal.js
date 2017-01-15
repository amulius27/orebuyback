/* global bacteria, biofuels, biomass, chiralStructures, electrolytes, industrialFibers, oxidizingCompound, oxygenPI2, plasmoids, preciousMetals, proteins, reactiveMetals, silicon, toxicMetals, water */

$(document).ready(function() {
    calcNow();
});

$('#calc-input-Bacteria_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Bacteria_units-value').on('focusout', function(){
    calcInputGetValue('Bacteria_units');
});
$('#calc-input-Biofuels_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Biofuels_units-value').on('focusout', function(){
    calcInputGetValue('Biofuels_units');
});
$('#calc-input-Biomass_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Biomass_units-value').on('focusout', function(){
    calcInputGetValue('Biomass_units');
});
$('#calc-input-Chiral_Structures_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Chiral_Structures_units-value').on('focusout', function(){
    calcInputGetValue('Chiral_Structures_units');
});
$('#calc-input-Electrolytes_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Electrolytes_units-value').on('focusout', function(){
    calcInputGetValue('Electrolytes_units');
});
$('#calc-input-Industrial_Fibers_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Industrial_Fibers_units-value').on('focusout', function(){
    calcInputGetValue('Industrial_Fibers_units');
});
$('#calc-input-Oxidizing_Compound-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Oxidizing_Compound-value').on('focusout', function(){
    calcInputGetValue('Oxidizing_Compound');
});
$('#calc-input-Oxygen_pi_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Oxygen_pi_units-value').on('focusout', function(){
    calcInputGetValue('Oxygen_pi_units');
});
$('#calc-input-Plasmoids_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Plasmoids_units-value').on('focusout', function(){
    calcInputGetValue('Plasmoids_units');
});
$('#calc-input-Precious_Metals_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Precious_Metals_units-value').on('focusout', function(){
    calcInputGetValue('Precious_Metals_units');
});
$('#calc-input-Proteins_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Proteins_units-value').on('focusout', function(){
    calcInputGetValue('Proteins_units');
});
$('#calc-input-Reactive_Metals_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Reactive_Metals_units-value').on('focusout', function(){
    calcInputGetValue('Reactive_Metals_units');
});
$('#calc-input-Silicon_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Silicon_units-value').on('focusout', function(){
    calcInputGetValue('Silicon_units');
});
$('#calc-input-Toxic_Metals_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Toxic_Metals_units-value').on('focusout', function(){
    calcInputGetValue('Toxic_Metals_units');
});
$('#calc-input-Water_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Water_units-value').on('focusout', function(){
    calcInputGetValue('Water_units');
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

    var bacteriaUnits = calcInputGetValue('Bacteria_units');
    var biofuelUnits = calcInputGetValue('Biofuels_units');
    var biomassUnits = calcInputGetValue('Biomass_units');
    var chiralUnits = calcInputGetValue('Chiral_Structures_units');
    var electrolyteUnits = calcInputGetValue('Electrolytes_units');
    var industrialFiberUnits = calcInputGetValue('industrial_fibers_units');
    var oxidizingUnits = calcInputGetValue('Oxidizing_Compound');
    var oxygenUnits = calcInputGetValue('Oxygen_pi_units');
    var plasmoidsUnits = calcInputGetValue('Plasmoids_units');
    var preciousUnits = calcInputGetValue('Precious_Metals_units');
    var proteinsUnits = calcInputGetValue('Proteins_units');
    var reactiveUnits = calcInputGetValue('Reactive_Metals_units');
    var siliconUnits = calcInputGetValue('Silicon_units');
    var toxicUnits = calcInputGetValue('Toxic_Metals_units');
    var waterUnits = calcInputGetValue('Water_units');
    
    var bacteriaReward = bacteriaUnits * bacteria;
    var biofuelReward = biofuelUnits * biofuels;
    var biomassReward = biomassUnits * biomass;
    var chiralReward = chiralUnits * chiralStructures;
    var electrolyteReward = electrolyteUnits * electrolytes;
    var industrialReward = industrialFiberUnits * industrialFibers;
    var oxidizingReward = oxidizingUnits * oxidizingCompound;
    var oxygenReward = oxygenUnits * oxygenPI2;
    var plasmoidsReward = plasmoidsUnits * plasmoids;
    var preciousReward = preciousUnits * preciousMetals;
    var proteinsReward = proteinsUnits * proteins;
    var reactiveReward = reactiveUnits * reactiveMetals;
    var siliconReward = siliconUnits * silicon;
    var toxicReward = toxicUnits * toxicMetals;
    var waterReward = waterUnits * water;

    var totalReward = (bacteriaReward+biofuelReward+biomassReward+chiralReward+electrolyteReward+industrialReward+
        oxidizingReward+oxygenReward+plasmoidsReward+preciousReward+proteinsReward+reactiveReward+siliconReward+
        toxicReward+waterReward);
	
    var reward = totalReward.toFixed(2);

    $('#calc-output-bacteria-value').html(number_format(bacteriaReward) + ' ISK');
    $('#calc-output-biofuels-value').html(number_format(biofuelReward) + ' ISK');
    $('#calc-output-biomass-value').html(number_format(biomassReward) + ' ISK');
    $('#calc-output-chiral_structures-value').html(number_format(chiralReward) + ' ISK');
    $('#calc-output-electrolytes-value').html(number_format(electrolyteReward) + ' ISK');
    $('#calc-output-industrial_fibers-value').html(number_format(industrialReward) + ' ISK');
    $('#calc-output-oxidizing_compound-value').html(number_format(oxidizingReward) + ' ISK');
    $('#calc-output-oxygen-value').html(number_format(oxygenReward) + ' ISK');
    $('#calc-output-plasmoids-value').html(number_format(plasmoidsReward) + ' ISK');
    $('#calc-output-precious-value').html(number_format(preciousReward) + ' ISK');
    $('#calc-output-proteins-value').html(number_format(proteinsReward) + ' ISK');
    $('#calc-output-reactive_metals-value').html(number_format(reactiveReward) + ' ISK');
    $('#calc-output-silicon-value').html(number_format(siliconReward) + ' ISK');
    $('#calc-output-toxic_metals-value').html(number_format(toxicReward) + ' ISK');
    $('#calc-output-water-value').html(number_format(waterReward) + ' ISK');

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