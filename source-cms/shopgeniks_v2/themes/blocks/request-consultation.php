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
<section class="request request--consultation">
    <div class="request__container request__container--consultation">
        <h2 class="request__title page__heading2">Заказ и консультации</h2>
        <p class="request__text">Оставьте заявку на обратный звонок и наши специалисты свяжутся с Вами в ближайшее время</p>
        <insert name="show_form" module="feedback" site_id="6" template="consultation">
        <p class="feedback__privacy">- отправляя форму, я даю согласие на <a class="feedback__privacy-link js-privacy-btn" href="<?php echo $this->diafan->_route->link(16);?>">обработку персональных данных</a>.</p>
    </div>
</section>
