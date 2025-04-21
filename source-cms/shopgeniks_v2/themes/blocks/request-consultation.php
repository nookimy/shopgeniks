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
        <p class="request__title page__heading2">Заказ и консультации</p>
        <p class="request__text">Оставьте заявку на обратный звонок и наши специалисты свяжутся с Вами в ближайшее время</p>
        <insert name="show_form" module="feedback" site_id="6" template="consultation">
        <?php echo '<p class="feedback__privacy">'.$this->diafan->_('- отправляя форму, я даю согласие на <a class="js-privacy-btn" onclick="" href="%s">обработку персональных данных</a>.', true, BASE_PATH_HREF.'privacy/').'</p>'; ?>
    </div>
</section>
