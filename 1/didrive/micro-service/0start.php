<?php

// echo '<br/>'.__FILE__.' #'.__LINE__;

if (strpos($_SERVER['HTTP_HOST'], 'dev.') !== false) {
    
    ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
//
    ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
    error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
// error_reporting(-1); // E_ALL - отображаем ВСЕ ошибки
    
}

if ( $_SERVER['HTTP_HOST'] == 'photo.uralweb.info' || $_SERVER['HTTP_HOST'] == 'yapdomik.uralweb.info' || $_SERVER['HTTP_HOST'] == 'a2.uralweb.info' || $_SERVER['HTTP_HOST'] == 'adomik.uralweb.info' ) {
    date_default_timezone_set("Asia/Omsk");
} else {
    date_default_timezone_set("Asia/Yekaterinburg");
}

header("Access-Control-Allow-Origin: *");

define('IN_NYOS_PROJECT', true);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
//\f\timer::start();
require($_SERVER['DOCUMENT_ROOT'] . '/all/ajax.start.php');

$input = json_decode(file_get_contents('php://input'), true);
if (!empty($input) && empty($_REQUEST))
    $_REQUEST = $input;

// \f\pa($_SERVER);
// if( $_REQUEST )

if(strpos( $_SERVER['REQUEST_URI'], '0start.php' ) !== false ){

    $scan = scandir( __DIR__ );
    // \f\pa($scan);

    echo '<table style="width:100%;"><tr><td>';

    foreach( $scan as $k => $v ){
        if( !isset($v{5}))
        continue;
        echo '<br/><nobr><a href="'.$v.'" target="res1" >'.$v.'</a></nobr>';
    }

    echo '</td><td><iframe name="res1" style="height:600px;width:100%;border: 1px solid blue;" ></iframe></td></tr></table>';

}