<?php
/**
 * Контроллер модуля «Корзина товаров, оформление заказа»
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

/**
 * Cart
 */
class Cart extends Controller
{

	/**
	 * Инициализация модуля
	 *
	 * @return void
	 */
	before public function init()
	{
	  if (isset($_GET["create_from"]) && intval($_GET["create_from"]) > 0) {
      // Очищаем корзину
      $this->diafan->_cart->set();
      $this->diafan->_cart->write();

      $order = $this->diafan->_shop->order_get(intval($_GET["create_from"]));

      $err = '';
      foreach ($order['rows'] as $good) {
        $err .= $this->diafan->_cart->set(array(
          "count" => $good['count'],
          "is_file" => false,
        ), $good['good_id'], array(), '');
      }
      $this->diafan->_cart->write();
    }
  }
}
