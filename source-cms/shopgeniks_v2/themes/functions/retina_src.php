<?php
/**
 * Шаблонный тег: формирует содрежимое srcset для source в picture
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
if (array_key_exists('userfile', $attributes) && $attributes['userfile'] == 'true') {
    $path = BASE_PATH.$attributes['path'];
} else {
    $path = BASE_PATH.Custom::path($attributes['path']);
}
$name = substr($path, 0, strrpos($path, '.'));
$ext = substr($path, strrpos($path, '.'));
echo $name."@3x".$ext." 3x, ".$name."@2x".$ext." 2x, ".$name.$ext;
