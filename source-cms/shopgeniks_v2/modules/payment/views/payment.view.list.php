<?php
/**
 * Шаблон списка платежных система при оплате
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
    $path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

if(empty($result))
{
	return;
}

echo '<ul class="order__payment-method order__list card radio-btn">';

foreach ($result as $i => $row)
{
    preg_match('/<!--\s*data-region\s*=\s*"(.*)"\s*-->/ui', $row['text'], $dataRegion);
    $dataRegion = count($dataRegion) > 0 ? $dataRegion[1] : 'undefined';

    echo '<li class="js-region-dependency" data-region="'.$dataRegion.'">';
    echo '<input class="radio-btn__input" name="payment_id" id="payment'.$row['id'].'" value="'.$row['id'].'" type="radio" '.(! $i ? 'checked' : '').'>';
	echo '<label class="radio-btn__label page__heading3" for="payment'.$row['id'].'">'.$row['name'].'</label>';
	echo '</li>';
}

echo '</ul>';