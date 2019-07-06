<?php

//f\pa($vv['now_mod']);

// \f\pa($_POST);



if (isset($vv['now_mod']['no_cats']{1})) {
    $vv['tpl_0body'] = \f\like_tpl('sh-no.cat', $vv['dir_module_tpl'], $vv['dir_site_tpl']);
} else {
    $vv['tpl_0body'] = \f\like_tpl('sh', $vv['dir_module_tpl'], $vv['dir_site_tpl']);
}