<?php
/**
 * Шаблон стартовой страницы сайта
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
    <insert name="show_css" files="slick.min.css, style.css">
    <insert name="show_block" module="tagmanager" position="head_end">
</head>
<body class="page">
    <insert name="show_block" module="tagmanager" position="body_start">
    <insert name="show_include" file="sprites">
    <insert name="show_include" file="main-header">

    <h1 class="visually-hidden">Магазин бытовой химии</h1>

    <main>
        <insert name="show_include" file="promo-slider">
        <insert name="show_include" file="advantages">
        <insert name="show_include" file="promo-banners">
        <insert name="show_include" file="promo-products">
        <insert name="show_include" file="categories">
        <insert name="show_include" file="request-consultation">
    </main>

    <insert name="show_include" file="main-footer">
    <insert name="show_include" file="legal-info">
    <insert name="show_include" file="modals">


    <insert name="show_include" file="counters">
    <insert name="show_block" module="tagmanager" position="body_end">
    <insert name="show_include" file="ym_counter">
    <insert name="show_js">
    <script src="<insert name="custom" path="js/js-menu.js" absolute="true" compress="js">"></script>
    <script src="<insert name="custom" path="js/js-modal.js" absolute="true" compress="js">"></script>
    <script src="<insert name="custom" path="js/js-to-top.js" absolute="true" compress="js">"></script>
    <script src="<insert name="custom" path="js/slick.min.js" absolute="true" compress="js">"></script>
    <insert name="show_block" module="tagmanager" position="body_end2">
</body>
</html>
