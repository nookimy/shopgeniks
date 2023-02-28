var tempShopBuy1 = diafan_ajax.success['shop_buy'];
var addedToCartTimer = null;

diafan_ajax.success['shop_buy'] = function (form, response) {
  if (tempShopBuy1 !== undefined) {
    tempShopBuy1.call(this, form, response);
  }
  $('.js-added-to-cart').addClass("modal--opened");
  clearTimeout(addedToCartTimer);
  addedToCartTimer = setTimeout( function () {
    $('.js-added-to-cart').removeClass("modal--opened");
  }, 7000 );
  $(".js-added-to-cart--close").on('click', function () {
    $('.js-added-to-cart').removeClass("modal--opened");
  })
};

$(".js-card__btn").on('click', function() {
  $(this).parent().children(".js-card__buy-input").click();
});
