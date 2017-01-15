$(document).ready(function() {
calcNow();
});

$('#calc-input-aqueous_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-aqueous_units-value').on('focusout', function(){
    calcInputGetValue('aqueous_units');
});
$('#calc-input-ionic_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-ionic_units-value').on('focusout', function(){
    calcInputGetValue('ionic_units');
});
$('#calc-input-base_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-base_units-value').on('focusout', function(){
    calcInputGetValue('base_units');
});
$('#calc-input-heavy_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-heavy_units-value').on('focusout', function(){
    calcInputGetValue('heavy_units');
});
$('#calc-input-noble_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-noble_units-value').on('focusout', function(){
    calcInputGetValue('noble_units');
});
$('#calc-input-carbon_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-carbon_units-value').on('focusout', function(){
    calcInputGetValue('carbon_units');
});
$('#calc-input-micro_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-micro_units-value').on('focusout', function(){
    calcInputGetValue('micro_units');
});
$('#calc-input-complex_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-complex_units-value').on('focusout', function(){
    calcInputGetValue('complex_units');
});
$('#calc-input-planktic_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-planktic_units-value').on('focusout', function(){
    calcInputGetValue('planktic_units');
});
$('#calc-input-noble_gas_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-noble_gas_units-value').on('focusout', function(){
    calcInputGetValue('noble_gas_units');
});
$('#calc-input-reactive_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-reactive_units-value').on('focusout', function(){
    calcInputGetValue('reactive_units');
});
$('#calc-input-felsic_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-felsic_units-value').on('focusout', function(){
    calcInputGetValue('felsic_units');
});
$('#calc-input-non_cs_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-non_cs_units-value').on('focusout', function(){
    calcInputGetValue('non_cs_units');
});
$('#calc-input-suspended_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-suspended_units-value').on('focusout', function(){
    calcInputGetValue('suspended_units');
});
$('#calc-input-autotrophs_units-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-autotrophs_units-value').on('focusout', function(){
    calcInputGetValue('autotrophs_units');
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

    var aqueousUnits = calcInputGetValue('aqueous_units');
    var ionicUnits = calcInputGetValue('ionic_units');
    var baseUnits = calcInputGetValue('base_units');
    var heavyUnits = calcInputGetValue('heavy_units');
    var nobleUnits = calcInputGetValue('noble_units');
    var carbonUnits = calcInputGetValue('carbon_units');
    var microUnits = calcInputGetValue('micro_units');
    var complexUnits = calcInputGetValue('complex_units');
    var plankticUnits = calcInputGetValue('planktic_units');
    var noble_gasUnits = calcInputGetValue('noble_gas_units');
    var reactiveUnits = calcInputGetValue('reactive_units');
    var felsicUnits = calcInputGetValue('felsic_units');
    var non_csUnits = calcInputGetValue('non_cs_units');
    var suspendedUnits = calcInputGetValue('suspended_units');
    var autotrophsUnits = calcInputGetValue('autotrophs_units');

    var aqueousReward = aqueousUnits * aqueous;
    var ionicReward = ionicUnits * ionic;
    var baseReward = baseUnits * base;
    var heavyReward = heavyUnits * heavy;
    var nobleReward = nobleUnits * noble;
    var carbonReward = carbonUnits * carbon;
    var microReward = microUnits * micro;
    var complexReward = complexUnits * complex;
    var plankticReward = plankticUnits * planktic;
    var noble_gasReward = noble_gasUnits * noble_gas;
    var reactiveReward = reactiveUnits * reactive;
    var felsicReward = felsicUnits * felsic;
    var non_csReward = non_csUnits * non_cs;
    var suspendedReward = suspendedUnits * suspended;
    var autotrophsReward = autotrophsUnits * autotrophs;

    var aqueousPrice = aqueousReward;
    var ionicPrice = ionicReward;
    var basePrice = baseReward;
    var heavyPrice = heavyReward;
    var noblePrice = nobleReward;
    var carbonPrice = carbonReward;
    var microPrice = microReward;
    var complexPrice = complexReward;
    var plankticPrice = plankticReward;
    var noble_gasPrice = noble_gasReward;
    var reactivePrice = reactiveReward;
    var felsicPrice = felsicReward;
    var non_csPrice = non_csReward;
    var suspendedPrice = suspendedReward;
    var autotrophsPrice = autotrophsReward;

    var basePrice = baseReward;
    var heavyPrice = heavyReward;
    var noblePrice = nobleReward;
    var carbonPrice = carbonReward;
    var microPrice = microReward;
    var complexPrice = complexReward;
    var plankticPrice = plankticReward;
    var noble_gasPrice = noble_gasReward;
    var reactivePrice = reactiveReward;
    var felsicPrice = felsicReward;
    var non_csPrice = non_csReward;
    var suspendedPrice = suspendedReward;
    var autotrophsPrice = autotrophsReward;

    var totalReward = (aqueousPrice+ionicPrice+basePrice+heavyPrice+noblePrice+carbonPrice+microPrice+complexPrice+plankticPrice+
	noble_gasPrice+reactivePrice+felsicPrice+non_csPrice+suspendedPrice+autotrophsPrice);

    var reward = totalReward.toFixed(2);

    $('#calc-output-aqueous-value').html(number_format(aqueousReward) + ' ISK');
    $('#calc-output-ionic-value').html(number_format(ionicReward) + ' ISK');
	$('#calc-output-base-value').html(number_format(baseReward) + ' ISK');
    $('#calc-output-heavy-value').html(number_format(heavyReward) + ' ISK');
	$('#calc-output-noble-value').html(number_format(nobleReward) + ' ISK');
    $('#calc-output-carbon-value').html(number_format(carbonReward) + ' ISK');
	$('#calc-output-micro-value').html(number_format(microReward) + ' ISK');
    $('#calc-output-complex-value').html(number_format(complexReward) + ' ISK');
	$('#calc-output-planktic-value').html(number_format(plankticReward) + ' ISK');
    $('#calc-output-noble_gas-value').html(number_format(noble_gasReward) + ' ISK');
	$('#calc-output-reactive-value').html(number_format(reactiveReward) + ' ISK');
    $('#calc-output-felsic-value').html(number_format(felsicReward) + ' ISK');
	$('#calc-output-non_cs-value').html(number_format(non_csReward) + ' ISK');
    $('#calc-output-suspended-value').html(number_format(suspendedReward) + ' ISK');
	$('#calc-output-autotrophs-value').html(number_format(autotrophsReward) + ' ISK');

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
