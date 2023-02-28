<?php
/**
 * Шаблон формы редактирования корзины товаров, оформления заказа
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

if (empty($result["rows"]))
{
	echo '
      <div class="cart-table">
          <p>'.$this->diafan->_('Корзина пуста.').' <a href="'.BASE_PATH_HREF.$result["shop_link"].'">'.$this->diafan->_('Перейти к покупкам.').'</a></p>';

    if ($this->diafan->_users->id)
    {
        echo '<p>Посмотреть\повторить мои предыдущие заказы: <a href="'.BASE_PATH_HREF.'user">'.$this->diafan->_('Мои заказы.').'</a></p>';
    }

	echo '
      </div>';
	return;
}

echo '<a name="top"></a>';

echo '
      <div class="cart-table__preloader js-cart-table__preloader">Пожалуйста подождите, пересчитываем заказ...</div>
      <form action="" method="POST" class="js-cart-table__form js_cart_table_form ajax">
          <input type="hidden" name="module" value="cart">
          <input type="hidden" name="action" value="recalc">
          <input type="hidden" name="form_tag" value="'.$result["form_tag"].'">
          <input type="hidden" name="delivery_summ" value=""> 
          <input type="hidden" name="delivery_info" value="">
          <div class="page__wrapper">
              <div class="page__error-message js-cart-table__error-message errors error"'.($result["error"] ? '>'.$result["error"] : ' style="display:none">').'</div>
          </div>
          <div class="cart_table">';
echo      $this->get('table', 'cart', $result);
echo '    </div>
          <div class="cart_recalc">
              <input type="submit" value="'.$this->diafan->_('Пересчитать', false).'">
          </div>
      </form>
      
      ';

echo '  
        <div class="cart__discount">
            <section class="promo-code cart__promo-code card">
            '.$this->htmleditor('<insert name="show_add_coupon" module="shop">').'
            </section>
        </div>';


echo '
      <div class="cart-table__preloader js-cart-order__preloader">Пожалуйста подождите, оформляем заказ...</div>
      <form method="POST" action="" class="order__form js_cart_order_form ajax" enctype="multipart/form-data">
          <input type="hidden" name="module" value="cart">
          <input type="hidden" name="action" value="order">
          <input type="hidden" name="tmpcode" value="'.md5(mt_rand(0, 9999)).'">';

if (!empty($result["yandex_fast_order"]))
{
	echo '<p><a href="'.$result["yandex_fast_order_link"].'"><img src="http'.(IS_HTTPS ? "s" : '').'://cards2.yandex.net/hlp-get/5814/png/3.png" border="0" /></a></p>';
}

$required = false;
if (! empty($result["rows_param"]))
{
    echo '
          <fieldset class="order__fieldset order__fieldset--contact">
              <legend class="order__subtitle page__heading2">Контактные данные</legend>
              <div class="order-contact order__list order__contact card">
                  <ul class="order-contact__list">';

	foreach ($result["rows_param"] as $row)
	{
		if($row["required"])
		{
			$required = true;
		}
		$value = ! empty($result["user"]['p'.$row["id"]]) ? $result["user"]['p'.$row["id"]] : '';

		echo '<li class="order-contact__item order_form_param'.$row["id"].'">';

		switch ($row["type"])
		{
			case 'title':
				echo '<div class="infoform">'.$row["name"].':</div>';
				break;

			case 'text':
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<input class="feedback__input order-contact__input" type="text" name="p'.$row["id"].'" value="'.str_replace('"', '&quot;', $value).'">';
				break;

			case "email":
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<input class="feedback__input order-contact__input" type="email" name="p'.$row["id"].'" value="'.str_replace('"', '&quot;', $value).'">';
				break;

			case "phone":
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<input class="feedback__input order-contact__input" type="tel" name="p'.$row["id"].'" value="'.$value.'">';
				break;

			case 'textarea':
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<textarea class="order-contact__textarea" name="p'.$row["id"].'">'.str_replace(array('<', '>', '"'), array('&lt;', '&gt;', '&quot;'), $value).'</textarea>';
				break;

			case 'date':
			case 'datetime':
				$timecalendar  = true;
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
					<input class="feedback__input order-contact__input timecalendar type="text" name="p'.$row["id"].'" value="'.$value.'" showTime="'
					.($row["type"] == 'datetime'? 'true' : 'false').'">';
				break;

			case 'numtext':
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<input type="number" name="p'.$row["id"].'" size="5" value="'.$value.'">';
				break;

			case 'checkbox':
				echo '<input name="p'.$row["id"].'" id="cart_p'.$row["id"].'" value="1" type="checkbox" '.($value ? ' checked' : '').'><label for="cart_p'.$row["id"].'">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').'</label>';
				break;

			case 'select':
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>
				<select name="p'.$row["id"].'" class="inpselect">
					<option value="">-</option>';
				foreach ($row["select_array"] as $select)
				{
					echo '<option value="'.$select["id"].'"'.($value == $select["id"] ? ' selected' : '').'>'.$select["name"].'</option>';
				}
				echo '</select>';
				break;

			case 'multiple':
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>';
				foreach ($row["select_array"] as $select)
				{
					echo '<input name="p'.$row["id"].'[]" id="cart_p'.$select["id"].'[]" value="'.$select["id"].'" type="checkbox" '.(is_array($value) && in_array($select["id"], $value) ? ' checked' : '').'><label for="cart_p'.$select["id"].'[]">'.$select["name"].'</label><br>';
				}
				break;

			case "attachments":
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div>';
				echo '<div class="inpattachment"><input type="file" name="attachments'.$row["id"].'[]" class="inpfiles" max="'.$row["max_count_attachments"].'"></div>';
				echo '<div class="inpattachment" style="display:none"><input type="file" name="hide_attachments'.$row["id"].'[]" class="inpfiles" max="'.$row["max_count_attachments"].'"></div>';
				if ($row["attachment_extensions"])
				{
					echo '<div class="attachment_extensions">('.$this->diafan->_('Доступные типы файлов').': '.$row["attachment_extensions"].')</div>';
				}
				break;

			case "images":
				echo '<div class="infofield">'.$row["name"].($row["required"] ? '<span style="color:red;">*</span>' : '').':</div><div class="images"></div>';
				echo '<input type="file" name="images'.$row["id"].'" param_id="'.$row["id"].'" class="inpimages">';
				break;
		}

		echo '
            <div class="order_form_param_text">'.$row["text"].'</div>
		    <div class="feedback__error errors error_p'.$row["id"].'"'.($result["error_p".$row["id"]] ? '>'.$result["error_p".$row["id"]] : ' style="display:none">').'</div>
		</li>';
	}

}

echo '            </ul>
              </div>
              <p class="page__footnote">* - Обязательные поля. E-mail используется для оповещений об изменениях статуса заказа.</p>
          </fieldset>';

if(! empty($result["payments"]))
{
    echo '<fieldset class="order__fieldset order__fieldset--method">
              <legend class="order__subtitle page__heading2">Способ оплаты:</legend>';
	echo $this->get('list', 'payment', $result["payments"]);
	echo '    <p class="page__footnote">* - Для оплаты (ввода реквизитов Вашей карты) Вы будете перенаправлены на платежный шлюз ПАО СБЕРБАНК. Соединение с платежным шлюзом и передача информации осуществляется в защищенном режиме с использованием протокола шифрования SSL. В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa или MasterCard Secure Code для проведения платежа также может потребоваться ввод специального пароля. Настоящий сайт поддерживает 256-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается ПАО СБЕРБАНК. Введенная информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платежных систем МИР, Visa In t. и MasterCard Europe Sprl.</p>';
	echo '</fieldset>';
}

echo '<div class="order__buttons">
          <input class="order__submit-btn btn" type="submit" value="'.$this->diafan->_('Продолжить', false).'">
          <p class="order__privacy-police page__footnote page__wrapper-content-a">Нажимая кнопку, вы даете согласие на <a class="page__link js-privacy-btn" href="<?php echo $this->diafan->_route->link(16);?>">обработку персональных данных</a></p>
          <!--<button class="order__submit-btn btn btn--empty" type="button">Вернуться в корзину</button>-->
      </div>';

echo '<div class="errors error"'.($result["error"] ? '>'.$result["error"] : ' style="display:none">').'</div>';

echo '</form>';
