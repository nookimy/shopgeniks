<?php
/**
 * Шаблон списка способа доставки
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

//способы доставки
if (!empty($result["delivery"])) {
    echo '
              <div class="order__fieldset order__fieldset--delivery">
                  <div class="order__subtitle page__heading2">'.$this->diafan->_('Способ доставки').'</div>
                      <ul class="order-delivery order__list card radio-btn">';

    foreach ($result["delivery"] as $row) {
        if (! empty($result["hide_form"]) && $row["id"] != $result["cart_delivery"]) {
            continue;
        }
        if (!empty($row["thresholds"]) && empty($result["hide_form"])) {
            foreach ($row["thresholds"]  as $r) {
                if($r["amount"]) {
                    $row['text'] .= '<br>'.($r["price"] ? $this->diafan->_('Стоимость').' '.$r["price"].' '.$result["currency"].' '.$this->diafan->_('от суммы') : $this->diafan->_('Бесплатно от суммы')).' '.$r['amount'].' '.$result["currency"];
                } else {
                    $row['text'] .= '<br>'.($r["price"] ? $this->diafan->_('Стоимость').' '.$r["price"].' '.$result["currency"] : $this->diafan->_('Бесплатно'));
                }
            }
        }

        preg_match('/<!--\s*data-region\s*=\s*"(.*)"\s*-->/ui', $row['text'], $dataRegion);
        $dataRegion = count($dataRegion) > 0 ? $dataRegion[1] : 'undefined';
        echo '
                          <li class="order-delivery__item js-region-dependency" data-region="'.$dataRegion.'">';

        if (empty($result["hide_form"])) {
            echo '<input class="radio-btn__input" name="delivery_id" id="delivery_id_'.$row['id'].'" value="'.$row['id'].'" type="radio" '.($row["id"] == $result["cart_delivery"] ? ' checked' : '').'>';
        }

        echo '
                              <label class="radio-btn__label" for="delivery_id_'.$row['id'].'">
                                  <b class="order-delivery__title page__heading3">'.$row["name"].'</b>';

        if (empty($result["hide_form"])) {
            echo '            <span class="order-delivery__text">'.$row['text'];

            if (is_null($row["price"])) {
                echo '<br/>'.$this->diafan->_('Недоступно');
            } elseif ($row["price"] !== false && intval($row["price"]) != 0 ) {
                echo '<br/>Стоимость: '.$row["price"].$result["currency"];
            }

            echo '</span>';
        }

        echo '            </label>';



        if ($row["service"] && $row["id"] == $result["cart_delivery"])
        {
            echo $row["service_view"];
        }

        echo '
			            </li>';


    }

    echo '</ul></div>';
}