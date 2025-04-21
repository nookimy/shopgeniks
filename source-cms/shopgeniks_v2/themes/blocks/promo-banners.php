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
<section class="promo-banners">
    <ul class="promo-banners__list">
        <li class="promo-banners__item promo-banners__item--catalog">
            <a class="promo-banners__link" href="/katalog/">
                <p class="promo-banners__text">Каталог средств</p>
            </a>
        </li>
    </ul>
</section>
