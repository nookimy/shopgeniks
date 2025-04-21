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
<header class="main-header">
  <insert name="show_include" file="social-buttons">
    <div class="main-header__wrapper">
        <nav class="main-navigation">
            <a class="main-navigation__logo-link" href="/">
                <img class="main-navigation__logo-img" src="<insert name="custom" path="img/header/logo-n.png" absolute="true">">
                <p class="main-navigation__logo-slogan">Нам доверяют самое ценное</p>
            </a>
            <div class="main-navigation__wrapper">
                <a class="main-navigation__toggle" href=""><span class="visually-hidden">Меню</span></a>
                <insert name="show_login" module="registration" template="user-menu">
                <insert name="show_block" module="cart" template="mini-cart">
            </div>
            <insert name="show_block" module="menu" id="1" template="main-menu">
            <insert name="show_search" module="search" template="top">
        </nav>
        <div class="main-header__second-column">
          <div class="main-header__contacts">
            <div class="main-header__contacts-tel">
              <insert name="show_block" module="site" id="1">

            </div>
            <insert name="show_include" file="social-buttons">
          </div>
            <insert name="show_include" file="location">
        </div>
      <ul class="icon-menu">
        <!--<li class="icon-menu__item">
          <a href="/nabory" title="Наборы">Наборы
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-01-set"/>
            </svg>
          </a>
        </li>-->
        <!--<li class="icon-menu__item">
          <a href="/detskaya-lineyka/" title="Детская линейка">Детская линейка
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-02-baby"/>
            </svg>
          </a>
        </li>-->
        <li class="icon-menu__item">
          <a href="/detskaya-lineyka" title="Детская линейка">Детская линейка
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-16-baby"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-mytya-posudy" title="Для мытья посуды">Для мытья посуды
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-03-dishes"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-chistki-plit" title="Для чистки плит">Для чистки плит
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-04-stove"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-stirki-belya" title="Для стирки белья">Для стирки белья
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-05-wash"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-stekol" title="Для стекол">Для стекол
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-08-glass"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/katalog/sredstva-dlya-ukhoda-za-bytovoy-tekhnikoy" title="Для бытовой техники">Для бытовой техники
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-17-technique"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-santekhniki" title="Для сантехники">Для сантехники
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-06-plumb"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dlya-pola" title="Для пола">Для пола
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-07-floor"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/krem-dlya-ruk/" title="Кремы для рук">Кремы для рук
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-18-hands"/>
            </svg>
          </a>
        </li>
        
        <li class="icon-menu__item">
          <a href="/mylo" title="Мыло">Мыло
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-09-soap"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/antiseptiki-dlya-ruk" title="Антисептики для рук">Антисептики для рук
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-10-hands"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/mashinostroenie-predpriyatiya-transportnogo-komple" title="Машиностроение">Машиностроение
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-14-car"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dezinfektsiya" title="Дезинфекция">Дезинфекция
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-13-dez"/>
            </svg>
          </a>
        </li>
        <li class="icon-menu__item">
          <a href="/dozatory" title="Дозаторы">Дозаторы
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-15-dispenser"/>
            </svg>
          </a>
        </li>

        <li class="icon-menu__item">
          <a href="/aerozol-dlya-dezinfektsii-vozdukha" title="Аэрозоль для дезинфекции воздуха">Аэрозоль для дезинфекции воздуха
            <svg class="icon-menu__img" width="60" height="45">
              <use xlink:href="#icon-12-aero"/>
            </svg>
          </a>
        </li>
        
        
        
      </ul>
    </div>
</header>
