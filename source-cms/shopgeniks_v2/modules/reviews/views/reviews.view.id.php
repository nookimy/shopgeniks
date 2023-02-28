<?php
/**
 * Шаблон одного отзыва
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


echo '<div class="reviews__element">';
echo '  <a name="comment'.$result["id"].'"></a>';

if (!empty($result["name"]))
{
  $avatar = BASE_PATH.Custom::path('img/user-menu/profile-icon.svg');
	if (is_array($result["name"]))
	{
	  $name = array_key_exists('fio', $result["name"])
              ? $result["name"]["fio"]
              : '';
		$avatar = array_key_exists('avatar', $result["name"]) && !empty($result["name"]["avatar"])
                ? $result["name"]["avatar"]
                : $avatar;
	}
	else
	{
		$name = $result["name"];
	}
	echo '<img class="reviews__avatar" src="'.$avatar.'" alt="'.$name.'" class="avatar">';
	echo '<div class="reviews__name">'.$name.'</div>';
}

foreach ($result["params"] as $param)
{
	echo '<div class="reviews__param'.($param["type"] == 'title' ? '_title' : '').'">'.($param["type"] !== "radio" ? $param["name"].": " : "");
	if (! empty($param["value"]))
	{
		echo  '<div class="reviews__value">';
		switch($param["type"])
		{
			case "attachments":
				foreach ($param["value"] as $a)
				{
					if ($a["is_image"])
					{
						if($param["use_animation"])
						{
							echo ' <a href="'.$a["link"].'" data-fancybox="gallery'.$result["id"].'reviews"><img src="'.$a["link_preview"].'"></a> <a href="'.$a["link"].'" data-fancybox="gallery'.$result["id"].'reviews_link">'.$a["name"].'</a>';
						}
						else
						{
							echo ' <a href="'.$a["link"].'"><img src="'.$a["link_preview"].'"></a> <a href="'.$a["link"].'">'.$a["name"].'</a>';
						}
					}
					else
					{
						echo ' <a href="'.$a["link"].'">'.$a["name"].'</a>';
					}
				}
				break;

			case "images":
				foreach ($param["value"] as $img)
				{
					echo '<img src="'.$img["src"].'" width="'.$img["width"].'" height="'.$img["height"].'" alt="'.$img["alt"].'" title="'.$img["title"].'">';
				}
				break;

			case 'url':
				echo '<a href="'.$param["value"].'">'.$param["value"].'</a>';
				break;

			case 'email':
				echo '<a href="mailto:'.$param["value"].'">'.$param["value"].'</a>';
				break;

      case 'radio':
        echo '<ul class="rating reviews__rating">';

        for ($i = 0; $i < $param["value"]; $i++)
        {
          echo '<li class="rating__item js_rating_votes_item" alt="-">
              <svg class="rating__icon rating__icon--active" width="10" height="9">
                  <use xlink:href="#icon-star"/>
              </svg>
          </li>';
        }

        for ($i = 0; $i < 5 - $param["value"]; $i++)
        {
          echo '<li class="rating__item js_rating_votes_item" alt="-">
              <svg class="rating__icon" width="10" height="9">
                  <use xlink:href="#icon-star"/>
              </svg>
          </li>';
        }

        echo '</ul>';
        break;

			default:
				if (is_array($param["value"]))
				{
					foreach ($param["value"] as $p)
					{
						if ($param["value"][0] != $p)
						{
							echo  ', ';
						}
						if (is_array($p))
						{
							echo  $p["name"];
						}
						else
						{
							echo  $p;
						}
					}
				}
				else
				{
					echo $param["value"];
				}
				break;
		}
		echo  '</div>';
	}
	echo  '</div>';
}
if ($result['date'])
{
  echo '<div class="page__footnote">'.$result['date'].'</div>';
}

if(! empty($result["text"]))
{
	echo '<div class="reviews__answer">'.$this->diafan->_('Ответ').': '.$result["text"].'</div>';
}
if(! empty($result["theme_name"]))
{
	echo '<div class="theme">';
		echo '<div class="reviews_link">'.$this->diafan->_('Тема').': <a href="'.BASE_PATH_HREF.$result['link'].'#review'.$result["id"].'">'.$result["theme_name"].'</a></div>';
	echo '</div>';
}
echo '</div>';
