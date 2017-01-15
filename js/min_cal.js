/* global tritanium, pyerite, mexallon, isogen, nocxium, zydrine, megacyte, morphite, value */

$(document).ready(function() {
    calcNow();
});

    $('#calc-input-tritanium_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-tritanium_units-value').on('focusout', function(){
        calcInputGetValue('tritanium_units');
    });
    $('#calc-input-pyerite_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-pyerite_units-value').on('focusout', function(){
        calcInputGetValue('pyerite_units');
    });
    $('#calc-input-mexallon_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-mexallon_units-value').on('focusout', function(){
        calcInputGetValue('mexallon_units');
    });
    $('#calc-input-isogen_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-isogen_units-value').on('focusout', function(){
        calcInputGetValue('isogen_units');
    });
    $('#calc-input-nocxium_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-nocxium_units-value').on('focusout', function(){
        calcInputGetValue('nocxium_units');
    });
    $('#calc-input-zydrine_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-zydrine_units-value').on('focusout', function(){
        calcInputGetValue('zydrine_units');
    });
    $('#calc-input-megacyte_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-megacyte_units-value').on('focusout', function(){
        calcInputGetValue('megacyte_units');
    });
    $('#calc-input-morphite_units-value').on('propertychange change keyup paste input', function() {
        calcNow();
    });
    $('#calc-input-morphite_units-value').on('focusout', function(){
        calcInputGetValue('morphite_units');
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

        var tritaniumUnits = calcInputGetValue('tritanium_units');
        var pyeriteUnits = calcInputGetValue('pyerite_units');
        var mexallonUnits = calcInputGetValue('mexallon_units');
        var isogenUnits = calcInputGetValue('isogen_units');
        var nocxiumUnits = calcInputGetValue('nocxium_units');
        var zydrineUnits = calcInputGetValue('zydrine_units');
        var megacyteUnits = calcInputGetValue('megacyte_units');
        var morphiteUnits = calcInputGetValue('morphite_units');

        var tritaniumReward = tritaniumUnits * tritanium;
        var pyeriteReward = pyeriteUnits * pyerite;
        var mexallonReward = mexallonUnits * mexallon;
        var isogenReward = isogenUnits * isogen;
        var nocxiumReward = nocxiumUnits * nocxium;
        var zydrineReward = zydrineUnits * zydrine;
        var megacyteReward = megacyteUnits * megacyte;
        var morphiteReward = morphiteUnits * morphite;

        var totalReward = (tritaniumReward+pyeriteReward+mexallonReward+isogenReward+nocxiumReward+zydrineReward+megacyteReward+morphiteReward);

        $('#calc-output-tritanium-value').html(number_format(tritaniumReward) + ' ISK');
        $('#calc-output-pyerite-value').html(number_format(pyeriteReward) + ' ISK');
        $('#calc-output-mexallon-value').html(number_format(mexallonReward) + ' ISK');
        $('#calc-output-isogen-value').html(number_format(isogenReward) + ' ISK');
        $('#calc-output-nocxium-value').html(number_format(nocxiumReward) + ' ISK');
        $('#calc-output-zydrine-value').html(number_format(zydrineReward) + ' ISK');
        $('#calc-output-megacyte-value').html(number_format(megacyteReward) + ' ISK');
        $('#calc-output-morphite-value').html(number_format(morphiteReward) + ' ISK');

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