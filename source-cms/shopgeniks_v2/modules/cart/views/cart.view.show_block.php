<?php
/**
 * Шаблон блока корзины
 *
 * Шаблонный тег <insert name="show_block" module="cart" [template="шаблон"]>:
 * выводит информацию о заказанных товарах
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

echo '<div id="show_cart" class="main-navigation__cart js_show_cart">
          '.$this->get('info', 'cart', $result).'
      </div>';
