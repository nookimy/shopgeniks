<?php
/**
 * Шаблон кнопки «Купить», в котором характеристики, влияющие на цену выводятся в виде выпадающего списка
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

if (! empty($result["result"]["access_buy"]))
	return false;

if($result["row"]["empty_price"])
	return false;

$action = '';
if(! $result["result"]["cart_link"] || $result["row"]["no_buy"] || empty($result["row"]["count"])) {
	$action = 'buy';
}

// TODO: убрать инлайн с теста!
echo '
<form method="post" action="" class="js_shop_form shop_form ajax" style="width: 100%">
    <input type="hidden" name="good_id" value="'. $result["row"]["id"].'">
    <input type="hidden" name="module" value="shop">
    <input type="hidden" name="action" value="'.$action.'">';

if ($result["row"]["no_buy"] || empty($result["row"]["count"])) {
	echo '<p class="product-information__availability js_shop_no_buy js_shop_no_buy_good">'.$this->diafan->_('Товар временно отсутствует').'</p>';
	$hide_submit = true;
	$waitlist = true;
} else {
    echo '<p class="product-information__availability">Товар в наличии</p>';
}

if(! $result["result"]["cart_link"]) {
    $hide_submit = true;
}

// у товара несколько цен
if ($result["row"]["price_arr"]) {
	foreach ($result["row"]["price_arr"] as $price) {
		$param_code = '';
		foreach ($price["param"] as $p) {
			if($p["value"]) {
				$param_code .= ' param'.$p["id"].'="'.$p["value"].'"';
			}
		}
		if(! empty($price["image_rel"])) {
			$param_code .= ' image_id="'.$price["image_rel"].'"';
		}

        echo '<ul class="prices product__prices js_shop_param_price shop_param_price shop-item-price"'.$param_code.'>
                  <li class="prices__item prices__item--product-page">
                      <span class="js_shop_price" summ="'.$price["price_no_format"].'" format_price_1="'.$this->diafan->configmodules("format_price_1", "shop").'" format_price_2="'.$this->diafan->configmodules("format_price_2", "shop").'" format_price_3="'.$this->diafan->configmodules("format_price_3", "shop").'">'.$price["price"].'</span> '.$result["result"]["currency"].'
                  </li>';
        if(! empty($price["old_price"])) {
            echo '<li class="prices__item prices__item--old prices__item--product-page-old">'.$price["old_price"].' '.$result["result"]["currency"].'</li>';
        }
        if (! $price["count"] && empty($hide_submit) || empty($price["price_no_format"]) && ! $result['result']["buy_empty_price"]) {
            echo '<li class="prices__item js_shop_no_buy">'.$this->diafan->_('Товар временно отсутствует').'</li>';
            $waitlist = true;
        }
        echo '</ul>';
	}

	echo '<div class="addict-field">';
		echo '<div class="js_shop_form_param shop_form_param">';
		foreach ($result["result"]["depends_param"] as $param)
		{
			if(! empty($result["row"]["param_multiple"][$param["id"]]))
			{
				if(count($result["row"]["param_multiple"][$param["id"]]) == 1)
				{
					foreach ($result["row"]["param_multiple"][$param["id"]] as $value => $depend)
					{
						echo '<input type="hidden" name="param'.$param["id"].'" value="'.$value.'"'.($depend == 'depend' ? ' class="depend_param js_shop_depend_param"' : '').'>';
					}
				}
				else
				{
					$select = '';
					foreach ($param["values"] as $value)
					{
						if(! empty($result["row"]["param_multiple"][$param["id"]][$value["id"]]))
						{
							if(! $select)
							{
								$select = ' '.$param["name"].' <select name="param'.$param["id"].'" class="shop-dropdown inpselect'.($result["row"]["param_multiple"][$param["id"]][$value["id"]] == 'depend' ? ' depend_param js_shop_depend_param' : '').'">';
							}

							$select .= '<option value="'.$value["id"].'"'
							.(! empty($value["selected"]) ? ' class="js_form_option_selected" selected' : '')
							.'>'.$value["name"].'</option>
							';
						}
					}
					if($select)
					{
						echo $select.'</select> ';
					}
				}
			}
		}
		echo '</div>';
	echo '</div>';
}

if(! empty($result["row"]["additional_cost"]))
{
	$rand = rand(0, 9999);
	echo '<div class="js_shop_additional_cost shop_additional_cost">';
	foreach($result["row"]["additional_cost"] as $r)
	{
		echo '<div class="shop_additional_cost_block"><input type="checkbox" name="additional_cost[]" value="'.$r["id"].'" id="shop_additional_cost_'.$result["row"]["id"].'_'.$r["id"].'_'.$rand.'" summ="';
		if(! $r["percent"] && $r["summ"])
		{
			echo $r["summ"];
		}
		echo '"';
		if($r["required"])
		{
			echo ' checked disabled';
		}
		echo '> <label for="shop_additional_cost_'.$result["row"]["id"].'_'.$r["id"].'_'.$rand.'">'.$r["name"];
		if($r["percent"])
		{
			foreach ($result["row"]["price_arr"] as $price)
			{
				$param_code = '';
				foreach ($price["param"] as $p)
				{
					if($p["value"])
					{
						$param_code .= ' param'.$p["id"].'="'.$p["value"].'"';
					}
				}
				echo '<div class="js_shop_additional_cost_price" summ="'.$r["price_summ"][$price["price_id"]].'"'.$param_code.'>';
				echo ' <b>+'.$r["format_price_summ"][$price["price_id"]].' '.$result["result"]["currency"].'</b></div>';
			}
		}
		elseif($r["summ"])
		{
			echo ' <div class="js_shop_additional_cost" summ="'.$r["summ"].'"><b>+'.$r["format_summ"].' '.$result["result"]["currency"].'</b></div>';
		}
		echo '</label></div>';
	}
	echo '</div>';
}

if(! empty($waitlist))
{
	echo '
	<div class="js_shop_waitlist shop_waitlist">
		'.$this->diafan->_('Сообщить, когда появится на e-mail').'
		<input type="email" name="mail" value="'.$this->diafan->_users->mail.'">
		<input type="button" value="'.$this->diafan->_('Ok', false).'" action="wait">
		<div class="errors error_waitlist" style="display:none"></div>
	</div>';
}

echo '<div class="product__form js_shop_buy">';
	if (empty($result["row"]['is_file']) && empty($hide_submit))
	{
        echo '<input class="value__input js-number-of-goods" type="number" name="count" id="number-of-goods" value="1" min="1" step="any">';
		if(! empty($result["row"]["measure_unit"]))
		{
			echo ' '.$result["row"]["measure_unit"].' ';
		}
	}

echo '    <div class="product__buy-buttons">';
if (empty($hide_submit)) {
    echo '    <input class="card__buy-input js-card__buy-input" type="button" action="buy"/>';
    if (! empty($result["row"]["count_in_cart"])) {
        $measure_unit = ! empty($result["row"]["measure_unit"]) ? $result["row"]["measure_unit"] : $this->diafan->_('шт.');
        echo '<button class="product__buy-button product__buy-button--in-cart btn js-product__buy-button  js-card__btn" data-shop-item-id="'.$result["row"]["id"].'" type="button">'.$this->diafan->_('В корзине %s %s', true, $result["row"]["count_in_cart"], $measure_unit).'</button>';
    } else {
        echo '<button class="product__buy-button btn js-product__buy-button  js-card__btn" data-shop-item-id="'.$result["row"]["id"].'" type="button">Добавить в корзину</button>';
    }

}
if (empty($hide_submit) && ! empty($result["result"]["one_click"])) {
    echo '<span class="js_shop_one_click shop_one_click"><input class="product__buy-button btn btn--empty" type="button" value="'.$this->diafan->_('Быстрый заказ', false).'" action="one_click"></span>';
}
echo '    </div>
      </div>';


echo '<div class="error"';
if (!empty($result["row"]["count_in_cart"]))
{
	$measure_unit = ! empty($result["row"]["measure_unit"]) ? $result["row"]["measure_unit"] : $this->diafan->_('шт.');
	echo '>'.$this->diafan->_('В <a href="%s">корзине</a> %s %s, <a href="%s">перейти к оформлению заказа</a>', true, BASE_PATH_HREF.$result["result"]["cart_link"], $result["row"]["count_in_cart"], $measure_unit, BASE_PATH_HREF.$result["result"]["cart_link"]);
}
else
{
	echo ' style="display:none;">';
}
echo '</div>';
echo '</form>';

//форма быстрого заказа
if(! empty($result["result"]["one_click"]))
{
    $result["result"]["one_click"]["good_id"] = $result["row"]["id"];
    echo $this->get('one_click', 'cart', $result["result"]["one_click"]);
}

$this->diafan->_site->js_view[] = 'modules/shop/js/shop.buy_form.js';
$this->diafan->_site->js_view[] = 'modules/shop/js/shop.buy_form.custom.js';