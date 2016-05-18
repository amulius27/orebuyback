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
    
    
    var bacteriaReward = bacteriaUnits * bacteria;
    

    var totalReward = bacteriaReward;
	
    var reward = totalReward.toFixed(2);

    $('#calc-output-bacteria-value').html(number_format(bacteriaReward) + ' ISK');
    

    $('#calc-output-reward-value').html('0 ISK');


    return reward;
}

function number_format (number, decimals, dec_point, thousands_sep)
{
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 2 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? ',' : dec_point,
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