<?php
/**
 * Шаблон таблицы с товарами в корзине
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

if (!empty($result["rows"])) {
    echo '
        <table class="cart-table">
            <tbody>
                <tr class="cart-table__row cart-table__row--title">
                    <th class="cart-table__cell--head">'.$this->diafan->_('Товар').'</th>
                    <th class="cart-table__cell--head">'.$this->diafan->_('Цена').'</th>
                    <th class="cart-table__cell--head">'.$this->diafan->_('Количество').'</th>
                    <th class="cart-table__cell--head">'.$this->diafan->_('Сумма').'</th>';
    if (empty($result["hide_form"])) {
        echo '      <th class="cart-table__cell--head"></th>';
    }
    echo '      </tr>';

	foreach ($result["rows"] as $row) {
		echo '  <tr class="cart-table__row cart-table__row--product">
                    <td class="cart-table__cell cart-table__cell--title">';

        if (!empty($row["img"])) {
			echo '      <a href="'.BASE_PATH_HREF.$row["link"].'">
			                <picture>
                                <img class="cart__product-img" src="'.$row["img"]["src"].'"
                                                               alt="'.$row["img"]["alt"].'"
                                                               title="'.$row["img"]["title"].'">
                            </picture>
                        </a> ';
		}

        echo '          <h2 class="cart__product-title">';
        if (!empty($row["cat"])) {
            echo '          <a class="cart__product-link" href="'.BASE_PATH_HREF.$row["cat"]["link"].'">'.$row["cat"]["name"].'</a> / ';
        }
        echo '              <a class="cart__product-link" href="'.BASE_PATH_HREF.$row["link"].'">'.$row["name"];

        echo (!empty($row["article"]) ? '<br/>'.$this->diafan->_('Артикул').': '.$row["article"] : '');

        echo '              </a>
                        </h2>';

        if($row["additional_cost"]) {
            foreach ($row["additional_cost"] as $a) {
                echo '<br>'.$a["name"];
                if($a["summ"]) {
                    echo ' + '.$a["format_summ"].' '.$result["currency"];
                }
            }
        }

        if (!$row["count"]) {
            echo '      <div>'.$this->diafan->_('Товар временно отсутствует').'</div>';
        }

        echo '      </td>';

        echo '      <td class="cart-table__cell cart-table__cell--price">
                        <ul class="prices cart__prices">
                            <li class="prices__item prices__item--cart">'.$row["price"].' '.$result["currency"].'</li>';
        if ($row["old_price"]) {
            echo '          <li class="prices__item prices__item--old prices__item--cart-old">'.$row["old_price"].' '.$result["currency"].'</li>';
        }
        echo '
                        </ul>
                    </td>';


        echo '      <td class="cart-table__cell cart-table__cell--value js_cart_count">
                        <div class="value cart__value">'.(empty($result["hide_form"]) ? '
                            <span class="value__toggle value__toggle--small value__toggle--plus js_cart_count_minus">-</span>
                            <label for="editshop'.$row["id"].'"></label>
                            <input class="value__input value__input--small" type="number" value="'.$row["count"].'" min="0" name="editshop'.$row["id"].'" size="2">
                            <span class="value__toggle value__toggle--small value__toggle--minus js_cart_count_plus" type="button">+</span>' : $row["count"]).'
                        </div>
                    </td>';

        echo '      <td class="cart-table__cell cart-table__cell--total">
                        <ul class="prices cart__total">
                            <li class="prices__item prices__item--cart-total">'.$row["summ"].' '.$result["currency"].'</li>
                        </ul>
                    </td>';

        if (empty($result["hide_form"])) {
            echo '  <td class="cart-table__cell cart-table__cell--remove">
                        <button class="cart-table__remove js_cart_remove" type="button" confirm="'.$this->diafan->_('Вы действительно хотите удалить товар из корзины?', false).'">
                            <span class="visually-hidden">Удалить товар из корзины</span>
                            <svg class="cart-table__remove-icon" width="8" height="8"><use xlink:href="#icon-cross"/></svg>
                            <input type="hidden" id="del'.$row["id"].'" name="del'.$row["id"].'" value="0">
                        </button>
                    </td>';
        }
		echo '  </tr>';
	}

    echo '
            </tbody>
        </table>';

    echo '
        <dl class="cart-calculation cart__calculation">';

    // общая скидка от объема TODO: интеграция
    if(! empty($result["discount_total"]) || ! empty($result["discount_next"])) {
        echo '
            <div class="cart-calculation__list-wrapper">
                <dt class="cart-calculation__term">';
        if (!empty($result["discount_next"]) && empty($result["hide_form"])) {
            echo $this->diafan->_('До скидки %s осталось %s', true, $result["discount_next"]["discount"], $result["discount_next"]["summ"]);
        }
        echo '  </dt>';

        echo '  <dd class="cart-calculation__definition">';
        if(! empty($result["discount_total"])) {
            echo $this->diafan->_('Скидка').' '.$result["discount_total"]["discount"];
        }
        echo '  </dd>
            </div>';
    }

    //итоговая строка для товаров
    echo '  <div class="cart-calculation__list-wrapper">
                <dt class="cart-calculation__term">
                    <b class="cart-calculation__text cart-calculation__text--big">Итого:</b>
                    <p class="cart-calculation__text">'.$this->diafan->_('за товары').' ('.$result["count"].')</p>
                </dt>
                <dd class="cart-calculation__definition">
                    <p class="cart-calculation__text cart-calculation__text--big">'.$result["summ_goods"].' '.$result["currency"].'</p>
                </dd>
            </div>';

    if(! empty($result["discount_total"])) {
        echo '
            <div class="cart_summ_old_total">'.$result["old_summ_goods"].'</div>';
    }

    $count_clm = 0;
    if(! empty($result["discount"])) {
        $count_clm += 2;
    }
    if(! empty($result["measure_unit"])) {
        $count_clm++;
    }

    echo '
        </dl>';

    /*echo '<div class="cart__buy-buttons">
              <a class="cart__buy-button btn" href="">оформить заказ</a>
              <a class="cart__buy-button btn btn--empty" href="/katalog/">Продолжить покупки</a>
          </div>';*/


    echo '<h1 class="order__title page__heading1 page__title">Оформление заказа</h1>
          <div class="order__form">
              <fieldset class="order__fieldset order__fieldset--calculation">
                  <legend class="order__subtitle order__subtitle--calculation order__subtitle--icon-order page__heading2">Ваш заказ</legend>
                  <div class="order__calculation-wrapper">
                      <dl class="order-calculation">
                          <div class="order-calculation__item">
                              <dt class="order-calculation__term">
                                  <p class="order-calculation__text order-calculation__text--big">К оплате</p>
                              </dt>
                              <dd class="order-calculation__definition">
                                  <b class="order-calculation__text order-calculation__text--big">'.$result["summ"].' '.$result["currency"].'</b>
                              </dd>
                          </div>
                      </dl>
                      <a class="order__change-btn btn" href="#h1">Изменить</a>
                  </div>
              </fieldset>
          </div>';

    // Список способов доставки
    echo $this->get('list',
        'delivery',
        $result
    );

}
