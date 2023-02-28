<?php
/**
 * Шаблон блока формы авторизации
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

if (! $result["user"]) {
    echo '
    <div class="login">
        <h2 class="login__title page__heading1">'.$this->diafan->_('Вход на сайт').'</h2>
        <form class="feedback login__form ajax" method="post" action="' . $result["action"] . '">
        	<input type="hidden" name="action" value="auth">
	        <input type="hidden" name="module" value="registration">
	        <input type="hidden" name="form_tag" value="registration_auth">

	        <div class="login__error error"'.($result["error"] ? '>' . $result["error"] : ' style="display:none">').'</div>

            <input class="feedback__input login__input" type="text" name="name" id="login--name" value="" placeholder="'.$this->diafan->_($this->diafan->configmodules("mail_as_login", "users") ? 'E-mail' : 'Имя пользователя').'" autocomplete="off">
            <label class="visually-hidden" for="login--name">'.$this->diafan->_($this->diafan->configmodules("mail_as_login", "users") ? 'E-mail' : 'Имя пользователя').'</label>
            <input class="feedback__input login__input" type="password" name="pass" id="login--pass" value="" placeholder="' . $this->diafan->_('Пароль') . '" autocomplete="off">
            <label class="visually-hidden" for="login--pass">Пароль</label>

           	<div class="login__checkbox">
           	    <input type="checkbox" id="not_my_computer" name="not_my_computer" value="1">
        	    <label for="not_my_computer">' . $this->diafan->_('Чужой компьютер') . '</label>
            </div>

            <button class="btn feedback__btn login__btn" type="submit">Войти</button>'.
            (!empty($result["reminding"]) ? '<a href="' . $result["reminding"] . '" class="login__link">' . $this->diafan->_('Забыли пароль?') . '</a> ' : '').
            (!empty($result["registration"]) ? '<a href="' . $result["registration"] . '" class="login__link">' . $this->diafan->_('Регистрация') . '</a>' : '').'
            <p class="feedback__privacy">
                Нажимая кнопку, вы даете согласие на
                <a class="feedback__privacy-link js-privacy-btn" href="<?php echo $this->diafan->_route->link(16);?>">обработку персональных данных</a>.
            </p>
        </form>
    </div>
    ';
}
