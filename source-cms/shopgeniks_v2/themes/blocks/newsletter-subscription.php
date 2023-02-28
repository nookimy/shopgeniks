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
            <h2 class="visually-hidden">Подписка на информационную рассылку</h2>
            <p class="newsletter-subscription__text">Подпишитесь на рассылку и узнавайте о скидках и акциях первыми!</p>
            <form class="feedback newsletter-subscription__form" action="#">
                <input class="feedback__input newsletter-subscription__input" type="email" name="email" id="feedback--email" value="" placeholder="E-mail">
                <label class="visually-hidden" for="feedback--email">Ваш email</label>
                <button class="btn newsletter-subscription__btn" type="submit">Подписаться</button>
            </form>
            <p class="feedback__privacy">
                Нажимая кнопку, вы даете согласие на
                <a class="feedback__privacy-link js-privacy-btn" href="<?php echo $this->diafan->_route->link(16);?>">
                    обработку персональных данных
                </a>.
            </p>
        </div>
    </div>
</section>
