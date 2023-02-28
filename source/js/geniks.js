$(document).ready(function (e) {

    // Табы промо продуктов
    $('.js-promo-products__tabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $('.js-promo-products__tabs .promo-filter__item').removeClass('promo-filter__item--active');
        $(e.target).parent()
                   .addClass('promo-filter__item--active');
    });

    $(".js-number-of-goods").inputSpinner({
        groupClass: "value product__form-value",
        buttonTextDec: "-",
        buttonTextInc: "+",
        buttonClassDec: "value__toggle value__toggle--plus",
        buttonClassInc: "value__toggle value__toggle--minus"
    });
});