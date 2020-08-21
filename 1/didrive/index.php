<?php

$vv['krohi'] = [];
$vv['krohi'][1] = array(
    'text' => $vv['now_level']['name'],
    'uri' => $vv['now_level']['cfg.level']
);

$vv['tpl_body'] = \f\like_tpl('body', dir_mods_mod_vers_didrive_tpl,  dir_site_module_nowlev_tpldidr, DR );
