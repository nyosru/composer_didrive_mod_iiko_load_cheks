<?php



//echo __FILE__;


//        $s = $db->prepare('SELECT sql FROM `sqlite_master` WHERE `name` = :table LIMIT 1 ');
//        $s->execute( array( ':table' => $table ) );
//        $r = $s->fetchAll();
//        \f\pa($r);





//
//// echo '<br/>'.__FILE__.' ('.__LINE__.')';
//
///**
// * добавление записи
// */
//if (isset($_POST['addnew']{1})) {
//
//    try {
//
//        Nyos\mod\items::addNew( $db, $vv['folder'], $vv['now_level'], $_POST, $_FILES );
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . 'Запись добавлена';
//
//    } catch (Exception $e) {
//
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . 'Произошла неописуемая ситуация #' . $e->getCode() . '.' . $e->getLine() . ' (ошибка: ' . $e->getMessage() . ' )';
//
//    }
//    
//}
////
//elseif ( 1 == 2 && isset($_REQUEST['addnew']{1})) {
//
//    // $_SESSION['status1'] = true;
//    // $status = '';
//    // echo '<br/>'.__FILE__.'['.__LINE__.']';
//    $r = Nyos\mod\items::addNew($db, $vv['folder'], $vv['now_mod'], array('head' => $_REQUEST['head']));
//    //echo '<br/>'.__FILE__.'['.__LINE__.']';
//    // f\pa($r);
//
//    if (isset($r['status']) && $r['status'] == 'ok') {
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . $r['html'];
//    }
//
//    // echo $status;
//}
////
//elseif (isset($_REQUEST['delete_item_head']{1})) {
//
//    // $_SESSION['status1'] = true;
//    // $status = '';
//    // echo '<br/>'.__FILE__.'['.__LINE__.']';
//    // $r = Nyos\mod\items::saveEdit($db, $id_item, $folder, $cfg_mod, $data);
//    // addNew( $db, $vv['folder'], $vv['now_mod'], array( 'head' => $_REQUEST['head'] ) );
//    //echo '<br/>'.__FILE__.'['.__LINE__.']';
//    // f\pa($r);
//
//    $db->sql_Query('UPDATE mitems SET `status` = \'delete\' 
//        WHERE 
//        `head` = \'' . addslashes($_REQUEST['head']) . '\' 
//        AND `module` = \'' . addslashes($vv['level']) . '\' 
//        AND `folder` = \'' . addslashes($vv['folder']) . '\' 
//        ;');
//
//    // echo $status;
//
//    Nyos\mod\items::clearCash($vv['folder']);
//
//    if (isset($r['status']) && $r['status'] == 'ok') {
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . $r['html'];
//    }
//
//    // echo $status;
//}
////
//elseif (isset($_POST['delete_item_id']{1})) {
//
//    // $_SESSION['status1'] = true;
//    // $status = '';
//    // echo '<br/>'.__FILE__.'['.__LINE__.']';
//    // $r = Nyos\mod\items::saveEdit($db, $id_item, $folder, $cfg_mod, $data);
//    // addNew( $db, $vv['folder'], $vv['now_mod'], array( 'head' => $_REQUEST['head'] ) );
//    //echo '<br/>'.__FILE__.'['.__LINE__.']';
//    // f\pa($r);
//
//    $db->sql_Query('UPDATE mitems SET `status` = \'delete2\' 
//        WHERE 
//        `id` = \'' . addslashes($_POST['id']) . '\' 
//        AND `module` = \'' . addslashes($vv['level']) . '\' 
//        AND `folder` = \'' . addslashes($vv['folder']) . '\' 
//        ;');
//
//    // echo $status;
//
//    Nyos\mod\items::clearCash($vv['folder']);
//
//    if (isset($r['status']) && $r['status'] == 'ok') {
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . $r['html'];
//    }
//
//    // echo $status;
//}
///**
// * сохранение редактирования
// */ 
//elseif (isset($_REQUEST['save_id']) && is_numeric($_REQUEST['save_id']) && isset($_REQUEST['save_edit'])) {
//
//    $d = $_POST;
//    unset($d['addnew']);
//    $d['files'] = $_FILES;
//
//    $r = Nyos\mod\items::saveEdit($db, $_REQUEST['save_id'], $vv['folder'], $vv['now_mod'], $d);
//    if (isset($r['status']) && $r['status'] == 'ok') {
//        $vv['warn'] .= ( isset($vv['warn']{3}) ? '<br/>' : '' ) . $r['html'];
//    }
//}
//elseif( isset($_GET['refresh_cash']) && $_GET['refresh_cash'] == 'da' ){
//    \Nyos\mod\items::clearCash($vv['folder']);
//}
//
//


$vv['krohi'] = [];
$vv['krohi'][1] = array(
    'text' => $vv['now_level']['name'],
    'uri' => $vv['now_level']['cfg.level']
);
//$vv['list'] = \Nyos\mod\items::getItems( $db, $vv['folder'], $vv['now_level']['cfg.level'], null);
//\f\pa($vv['list']);

$vv['tpl_body'] = \f\like_tpl('body', dir_mods_mod_vers_didrive_tpl,  dir_site_module_nowlev_tpldidr, DR );
