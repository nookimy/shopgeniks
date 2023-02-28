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
<section class="promo-products">
    <div class="page__wrapper-content-a">
        <h2 class="page__heading2 promo-products__title">Хиты продаж</h2>
        <p class="promo-products__description">Наиболее востребованные товары в этом сезоне</p>
        <div class="tabs js-promo-products__tabs">
            <div class="promo-products__filter">
                <ul class="promo-filter promo-products__filter nav nav-tabs" role="tablist">
                    <li class="promo-filter__item promo-filter__item--active" >
                        <a class="promo-filter__link" id="hits-tab-btn" data-toggle="tab" href="#hits-tab" role="tab" aria-controls="hits-tab" aria-selected="true">Популярные</a>
                    </li>
                    <li class="promo-filter__item">
                        <a class="promo-filter__link" id="new-tab-btn" data-toggle="tab" href="#new-tab" role="tab" aria-controls="new-tab" aria-selected="false">Новинки</a>
                    </li>
                    <li class="promo-filter__item">
                        <a class="promo-filter__link" id="action-tab-btn" data-toggle="tab" href="#action-tab" role="tab" aria-controls="action-tab" aria-selected="false">Акции</a>
                    </li>
                </ul>
            </div>

            <div class="tabs__content active" id="hits-tab" role="tabpanel" aria-labelledby="hits-tab-btn">
                <insert name="show_block" module="shop" count="8" sort="rand" images="1" template="promo-products" hits_only="true">
            </div>
            <div class="tabs__content" id="new-tab" role="tabpanel" aria-labelledby="new-tab-btn">
                <insert name="show_block" module="shop" count="8" sort="rand" images="1" template="promo-products" new_only="true">
            </div>
            <div class="tabs__content" id="action-tab" role="tabpanel" aria-labelledby="action-tab-btn">
                <insert name="show_block" module="shop" count="8" sort="rand" images="1" template="promo-products" action_only="true">
            </div>

        </div>
    </div>
</section>
