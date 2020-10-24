<?php

// echo __FILE__.' #'.__LINE__;

ob_start('ob_gzhandler');

try {

//    $date = $in['date'] ?? $_REQUEST['date'] ?? null;
//    if (empty($date))
//        throw new \Exception('нет даты');

    if (isset($skip_start) && $skip_start === true) {
        
    } else {
        require_once '0start.php';
        $skip_start = false;
    }

    $scan_day = ( $_REQUEST['scan_day'] ?? 3 );

    if (isset($_REQUEST['show']))
        \f\pa($_REQUEST, '', '', 'REQUEST');

    if (isset($_GET['show_timer']))
        \f\timer::start();

// sleep(3);
//     $ww = \Nyos\mod\items::getItemsSimple3($db, '081.job_checks_from_iiko' );
//     \f\pa($ww);
//     die();
//    $e = \Nyos\mod\IikoChecks::importChecks($db, $_GET['user']);
//    \f\pa($e,'','','$e');
//    if (1 == 1) {
//        \Nyos\mod\items::$type_module = 3;
//        \Nyos\mod\items::$sql_select_vars[] = 'jobman';
//        \Nyos\mod\items::$group_by = 'jobman';
//        \Nyos\mod\items::$between['start'] = [date('Y-m-d 05:00:00', $_SERVER['REQUEST_TIME'] - 3600 * 24 * ( $_REQUEST['scan_day'] ?? 3 )), date('Y-m-d 05:00:00')];
//        $ee = \Nyos\mod\items::get($db, \Nyos\mod\JobDesc::$mod_checks);
//        // \f\pa($ee);
//        // echo \f\pa(sizeof($ee));
//        foreach ($ee as $v) {
//            \f\pa($v);
//            break;
//        }
//    }

    if (isset($_REQUEST['user_scan_all'])) {

        $sql = 'SELECT 
                jm.id, '
                // .' jm.head, '
                . ' jm.iiko_id ,
                \'1\' `check`
            FROM mod_070_jobman jm
            GROUP BY jm.id
            ';
        $ff = $db->prepare($sql);
        $ff->execute();
        $load_iiko_users = $ff->fetchAll();
    } 
    //
    else {

        if (isset($_REQUEST['user'])) {
            $sql2 = ' jm.id = :user ';
            $in[':user'] = $_REQUEST['user'];
        }

        $sql = ' ( SELECT 
                jm.id, '
                // .' jm.head, '
                . ' jm.iiko_id ,
                c.`id` `check`
            FROM mod_070_jobman jm
            INNER JOIN mod_050_chekin_checkout c ON c.jobman = jm.id AND c.start >= :d1
            ' . (!empty($sql2) ? ' WHERE ' . $sql2 : '' ) . '
            GROUP BY jm.id
            ) UNION ( SELECT 
                jm.id, '
                // .' jm.head, '
                . ' jm.iiko_id ,
                c.`id` `check`
            FROM mod_070_jobman jm
            INNER JOIN mod_jobman_send_on_sp c ON c.jobman = jm.id AND c.date >= :d1
            ' . (!empty($sql2) ? ' WHERE ' . $sql2 : '' ) . '
            GROUP BY jm.id
            )
            ';

        if (isset($_REQUEST['show']))
            \f\pa($sql, 2, '', 'sql');

        $ff = $db->prepare($sql);
        $in[':d1'] = date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600 * 24 * $scan_day);

        if (isset($_REQUEST['show']))
            \f\pa($in, 2, '', '$in');

        $ff->execute($in);
        $load_iiko_users = $ff->fetchAll();
    }

    if (isset($_REQUEST['show'])) {
        \f\pa($load_iiko_users, 2, '', '$load_iiko_users');
    }

    foreach (\Nyos\Nyos::$menu as $k => $v) {
        if ($v['type'] == 'iiko_checks' && $v['version'] == 1) {

            \Nyos\api\Iiko::$db_type = $v['db_type'];
            \Nyos\api\Iiko::$db_host = $v['db_host'];
            \Nyos\api\Iiko::$db_port = $v['db_port'];
            \Nyos\api\Iiko::$db_base = $v['db_base'];
            \Nyos\api\Iiko::$db_login = $v['db_login'];
            \Nyos\api\Iiko::$db_pass = $v['db_pass'];

            break;
        }
    }

    $start = \f\timer_start(79);

    $var_cash = 'load_check_from_iiko_u_';

    $jms = [];
    $jms_ar__jm_d = [];

    $checks_on_server = [];

    foreach ($load_iiko_users as $v) {

        // echo '<br/>загружено:' . sizeof($load_iiko_users);
//        \f\pa($v);
//        break;

        if (isset($_REQUEST['user']) && $_REQUEST['user'] == $v['id']) {
            $skip = '';
        } else {
            $skip = \f\Cash::getVar($var_cash . $v['id']);
        }
        // $skip = [];
        // \f\pa($skip);

        if (empty($skip)) {

            // if( empty( $checks_on_server ) )
            $checks_on_server = \Nyos\api\Iiko::loadData('checki_day', $v['iiko_id'], date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600 * 24 * $scan_day));

            if (isset($_REQUEST['show'])) {
                \f\pa($checks_on_server, 2, '', '$checks_on_server');
            }

            $jms[] = $v['id'];
            $jms_ar__jm_d[$v['id']] = $checks_on_server;

            \f\Cash::setVar($var_cash . $v['id'], 'da', 3600 * 2);

            // echo 'норм ' . \f\timer_stop(79);
            $time = \f\timer_stop(79, 'ar');

            // \f\pa(\f\timer_stop(79, 'ar'));

            if ($time['sec'] > 15)
                break;
        } else {

            // echo '<br/>пропуск ' . $v['id'];
            // \f\pa(\f\timer_stop(79, 'ar'));
        }

        // flush();
    }

    // \f\pa($jms_ar__jm_d, 2, '', '$jms_ar__jm_d');

    if (empty($jms))
        die('нечего грузить');

    $in = [];

    $sql = 'SELECT 
            c.id,
            c.jobman,
            c.start,
            c.fin
        FROM 
            mod_050_chekin_checkout c
        WHERE
            start >= :d1 AND
            jobman IN ( ' . ( sizeof($jms) > 1 ? implode(',', $jms) : implode('', $jms) ) . ' )
        ';

    // \f\pa($sql);

    $ff = $db->prepare($sql);
    $in[':d1'] = date('Y-m-d 05:00:00', $_SERVER['REQUEST_TIME'] - 3600 * 24 * $scan_day);
    $ff->execute($in);
    $now_checks = $ff->fetchAll();
    // \f\pa($load_iiko_users, 2, '', '$load_iiko_users');

    $adds = [];
//     $update = [];
    $new_finish = [];

    foreach ($jms_ar__jm_d as $user => $v1) {
        foreach ($v1 as $new) {

            if (empty($new['start']))
                continue;

            if (!empty($new['end']) && date('H:i', strtotime($new['end'])) == '05:00')
                continue;

            // \f\pa($v2,'','','на ИИКО, проверяем есть нет в нашей бд');
            // echo '<br/>' . $user . ' ' . $new['start'] . ' ' . $new['end'];

            $item = $new;
            $item['jobman'] = $user;

            $add = [];

            $new_add = true;

            foreach ($now_checks as $in) {

                if (empty($in['start']))
                    continue;

                if (isset($in['jobman']) && $in['jobman'] != $user)
                    continue;

                // старт сходится
                if (!empty($in['start']) && !empty($new['start']) && $in['start'] == $new['start']) {
                    $new_add = false;

                    if (!empty($new['end']) && $in['fin'] != $new['end']) {

                        $hours = \Nyos\mod\IikoChecks::calcHoursInSmena($new['start'], $new['end']);

                        $new_finish[$in['id']] = [
                            'fin' => $new['end'],
                            'hour_on_job' => ( $hours > 0 ? $hours : 1 )
                        ];
                    }
                }
            }

            if ($new_add === true) {

                $add = $item;
                if (!empty($item['end']))
                    $add['fin'] = $item['end'];

                if (!empty($add['start']) && !empty($add['fin'])) {
                    $hours = \Nyos\mod\IikoChecks::calcHoursInSmena($add['start'], $add['fin']);
                    // $add['hour_on_job'] = \Nyos\mod\IikoChecks::calcHoursInSmena($add['start'], $add['fin']);
                    $add['hour_on_job'] = ( $hours > 0 ? $hours : 1 );
                }

                $adds[] = $add;
            }
        }
    }

    $return = [];
    
    // echo '<pre>';

    // echo PHP_EOL . 'добавляем :' . sizeof($adds);
    $return['added'] = sizeof($adds);
    if (!empty($adds)) {

        if (isset($_REQUEST['nosave'])) {
            \f\pa([$adds, ['who_add_item' => 'iiko']]);
        } else {
            \Nyos\mod\items::adds($db, \Nyos\mod\JobDesc::$mod_checks, $adds, ['who_add_item' => 'iiko']);
        }
    }

    // echo PHP_EOL . 'изменяем :' . sizeof($new_finish);
    $return['edited'] = sizeof($new_finish);

    if (!empty($new_finish)) {
        foreach ($new_finish as $id => $v) {
            if (isset($_REQUEST['nosave'])) {
                \f\pa([$id, $v]);
            } else {
                $e = \f\db\db_edit2($db, 'mod_' . \f\translit(\Nyos\mod\JobDesc::$mod_checks, 'uri2'), ['id' => $id], $v);
                // \f\pa([$id, $v]);
                // break;
            }
        }
    }

    
    if( !empty($_REQUEST['clear_ocenki']['sp']) && !empty($_REQUEST['clear_ocenki']['date_start']) ){
        \Nyos\mod\JOBDESC_DAYOCENKA::deleteOcenki( $db, $_REQUEST['clear_ocenki']['sp'], $_REQUEST['clear_ocenki']['date_start'] );
    }
    
    $r = ob_get_contents();
    ob_end_clean();

    // die($r);

    \f\end2( $r, true, $return );
    
//    \f\end2('<div class="warn" style="padding:5px;" >'
//            . '<nobr><b>смена добавлена</b>'
//            . '<br/>с ' . date('d.m.y H:i', $start_time)
//            . '<br/>до ' . date('d.m.y H:i', $fin_time)
//            . '<br/>часов на работе ' . $indb['hour_on_job']
//            // . '<hr>' . $ee . '<hr>'
//            . '</nobr>'
//            . '</div>', true);
} catch (\Exception $exc) {


    echo '<pre>';
    print_r($exc);
    echo '</pre>';
    // echo $exc->getTraceAsString();

    $r = ob_get_contents();
    ob_end_clean();

    // die($r);

    \f\end2($r, false);
}