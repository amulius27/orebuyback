$(document).ready(function() {
    calcNow();
});

$('#calc-input-Broadcast_Node_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Broadcast_Node_units-value').on('focusout', function(){
    calcInputGetValue('Broadcast_Node_units');
});
$('#calc-input-Integrity_Response_Drones_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Integrity_Response_Drones_units-value').on('focusout', function(){
    calcInputGetValue('Integrity_Response_Drones_units');
});
$('#calc-input-NanoFactory_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-NanoFactory_units-value').on('focusout', function(){
    calcInputGetValue('NanoFactory_units');
});
$('#calc-input-Organic_Mortar_Applicators_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Organic_Mortar_Applicators_units-value').on('focusout', function(){
    calcInputGetValue('Organic_Mortar_Applicators_units');
});
$('#calc-input-Recursive_Computing_Module_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Recursive_Computing_Module_units-value').on('focusout', function(){
    calcInputGetValue('Recursive_Computing_Module_units');
});
$('#calc-input-Self_Harmonizing_Power_Core_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Self_Harmonizing_Power_Core_units-value').on('focusout', function(){
    calcInputGetValue('Self_Harmonizing_Power_Core_units');
});
$('#calc-input-Sterile_Conduits_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Sterile_Conduits_units-value').on('focusout', function(){
    calcInputGetValue('Sterile_Conduits_units');
});
$('#calc-input-Wetware_Mainframe_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-Wetware_Mainframe_units-value').on('focusout', function(){
    calcInputGetValue('Wetware_Mainframe_units');
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

    var broadcastUnits = calcInputGetValue('Broadcast_Node_units');
    var responseUnits = calcInputGetValue('Integrity_Response_Drones_units');
    var nanoFactoryUnits = calcInputGetValue('NanoFactory_units');
    var applicatorUnits = calcInputGetValue('Organic_Mortar_Applicators_units');
    var computingModuleUnits = calcInputGetValue('Recursive_Computing_Module_units');
    var powerCoreUnits = calcInputGetValue('Self_Harmonizing_Power_Core_units');
    var sterileConduitsUnits = calcInputGetValue('Sterile_Conduits_units');
    var mainframeUnits = calcInputGetValue('Wetware_Mainframe_units');

    var broadcastReward = broadcastUnits * broadcast;
    var responseReward = responseUnits * responseDrones;
    var nanoFactoryReward = nanoFactoryUnits * nanoFactory;
    var applicatorReward = applicatorUnits * organicMortar;
    var computingModuleReward = computingModuleUnits * recursiveComputing;
    var powerCoreReward = powerCoreUnits * powerCore;
    var sterileConduitsReward = sterileConduitsUnits * sterileConduits;
    var mainframeReward = mainframeUnits * Mainframe;

    var totalReward = (broadcastReward+responseReward+nanoFactoryReward+applicatorReward+
            computingModuleReward+powerCoreReward+sterileConduitsReward+mainframeReward);

    var reward = totalReward.toFixed(2);

    $('#calc-output-broadcast-value').html(number_format(broadcastReward) + ' ISK');
    $('#calc-output-responseDrones-value').html(number_format(responseReward) + ' ISK');
    $('#calc-output-nanoFactory-value').html(number_format(nanoFactoryReward) + ' ISK');
    $('#calc-output-organicMortar-value').html(number_format(applicatorReward) + ' ISK');
    $('#calc-output-recursiveComputing-value').html(number_format(computingModuleReward) + ' ISK');
    $('#calc-output-powerCore-value').html(number_format(powerCoreReward) + ' ISK');
    $('#calc-output-sterileConduits-value').html(number_format(sterileConduitsReward) + ' ISK');
    $('#calc-output-Mainframe-value').html(number_format(mainframeReward) + ' ISK');

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