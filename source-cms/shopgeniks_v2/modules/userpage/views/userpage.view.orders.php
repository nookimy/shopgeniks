<?php
/**
 * Шаблон заказов пользователя
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

if (empty($result['orders']))
	return true;

$color = array(
	0 => "red",
	1 => "blue",
	2 => "gray",
	3 => "darkgreen",
	4 => "darkgreen"
);
echo '<h3>'.$this->diafan->_('Ваши заказы').'</h3>';
echo '<table border="0" class="user-orders">
<tr class="user-orders__tr">
<th><b>№</b></th>
<th><b>'.$this->diafan->_('Дата').'</b></th>
<th><b>'.$this->diafan->_('Товары').'</b></th>
<th><b>'.$this->diafan->_('Стоимость').'</b></th>
<th><b>'.$this->diafan->_('Статус').'</b></th>
<th><b>'.$this->diafan->_('Сумма').'</b></th>
</tr>';

foreach ($result['orders']['rows'] as $order)
{
	echo '<tr class="user-orders__tr">';
	echo '<td>'.$order['id'].'</td>';
	echo '<td>'.$order['created'].'</td>';
	echo '<td><div class="order_goods">';

	if(! empty($order['goods']))
	{
		foreach ($order['goods'] as $good)
		{
			echo '<a href="'.BASE_PATH_HREF.$good["link"].'">'.$good["name"];
			if(! empty($good["params"]))
			{
				foreach ($good["params"] as $p)
				{
					echo  ' '.$p["name"].': '.$p["value"];
				}
			}
			echo '</a>';
			if(! empty($good["additional_cost"]))
			{
				foreach($good["additional_cost"] as $a)
				{
					echo '<br>'.$a["name"];
					if($a["summ"])
					{
						echo ' + '.$a["format_summ"].' '.$result['orders']["currency"];
					}
				}
			}

			echo ' ('.$good["count_goods"].'шт.)';
			echo '<br>';
		}
	}

	echo '</div></td>';
	echo '<td>';

	if(! empty($order['goods']))
	{
		foreach ($order['goods'] as $good)
		{
			echo ($good["price"] * $good["count_goods"]) .' '.$result['orders']["currency"].'<br>';
		}
	}

	echo '</td>';

	echo '<td>';
	echo '<span style="color:'.$color[$order["status"]].';font-weight: bold;">';
	echo $order['status_name'];
	echo '</span>';
	if(! empty($order["link_to_pay"]))
	{
		echo '<br><a href="'.BASE_PATH_HREF.$order["link_to_pay"].'">'.$this->diafan->_('Оплатить').'</a>';
	}
	echo '<br><a href="'.BASE_PATH_HREF.$this->diafan->_route->module("cart").'?create_from='.$order['id'].'">'.$this->diafan->_('Повторить').'</a>';
	echo '</td>';
	echo '<td>'.$order['summ'].' '.$result['orders']["currency"].'</td>';
	echo '</tr>';
}

echo '
<tr  class="user-orders__tr">
	<td colspan="5" align="right">'.$this->diafan->_('Итого выполненных заказов сумму').': </td>
	<td><b>'.$result['orders']['total'].' '.$result['orders']["currency"].'</b></td>
</tr>';
echo '</table>';
