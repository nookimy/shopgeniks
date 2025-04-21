<?php
/**
 * Файл-блок шаблона
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (!defined('DIAFAN')) {
  $path = __FILE__;
  while (!file_exists($path . '/includes/404.php')) {
    $parent = dirname($path);
    if ($parent == $path) exit;
    $path = $parent;
  }
  include $path . '/includes/404.php';
}
?>
<div class="social-buttons">
  <ul class="social-buttons__list">
    <li class="social-buttons__item">
      <a class="social-buttons__link" href="https://www.tiktok.com/@katya.geniks" rel="nofollow" target="_blank">
        <svg width="20" height="20">
          <use xlink:href="#icon-tt"/>
        </svg>
        <span class="visually-hidden">TikTok</span>
      </a>
    </li>
    <li class="social-buttons__item">
      <a class="social-buttons__link" href="https://vk.com/geniks12" rel="nofollow" target="_blank">
        <svg width="20" height="20">
          <use xlink:href="#icon-vk"/>
        </svg>
        <noindex><span class="visually-hidden">Vkontakte</span></noindex>
      </a>
    </li>
    <li class="social-buttons__item">
      <a class="social-buttons__link" href="https://ok.ru/group54328377999593" rel="nofollow" target="_blank">
        <svg width="20" height="20">
          <use xlink:href="#icon-ok"/>
        </svg>
        <noindex><span class="visually-hidden">Odnoklassniki</span></noindex>
      </a>
    </li>
    <li class="social-buttons__item">
      <a class="social-buttons__link" href="https://www.youtube.com/channel/UC7A3O_xFb0d6b1pZhN01inA?view_as=subscriber" rel="nofollow" target="_blank">
        <svg width="20" height="20">
          <use xlink:href="#icon-yt"/>
        </svg>
        <noindex><span class="visually-hidden">Youtube</span></noindex>
      </a>
    </li>
  </ul>
</div>
