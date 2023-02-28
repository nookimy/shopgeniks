<?php
/**
 * Шаблон информации о товарах в корзине
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

echo '<a class="mini-cart main-navigation__mini-cart" href="'.$result["link"].'">
          <svg class="mini-cart__icon main-navigation__cart-icon" width="20" height="23">
              <use xlink:href="#icon-bag"/>
          </svg>
          <p class="mini-cart__text"><span>'.$this->diafan->_('Корзина').($result["count"] > 0 ? '<div class="mini-cart__count">'.$result["count"].'</div>' : '').'</span></p>
     </a>';
