$(document).ready(function() {
    calcNow();
});

$('#calc-input-Helium_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Helium_units-value').on('focusout', function(){
    calcInputGetValue('Helium_units');
});
$('#calc-input-Hydrogen_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Hydrogen_units-value').on('focusout', function(){
    calcInputGetValue('Hydrogen_units');
});
$('#calc-input-Nitrogen_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Nitrogen_units-value').on('focusout', function(){
    calcInputGetValue('Nitrogen_units');
});
$('#calc-input-Oxygen_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Oxygen_units-value').on('focusout', function(){
    calcInputGetValue('Oxygen_units');
});
$('#calc-input-Heavy_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Heavy_units-value').on('focusout', function(){
    calcInputGetValue('Heavy_units');
});
$('#calc-input-Ozone_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Ozone_units-value').on('focusout', function(){
    calcInputGetValue('Ozone_units');
});
$('#calc-input-Strontium_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Strontium_units-value').on('focusout', function(){
    calcInputGetValue('Strontium_units');
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

    var heliumUnits = calcInputGetValue('Helium_units');
    var hydrogenUnits = calcInputGetValue('Hydrogen_units');
    var nitrogenUnits = calcInputGetValue('Nitrogen_units');
    var oxygenUnits = calcInputGetValue('Oxygen_units');
    var heavyUnits = calcInputGetValue('Heavy_units');
    var ozoneUnits = calcInputGetValue('Ozone_units');
    var strontiumUnits = calcInputGetValue('Strontium_units');

    var heliumReward = heliumUnits * helium;
    var hydrogenReward = hydrogenUnits * hydrogen;
    var nitrogenReward = nitrogenUnits * nitrogen;
    var oxygenReward = oxygenUnits * oxygenIsotopes;
    var heavyReward = heavyUnits * heavyWater;
    var ozoneReward = ozoneUnits * ozone;
    var strontiumReward = strontiumUnits * strontium;

    var totalReward = (heliumReward+hydrogenReward+nitrogenReward+oxygenReward+heavyReward+ozoneReward+strontiumReward);

    $('#calc-output-Helium-value').html(number_format(heliumReward) + ' ISK');
    $('#calc-output-Hydrogen-value').html(number_format(hydrogenReward) + ' ISK');
    $('#calc-output-Nitrogen-value').html(number_format(nitrogenReward) + ' ISK');
    $('#calc-output-Oxygen-value').html(number_format(oxygenReward) + ' ISK');
    $('#calc-output-Heavy-value').html(number_format(heavyReward) + ' ISK');
    $('#calc-output-Ozone-value').html(number_format(ozoneReward) + ' ISK');
    $('#calc-output-Strontium-value').html(number_format(strontiumReward) + ' ISK');

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