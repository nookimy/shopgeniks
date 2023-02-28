<?php
/**
 * Шаблон блока авторизации
 *
 * Шаблонный тег <insert name="show_login" module="registration" [template="шаблон"]>:
 * блок авторизации
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

if (! $result["user"])
{
    echo '
        <ul class="user-menu main-navigation__user-menu">
            <li class="user-menu__item">
                <a class="user-menu__link user-menu__link--login js-login-btn" href="#" onclick="javascript:void(0);">Вход</a>
            </li>
        </ul>';
}
else
{
    echo '
          <ul class="user-menu main-navigation__user-menu">';
    if($result['userpage']) {
        echo '<li>
                  <a class="user-menu__link user-menu__link--profile" href="'.$result['userpage'].'">'.$result['fio'].'</a>
              </li>';
    }
    echo '
          </ul>';

    /*
	echo '<div class="block profile-block">';
	if (! empty($result["avatar"]))
	{
		echo '<img src="'.BASE_PATH.USERFILES.'/avatar/'.$result["name"].'.png" width="'.$result["avatar_width"].'" height="'.$result["avatar_height"].'" alt="'.$result["fio"].' ('.$result["name"].')" class="avatar profile-hello-avatar">';
	}
	elseif(! empty($result["avatar_none"]))
	{
		echo '<img src="'.$result["avatar_none"].'" width="'.$result["avatar_width"].'" height="'.$result["avatar_height"].'" alt="'.$result["fio"].' ('.$result["name"].')" class="avatar profile-hello-avatar">';
	}
	echo '<div class="profile-hello-text">
			'.$this->diafan->_('Здравствуйте').',<br>';

		echo $result["fio"];
	    echo '!
		</div>';

		echo '<ul class="menu">';
		if($result['userpage'])
		{
			echo '<li><a href="'.$result['userpage'].'">'.$this->diafan->_('Личная страница').'</a></li>';
		}
        if(! empty($result["usersettings"]))
		{
			echo '<li><a href="'.$result["usersettings"].'">'.$this->diafan->_('Настройки').'</a></li>';
		}
		if(! empty($result['messages']))
		{
			echo '<li><a href="'.$result['messages'].'">'.$result['messages_name'];
			if($result['messages_unread'])
			{
			    echo ' (<b>'.$result['messages_unread'].'</b>)';
			}
			echo '</a></li>';
		}
	    echo '</ul>';



	echo '<a href="'.BASE_PATH_HREF.'logout/?'.rand(0, 99999).'" class="button">'.$this->diafan->_('Выйти', false).'</a>';
	echo '</div>';*/
}
