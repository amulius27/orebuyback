$(document).ready(function() {
    calcNow();
});

$('#calc-input-C50-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C50-value').on('focusout', function(){
    calcInputGetValue('C50');
});
$('#calc-input-C60-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C60-value').on('focusout', function(){
    calcInputGetValue('C60');
});
$('#calc-input-C70-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C70-value').on('focusout', function(){
    calcInputGetValue('C70');
});
$('#calc-input-C72-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C72-value').on('focusout', function(){
    calcInputGetValue('C72');
});
$('#calc-input-C84-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C84-value').on('focusout', function(){
    calcInputGetValue('C84');
});
$('#calc-input-C28-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C28-value').on('focusout', function(){
    calcInputGetValue('C28');
});
$('#calc-input-C32-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C32-value').on('focusout', function(){
    calcInputGetValue('C32');
});
$('#calc-input-C320-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C320-value').on('focusout', function(){
    calcInputGetValue('C320');
});
$('#calc-input-C540-value').on('propertychange change keyup paste input', function() {
    calcNow();
});
$('#calc-input-C540-value').on('focusout', function(){
    calcInputGetValue('C540');
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

    var C50Units = calcInputGetValue('C50');
    var C60Units = calcInputGetValue('C60');
    var C70Units = calcInputGetValue('C70');
    var C72Units = calcInputGetValue('C72');
    var C84Units = calcInputGetValue('C84');
    var C28Units = calcInputGetValue('C28');
    var C32Units = calcInputGetValue('C32');
    var C320Units = calcInputGetValue('C320');
    var C540Units = calcInputGetValue('C540');
    
    var C50Reward = C50Units * c50;
    var C60Reward = C60Units * c60;
    var C70Reward = C70Units * c70;
    var C72Reward = C72Units * c72;
    var C84Reward = C84Units * c84;
    var C28Reward = C28Units * c28;
    var C32Reward = C32Units * c32;
    var C320Reward = C320Units * c320;
    var C540Reward = C540Units * c540;

    var totalReward = (C50Reward + C60Reward + C70Reward + C72Reward + C84Reward + C28Reward + C32Reward + C320Reward + C540Reward) * value;

    $('#calc-output-C50-value').html(number_format(C50Reward) + ' ISK');
    $('#calc-output-C60-value').html(number_format(C60Reward) + ' ISK');
    $('#calc-output-C70-value').html(number_format(C70Reward) + ' ISK');
    $('#calc-output-C72-value').html(number_format(C72Reward) + ' ISK');
    $('#calc-output-C84-value').html(number_format(C84Reward) + ' ISK');
    $('#calc-output-C28-value').html(number_format(C28Reward) + ' ISK');
    $('#calc-output-C32-value').html(number_format(C32Reward) + ' ISK');
    $('#calc-output-C320-value').html(number_format(C320Reward) + ' ISK');
    $('#calc-output-C540-value').html(number_format(C540Reward) + ' ISK');

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