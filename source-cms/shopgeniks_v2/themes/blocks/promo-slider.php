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
<section class="promo-slider">
    <div class="promo-slider__wrapper">

        <!-- Вызов шаблонного тега вывода через "Блоки на сайте" для сопоставления id -->
        <insert name="show_block" module="site" id="5">

        <div class="promo-slider__arrows arrows">
            <button class="promo-slider__arrow promo-slider__arrow--left arrows__item arrows__item--left js-promo-slider__arrow--left" type="button" aria-label="Previous">
                <span class="visually-hidden">Предыдущий слайд</span>
            </button>
            <button class="promo-slider__arrow promo-slider__arrow--right arrows__item arrows__item--right js-promo-slider__arrow--right" type="button" aria-label="Next">
                <span class="visually-hidden">Следующий слайд</span>
            </button
        </div>
    </div>
</section>
