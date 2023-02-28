<?php
/**
 * Шаблон элементов в списке товаров
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

if(empty($result['rows'])) return false;



foreach ($result['rows'] as $row)
{
	echo '<li class="card products-cards__item js_shop">';

	echo '<ul class="card__label-list">';
    if(! empty($row['hit']))
    {
        echo '<li class="card__label-item card__label-item--hit btn">
                  Хит
              </li>';
    }
    if(! empty($row['action']))
    {
        echo '<li class="card__label-item card__label-item--action btn">
                  Акция
              </li>';
    }
    if(! empty($row['new']))
    {
        echo '<li class="card__label-item card__label-item--new btn">
                  Новинка
              </li>';
    }
    echo '</ul>';


	echo '
              <article class="card__link">
                  <a class="card__picture" href="'.BASE_PATH_HREF.$row["link"].'">';

	//вывод изображений товара
	if(! empty($row["img"]))
	{
		foreach ($row["img"] as $img)
		{
            echo '<picture>
                      <source media="(min-width: 1170px)" srcset="'.$img["vs"]["cardproduct_t_3x"].' 3x, '.$img["vs"]["cardproduct_t_2x"].' 2x, '.$img["vs"]["cardproduct_t_1x"].'">
                      <source media="(min-width: 750px)"  srcset="'.$img["vs"]["cardproduct_t_3x"].' 3x, '.$img["vs"]["cardproduct_t_2x"].' 2x, '.$img["vs"]["cardproduct_t_1x"].'">
                      <img class="card__img js_shop_img"     src="'.$img["vs"]["cardproduct_m_1x"].'" 
                                                          srcset="'.$img["vs"]["cardproduct_m_3x"].' 3x, '.$img["vs"]["cardproduct_m_2x"].' 2x, '.$img["vs"]["cardproduct_m_1x"].'"
                                                             alt="'.$img["alt"].'"
                                                           title="'.$img["title"].'"
                                                        image_id="'.$img["id"].'">
                  </picture>';
		}
	}

    echo '        </a>
                  <div class="card__description">';

	//вывод названия и ссылки на товар
	echo '<a class="card__title" href="'.BASE_PATH_HREF.$row["link"].'">'.$row["name"].'</a>';

	if(empty($result['search']))
	{
		echo $this->get('buy_form_list',
                        'shop',
                        array(
                            "row" => $row,
                            "result" => $result,
                        )
                    );
	}

	echo '        </div>
              </article>
          </li>';
}


//Кнопка "Показать ещё"
if(! empty($result["show_more"]))
{
	echo $result["show_more"];
}
