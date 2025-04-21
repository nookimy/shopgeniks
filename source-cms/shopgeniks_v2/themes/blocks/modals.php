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

<!-- Заказать обратный звонок -->
<section class="modal modal--fixed js-request--call" data-opened="modal--opened" data-overlay="modal-overlay">
    <!--modal--opened для открытого состояния-->
    <button class="modal__close-btn js-request-call-btn--close" data-target="js-request--call" data-act="close" data-overlay="modal-overlay" type="button" title="Закрыть">
        <noindex><span class="visually-hidden">Закрыть окно заказа обратного звонка</span></noindex>
        <svg class="modal__cross-icon" width="23" height="23">
            <use xlink:href="#icon-cross"/>
        </svg>
    </button>
    <include src="source/less/blocks/request/request--call.html"></include>
</section>

<!-- Вход -->
<section class="modal modal--fixed js-login">
    <!--modal--opened для открытого состояния-->
    <button class="modal__close-btn js-login--close" type="button">
        <noindex><span class="visually-hidden">Закрыть окно входа на сайт</span></noindex>
        <svg class="modal__cross-icon" width="23" height="23">
            <use xlink:href="#icon-cross"/>
        </svg>
    </button>

    <insert name="show_login" module="registration" template="auth-form">

</section>

<!-- Товар добавлен в корзину -->
<section class="modal modal--fixed added-to-cart js-added-to-cart">
    <!--modal--opened для открытого состояния-->
    <button class="modal__close-btn js-added-to-cart--close" type="button">
        <noindex><span class="visually-hidden">Закрыть окно</span></noindex>
        <svg class="modal__cross-icon" width="23" height="23">
            <use xlink:href="#icon-cross"/>
        </svg>
    </button>
    <noindex><p class="visually-hidden">Товар добавлен в корзину!</p></noindex>
    <div class="added-to-cart__content">
        <p class="added-to-cart__title"><?php echo $this->diafan->_('Товар добавлен в корзину');?></p>
        <a class="btn added-to-cart__btn" href="<?php echo BASE_PATH_HREF.$this->diafan->_route->module("cart");?>">Перейти в корзину</a>
        <a class="btn btn--empty added-to-cart__btn js-added-to-cart--close">Продолжить покупки</a>
    </div>
</section>

<!-- Всплывающее окно с сголашением 
<section class="modal modal--fixed privacy-police modal--size-large js-modal js-privacy">
    <noindex><p class="visually-hidden">Согласие на обработку персональных данных</p></noindex>
    <button class="cross modal__close-btn js-modal__close-btn js-privacy--close" type="button">Закрыть</button>
    <div class="privacy-police__content">
        <p>Пользователь, оставляя заявку, принимает настоящее Согласие на обработку персональных данных (далее &ndash; Согласие). Действуя свободно, своей волей и в своем интересе, а также подтверждая свою дееспособность, Пользователь дает свое согласие на обработку своих персональных данных со следующими условиями:</p>
        <ol>
            <li>Данное Согласие дается на обработку персональных данных, как без использования средств автоматизации, так и с их использованием.</li>
            <li>Согласие дается на обработку следующих персональных данных: Персональные данные, не являющиеся специальными или биометрическими: номера контактных телефонов; адреса электронной почты; место работы и занимаемая должность; пользовательские данные (сведения о местоположении; тип и версия ОС; тип и версия Браузера; тип устройства и разрешение его экрана; источник откуда пришел на сайт пользователь; с какого сайта или по какой рекламе; язык ОС и Браузера; какие страницы открывает и на какие кнопки нажимает пользователь; ip-адрес.</li>
            <li>Персональные данные не являются общедоступными.</li>
            <li>Цель обработки персональных данных: обработка входящих запросов физических лиц с целью оказания консультирования; аналитики действий физического лица на веб-сайте и функционирования веб-сайта; проведение рекламных и новостных рассылок.</li>
            <li>Основанием для обработки персональных данных является: ст. 24 Конституции Российской Федерации; ст.6 Федерального закона №152-ФЗ &laquo;О персональных данных&raquo;; настоящее согласие на обработку персональных данных</li>
            <li>В ходе обработки с персональными данными будут совершены следующие действия: сбор; запись; систематизация; накопление; хранение; уточнение (обновление, изменение); извлечение; использование; передача (распространение, предоставление, доступ); блокирование; удаление; уничтожение.</li>
            <li>Персональные данные обрабатываются до отписки физического лица от рекламных и новостных рассылок. Также обработка персональных данных может быть прекращена по запросу субъекта персональных данных. Хранение персональных данных, зафиксированных на бумажных носителях осуществляется согласно Федеральному закону №125-ФЗ &laquo;Об архивном деле в Российской Федерации&raquo; и иным нормативно правовым актам в области архивного дела и архивного хранения.</li>
            <li>Согласие может быть отозвано субъектом персональных данных или его представителем путем направления письменного заявления по адресу, указанному на главной странице настоящего сайта.</li>
            <li>В случае отзыва субъектом персональных данных или его представителем согласия на обработку персональных данных владельцы сайта вправе продолжить обработку персональных данных без согласия субъекта персональных данных при наличии оснований, указанных в пунктах 2 &ndash; 11 части 1 статьи 6, части 2 статьи 10 и части 2 статьи 11 Федерального закона №152-ФЗ &laquo;О персональных данных&raquo; от 27.07.2006 г.</li>
            <li>Настоящее согласие действует все время до момента прекращения обработки персональных данных, указанных в п.7 и п.8 данного Согласия.</li>
        </ol>
    </div>
</section>-->

<div class="modal-overlay" data-opened="modal-overlay--opened" data-opened-animation="animation" data-opened-time="700"></div>
