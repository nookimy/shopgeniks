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
<footer class="main-footer">
    <div class="main-footer__to-up">
        <button class="to-top btn js-to-top">
            Наверх
            <svg class="to-top to-top__icon" width="8" height="13" data-act="up">
                <use xlink:href="#icon-up"/>
            </svg>
        </button>
    </div>
    <div class="main-footer__wrapper">
        <div class="main-footer__logo-wrapper">
            <svg class="main-footer__logo main-footer__logo--geniks" width="125" height="21">
                <use xlink:href="#icon-logo-g"/>
            </svg>
            <picture>
                <source media="(min-width: 750px)" srcset="<insert name="retina_src" path="img/main-footer/nika-logo-68x30.png">">
                <img class="main-footer__img"         src="<insert name="custom"     path="img/main-footer/nika-logo-49x22.png" absolute="true">"
                                                   srcset="<insert name="retina_src" path="img/main-footer/nika-logo-49x22.png">"
                                                      alt="Ника">
            </picture>
        </div>
        <div class="main-footer__contacts">
            <insert name="show_block" module="site" id="2">
        </div>
       <div class="main-footer__description">
          <p>Интернет-магазин дезинфицирующих профессиональных чистящих средств фирмы «Геникс»</p>
        </div>
        <div class="main-footer__wrapper2">
            <p class="main-footer__owner-copyright">
                © 2016<script>new Date().getFullYear()>2016&&document.write("-"+new Date().getFullYear());</script> гг.
            </p>
            <p class="main-footer__btn btn">Заказы принимаются по всей России</p>
        </div>
        <insert name="show_block" module="menu" id="1" template="footer-menu">
        <p class="main-footer__developer-copyright web-developer">
            <a class="web-developer__link" href="https://onmaster.ru">Интернет-магазин</a>
             от onmaster.ru
        </p>
    </div>
</footer>
