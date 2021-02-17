(function ($) {

    var menuBtn = $('.menu-btn');

    menuBtn.on('click', function () {
        $('.menu, #menu, #social-menu, #menu li, #social-menu li').toggleClass('show');
        $(this).children().toggleClass('open');
    });

    $('.menu').find('a').on('click', function (e) {
        e.preventDefault();
        var id = this.hash,
            pos = $(id).offset().top - 100;
        $('html, body').animate({
            scrollTop: pos
        }, 2000);
    });

    var wrongInput = $('.form p');

    var priceInput = $('#price'),
        totalPriceInput = $('#total-price'),
        price, totalPrice = 0;

    var i, j;

    var priceList = [
        [],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]
    ],
        defStarterPrice = 420,
        starterPrice = 420;

    var width, height, x, y;

    for (i = 20; i <= 45; i++) {
        for (j = 24; j <= 60; j++) {
            priceList[i][j] = starterPrice;
            starterPrice += 16;
        }
        defStarterPrice += 35;
        starterPrice = defStarterPrice;
    }

    function getNumber(value) {
        var replaced = value.val();
        replaced = replaced.replace(/,/g, '.');
        var result;
        result = Number(parseFloat(replaced).toFixed(1));
        return result;
    }

    var defaultPrice = parseFloat(priceInput.val());
    priceInput.val(defaultPrice + ' €');

    $('#basic-price').on('submit', function (e) {
        e.preventDefault();
        width = getNumber($('#width'));
        height = getNumber($('#height'));
        if (width < 2.39 || width > 6.01) {
            wrongInput.fadeIn(500);
        }
        else if (height < 1.99 || height > 4.51) {
            wrongInput.fadeIn(500);
        }
        else {
            wrongInput.fadeOut(500);
            x = height * 10;
            y = width * 10;
            price = priceList[x][y];
            priceInput.val(price + ' €');
        }
    });

    var optionInputs = $('.options input'),
        optionValInputs = $('.option-val input'),
        drevodekorVal, hplVal, ralVal,personalDoorsVal, mountVal, electricVal;


    $('#deselect').on('click', function () {
        optionInputs.prop('checked', false);
        $('.option-val').slideUp(500);
        optionValInputs.val('');
    });

    var drevodekor = $('#drevodekor-val'),
        hpl = $('#hpl-val'),
        ral = $('#ral-val'),
        personalDoors = $('#personal_doors'),
        mount = $('#mount'),
        electric = $('#electric');

    optionInputs.change(function () {
        if ($(this).is(':checked')) {
            var metersInput = $(this).attr('id') + '-input';
            $('#'+ metersInput).slideDown(500);
        }
    });

    var optionPrices = {
        drevodekor: parseFloat($('#drevodekor').val()),
        hpl: parseFloat($('#hpl').val()),
        ral: parseFloat($('#ral').val()),
        personalDoors: parseFloat(personalDoors.val()),
        mounting: parseFloat(mount.val()),
        electric: parseFloat(electric.val())
    };

    $('#get-total-price').on('click', function () {
        drevodekorVal = getNumber(drevodekor) * optionPrices.drevodekor;
        hplVal = getNumber(hpl) * optionPrices.hpl;
        ralVal = getNumber(ral) * optionPrices.ral;
        personalDoorsVal = 0;
        mountVal = 0;
        electricVal = 0;
        if (!drevodekorVal) drevodekorVal = 0;
        if (!hplVal) hplVal = 0;
        if (!ralVal) ralVal = 0;
        if (!price) price = 0;
        if (personalDoors.is(':checked')) personalDoorsVal = optionPrices.personalDoors;
        if (mount.is(':checked')) mountVal = optionPrices.mounting;
        if (electric.is(':checked')) electricVal = optionPrices.electric;
        totalPrice = price + drevodekorVal + hplVal + ralVal + personalDoorsVal + mountVal + electricVal;
        totalPrice = totalPrice.toFixed(2);
        totalPriceInput.val(totalPrice + ' €');
    });

    var infoEl = $('.info'),
        errorsEl = $('.contact p');

    $('#email-form').on('submit', function (e) {
        e.preventDefault();
        var req = $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize()
        });
        req.done(function (data) {
            var retData = JSON.parse(data),
                errors = retData.errors;
            if (retData.status === "success") {
                errorsEl.text('');
                infoEl.fadeIn(500);
                infoEl.text("Váš e-mail bol odoslaný úspešne");
            }
            else {
                infoEl.fadeIn(500);
                infoEl.text("Naskytli sa tieto chyby pri odosielaní e-mailu:");
                for (var i = 0; i < errors.length; i++) {
                    $('.contact p').fadeIn(500);
                    errorsEl.text(errors[i])
                }
            }
        });
    });

}(jQuery));