<?php
/**
 * Шаблон вывода первого уровня меню, вызывается из функции show_block в начале файла, оформленного шаблоном
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

if (empty($result["rows"][$result["parent_id"]])) {
	return true;
}

foreach ($result["rows"][$result["parent_id"]] as $row) {
    echo '<li class="catalog-menu__item">';

	echo '<a class="catalog-menu__link '.($row['active']?'catalog-menu__link--active':'').'" href="'.($row["othurl"] ? $row["othurl"] : BASE_PATH_HREF.$row["link"]).'"'.$row["attributes"].'>';

	if (! empty($row["img"])) {
		echo '<img src="'.$row["img"]["src"].'" width="'.$row["img"]["width"].'" height="'.$row["img"]["height"]
		.'" alt="'.$row["img"]["alt"].'" title="'.$row["img"]["title"].'"> ';
	}

	if (! empty($row["name"])) {
	    echo $row["name"];
	}

    echo '</a>';

    echo '</li>';
}