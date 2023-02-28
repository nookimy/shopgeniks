<?php
/**
 * Шаблон меню, оформленного шаблоном
 *
 * Шаблонный тег: вывод меню
 * Выполняется в том случае, если передан параметр template=default при вызове тега
 * <insert name="show_block" module="menu" id="1" template="default">
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
	return false;
}


echo '<button class="catalog-menu__close-btn catalog-menu__close-btn--opened js-btn" data-target="js-catalog-menu__list, catalog-menu__close-btn" data-opened="catalog-menu__close-btn--opened" data-act="close" type="button" title="Закрыть">
        Закрыть
        <svg class="catalog-menu__cross" width="9" height="9">
          <use xlink:href="#icon-cross"/>
        </svg>
      </button>
      <h2 class="catalog-menu__title js-btn" data-act="" data-target="js-catalog-menu__list, catalog-menu__close-btn">
        <svg class="catalog-menu__title-icon" width="10" height="10">
          <use xlink:href="#icon-catalog"/>
        </svg>
        Весь каталог
      </h2>
      <ul class="catalog-menu__list catalog-menu__list--opened js-catalog-menu__list" data-opened="catalog-menu__list--opened">';
echo $this->get('show_level_catalog-menu', 'menu', $result);
echo '</ul>';