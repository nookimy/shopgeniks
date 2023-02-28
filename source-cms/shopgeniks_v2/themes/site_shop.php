<?php
/**
 * Шаблон страницы каталога
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
<body class="page catalog">
    <insert name="show_block" module="tagmanager" position="body_start">
    <insert name="show_include" file="sprites">
    <insert name="show_include" file="main-header">

    <main class="page__main">
        <insert name="show_breadcrumb" current="false">
        <h1 class="page__heading1 page__title"><insert name="show_h1"></h1>

        <div class="catalog__content">
            <section class="catalog-menu catalog__menu">
                <insert name="show_block" module="menu" id="2" template="catalog-menu">
                <div class="catalog-menu catalog-menu__newsletter-subscription">
                    <insert name="show_include" file="newsletter-subscription">
                </div>
            </section>
            <div class="catalog__catalog-products">
                <section class="catalog-products">
                    <h2 class="visually-hidden">Товары магазина</h2>
                    <insert name="show_body">

                    <div class="catalog-products__newsletter-subscription">
                        <insert name="show_include" file="newsletter-subscription" modifier="catalog__newsletter-subscription--mobile">
                    </div>
                </section>
            </div>
        </div>

        <insert name="show_include" file="advantages">
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
</body>
</html>
