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

if (empty($result["rows"])) {
	return false;
}

echo '<ul class="main-menu main-footer__menu">';
echo $this->get('show_level_footer-menu', 'menu', $result);
echo '</ul>';