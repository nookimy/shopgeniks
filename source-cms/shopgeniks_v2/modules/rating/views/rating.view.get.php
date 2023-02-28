<?php
/**
 * Шаблон рейтинга элемента
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

echo '<ul class="rating js_rating_votes" module_name="'.$result["module_name"].'" element_id="'.$result["element_id"].'" element_type="'.$result["element_type"].'"'.($result["disabled"] ? ' disabled="disabled"' : '').'>';

for ($i = 0; $i < $result["rating"]; $i++)
{
    echo '<li class="rating__item js_rating_votes_item" alt="-">
              <svg class="rating__icon rating__icon--active" width="10" height="9">
                  <use xlink:href="#icon-star"/>
              </svg>
          </li>';
}

for ($i = 0; $i < 5 - $result["rating"]; $i++)
{
    echo '<li class="rating__item js_rating_votes_item" alt="-">
              <svg class="rating__icon" width="10" height="9">
                  <use xlink:href="#icon-star"/>
              </svg>
          </li>';
}

if($result["full"] && $result["count_votes"])
{
	echo '<br>'.$this->diafan->_('Общий рейтинг').': '.$result["overall_rating"]
	.'<br>'.$this->diafan->_('Проголосовало').': '.$result["count_votes"];
}
echo '</ul>';