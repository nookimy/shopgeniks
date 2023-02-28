<?php
/**
 * Шаблон страницы сайта
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */
if(! defined("DIAFAN"))
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
?><!DOCTYPE html>
<html lang="ru">
<head>
    <insert name="show_block" module="tagmanager" position="head_start">
    <insert name="show_head">
    <insert name="show_css" files="style.css">
    <insert name="show_block" module="tagmanager" position="head_end">
</head>
<body class="page">
    <insert name="show_block" module="tagmanager" position="body_start">
    <insert name="show_include" file="sprites">
    <insert name="show_include" file="main-header">

    <main class="page__main">
        <insert name="show_breadcrumb">
        <div class="<insert name="show_dynamic" module="site" id="9" template="clear">">
            <h1 class="page__heading1 page__title" id="h1"><insert name="show_h1"></h1>
            <div class="page__wrapper-content-a">
                <insert name="show_body">
            </div>
        </div>
        <insert name="show_block" module="site" id="6">
    </main>

    <insert name="show_include" file="main-footer">
    <insert name="show_include" file="legal-info">
    <insert name="show_include" file="modals">

    <insert name="show_include" file="counters">
    <insert name="show_include" file="ym_counter">
    <insert name="show_block" module="tagmanager" position="body_end">
    <insert name="show_js">
    <script src="<insert name="custom" path="js/js-menu.js" absolute="true" compress="js">"></script>
    <script src="<insert name="custom" path="js/js-modal.js" absolute="true" compress="js">"></script>
    <script src="<insert name="custom" path="js/js-to-top.js" absolute="true" compress="js">"></script>
</body>
</html>
