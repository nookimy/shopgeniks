<?php
/**
 * Обработка запроса при добавлении товара в корзину
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

class Shop_action extends Action
{
	/**
	 * Добавляет товар в корзину
	 *
	 * @return void
	 */
	after public function buy()
	{
		$this->result["data"][".js-product__buy-button[data-shop-item-id=\"".$good_id."\"]"] = $this->diafan->_('В корзине %s %s', true, $count_good, $measure_unit);
	}
}
