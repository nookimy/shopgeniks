<?php
/**
* Файл-блок шаблона
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
?>
<section class="advantages">
    <ul class="advantages__list">
        <li class="advantages__item advantages__item--no-microbe">
            <p class="advantages__text">Высокая антимикробная активность</p>
        </li>
        <li class="advantages__item advantages__item--no-toxic">
            <p class="advantages__text">Низкая токсичность или ее отсутствие</p>
        </li>
        <li class="advantages__item advantages__item--standard">
            <p class="advantages__text">Соответствие международным стандартам</p>
        </li>
        <li class="advantages__item advantages__item--price">
            <p class="advantages__text">Доступная стоимость продуктов</p>
        </li>
    </ul>
</section>
