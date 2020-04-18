<?php

/**
  класс модуля
 * */

namespace Nyos\mod;

if (!defined('IN_NYOS_PROJECT'))
    throw new \Exception('Сработала защита от розовых хакеров, обратитесь к администрратору');

class IikoChecks {

    public static $dir_img_server = false;

    /**
     * 
     * @param type $db
     * @param type $otrezok
     * / час - ищем тех у кого больше часа последний чек
     * / день - ищем тех у кого больше часа последний чек
     * / 3дня - ищем тех у кого больше часа последний чек
     * @return type
     */
    public static function getUserForLoad($db, $otrezok = null) {

        $ff = $db->prepare('SELECT 
                    mi.id,
                    mi.head,
                    mid.value user_iiko_id,
                    
                    mi2.id last_checks_id,
                    
                    mid3.id last_job_id '
                . ', '
                . '  mid2.value_datetime last_import '
                // . ( $otrezok == 'час' ? ' , mid25.value_datetime searched , datetime( \''.date( 'Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ).'\',\'+1 hours\' ) search  ' : '' )
                // . ( $otrezok == 'час' ? ' , mid25.value_datetime searched ' : '' )
                . '

                FROM 

                    mitems mi

                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'iiko_id\'


                INNER JOIN `mitems` mi3 ON mi3.status = \'show\' AND mi3.module = \'jobman_send_on_sp\'
                INNER JOIN `mitems-dops` mid31 ON mid31.id_item = mi3.id AND mid31.name = \'jobman\' AND mid31.value = mi.id '
                . ' LEFT JOIN `mitems-dops` mid3 ON mid3.id_item = mi2.id AND mid3.name = \'jobman\' AND mid3.value = mi.id
                LEFT JOIN `mitems` mi2 ON mi2.status = \'show\' AND mi2.module = \'081.job_checks_from_iiko\' ' .
                ' LEFT JOIN `mitems-dops` mid2 ON mid2.id_item = mi2.id AND mid2.name = \'data\' ' // 'AND mid2.value < :date '
                . ( $otrezok == 'час' ? ' INNER JOIN `mitems-dops` mid25 ON mid25.id = mid2.id AND mid25.value_datetime < datetime( \'' . date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . '\',\'-1 hours\' )  ' : '' )
                . '

                WHERE

                    mi.module = :mod1 AND
                    mi.status = \'show\' 
                GROUP BY 
                    mi.id

                ORDER BY '
                . ' mi3.id DESC '
                . ' , mi2.id DESC '
                . ' , mid2.value_datetime ASC '

                // . ' LIMIT 10 '
                . '
                
                ;');

        $ff->execute(array(
            // ':id_user' => 'f34d6d84-5ecb-4a40-9b03-71d03cb730cb',
            ':mod1' => '070.jobman',
                // ':date' => ' date(\'' . date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600*24*3 ) .'\') ',
                // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
        ));
        //$e3 = $ff->fetchAll();

        $e = $ff->fetchAll();
        //\f\pa($e);

        return $e;
    }

    /**
     * считаем сколько часов между двух точек времени (старая версия, не использовать)
     * ( обновлённая версия 1912201602 > calculateHoursInRangeUnix )
     * @param dt $start
     * @param dt $end
     * @return string
     */
    public static function calculateHoursInRange(string $start, $end = null) {

        if ($end === null)
            return null;

        return ceil(( ( ceil(strtotime($start) / 1800) * 1800 ) - ( ceil(strtotime($end) / 1800) * 1800 ) ) / 1800) / 2;
    }

    /**
     * считаем сколько времени отталкиваясь от юникс дат (в секундах)
     * версия от 1912201602
     * @param string $start
     * @param type $end
     * @return type
     */
    public static function calculateHoursInRangeUnix($start, $end) {

        if (!empty($start) && is_numeric($start) && !empty($end) && is_numeric($end)) {
            return ceil(( ( ceil($end / 1800) * 1800 ) - ( ceil($start / 1800) * 1800 ) ) / 1800) / 2;
        } 
        // ошибка или пришли не цифры или пустые значения
        else {
            return null;
        }
    }

    /**
     * считаем количество часов в смене
     * @param string $start
     * @param type $end
     * @return type
     */
    public static function calcHoursInSmena(string $start, $end = null) {

        if ($end === null)
            return null;

        return ceil(( ( ceil(strtotime($end) / 1800) * 1800 ) - ( ceil(strtotime($start) / 1800) * 1800 ) ) / 1800) / 2;
    }

    /**
     * достаём чеки сотрудника за несколько дней
     * @param type $array_on_server
     * @param type $checks
     */
    public static function getChecksJobmanLastDays($db, int $user_id, $what_day_to_diff = 3, $module_jobman = '070.jobman', $module_checks = '050.chekin_checkout') {

        $sql = 'SELECT 
        
                    mi.id, 
                    
                    mid2.value_datetime start,
                    
                    mid3.id itemsdop_end_id,
                    mid3.value_datetime fin,
                    mid31.value hour_on_job,
                    mid4.value ocenka,
                    mid5.value pay
                    
                FROM 
                
                    mitems mi

                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'jobman\' AND mid.value = :id_user
                INNER JOIN `mitems-dops` mid2 ON mid2.id_item = mi.id AND mid2.name = \'start\' AND mid2.value_datetime >= :search_to_date
                
                LEFT JOIN `mitems-dops` mid3 ON mid3.id_item = mi.id AND mid3.name = \'fin\' 
                LEFT JOIN `mitems-dops` mid31 ON mid31.id_item = mi.id AND mid31.name = \'hour_on_job_calc\' 
                LEFT JOIN `mitems-dops` mid4 ON mid4.id_item = mi.id AND mid4.name = \'ocenka\' 
                LEFT JOIN `mitems-dops` mid5 ON mid5.id_item = mi.id AND mid5.name = \'pay_buh\' 

                WHERE

                    mi.module = :mod_checks AND
                    mi.status = \'show\' 
                    
        ';
        // echo '</pre>';

        $ff = $db->prepare($sql);

        // $dt = date('Y-m-d 00:00:00', ( $_SERVER['REQUEST_TIME'] - 3600 * 24 * $day_checked));
        // echo '<br/>ищем значение >= ' . $dt;

        $ff->execute(array(
            ':search_to_date' => ' datetime(\'now\',\'-' . $what_day_to_diff . ' day\') ',
            // ':mod_user' => $module_jobman,
            ':mod_checks' => $module_checks,
            ':id_user' => $user_id,
                // ':mod1' => '070.jobman',
                //':start_date' => ' date(\'' . date('Y-m-d 00:00:00', ( $_SERVER['REQUEST_TIME'] - 3600 * 24 * $day_checked ) ) . '\') ',
                //':start_date' => ' date( \'' . $dt . '\' ) ',
                // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
        ));
        $checks = $ff->fetchAll();
        // \f\pa($checks, 2, null, '$checks');

        return $checks;
    }

    /**
     * загружаем чеки с сервера, сравниваем с чеками на сайте и добавляем чего не хватает
     * @param type $array_on_server
     * @param type $checks
     */
    public static function getIikoIdFromJobman($db, int $user_id, $module_jobman = '070.jobman') {

        $ff = $db->prepare('SELECT 
                    mi.id, 
                    mid.value iiko_id
                FROM 
                    mitems mi
                    
                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'iiko_id\'

                WHERE

                    mi.module = :mod_jobman AND
                    mi.status = \'show\' AND
                    mi.id = :id_user
                ;');

        $ff->execute(array(
            ':id_user' => $user_id,
            ':mod_jobman' => $module_jobman,
                //':date' => ' date(\'' . date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600*24*100 ) .'\') ',
                // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
        ));
        if ($user = $ff->fetch()) {
            return $user['iiko_id'];
        } else {
            throw new \Exception('не найден id в iiko для пользователя ' . $user_id);
        }
    }

    /**
     * получаем чеки 1 работника с даты по дату
     * @param type $db
     * @param int $user_id
     * @param string $date_start
     * @param string $date_fin
     * @param type $mod_checks
     * @return type
     */
    public static function getChecksJobman($db, int $user_id, string $date_start, string $date_fin, $mod_checks = '050.chekin_checkout') {

        // начинаем сравнивать что есть чего нет
        \Nyos\mod\items::$sql_itemsdop_add_where_array = array(
            ':man' => $user_id
            ,
            ':datestart' => date('Y-m-d 00:00:00', strtotime($date_start))
            ,
            ':datefin' => date('Y-m-d 23:59:00', strtotime($date_fin))
        );
        $checki = \Nyos\mod\items::$sql_itemsdop2_add_where = '
            INNER JOIN `mitems-dops` m1 ON m1.id_item = mi.id AND m1.name = \'jobman\' AND m1.value = :man
            INNER JOIN `mitems-dops` m2 ON m2.id_item = mi.id AND m2.name = \'start\' AND m2.value_datetime >= :datestart
            INNER JOIN `mitems-dops` m3 ON m3.id_item = mi.id AND m3.name = \'start\' AND m3.value_datetime <= :datefin
            ';
        $checki = \Nyos\mod\items::getItemsSimple($db, $mod_checks, 'show');
        // \f\pa($checki, 2, '', '$checki');

        return $checki['data'];
    }

    /**
     * загружаем чеки с сервера, сравниваем с чеками на сайте и добавляем чего не хватает
     * @param type $array_on_server
     * @param type $checks
     */
    public static function importChecks($db, int $user_id, $what_day_to_diff = 3, $folder = '', $module_jobman = '070.jobman', $module_checks = '050.chekin_checkout') {

        // $day_checked = 5;
        //$user_id = $_GET['user'];
//        if (empty($folder))
//            $folder = \Nyos\Nyos::$folder_now;

        $for_end = '';

        try {

            $date_load = date('Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * $what_day_to_diff));
            $for_end .= '<br/>старт загрузки данных ' . $date_load;

            $ff = $db->prepare('SELECT 
                    mi.id, 
                    mid.value iiko_id
                FROM 
                    mitems mi
                    
                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'iiko_id\'

                WHERE

                    mi.module = :mod_jobman AND
                    mi.status = \'show\' AND
                    mi.id = :id_user
                ;');

            $ff->execute(array(
                ':id_user' => $user_id,
                ':mod_jobman' => $module_jobman,
                    //':date' => ' date(\'' . date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600*24*100 ) .'\') ',
                    // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
            ));
            $user = $ff->fetch();
            \f\pa($user, 2, null, 'user');

            /**
             * получаем инфу с сервера о чеках
             */
            $checks_on_server = \Nyos\api\Iiko::loadData('checki_day', $user['iiko_id'], $date_load);
            //\f\pa($checks_on_server, 2, null, '$checks_on_server');

            $checks = self::getChecksJobmanLastDays($db, $user['id'], 3);
            // \f\pa($checks, 2, null, '$checks');

            /**
             * сформировали массивы и сравниваем
             */
            foreach ($checks_on_server as $k => $v) {

                // echo '<Br/>'.$v['start'].' +++';

                $searched = false;

                foreach ($checks as $k1 => $v1) {

                    /**
                     * если старты одинаковые есть и там и там
                     */
                    //echo '<Br/>'.$v['start'].' - '.$v1['start'];
                    if ($v['start'] == $v1['start']) {

                        $searched = true;
                        $for_end .= '<br/>' . __LINE__ . ' нашли имеющийся чек старты равны ' . $v1['start'];


                        // echo '<Br/>найдено!';
                        // $searched = $v1;
                        // если нет конца смены но есть начало
                        if ($v['end'] != $v1['fin']) {
                            $for_end .= '<br/>' . __LINE__ . ' концы смен не сходятся ';

                            // \f\pa($v);
                            // \f\pa($v1);

                            $rows = [];

                            $for_end .= '<br/>нет конца смены но есть начало';
                            $for_end .= '<br/>пишем [' . $v['end'] . '] [' . $v1['fin'] . '] ';

                            $rows[] = array(
                                'name' => 'fin',
                                'value_datetime' => $v['end'],
                            );

                            $smena_hours = ceil(( ( ceil(strtotime($v['end']) / 1800) * 1800 ) - ( ceil(strtotime($v['start']) / 1800) * 1800 ) ) / 1800) / 2;

                            $rows[] = array(
                                'name' => 'hour_on_job_calc',
                                'value' => $smena_hours,
                            );

                            \f\pa($rows, 2, null, '$rows');
                            \f\db\sql_insert_mnogo($db, 'mitems-dops', $rows, array('id_item' => $v1['id']));
                        } else {
                            $for_end .= '<br/>' . __LINE__ . ' концы смен сходятся, полностью одинаковые чеки - конец смены ' . $v1['fin'];
                        }

//                        \f\pa($v);
//                        \f\pa($v1);
                        // break;
                    }
                }

                if ($searched === false) {

                    $for_end .= '<br/>' . __LINE__ . ' не нашли чек с сервера <br/> старт ' . $v['start'] . ' - ' . $v['end'];

                    // \f\pa($v);
                    // \f\pa($v1);

                    $indb = array(
                        'jobman' => $user['id'],
                        'start' => date('Y-m-d H:i:00', strtotime($v['start'])),
                        'who_add_item' => 'iiko'
                    );

                    if (!empty($v['end'])) {
                        $indb['fin'] = date('Y-m-d H:i:00', strtotime($v['end']));
                        $indb['hour_on_job_calc'] = self::calculateHoursInRange($v['start'], $v['end']);
                    }

                    \Nyos\mod\items::addNew($db, $folder, \Nyos\Nyos::$menu['050.chekin_checkout'], $indb);
                    $for_end .= '<br/>' . __LINE__ . ' добавили чек ';
                }
            }

            return \f\end2('обработка прошла успешно ', true, array('txt' => $for_end), 'array');
        } catch (\PDOException $ex) {
            $msg = '<pre>--- ' . __FILE__ . ' ' . __LINE__ . '-------'
                    . PHP_EOL . $ex->getMessage() . ' #' . $ex->getCode()
                    . PHP_EOL . $ex->getFile() . ' #' . $ex->getLine()
                    . PHP_EOL . $ex->getTraceAsString()
                    . '</pre>';

            return \f\end2('какая то ошибка', false, array('txt' => $for_end, 'error' => $msg), 'array');
        }
    }

    /**
     * ложим отметки о чеках в нашу базу
     * @param type $db
     * @param type $user
     * @param type $array_checks
     */
    public static function putNewChecks($db, $user, $array_checks, $folder = null) {

        if ($folder === null)
            $folder = \Nyos\Nyos::$folder_now;

        foreach ($array_checks as $k => $v) {

            $inin = array(
                'start' => !empty($v['start']) ? date('Y-m-d H:i', strtotime($v['start'])) : '',
                'fin' => !empty($v['end']) ? date('Y-m-d H:i', strtotime($v['end'])) : '',
                'jobman' => $user
            );

            if (!empty($v['end']) && !empty($v['start']))
                $inin['hour_on_job_calc'] = ceil(( ( ceil(strtotime($v['end']) / 1800) * 1800 ) - ( ceil(strtotime($v['start']) / 1800) * 1800 ) ) / 1800) / 2;

            // \f\pa($inin);

            $tt = \Nyos\mod\items::addNew($db, $folder, \Nyos\nyos::$menu['050.chekin_checkout'], $inin);
        }
    }

    /**
     * просмотр списка загрузок
     * @param type $db
     * @return type
     */
    public static function getListLog($db) {
        $ff = $db->prepare('SELECT 
                    mi.id, '
                . ' mi.head, '
                . ' mid2.value_date last_import '
                . '

                FROM 

                    mitems mi

                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'iiko_id\'

                INNER JOIN `mitems` mi2 ON mi2.status = \'show\' AND mi2.module = \'081.job_checks_from_iiko\' ' .
                ' INNER JOIN `mitems-dops` mid3 ON mid3.id_item = mi2.id AND mid3.name = \'jobman\' AND mid3.value = mi.id ' .
                ' LEFT JOIN `mitems-dops` mid2 ON mid2.id_item = mi2.id AND mid2.name = \'data\' ' . // 'AND mid2.value < :date '.

                '

                WHERE

                    mi.module = :mod1 AND
                    mi.status = \'show\' 
                GROUP BY 
                    mi.id

                ORDER BY '
                . ' mid2.value ASC '
                // . ' LIMIT 10 '
        );

        $ff->execute(array(
            // ':id_user' => 'f34d6d84-5ecb-4a40-9b03-71d03cb730cb',
            ':mod1' => '070.jobman',
                //':date' => ' date(\'' . date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600*24*100 ) .'\') ',
                // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
        ));
        //$e3 = $ff->fetchAll();

        $e = $ff->fetchAll();
        //\f\pa($e);

        return $e;
    }

}
