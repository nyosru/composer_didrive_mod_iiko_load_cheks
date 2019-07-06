<?php


/**
информер
**/

/*
//f\pa($vv['now_inf_cfg']);

if (isset($vv['now_inf_cfg']['load_inf']) && $vv['now_inf_cfg']['load_inf'] == 'da') {
    //$vv['inf']['items'][$vv['now_inf_cfg']['cfg.level']] = \Nyos\mod\items::getItems($db, $vv['folder'], $vv['now_inf_cfg']['cfg.level']);
    try{
        $vv['inf']['items'][$vv['now_inf_cfg']['cfg.level']] = \Nyos\mod\items::getItems2($db, $vv['folder'], $vv['now_inf_cfg']['cfg.level']);
    } catch ( Exception $e ){
        // ошибку писать в лог
    }
}

if (1 == 2) {
// echo '11<pre>'; print_r($q); echo '</pre>';
// echo '22<pre>'; print_r($w); echo '</pre>';
// $w['folder'] => jobs

    if (isset($w['folder']) && is_dir($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . folder . DS . 'download' . DS . $w['folder'])) {

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . folder . DS . '_smartydata.' . $w['cfg.level'] . '.json')) {
            //echo __FILE__.'<br/>';

            $vv['informer'][$w['cfg.level']] = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . folder . DS . '_smartydata.' . $w['cfg.level'] . '.json'), true);
            // echo '<pre>'; print_r($vv['informer'][$w['cfg.level']]); echo '</pre>';
            //  = date
        }
    }
}
*/