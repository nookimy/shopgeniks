<?php
/**
 * Шаблон блока фотографий
 * 
 * Шаблонный тег <insert name="show_block" module="photo" [count="количество"]
 * [cat_id="категория"] [site_id="страница_с_прикрепленным_модулем"]
 * [sort="порядок_вывода"] 
 * [images_variation="тег_размера_изображений"]
 * [only_module="only_on_module_page"] [template="шаблон"]>:
 * блок фотографий
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

if (empty($result["rows"])) return false;

foreach ($result["rows"] as $row) {
	echo '<div class="promo-slider__item-wrap">
            <li class="promo-slider__item">';

    if ($row["name"]) {
        echo '<h2 class="promo-slider__title page__heading2">';
        echo $row["name"];
        echo '</h2>';
    }

	if (! empty($row["img"])) {
	    $img = $row['img'];
        echo '
            <picture>
                <source media="(min-width: 1170px)" srcset="'.$img["vs"]["promoslider_d_3x"].' 3x, '.$img["vs"]["promoslider_d_2x"].' 2x, '.$img["vs"]["promoslider_d_1x"].'">
                <source media="(min-width: 750px)"  srcset="'.$img["vs"]["promoslider_t_3x"].' 3x, '.$img["vs"]["promoslider_t_2x"].' 2x, '.$img["vs"]["promoslider_t_1x"].'">
                <img class="promo-slider__image"       src="'.$img["vs"]["promoslider_m_1x"].'" 
                                                    srcset="'.$img["vs"]["promoslider_m_3x"].' 3x, '.$img["vs"]["promoslider_m_2x"].' 2x, '.$img["vs"]["promoslider_m_1x"].'"
                                                       alt="'.$img["alt"].'"
                                                     title="'.$img["title"].'">
            </picture>';
	}

    if ($row["anons"]) {
        echo $row["anons"];
    }

	echo '  </li>
          </div>';
}