<?php
/**
 * Шаблон описания товара
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

echo '
    <div class="product-description product__description">

        <ul class="product-description__list">
            <li class="product-description__item js-tab" data-target="product-description__content" data-act="product-description__item--active">
                <h3 class="product-description__item-title">Описание</h3>
                <svg class="product-description__arrow" width="8" height="5">
                    <use xlink:href="#icon-arrow"/>
                </svg>
                <div class="product-description__content">
                    '.$result['text'].'
                    <div>
                        '.$this->htmleditor('<insert name="show_dynamic" module="site" id="8" element_type="element" element_id="'.$result['id'].'">').' 
                    </div>
                </div>
            </li>
            <li class="product-description__item js-tab" data-target="product-description__content" data-act="product-description__item--active">
                <h3 class="product-description__item-title">Состав</h3>
                <svg class="product-description__arrow" width="8" height="5">
                    <use xlink:href="#icon-arrow"/>
                </svg>
                <div class="product-description__content">
                    '.$this->htmleditor('<insert name="show_dynamic" module="site" id="5" element_type="element" element_id="'.$result['id'].'">').'   
                </div>
            </li>
            <li class="product-description__item product-description__item--active js-tab" data-target="product-description__content" data-act="product-description__item--active">
                <h3 class="product-description__item-title">Преимущества</h3>
                <svg class="product-description__arrow" width="8" height="5">
                    <use xlink:href="#icon-arrow"/>
                </svg>
                <div class="product-description__content">
                    '.$this->htmleditor('<insert name="show_dynamic" module="site" id="6" element_type="element" element_id="'.$result['id'].'">').'               
                </div>
            </li>
            <li class="product-description__item js-tab" data-target="product-description__content" data-act="product-description__item--active">
                <h3 class="product-description__item-title">Способ применения</h3>
                <svg class="product-description__arrow" width="8" height="5">
                    <use xlink:href="#icon-arrow"/>
                </svg>
                <div class="product-description__content">
                    '.$this->htmleditor('<insert name="show_dynamic" module="site" id="7" element_type="element" element_id="'.$result['id'].'">').'               
                </div>
            </li>
            <li class="product-description__item js-tab" data-target="product-description__content" data-act="product-description__item--active">
                <h3 class="product-description__item-title">Отзывы</h3>
                <svg class="product-description__arrow" width="8" height="5">
                    <use xlink:href="#icon-arrow"/>
                </svg>
                <div class="product-description__content">
                    '.$this->htmleditor('<insert name="show" module="reviews" element_type="element" element_id="'.$result['id'].'" template="shop-id">').'               
                </div>
            </li>
        </ul>

        <div class="product-description__js-container js-product-description__content">

        </div>

    </div>';
