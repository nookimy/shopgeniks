$('.js-cart-table__form').submit(function() {
    $(".js-cart-table__preloader").show();
    $(this).css("opacity", "0.4");
});

$('.js_cart_order_form').submit(function() {
  $(".js-cart-order__preloader").show();
  $(this).css("opacity", "0.4");
});

$ajaxSuccessCartRecalcStack = diafan_ajax.success['cart_recalc'];
diafan_ajax.success['cart_recalc'] = function(form, response) {
    $ajaxSuccessCartRecalcStack.call(this, form, response);
    $(".js-cart-table__preloader").hide();
    $(form).css("opacity", "1");
}

$ajaxSuccessCartOrderStack = diafan_ajax.success['cart_order'];
diafan_ajax.success['cart_order'] = function(form, response) {
  if ($ajaxSuccessCartOrderStack !== undefined) {
    $ajaxSuccessCartOrderStack.call(this, form, response);
  }
  $(".js-cart-order__preloader").hide();
  $(form).css("opacity", "1");
}
