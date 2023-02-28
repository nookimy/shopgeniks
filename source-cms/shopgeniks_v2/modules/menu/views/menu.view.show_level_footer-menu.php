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
    $showLink = (!$row["active"] || $result["current_link"]) && (!$result["hide_parent_link"] || empty($result["rows"][$row["id"]]));

	if (!$result["rows"][$result["parent_id"]][0] != $row) {
		// разделитель пунктов меню
	}

	if ($row["children"]) {
		echo '<li class="main-menu__item main-menu__item--footer main-menu__item--opened">';
	} else {
		echo '<li class="main-menu__item main-menu__item--footer">';
	}

    if ($showLink) {
        echo '<a class="main-menu__link" href="'.($row["othurl"] ? $row["othurl"] : BASE_PATH_HREF.$row["link"]).'"'.$row["attributes"].'>';
	}

	if (! empty($row["img"])) {
		echo '<img src="'.$row["img"]["src"].'" width="'.$row["img"]["width"].'" height="'.$row["img"]["height"]
		.'" alt="'.$row["img"]["alt"].'" title="'.$row["img"]["title"].'"> ';
	}

	if (! empty($row["name"])) {
	    echo $row["name"];
	}

    if ($row["children"]) {
        echo '<svg class="main-menu__parent-icon" width="8" height="4"><use xlink:href="#icon-arrow"/></svg>';
    }

    if ($showLink) {
		echo '</a>';
	}

	if (! empty($row["text"])) {
		echo $row["text"];
	}

    if ($result["show_all_level"] || $row["active_child"] || $row["active"]) {
        $menu_data = $result;
        $menu_data["parent_id"] = $row["id"];
        $menu_data["level"]++;
        if (empty($result['attributes']['count_level']) || $result['attributes']['count_level'] >= $menu_data["level"]) {
            echo $this->get('show_level_2_footer-menu', 'menu', $menu_data);
        }
    }

    echo '</li>';
}