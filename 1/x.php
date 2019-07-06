<?php

/*
// файл для кеширования страниц со списком новостей (начиная с 6 версии)
$FiCash = DirSite.DS.'_cash.'.( isset($a_menu[level]['type']) ? $a_menu[level]['type'] : '' ).'.'.( isset($a_menu[level]['version']) ? $a_menu[level]['version'] : '' ).'_'.
        strtolower(level).'.'.domain.'.page.'.
            ( ( isset( $_GET['extend'] ) && is_numeric($_GET['extend']) ) ?
            $_GET['extend'] : 1 ).'.tpl';
*/