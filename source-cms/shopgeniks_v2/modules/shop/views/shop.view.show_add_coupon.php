<?php
/**
 * Шаблон формы активации купона
 * 
 * Шаблонный тег <insert name="show_add_coupon" module="shop" [template="шаблон"]>:
 * форма активации купона
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN')) {
    $path = __FILE__;
	while(! file_exists($path.'/includes/404.php')) {
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

echo '    <h3 class="promo-code__title">Промокод</h3>';
if ($result["coupon"]) {
    echo $this->diafan->_('Вы активировали купон.');
} else {
    echo '<form method="post" action="" class="promo-code__form js_shop_form ajax">
              <input type="hidden" name="action" value="add_coupon">
              <input type="hidden" name="form_tag" value="'.$result["form_tag"].'">
              <input type="hidden" name="module" value="shop">
              <div class="promo-code__input-wrapper">
                  <input class="promo-code__input" type="text" value="" name="coupon" placeholder="Код купона на скидку *">
              </div>
              <input class="promo-code__btn btn js-promo-code__btn" type="submit" value="'.$this->diafan->_('Активировать', false).'">
              <p class="promo-code__text">* в одном заказе можно использовать только один промокод</p>
              <div class="errors error"'.($result["error"] ? '>'.$result["error"] : ' style="display:none">').'</div>
          </form>';
}