<?php
/**
 * Шаблон блока «Сортировать» с ссылками на направление сортировки
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
       
$link_sort   = $result["link_sort"];
$sort_config = $result['sort_config'];

echo '<section class="sorting catalog-products__sorting">
          <h3 class="sorting__title">Сортировать:</h3>
          <ul class="sorting__list sort-by by-rate">';

$symbol = 'up';

foreach($sort_config['sort_fields_names'] as $i => $name) {
    $directionClass = (empty($link_sort[$i]) ? 'sorting__item--min-to-max' : 'sorting__item--max-to-min');
    $sortingLink = ($link_sort[$i]) ? BASE_PATH_HREF.$link_sort[$i] : BASE_PATH_HREF.$link_sort[$i+1];

    echo '    <li class="sorting__item '.$directionClass.'">
                  <a class="sorting__link" href="'.$sortingLink.'">' . $sort_config['sort_fields_names'][$i] . '</a>
                  <svg class="sorting__arrow-icon" width="8" height="4">    
                  <use xlink:href="#icon-arrow"/>
                  </svg>
              </li>';
}

echo '    </ul>';

echo '</section>';