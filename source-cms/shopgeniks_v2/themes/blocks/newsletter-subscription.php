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
$attributes = $this->parse_attributes($this->diafan->current_insert_tag);
?>
<section class="newsletter-subscription <?php echo array_key_exists('modifier', $attributes) ? $attributes['modifier'] : '';?>">
    <div class="newsletter-subscription__wrapper">
        <div class="newsletter-subscription__content">
            <noindex><p class="visually-hidden">Подписка на информационную рассылку</p></noindex>
            <p class="newsletter-subscription__text">Подпишитесь на рассылку и узнавайте о скидках и акциях первыми!</p>
            <form class="feedback newsletter-subscription__form" action="#">
                <input class="feedback__input newsletter-subscription__input" type="email" name="email" id="feedback--email" value="" placeholder="E-mail">
                <noindex><label class="visually-hidden" for="feedback--email">Ваш email</label></noindex>
                <button class="btn newsletter-subscription__btn" type="submit">Подписаться</button>
            </form>
            <?php echo '<p class="feedback__privacy">'.$this->diafan->_('Нажимая кнопку, вы даете согласие на <a class="js-privacy-btn" href="%s">обработку персональных данных</a>.', true, BASE_PATH_HREF.'privacy/').'</p>'; ?>
        </div>
    </div>
</section>
