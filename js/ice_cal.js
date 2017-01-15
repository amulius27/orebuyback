/* global icicle, enrichedIcicle, glacial, smoothGlacial, glaze, pristineGlaze, blue, thickBlue, glare, glitter, gelidus, krystallos, value */

$(document).ready(function() {
    calcNow();
});

$('#calc-input-Icicle_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Icicle_units-value').on('focusout', function(){
    calcInputGetValue('Icicle_units');
});
$('#calc-input-Enriched_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Enriched_units-value').on('focusout', function(){
    calcInputGetValue('Enriched_units');
});
$('#calc-input-Glacial_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Glacial_units-value').on('focusout', function(){
    calcInputGetValue('Glacial_units');
});
$('#calc-input-Smooth_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Smooth_units-value').on('focusout', function(){
    calcInputGetValue('Smooth_units');
});
$('#calc-input-Glaze_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Glaze_units-value').on('focusout', function(){
    calcInputGetValue('Glaze_units');
});
$('#calc-input-Pristine_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Pristine_units-value').on('focusout', function(){
    calcInputGetValue('Pristine_units');
});
$('#calc-input-Blue_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Blue_units-value').on('focusout', function(){
    calcInputGetValue('Blue_units');
});
$('#calc-input-Thick_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Thick_units-value').on('focusout', function(){
    calcInputGetValue('Thick_units');
});
$('#calc-input-Glare_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Glare_units-value').on('focusout', function(){
    calcInputGetValue('Glare_units');
});
$('#calc-input-Glitter_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Glitter_units-value').on('focusout', function(){
    calcInputGetValue('Glitter_units');
});
$('#calc-input-Gelidus_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Gelidus_units-value').on('focusout', function(){
    calcInputGetValue('Gelidus_units');
});
$('#calc-input-Krystallos_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Krystallos_units-value').on('focusout', function(){
    calcInputGetValue('Krystallos_units');
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

    var icicleUnits = calcInputGetValue('Icicle_units');
    var enrichedUnits = calcInputGetValue('Enriched_units');
    var glacialUnits = calcInputGetValue('Glacial_units');
    var smoothUnits = calcInputGetValue('Smooth_units');
    var glazeUnits = calcInputGetValue('Glaze_units');
    var pristineUnits = calcInputGetValue('Pristine_units');
    var blueUnits = calcInputGetValue('Blue_units');
    var thickUnits = calcInputGetValue('Thick_units');
    var glareUnits = calcInputGetValue('Glare_units');
    var glitterUnits = calcInputGetValue('Glitter_units');
    var gelidusUnits = calcInputGetValue('Gelidus_units');
    var krystallosUnits = calcInputGetValue('Krystallos_units');

    var icicleReward = icicleUnits * icicle;
    var enrichedReward = enrichedUnits * enrichedIcicle;
    var glacialReward = glacialUnits * glacial;
    var smoothReward = smoothUnits * smoothGlacial;
    var glazeReward = glazeUnits * glaze;
    var pristineReward = pristineUnits * pristineGlaze;
    var blueReward = blueUnits * blue;
    var thickReward = thickUnits * thickBlue;
    var glareReward = glareUnits * glare;
    var glitterReward = glitterUnits * glitter;
    var gelidusReward = gelidusUnits * gelidus;
    var krystallosReward = krystallosUnits * krystallos;

    var totalReward = (icicleReward+enrichedReward+glacialReward+smoothReward+glazeReward+pristineReward+blueReward+thickReward+glareReward+glitterReward+gelidusReward+krystallosReward);

    $('#calc-output-Icicle-value').html(number_format(icicleReward) + ' ISK');
    $('#calc-output-Enriched-value').html(number_format(enrichedReward) + ' ISK');
    $('#calc-output-Glacial-value').html(number_format(glacialReward) + ' ISK');
    $('#calc-output-Smooth-value').html(number_format(smoothReward) + ' ISK');
    $('#calc-output-Glaze-value').html(number_format(glazeReward) + ' ISK');
    $('#calc-output-Pristine-value').html(number_format(pristineReward) + ' ISK');
    $('#calc-output-Blue-value').html(number_format(blueReward) + ' ISK');
    $('#calc-output-Thick-value').html(number_format(thickReward) + ' ISK');
    $('#calc-output-Glare-value').html(number_format(glareReward) + ' ISK');
    $('#calc-output-Glitter-value').html(number_format(glitterReward) + ' ISK');
    $('#calc-output-Gelidus-value').html(number_format(gelidusReward) + ' ISK');
    $('#calc-output-Krystallos-value').html(number_format(krystallosReward) + ' ISK');

    $('#calc-output-reward-value').html(number_format(totalReward) + ' ISK');

    var reward = totalReward.toFixed(2);

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