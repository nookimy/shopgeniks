<?php
/**
 * Шаблон блока
 * Шаблонный тег <insert name="show_block" module="regions">:
 *
 */

if (! defined('DIAFAN'))
{
    $path = __FILE__; $i = 0;
    while(! file_exists($path.'/includes/404.php'))
    {
        if($i == 10) exit; $i++;
        $path = dirname($path);
    }
    include $path.'/includes/404.php';
}

if (is_null($result['data'])) {
    return false;
}
?>

<div class="location main-header__location">
    <div class="location__text location__text--title page__text">Ваш регион: </div>
    <button class="location__text location__text--city js-om-regions-panel__change-btn">
        <?php echo $result['data']['current_region']->name;?>
        <svg class="location__icon" width="8" height="4">
            <use xlink:href="#icon-arrow"/>
        </svg>
    </button>
    <div class="om-regions-panel__tooltip js-om-regions-panel__tooltip" style="display: none;">
        <div class="om-regions-panel__label">Ваш регион <?php echo $result['data']['current_region']->name;?>?</div>
        <div class="om-regions-panel__buttons">
            <a class="om-regions-panel__btn js-om-regions-panel__confirm-btn" href="javascript:void(0);">Да, все верно</a>
            <a class="om-regions-panel__btn om-regions-panel__btn--inverted js-om-regions-panel__change-btn" href="javascript:void(0);">Выбрать другой</a>
        </div>
    </div>
</div>

<div class="om-regions-popup js-om-regions-popup" style="display: none;">
    <div class="om-regions-popup__overlay js-om-regions-popup__close"></div>
    <div class="om-regions-popup__content">
        <span class="om-regions-popup__close js-om-regions-popup__close"></span>
        <div class="om-regions-popup__title">Ваш регион: <?php echo $result['data']['current_region']->name;?></div>
        <div class="om-regions-popup__search">
            <input class="js-om-regions-popup__search-input" type="text" placeholder="поиск региона..."/>
        </div>
        <div class="om-regions-popup__list">
            <?php
            if (!is_null($result['data']['regions'])) {
                foreach ($result['data']['regions'] as $region) {
                    echo '<a class="om-regions-popup__region js-om-regions-popup__region" data-region="'.$region['id'].'" href="javascript:void(0);">'.$region['name'].'</a>';
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    var regionsWidgetOptions = [];
    regionsWidgetOptions['confirmed'] = '<?php echo $result['data']['confirmed']?'1':'0';?>';
</script>