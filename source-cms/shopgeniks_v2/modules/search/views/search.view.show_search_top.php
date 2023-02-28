<?php
/**
 * Шаблон формы поиска по сайту, template=top
 *
 * Шаблонный тег <insert name="show_search" module="search" template="top"
 * [button="надпись на кнопке"]>:
 * форма поиска по сайту
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
echo '
	<form action="'.$result["action"].'" class="search main-navigation__search js_search_form search_form'.($result["ajax"] ? ' ajax" method="post"' : '" method="get"').' id="search">
        <div class="search__wrapper">
            <input type="hidden" name="module" value="search">
            <input class="search__input" id="search-input" type="text" name="searchword" value="" placeholder="" required>
            <label class="search__label" for="search-input">Поиск товара</label>
            <button class="search__btn" type="submit">
                <svg class="search__icon" width="12" height="12">
                    <use xlink:href="#icon-search"/>
                </svg>
                <span class="visually-hidden">Найти</span>
            </button>
        </div>
	</form>';
if($result["ajax"]) {
	echo '<div class="search_result js_search_result"></div>';
}