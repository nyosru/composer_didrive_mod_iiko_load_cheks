<?php

// ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
// error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки

date_default_timezone_set("Asia/Yekaterinburg");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//ini_set("max_execution_time", 120);
//set_time_limit(120);

define('IN_NYOS_PROJECT', true);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require( $_SERVER['DOCUMENT_ROOT'] . '/all/ajax.start.php' );


if (isset($_GET['show_get']) && $_GET['show_get'] = 'da') {
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
    echo '<br/><br/>';
}


if (isset($_GET['show_request']) && $_GET['show_request'] = 'da') {
    echo '<input type=text value="https://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '" style="width:100%;padding:3px;" ><br/><br/>';
}


//    echo '<pre>'; print_r($_REQUEST); echo '</pre>';
//    echo '<pre>'; print_r($_SERVER); echo '</pre>';
//    echo '<pre>'; print_r($_POST); echo '</pre>';
//\f\pa($_GET);
//ob_start('ob_gzhandler');
//\f\pa($_POST);
//$r = ob_get_contents();
//ob_end_clean();


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

/**
 * 
 */
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_list6541') {

    $dops = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    );

    $db7 = new \PDO(
            \Nyos\api\Iiko::$db_type
            . ':dbname=' . ( isset(\Nyos\api\Iiko::$db_base{1}) ? \Nyos\api\Iiko::$db_base : '' )
            . ';host=' . ( isset(\Nyos\api\Iiko::$db_host{1}) ? \Nyos\api\Iiko::$db_host : '' )
            . ( isset(\Nyos\api\Iiko::$db_port{1}) ? ';port=' . \Nyos\api\Iiko::$db_port : '' )
            , ( isset(\Nyos\api\Iiko::$db_login{1}) ? \Nyos\api\Iiko::$db_login : '')
            , ( isset(\Nyos\api\Iiko::$db_pass{1}) ? \Nyos\api\Iiko::$db_pass : '')
            , $dops
    );


    $sql = 'SELECT dbo.OrderPaymentEvent.restaurantSection 
             FROM dbo.OrderPaymentEvent 
             GROUP BY restaurantSection '
    ;
    $ff = $db7->prepare($sql);
    $ff->execute();

    while ($e = $ff->fetch()) {

        echo ' <br/> \'' . $e['restaurantSection'] . '\', ';
    }

    exit;
}

/**
 * 
 */ elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_list654') {

    \f\pa($_REQUEST);

    $dops = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    );

    $db7 = new \PDO(
            \Nyos\api\Iiko::$db_type
            . ':dbname=' . ( isset(\Nyos\api\Iiko::$db_base{1}) ? \Nyos\api\Iiko::$db_base : '' )
            . ';host=' . ( isset(\Nyos\api\Iiko::$db_host{1}) ? \Nyos\api\Iiko::$db_host : '' )
            . ( isset(\Nyos\api\Iiko::$db_port{1}) ? ';port=' . \Nyos\api\Iiko::$db_port : '' )
            , ( isset(\Nyos\api\Iiko::$db_login{1}) ? \Nyos\api\Iiko::$db_login : '')
            , ( isset(\Nyos\api\Iiko::$db_pass{1}) ? \Nyos\api\Iiko::$db_pass : '')
            , $dops
    );


//                if( !empty($date_fin) ){
//                    $ar_in_sql[':date_end'] = date( 'Y-m-d 23:59:00', strtotime($date_fin) );
//                }
    //$date = '2019-07-12';

    if (!isset($_REQUEST['hide_form'])) {

        $ll = '
3c93fc45-485a-46cb-9ee6-0399eb27148f
1cacedf6-f411-497b-b44e-18c73b813fd7
6f475233-a2b3-4d64-a173-1bf4831a7fd2
731c2594-a97e-4db2-90ea-1c9ba8402437
693e7f4f-ebc8-410f-b13e-25b54a62216f
365f9152-1d18-4776-a8c9-2ba39ee4f3cc
ce82d80e-8158-4a98-a98d-2ff167d4de6b
723d4eec-900d-43e5-86a5-33bfe7d4944d
9a720aba-478a-4787-8031-33d8f80a544a
5237f417-19b7-4774-9298-356eccf001b0
afe2c3ee-e3e5-4b91-9eef-38b61086ad18
9e3b1014-9285-415b-9a2d-4073c0598cef
1260ef55-f434-4576-aa03-47077a8ca0d0
2bc3b2e7-62f7-4839-991e-4789fc5a43b6
16f98ffb-526e-4562-a7bb-4c3a779b2194
f06da035-02f0-49ae-b16f-51f0a1d01b6f
80d0cc1f-233a-432e-9db7-588e73a97e02
f939f35f-c169-4be9-9933-5af230748ede ТТ1
eba3487f-db68-4084-a752-642ae0e73616
efac5394-ef56-4c43-adeb-6a849e0024d4
08f510f7-660f-4064-b52a-72a0643761bc
5e55c65f-4ef9-4127-acd3-765cc55a2cc0
4c360162-6e12-da32-0145-88f5ce8c0087
3ce15261-b48a-4373-b44e-8dbb62274901
8e5f876b-7b41-45ac-b01b-9311c552bb33
121dbeec-d7fb-4c9c-9966-a2c68e496958
593961aa-fcce-495c-82ea-a597d5cf4dd5
07537f97-f152-490f-9d95-a6a259cab694
2a3280c0-7292-415d-8d1f-c47f8cf7b52b
d12d22b8-753e-4b90-8aeb-d32246ae6057
cc7c9a77-e356-4a2e-b52e-dc88b377e222
48c62350-dc1c-4e3a-929f-de4d7c77c984
01d37b65-2399-4453-a8ad-e133026a397f ТТ6
3f7ab84e-4477-4186-9d72-e21c08f6e6d8
b71407a7-d94d-423c-9eb7-e2d2a8884fa3
7ea67556-6935-4283-83af-f67e0adba56c
        ';

        $list = explode(PHP_EOL, $ll);
        // \f\pa($list,2);


        echo '<form action="/vendor/didrive_mod/iiko_checks/ajax.php" method=get >
        <input type="date" name="date" value="' . ( $_REQUEST['date'] ?? '' ) . '" >
        <input type="hidden" name="action" value="get_list654" >
        <Br/>
        <Br/>
        <input type="checkbox" name="show" value="info" > показывать таблицы данных
        <br/>
        <br/>
        <input type="checkbox" name="hide_form" value="da" > скрыть форму
        <br/>
        <br/>
        <select name="sp_key_iiko" >';

//            <option value="f939f35f-c169-4be9-9933-5af230748ede" >ТТ1</option>
//            <option >1260ef55-f434-4576-aa03-47077a8ca0d0</option>
//            <option >16f98ffb-526e-4562-a7bb-4c3a779b2194</option>
//            <option >01d37b65-2399-4453-a8ad-e133026a397f</option>
//            <option >f939f35f-c169-4be9-9933-5af230748ede</option>
//            <option >08f510f7-660f-4064-b52a-72a0643761bc</option>
//            <option >121dbeec-d7fb-4c9c-9966-a2c68e496958</option>
//            <option >d12d22b8-753e-4b90-8aeb-d32246ae6057</option>
//            <option >80d0cc1f-233a-432e-9db7-588e73a97e02</option>

        foreach ($list as $k => $v) {
            if (isset($v{5})) {
                $l2 = explode(' ', $v);

                if (isset($l2[1])) {
                    echo '<option value="' . $l2[0] . '" ' . ( isset($_REQUEST['sp_key_iiko']) && $_REQUEST['sp_key_iiko'] == $l2[0] ? 'selected' : '' ) . ' >' . $l2[1] . '</option>';
                } else {
                    echo '<option ' . ( isset($_REQUEST['sp_key_iiko']) && $_REQUEST['sp_key_iiko'] == $l2[0] ? 'selected' : '' ) . ' >' . $l2[0] . '</option>';
                }
            }
        }


        echo '
        </select>
        <br/>
        <br/>
        <input type=submit value="отправить" >
        </form>';
    }
    if (isset($_REQUEST['show']))
        \f\pa($_REQUEST);

    if (empty($_REQUEST['date']))
        die('укажите дату');

    $date = date('Y-m-d', strtotime($_REQUEST['date']));

    $sql = // 'set @date1=\''.date('Y-m-d 00:00:00', strtotime('2019-07-11') ).'\' '.
//        '
//        declare @TIME1 as datetime
//        declare @TIME2 as datetime
//        SET @TIME1 = \''.date('Y-m-d 00:00:00', strtotime('2019-07-11') ).'\'
//        SET @TIME2 = \''.date('Y-m-d 23:59:00', strtotime('2019-07-11') ).'\'
//        '
            // . 'set @date2=\''.date('d.m.Y 23:00:00', strtotime('2019-07-11') ).'\' '
//            . 
            'SELECT '
            . ' dbo.OrderPaymentEvent.date '
            . ' , '
            . ' dbo.OrderPaymentEvent.prechequeTime , '
            . ' dbo.OrderPaymentEvent.orderSum, '
            . ' dbo.OrderPaymentEvent.sumCard, '
            . ' dbo.OrderPaymentEvent.sumCash , '
            . ' dbo.OrderPaymentEvent.unmodifiable , '
            . ' dbo.OrderPaymentEvent.changeSum , '
            . ' dbo.OrderPaymentEvent.receiptsSum , '
            . ' dbo.OrderPaymentEvent.problemOpName '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderNum '
            . ' , '
            . ' dbo.OrderPaymentEvent.revision '
            . ' , '
            . ' dbo.OrderPaymentEvent.department '
            . ' , '
            . ' dbo.OrderPaymentEvent.auth_card_slip '
            . ' , '
            . ' dbo.OrderPaymentEvent.auth_user '
            . ' , '
            . ' dbo.OrderPaymentEvent.closeTime '
//            . ' , '
//            . ' dbo.OrderPaymentEvent.discount '
//            . ' , '
//            . ' dbo.OrderPaymentEvent.increase '
            . ' , '
            . ' dbo.OrderPaymentEvent.isBanquet '
            . ' , '
            . ' dbo.OrderPaymentEvent.numGuests '
            . ' , '
            . ' dbo.OrderPaymentEvent.openTime '
            . ' , '
            . ' dbo.OrderPaymentEvent.[order] '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderNum '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderSum '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderSumAfterDiscount '
//            . ' , '
//            . ' dbo.OrderPaymentEvent.prechequeTime '
            . ' , '
            . ' dbo.OrderPaymentEvent.priceCategory '
            . ' , '
            . ' dbo.OrderPaymentEvent.problemOpName '
            . ' , '
            . ' dbo.OrderPaymentEvent.problemPriority '
            . ' , '
            . ' dbo.OrderPaymentEvent.problemType '
            . ' , '
            . ' dbo.OrderPaymentEvent.receiptsSum '
            . ' , '
            . ' dbo.OrderPaymentEvent.restaurantSection '
            . ' , '
            . ' dbo.OrderPaymentEvent.session_group '
            . ' , '
            . ' dbo.OrderPaymentEvent.session_id '
            . ' , '
            . ' dbo.OrderPaymentEvent.session_number '
            . ' , '
            . ' dbo.OrderPaymentEvent.storned '
            . ' , '
            . ' dbo.OrderPaymentEvent.tableNum '
            . ' , '
            . ' dbo.OrderPaymentEvent.[user] '
            . ' , '
            . ' dbo.OrderPaymentEvent.waiter '
            . ' , '
            . ' dbo.OrderPaymentEvent.cashRegister '
            . ' , '
            . ' dbo.OrderPaymentEvent.cashier '
            . ' , '
            . ' dbo.OrderPaymentEvent.changeSum '
            . ' , '
            . ' dbo.OrderPaymentEvent.counteragent '
            . ' , '
            . ' dbo.OrderPaymentEvent.detailedCheque '
            . ' , '
            . ' dbo.OrderPaymentEvent.divisions '
            . ' , '
            . ' dbo.OrderPaymentEvent.fiscalChequeNumber '
            . ' , '
            . ' dbo.OrderPaymentEvent.isDelivery '
            . ' , '
            . ' dbo.OrderPaymentEvent.nonCashPaymentType '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderType '
            . ' , '
            . ' dbo.OrderPaymentEvent.pcCard '
            . ' , '
            . ' dbo.OrderPaymentEvent.pcDiscountCard '
            . ' , '
            . ' dbo.OrderPaymentEvent.pcUser '
            . ' , '
            . ' dbo.OrderPaymentEvent.sumCard '
            . ' , '
            . ' dbo.OrderPaymentEvent.sumCash '
            . ' , '
            . ' dbo.OrderPaymentEvent.sumCredit '
            . ' , '
            . ' dbo.OrderPaymentEvent.sumPlanned '
            . ' , '
            . ' dbo.OrderPaymentEvent.sumPrepay '
            . ' , '
            . ' dbo.OrderPaymentEvent.unmodifiable '
            . ' , '
            . ' dbo.OrderPaymentEvent.writeoffPaymentType '
            . ' , '
            . ' dbo.OrderPaymentEvent.writeoffRatio '
            . ' , '
            . ' dbo.OrderPaymentEvent.writeoffReason '
            . ' , '
            . ' dbo.OrderPaymentEvent.writeoffUser '
            . ' , '
            . ' dbo.OrderPaymentEvent.orderDeleted '
            . ' , '
            . ' dbo.OrderPaymentEvent.originName '
            . ' , '
            . ' dbo.OrderPaymentEvent.vatInvoiceId '







            // . ' dbo.OrderPaymentEvent.orderDeleted , ' 
            // . ' dbo.OrderPaymentEvent.session_number , ' 
            // . ' dbo.OrderPaymentEvent.restaurantSection , ' 
            // . ' dbo.OrderPaymentEvent.tableNum ' 
            // ' dbo.EmployeeAttendanceEntry.employee \'user\', '.
//            . ' dbo.EmployeeAttendanceEntry.personalSessionStart \'start\',
//                    dbo.EmployeeAttendanceEntry.personalSessionEnd \'end\'
//                    '
            . '
                FROM 
                    dbo.OrderPaymentEvent
                WHERE 
                '
            .
            ' restaurantSection = \'' . ( $_REQUEST['sp_key_iiko'] ?? 'f939f35f-c169-4be9-9933-5af230748ede' ) . '\' '
            // . ' AND date > \'' . date('Y-m-d 00:00:00', strtotime($date)) . '\' '
            . ' AND date = \'' . date('Y-m-d', strtotime($date)) . '\' '
//            . '
//                    AND prechequeTime > \'' . date('Y-m-d 05:00:00', strtotime($date)) . '\'
//                    AND prechequeTime < \'' . date('Y-m-d 05:00:00', strtotime($date) + 3600 * 24) . '\'
//                    '
//            .'
//                    AND prechequeTime > @TIME1  
//                    '
//            .'
//                    AND prechequeTime between @TIME1 and @TIME2 
//                    '
//            .'
//                    AND prechequeTime >= @TIME1
//                    '
//            .'
//                    AND prechequeTime <= :date2 
//                    '
            // . (!empty($date_fin) ? ' AND personalSessionStart <= :date_end ' : '' )
            // .' LIMIT 0,10 '
            . ' ORDER BY prechequeTime ASC '
    ;

    if (isset($_REQUEST['show']))
        echo '<pre>' . $sql . '</pre>';

    $ff = $db7->prepare($sql);

//    $ar_in_sql = array(
//        // ':id_user' => 'f34d6d84-5ecb-4a40-9b03-71d03cb730cb',
//        // ':id_user' => $id_user_iiko,
//        ':date1' => date('d.m.Y 00:00:00', strtotime('2019-07-11') ),
//        ':date2' => date('d.m.Y 23:59:00', strtotime('2019-07-11') ),
//        //':date3' => date('d.m.Y', strtotime('2019-07-11') ),
//        //':sp_iiko_id' => 'f939f35f-c169-4be9-9933-5af230748ede'
//    );
//\f\pa($ar_in_sql);
    //$ff->execute($ar_in_sql);
    $ff->execute();
    //$e3 = $ff->fetchAll();
//            $e3 = [];

    if (isset($_REQUEST['show']))
        echo '<table cellpadding=10 border=1 >'; // <tr><td>1</td><td>2</td></tr>';


    $sum = 0;

    $n = 1;

    while ($e = $ff->fetch()) {

        if (isset($_REQUEST['show'])) {
            if ($n == 1) {
                echo '<tr>';

                foreach ($e as $k => $v) {
                    echo '<td>' . $k . '</td>';
                }

                echo '</tr>';
            }
        }
        $n++;

        //if( $e['orderSum'] == 543 ){
        if ($n == 2) {
            $ar2 = $e;
        }

        if (isset($_REQUEST['show']))
            echo '<tr>';

        foreach ($e as $k => $v) {

            if (isset($_REQUEST['show']))
                echo '<td>' . iconv('windows-1251', 'utf-8', $v) . '</td>';

            if ($k == 'sumCard' || $k == 'sumCash')
                $sum += $v;
        }

        if (isset($_REQUEST['show']))
            echo '</tr>';

        //$e['user'] = mb_convert_encoding($e['user'],'UTF-8','auto');
        //$e['user'] = utf8_decode($e['user']);
//                $e['user'] = utf8_encode($e['user']);
//                echo '<br/>'.mb_detect_order($e['user']);
        //$e['user'] = iconv('UCS-2LE','UTF-8',substr(base64_decode($e['user']),0,-1));
        //$e['user'] = html_entity_decode($e['user'], ENT_COMPAT | ENT_HTML401, 'UTF-8');
//                $e3[] = $e;
    }
//    \f\pa($e3);

    if (isset($_REQUEST['show'])) {
        echo '</table>';

        echo '<p>Сумма ' . $sum . '</p>';


        \f\pa($ar2, 2, '', '$ar2');
    }

    $sql = // 'set @date1=\''.date('Y-m-d 00:00:00', strtotime('2019-07-11') ).'\' '.
//        '
//        declare @TIME1 as datetime
//        declare @TIME2 as datetime
//        SET @TIME1 = \''.date('Y-m-d 00:00:00', strtotime('2019-07-11') ).'\'
//        SET @TIME2 = \''.date('Y-m-d 23:59:00', strtotime('2019-07-11') ).'\'
//        '
            // . 'set @date2=\''.date('d.m.Y 23:00:00', strtotime('2019-07-11') ).'\' '
//            . 
            'SELECT '
//            . '  id '
//            . ' , '
//            . ' lastModifyNode '
//            . ' , '
            . ' date '
            . ' , '
            . ' num '
            . ' , '
            . ' sum '
            . ' , '
            . ' type '
//            . ' , '
//            . ' revision '
//            . ' , '
//            
//            . ' department '
//            
//            . ' , '
//            . ' cashFlowCategory '
//            . ' , '
//            . ' cashOrderNumber '
//            . ' , '
//            . ' comment '
////            . ' , '
////            . ' conception '
//            . ' , '
//            . ' created '
//            . ' , '
//            . ' userCreated '
//            . ' , '
//            . ' documentId '
//            . ' , '
//            . ' documentItemId '
//            . ' , '
//            . ' from_amount '
//            . ' , '
//            . ' from_account '
//            . ' , '
//            . ' from_counteragent '
//            . ' , '
//            . ' from_product '
//            . ' , '
//            . ' modified '
//            . ' , '
//            . ' userModified '
//            . ' , '
////            . ' session_id '
////            . ' , '
//            . ' to_amount '
//            . ' , '
//            . ' to_account '
//            . ' , '
//            . ' to_counteragent '
//            . ' , '
//            . ' to_product '
//            . ' , '
//            . ' auth_card_slip '
//            . ' , '
//            . ' auth_user '
//            . ' , '
//            . ' cashier '
//            . ' , '
//            . ' causeEvent_id '
//            . ' , '
//            . ' penaltyOrBonusType '
//            . ' , '
//            . ' chequeNumber '
//            . ' , '
//            . ' isFiscal '
//            . ' , '
//            . ' orderId '
//            . ' , '
//            . ' paymentType '
//            . ' , '
//            . ' approvalCode '
//            . ' , '
//            . ' cardNumber '
//            . ' , '
//            . ' cardOwnerCompany '
//            . ' , '
//            . ' cardTypeName '
//            . ' , '
//            . ' nominal '
//            . ' , '
//            . ' vouchersNum '
//            . ' , '
//            . ' salesSum '
//            . ' , '
//            . ' program '
//            . ' , '
//            . ' revenueLevel '
//            . ' , '
//            . ' ndsPercent '
//            . ' , '
//            . ' sumNds '
//            . ' , '
//            . ' attendanceEntry_id '
//            . ' , '
//            . ' scheduleItem_id '
//            . ' , '
//            . ' writeoff_id '
//            . ' , '
//            . ' inventoryEvent_id '
//            . ' , '
//            . ' originDepartment '
//            . ' , '
//            . ' currency '
//            . ' , '
//            . ' currencyRate '
//            . ' , '
//            . ' sumInCurrency '
//            . ' , '
//            . ' to_productSize '
            . '
                FROM 
                    dbo.AccountingTransaction
                WHERE '
            . ' date = \'' . $ar2['date'] . '\' '
            . ' AND num = \'' . $ar2['session_number'] . '\' '

//            . ' AND sum < 0 '
//            . ' AND ( type = \'CARD\' OR type = \'CASH\' ) '
//            . 'created > \'' . date('Y-m-d 08:00:00', strtotime($date)) . '\'
//                AND created < \'' . date('Y-m-d 05:00:00', strtotime($date)+3600*24 ) . '\' '
    // .' AND created < \'' . date('Y-m-d 12:00:00', strtotime($date) + 3600 * 24) . '\' '
    ;

    if (isset($_REQUEST['show']))
        echo '<pre>' . $sql . '</pre>';

    $ff = $db7->prepare($sql);

//    $ar_in_sql = array(
//        // ':id_user' => 'f34d6d84-5ecb-4a40-9b03-71d03cb730cb',
//        // ':id_user' => $id_user_iiko,
//        ':date1' => date('d.m.Y 00:00:00', strtotime('2019-07-11') ),
//        ':date2' => date('d.m.Y 23:59:00', strtotime('2019-07-11') ),
//        //':date3' => date('d.m.Y', strtotime('2019-07-11') ),
//        //':sp_iiko_id' => 'f939f35f-c169-4be9-9933-5af230748ede'
//    );
//\f\pa($ar_in_sql);
    //$ff->execute($ar_in_sql);
    $ff->execute();
    //$e3 = $ff->fetchAll();
//            $e3 = [];

    if (isset($_REQUEST['show']))
        echo '<table cellpadding=10 border=1 >'; // <tr><td>1</td><td>2</td></tr>';


    $sum2 = 0;

    $n = 1;

    while ($e = $ff->fetch()) {

        if (isset($_REQUEST['show'])) {
            if ($n == 1) {
                echo '<tr>';

                foreach ($e as $k => $v) {
                    echo '<td>' . $k . '</td>';
                }

                echo '</tr>';
            }
        }
        $n++;

        // if ($e['sum'] == 1173 || 1 == 1 ) {
        //if ($e['num'] == 866 ) {
        // if ($e['num'] == $ar2['session_number'] ) {
        if (1 == 1) {

            if (isset($_REQUEST['show'])) {

                echo '<tr>';

                foreach ($e as $k => $v) {

                    // 1173
                    if (isset($v{2})) {
                        echo '<td>';
//                    echo '<nobr>' ;
//                    foreach($ar2 as $kk => $vv ){
//                        if( $vv != 0 &&  $vv == $v ){
//                            echo $kk.' ['.$vv.']++<br/>';
//                        }
//                    }
//                    echo '</nobr>' ;
//                    echo '<br/><br/>' ;
                        //echo '//'.iconv('windows-1251', 'utf-8', $v) . '//</td>';
                        echo iconv('windows-1251', 'utf-8', $v) . '</td>';
                    } else {
                        echo '<td>';
//                    echo '<nobr>' ;
//                    foreach($ar2 as $kk => $vv ){
//                        if( $vv != 0 && $vv == $v ){
//                            echo $kk.' ['.$vv.']++<br/>';
//                        }
//                    }
//                    echo '</nobr>' ;
//                    echo '<br/><br/>' ;
                        //echo '//'.$v . '//</td>';
                        echo $v . '</td>';
                    }
                }
                echo '</tr>';
            }
        }

        if ($e['sum'] < 0) {

            //if ( isset( $e['sum'] )  && $e['sum'] < 0 && isset( $e['type'] )  && ( $e['type'] == 'CASH' || $e['type'] == 'CARD' ) )
            if (isset($e['type']) && ( trim($e['type']) == 'CASH' || trim($e['type']) == 'CARD' )) {

                if (isset($_REQUEST['show']))
                    \f\pa($e);

                $sum2 += $e['sum'];
            }
        }

        //$e['user'] = mb_convert_encoding($e['user'],'UTF-8','auto');
        //$e['user'] = utf8_decode($e['user']);
//                $e['user'] = utf8_encode($e['user']);
//                echo '<br/>'.mb_detect_order($e['user']);
        //$e['user'] = iconv('UCS-2LE','UTF-8',substr(base64_decode($e['user']),0,-1));
        //$e['user'] = html_entity_decode($e['user'], ENT_COMPAT | ENT_HTML401, 'UTF-8');
//                $e3[] = $e;
//        if ( $e['sum'] < 0 && ( $e['type'] == 'CASH' || $e['type'] == 'CARD' ) )
//            $sum2 += $e['sum'];
    }
//    \f\pa($e3);

    if (isset($_REQUEST['show']))
        echo '</table>';

    if (isset($_REQUEST['show'])) {
        echo '<p>Сумма- : ' . (int) $sum2 . '</p>';
        echo '<p>Итого- : ' . (int) ( $sum + $sum2 ) . '</p>';
        exit;
    } else {
        die(\f\end2('получили данные по обороту точки', true, array(
            'oborot' => (int) ( $sum + $sum2 ),
            'plus' => (int) $sum,
            'minus' => (int) $sum2
        )));
    }
}



/**
 * загрузка данных по 1 работнику с даты по дату 
 * (из боди ссылка в списке учёта времени)
 */
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'load_checks_for_1jobman') {

    if (isset($_REQUEST['show_timer']))
        \f\timer::start();


    // достаём id iiko для пользователя
    $user_iiko_id = \Nyos\mod\IikoChecks::getIikoIdFromJobman($db, $_REQUEST['jobman']);
    //\f\pa($user_iiko_id);
    // достаём чеки с даты по дату
    $checks_on_server = \Nyos\api\Iiko::loadData('checki_day', $user_iiko_id, $_REQUEST['datestart'], $_REQUEST['datefin']);
    //\f\pa($checks_on_server, 2, '', '$checks_on_server');
    // получаем чеки человека в этом промежутке дат
    $checks = \Nyos\mod\IikoChecks::getChecksJobman($db, $_REQUEST['jobman'], $_REQUEST['datestart'], $_REQUEST['datefin']);
    // \f\pa($checks,2,'','$checks');

    foreach ($checks as $k => $v) {
        if (!empty($v['dop']['who_add_item']) && $v['dop']['who_add_item'] == 'iiko') {

            $ff = $db->prepare('UPDATE mitems SET `status` = \'delete\' WHERE `id` = :id ');
            $ff->execute(array(':id' => $v['id']));
        }
    }

    $new_in = 0;

    foreach ($checks_on_server as $k => $v) {

        $indb = array(
            'jobman' => $_REQUEST['jobman'],
            'start' => date('Y-m-d H:i:00', strtotime($v['start'])),
            'who_add_item' => 'iiko'
        );

        if (!empty($v['end'])) {
            $indb['fin'] = date('Y-m-d H:i:00', strtotime($v['end']));
            $indb['hour_on_job_calc'] = \Nyos\mod\IikoChecks::calculateHoursInRange($v['end'], $v['start']);
        }

        \Nyos\mod\items::addNewSimple($db, '050.chekin_checkout', $indb);
        $new_in ++;
    }

    return \f\end2('загружено периодов ' . $new_in . ' ' . ( isset($_REQUEST['show_timer']) ? '<br/><br/>' . round(\f\timer::stop(), 3) . ' сек' : '' ), true);
}

/**
 * 
 */ elseif (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'read48_and_refresh') {

    //\f\pa($_SERVER);

    if (isset($_GET['show_timer']))
        \f\timer::start();

    // sleep(3);

    $e = \Nyos\mod\IikoChecks::importChecks($db, $_GET['user']);
    // \f\pa($e,2,null,'\Nyos\mod\IikoChecks::searchChecks');

    \Nyos\mod\items::addNewSimple($db, '081.job_checks_from_iiko', array(
        'jobman' => $_GET['user']
    ));

    if ($_GET['show'] == 'html') {
        die($e['txt'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ));
    } else {
        return \f\end2($e['txt'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ), true);
    }
}
/**
 * 
 */ elseif (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'read48_and_refresh') {

    //\f\pa($_SERVER);

    if (isset($_GET['show_timer']))
        \f\timer::start();

    // sleep(3);

    $e = \Nyos\mod\IikoChecks::importChecks($db, $_GET['user']);
    // \f\pa($e,2,null,'\Nyos\mod\IikoChecks::searchChecks');

    \Nyos\mod\items::addNewSimple($db, '081.job_checks_from_iiko', array(
        'jobman' => $_GET['user']
    ));

    if ($_GET['show'] == 'html') {
        die($e['txt'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ));
    } else {
        return \f\end2($e['txt'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ), true);
    }
}
//
elseif (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'read48_and_refresh_all') {

    //\f\pa($_SERVER);
//    \f\pa($_REQUEST);

    ini_set('max_execution_time', 120);
    set_time_limit(120);

    if ( !empty($_GET['show_timer']) )
        \f\timer::start();

    // sleep(3);
    //$e = \Nyos\mod\IikoChecks::importChecks($db, $_GET['user']);
    // \f\pa($e,2,null,'\Nyos\mod\IikoChecks::searchChecks');
    // грузим инфу если с последней загрузки прошло более часа
    // $e = \Nyos\mod\IikoChecks::getUserForLoad($db, 'час');

    \f\timer::start();

    if (isset($_GET['start'])) {
        $d_start = date('Y-m-d', strtotime($_GET['start']));
    } else {
        $d_start = date('Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 3));
    }

    $loaded_checks = \Nyos\api\Iiko::loadChecksFromServer($db, $d_start, ( $_GET['finish'] ?? null));

    if (isset($loaded_checks['html']) && isset($loaded_checks['status']) && $loaded_checks['status'] == 'error') {
        die($loaded_checks['html']);
    }

    // \f\pa($loaded_checks, 2, '', '$loaded_checks');

    if ( !empty($_GET['show_timer']) ){
    $time_job = \f\timer::stop();
    echo 'timer:' . $time_job;
    }

    $e['txt'] = 'грузим Чекины с ИИКО'
            . PHP_EOL
            . 'с ' . $d_start . ' по ' . ( $_GET['finish'] ?? date('Y-m-d', $_SERVER['REQUEST_TIME']) )
            . PHP_EOL
            . 'загружено чекинов - ' . $loaded_checks['loaded_checks']
            . PHP_EOL
            . 'добавлено стартов смен - ' . $loaded_checks['adds_start']
            . PHP_EOL
            . 'добавлено полных смен - ' . $loaded_checks['adds_kolvo']
            . PHP_EOL
            . 'дополнено ранее открытых смен - ' . $loaded_checks['adds_dop_kolvo']
            . PHP_EOL
            . 'время выполнения ' . $time_job . ' сек ';

    if (1 == 1 && class_exists('\\Nyos\\Msg')) {

        if (!isset($vv['admin_ajax_job'])) {
            require_once DR . '/sites/' . \Nyos\nyos::$folder_now . '/config.php';
        }

        $txt = $e['txt'];

        \nyos\Msg::sendTelegramm($txt, null, 1);

        if (isset($vv['admin_ajax_job'])) {
            foreach ($vv['admin_ajax_job'] as $k => $v) {
                \Nyos\Msg::sendTelegramm($txt, $v);
            }
        }
    }

    if (!empty($_REQUEST['go_to_after'])) {
        header('Location: ' . $_REQUEST['go_to_after'] );
    }

    if (1 == 2) {

//    exit;
//    
//    $e = \Nyos\mod\IikoChecks::getUserForLoad($db);
//    \f\pa($e, null, null, '\Nyos\mod\IikoChecks::getUserForLoad($db);');
//
//    exit;


        foreach ($e as $k => $v) {

            $importChecks = \Nyos\mod\IikoChecks::importChecks($db, $v['id']);

            \f\pa($importChecks, 2, null, '$importChecks');
            exit;

            // трём все записки что были ранее и пишем новую запись
            \Nyos\mod\items::deleteItems($db, \Nyos\Nyos::$folder_now, '081.job_checks_from_iiko', array('jobman' => $v['id']));
            \Nyos\mod\items::addNewSimple($db, '081.job_checks_from_iiko', array(
                'jobman' => $v['id']
            ));
        }
    }

    if (isset($_REQUEST['show']) && $_REQUEST['show'] == 'html') {
        die($e['txt'] ?? $e['html'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ) );
    } else {
        return \f\end2($e['txt'] ?? $e['html'] . ( isset($_GET['show_timer']) ? '<br/><br/>выполнялось секунд: ' . \f\timer::stop() : '' ), true);
    }
}






if (
// ( isset($_REQUEST['act2']{0}) && $_REQUEST['act2'] == 'read48_and_refresh_all' ) ||
        ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_list6541' ) ||
        ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_list654' ) ||
        ( isset($_REQUEST['action']{0}) && isset($_REQUEST['s']{5}) && \Nyos\nyos::checkSecret($_REQUEST['s'], $_REQUEST['action']) === true)
) {
    
}
//
else {

    $e = '';
//    foreach ($_REQUEST as $k => $v) {
//        $e .= '<Br/>' . $k . ' - ' . $v;
//    }

    if ($_GET['show'] == 'html') {
        die('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору ' . $e // . $_REQUEST['id'] . ' && ' . $_REQUEST['secret']
        );
    } else {
        f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору ' . $e // . $_REQUEST['id'] . ' && ' . $_REQUEST['secret']
                , 'error');
    }
}




//
if (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'loglist') {

    // $ee = \Nyos\mod\IikoChecks::getUserForLoad($db);
    $ee = \Nyos\mod\IikoChecks::getListLog($db);
    // \f\pa($ee);
    //\f\pa(\Nyos\nyos::$menu);

    $ert = 0;
    echo '<link rel="stylesheet" href="/didrive/design/css/vendor/bootstrap.min.css">';
    echo '<table class="table" ><thead><th>id</th><th>кто</th><th>когда</th></thead><tbody>';
    foreach ($ee as $k => $v) {
        //\f\pa($v);
        echo '<tr><td>' . $v['id'] . '</td><td>' . $v['head'] . '</td><td>' . $v['last_import'] . '</td></tr>';
    }
    echo '</tbody></table>';
    exit;
}
//
elseif (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'clear_all_checks') {

    $ff = $db->prepare('UPDATE `mitems`
        SET
            `status` = \'delete\'
        WHERE 
            `module` = \'050.chekin_checkout\' 
            AND `id` IN ( SELECT mid.id_item FROM `mitems-dops` mid WHERE mid.name = \'jobman\' AND mid.value = :id_user )
        ;');

    $ff->execute(array(
        ':id_user' => $_GET['user']
    ));

    echo 'удалено';
    exit;
}
// загрузка с даты по текущий день
elseif (isset($_REQUEST['act2']) && $_REQUEST['act2'] == 'load10') {

    $ee = \Nyos\mod\IikoChecks::getUserForLoad($db);
    // \f\pa($ee);
    //\f\pa(\Nyos\nyos::$menu);

    $ert = 0;

    foreach ($ee as $k => $v) {

        //$v['user_iiko_id']
        //\f\pa($v);
        echo '<br/>' .
        '<br/>' . $v['head'];

        if (empty($v['last_import'])) {

            echo '<br/>нет даты последнего импорта';

            if ($ert <= 9) {

                echo '<br/>' . __LINE__;

                try {

                    if (isset($_GET['del_old']) && $_GET['del_old'] == 'da') {
                        \Nyos\Mod\Items::deleteItems($db, \Nyos\Nyos::$folder_now, '050.chekin_checkout', array('jobman' => $v['id']));
                        //exit;
                    }

                    echo '<br/>старт загрузки данных ' . date('Y-m-d', strtotime($_GET['start_load'])) . ' [' . $_GET['start_load'] . ']';
                    $res = \Nyos\api\Iiko::loadData('checki_day', $v['user_iiko_id'], date('Y-m-d', strtotime($_GET['start_load'])));
                    //\f\pa($res);
                    echo '<br/>Загружено чекин и аут - ' . sizeof($res);
                    echo '<br/><br/>';

                    // \f\pa($res,2);

                    $w = \Nyos\mod\IikoChecks::putNewChecks($db, $v['id'], $res);

//                    $tt = \Nyos\mod\items::addNew($db, $vv['folder'], \Nyos\nyos::$menu['081.job_checks_from_iiko'], array(
//                                'data' => date('Y-m-d H:i', $_SERVER['REQUEST_TIME']),
//                                'jobman' => $v['id']
//                    ));
//                \f\pa($tt);
                    // трём все записки что были ранее и пишем новую запись
                    // \Nyos\mod\items::deleteItems($db, \Nyos\Nyos::$folder_now, '081.job_checks_from_iiko', array( 'jobman' => $v['id'] ) );
                    \Nyos\mod\items::addNewSimple($db, '081.job_checks_from_iiko', array(
                        'jobman' => $v['id']
                    ));
                } catch (\ErrorException $ex) {
                    echo '<pre>--- ' . __FILE__ . ' ' . __LINE__ . '-------'
                    . PHP_EOL . $ex->getMessage() . ' #' . $ex->getCode()
                    . PHP_EOL . $ex->getFile() . ' #' . $ex->getLine()
                    . PHP_EOL . $ex->getTraceAsString()
                    . '</pre>';
                } catch (\PDOException $ex) {
                    echo '<pre>--- ' . __FILE__ . ' ' . __LINE__ . '-------'
                    . PHP_EOL . $ex->getMessage() . ' #' . $ex->getCode()
                    . PHP_EOL . $ex->getFile() . ' #' . $ex->getLine()
                    . PHP_EOL . $ex->getTraceAsString()
                    . '</pre>';
                } catch (\Exception $ex) {
                    echo '<pre>--- ' . __FILE__ . ' ' . __LINE__ . '-------'
                    . PHP_EOL . $ex->getMessage() . ' #' . $ex->getCode()
                    . PHP_EOL . $ex->getFile() . ' #' . $ex->getLine()
                    . PHP_EOL . $ex->getTraceAsString()
                    . '</pre>';
                }

                $ert++;
            }
        } elseif ($v['last_import']) {

            echo ' - недавно загружали ' . $v['last_import'];

//            echo '<br/>' . __LINE__;
//            echo '<br/>'.$v['head'];
            // echo '<br/>есть дата последнего импорта';
        }

        // $res = \Nyos\api\Iiko::loadData('checki_day', $v['user_iiko_id'], '2019-05-01');
//        foreach ($res as $k1 => $v1) {
//            \Nyos\mod\items::addNew($db, $vv['folder'], \Nyos\nyos::$menu['050.chekin_checkout'], array(
//                'start' => date('Y-m-d H:i:00', strtotime($v1['start'])),
//                'fin' => date('Y-m-d H:i:00', strtotime($v1['end'])),
//                'jobman' => $v['id'],
//                'who_add_item' => 'iiko'
//            ));
//        }
    }

    //\f\pa($ee);

    exit;
}

if ($_GET['show'] == 'html') {
    die('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору');
} else {
    f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору', 'error');
}




exit;








if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit_moder_option') {

    if (!class_exists('\Nyos\mod\AdminAccess'))
        require_once DR . '/vendor/didrive_mod/admin_access/class.php';

    // echo $_REQUEST['id'];

    \Nyos\mod\AdminAccess::setModerAccess($db, $vv['folder'], $_REQUEST['id'], $_REQUEST['mod']);

    \f\end2('ранее имеющиеся доступы удалены и добавлены отмеченные, специалист может заходить');
}

//\f\end2('что то пошло не так',false);
\f\end2('тарам пам пам' . $r);

if (isset($_GET['action']) && $_GET['action'] == 'edit_moder_option') {

    // f\pa($now);
    // \f\pa($now, 2);

    $amnu = Nyos\nyos::get_menu($now['folder']);
    // \f\pa($amnu);

    if (isset($amnu) && sizeof($amnu) > 0) {

        foreach ($amnu as $k1 => $v1) {

            //echo '<br/>'.__LINE__.' '.$k1;

            if (isset($v1['type']) && $v1['type'] == 'myshop' && isset($v1['version']) && $v1['version'] == 1) {

                // echo '<br/>' . __LINE__ . ' ' . $k1;

                if (isset($v1['datain_name_file']) && file_exists($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file'])) {

                    //f\pa($v1);
                    //f\pa($amnu[$_GET['level']] );
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/0.site/exe/myshop/class.php';
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/0.site/exe/myshop_admin/class.php';

                    $e = \Nyos\mod\myshop::getShopFromDomain($db);
                    // f\pa($e);

                    $e2 = \Nyos\mod\MyShopAdmin::loadDataFileForShop($db, $e['data']['id'], $_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file']);
                    // echo $e2;
                    // $e3 = json_decode($e2)

                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file'] . '.delete'))
                        unlink($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file'] . '.delete');

                    rename($_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file']
                            , $_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'download' . DS . 'datain' . DS . $v1['datain_name_file'] . '.delete');

                    if ($e2['status'] == 'ok') {
                        die('++ ' . $e2['html']);
                    } else {
                        die('-- ' . $e2['html']);
                    }
                }
            }
        }
    }
}

// проверяем секрет
if (
        (
        isset($_REQUEST['id']{0}) && isset($_REQUEST['s']{5}) &&
        Nyos\nyos::checkSecret($_REQUEST['s'], $_REQUEST['id']) === true
        ) || (
        isset($_REQUEST['show']{0}) &&
        isset($_REQUEST['id']{0}) && isset($_REQUEST['s']{5}) &&
        Nyos\nyos::checkSecret($_REQUEST['s'], $_REQUEST['show'] . $_REQUEST['id']) === true
        ) || (
        isset($_REQUEST['action']{0}) &&
        isset($_REQUEST['id']{0}) && isset($_REQUEST['s']{5}) &&
        Nyos\nyos::checkSecret($_REQUEST['s'], $_REQUEST['action'] . $_REQUEST['id']) === true
        )
) {
    
}
//
else {
    f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору ' // . $_REQUEST['id'] . ' && ' . $_REQUEST['secret']
            , 'error');
}


require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.all/sql.start.php');
//require( $_SERVER['DOCUMENT_ROOT'] . '/0.site/0.cfg.start.php');
//require( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'class' . DS . 'mysql.php' );
//require( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'db.connector.php' );


if (isset($_REQUEST['show']) && $_REQUEST['show'] == 'show_admin_option_cat') {

    /*
      require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'db.2.php' );
     * */
    require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'txt.2.php' );
    /*
      // $_SESSION['status1'] = true;
      // $status = '';
      \f\db\db_edit2($db, 'mitems', array('id' => (int) $_POST['id']), array($_POST['pole'] => $_POST['val']));

      // f\end2( 'новый статус ' . $status);
      f\end2('новый статус ' . $_POST['val']);
     */

//$_SESSION['status1'] = true;
//$status = '';
    $sql = $db->sql_query('SELECT
        m_myshop_cats_option.id AS option_id,
        m_myshop_cats_option_var.id,
        m_myshop_cats_option.name,
        
        `m_myshop_cats_option`.`status` AS `opt_status`,
        `m_myshop_cats_option_var`.`status`,
        
        `m_myshop_cats_option`.`sort` AS `opt_sort`,
        `m_myshop_cats_option_var`.`sort`,
        
        m_myshop_cats_option_var.var,
        m_myshop_cats_option_var.var_number,
        m_myshop_cats_option_var.var_number2
      FROM m_myshop_cats
        INNER JOIN m_myshop_cats_option
          ON m_myshop_cats_option.id_cat = m_myshop_cats.id
        INNER JOIN m_myshop_cats_option_var
          ON m_myshop_cats_option_var.id_option = m_myshop_cats_option.id
      WHERE m_myshop_cats.id = \'' . addslashes($_REQUEST['id']) . '\'
      ORDER BY 
        m_myshop_cats_option.sort DESC
        ,m_myshop_cats_option_var.sort DESC
      ;');
//echo $status;

    $va = array(
        'cat' => $_REQUEST['id']
        , 'res_div' => '#option_' . $_REQUEST['id']
        , 'res_key' => $_REQUEST['id']
        , 'res_s' => $_REQUEST['s']
    );

    // $t = '';

    while ($r = $db->sql_fr($sql)) {
        $va['items'][] = $r;
        /*
          $t .= '<hr>';

          foreach ($r as $k1 => $v1) {
          $t .= $k1 . ' - ' . $v1 . '<br/>';
          }
         */
    }

    // f\pa($res);
    // body.cats.ajax.option.htm

    f\end2(\f\compileSmarty(dirname(__FILE__) . DS . 'didrive' . DS . 't' . DS . 'body.cats.ajax.option.htm', $va), true);
}
//
elseif (isset($_REQUEST['types']) && $_REQUEST['types'] == 'send_order') {

    require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.site/exe/myshop/class.php');
    require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'txt.2.php' );

    Nyos\mod\myshop::getItems($db, $_REQUEST['id']);
    // f\pa(Nyos\mod\myshop::$items);

    require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.all/class/mail.2.php' );

    // $emailer->ns_new($sender2, $adrsat);
    // $emailer->ns_send('сайт ' . domain . ' > новое сообщение', str_replace($r1, $r2, $ctpl->tpl_files['bw.mail.body']));
    //$status = '';

    $info = 'ФИО: ' . $_REQUEST['fio'] . '<br/>'
            . 'Тел: ' . $_REQUEST['phone'] . '<br/>'
            . '<style>'
            . 'table.list td{ padding: 10px; }'
            . 'table.list tr:nth-child(2n) td{ background-color: #efefef; }'
            . '</style>'
            . '<table width="100%" class="list" >'
            . '<tr>'
            . '<th>Наименование</th>'
            . '<th>Количество</th>'
            . '<th>Цена</th>'
            . '<th>Сумма</th>'
            . '</tr>';
    $sum = 0;
    foreach ($_REQUEST['item'] as $k => $v) {
        if (isset(Nyos\mod\myshop::$items[$k]) && $v['kolvo'] > 0) {
            $info .= '<tr>'
                    . '<td>' . Nyos\mod\myshop::$items[$k]['name'] . '( ' . Nyos\mod\myshop::$items[$k]['opis'] . ' )</td>'
                    . '<td>' . $v['kolvo'] . '</td>'
                    . '<td>' . Nyos\mod\myshop::$items[$k]['price'] . '</td>'
                    . '<td>' . ($v['kolvo'] * Nyos\mod\myshop::$items[$k]['price']) . '</td>'
                    . '</tr>';
            $sum += $v['kolvo'] * Nyos\mod\myshop::$items[$k]['price'];
        }
    }

    $info .= '<tr>'
            . '<th style="text-align:right;" colspan="3" >Итого:</th>'
            . '<th>' . $sum . '</th>'
            . '</tr>';

    $info .= '</table>';

    Nyos\mod\mailpost::sendNow($db, 'support@uralweb.info', '1@uralweb.info, anastasia7785@mail.ru', 'Новый заказ в интернет магазине', 'nexit_myshop', array('text' => $info));

    //echo $status;

    f\end2('Заявка отправлена, в ближайшее время позвоним уточнить заказ');

    //f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору', 'error');
}

// добавление каталога с опциями для товаров в каталог
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_cat_options') {

    if (isset($_REQUEST['opt_name']{2}) && isset($_REQUEST['opt_vars']{3})) {

        $vars = explode(PHP_EOL, $_REQUEST['opt_vars']);

        $e = array();

        foreach ($vars as $k => $v) {
            // $e .= ' '.$v;    
            $e[] = array('var' => $v);
        }


        //$_SESSION['status1'] = true;
        //$status = '';
        $new_opt = \f\db\db2_insert($db, 'm_myshop_cats_option', array(
            'id_cat' => $_REQUEST['id']
            , 'name' => $_REQUEST['opt_name']
            , 'hand_select' => $_REQUEST['hand_select']
                ), 'da', 'last_id');
        //echo $status;
        \f\db\sql_insert_mnogo($db, 'm_myshop_cats_option_var', $e, array('id_option' => $new_opt), true);

        f\end2('ОКЕЙ, добавили. Перезагружаю список опций.', true, array(
            'res_div' => $_REQUEST['res_div']
            , 'res_key' => $_REQUEST['res_key']
            , 'res_s' => $_REQUEST['res_s']
        ));
    }

    f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору', 'error');
}
//
elseif (isset($_POST['action']) && $_POST['action'] == 'edit_pole') {

    require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'db.2.php' );
    require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'txt.2.php' );

    // $_SESSION['status1'] = true;
    // $status = '';
    \f\db\db_edit2($db, 'mitems', array('id' => (int) $_POST['id']), array($_POST['pole'] => $_POST['val']));

    // f\end2( 'новый статус ' . $status);
    f\end2('новый статус ' . $_POST['val']);
}
//
f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору', 'error');








// печать купона
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'print' && isset($_REQUEST['kupon']{0}) && is_numeric($_REQUEST['kupon']{0})) {
    
}

if (1 == 2) {

// печать купона
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'print' && isset($_REQUEST['kupon']{0}) && is_numeric($_REQUEST['kupon']{0})) {

        require( $_SERVER['DOCUMENT_ROOT'] . DS . '0.site' . DS . 'exe' . DS . 'kupons' . DS . 'class.php' );

        $folder = Nyos\nyos::getFolder($db);
        // echo $folder;

        die(Nyos\mod\kupons::showHtmlPrintKupon($db, $folder, $_REQUEST['kupon']));
    }

//<input type='hidden' name='get_cupon' value='da' />
    elseif (isset($_REQUEST['get_cupon']) && $_REQUEST['get_cupon'] == 'da') {

        require( $_SERVER['DOCUMENT_ROOT'] . DS . '0.site' . DS . 'exe' . DS . 'kupons' . DS . 'class.php' );
        require( $_SERVER['DOCUMENT_ROOT'] . '/0.all/f/txt.2.php' );

        $get = $_REQUEST;

        $get['phone'] = f\translit($get['phone'], 'cifr');
        $get['kupon'] = $get['id'];
        $get['email'] = trim(strtolower($get['email']));

        $res = Nyos\mod\kupons::addPoluchatel($db, $get);

        if (isset($_COOKIE['fio']{0}) && $_COOKIE['fio'] != $get['fio'])
            setcookie("fio", $get['fio'], time() + 24 * 31 * 3600, '/');

        if (isset($_COOKIE['tel']{0}) && $_COOKIE['tel'] != $get['phone'])
            setcookie("tel", $get['phone'], time() + 24 * 31 * 3600, '/');

        if (isset($_COOKIE['email']{0}) && $_COOKIE['email'] != $get['email'])
            setcookie("email", $get['email'], time() + 24 * 31 * 3600, '/');

        setcookie("cupon" . $get['kupon'], $res['number_kupon'], time() + 24 * 31 * 3600, '/');

        if ($_REQUEST['id'] == 2) {
            f\end2('<h3>Добро пожаловать</h3>'
                    . '<Br/>'
                    . '<p>Регистрация проведена успешно</p>'
                    . '<Br/>'
                    . '<Br/>'
                    , 'ok');
        } else {
            // f\pa($res);
            f\end2('<h3>Липон получен !<br/><br/>№' . $res['number_kupon'] . '</h3>'
                    . '<Br/>'
                    . '<p>Сообщите номер липона в магазине и воспользуйтесь скидкой!</p>'
                    . '<Br/>'
                    . '<Br/>'
                    , 'ok', array('number_kupon' => $res['number_kupon'])
            );
        }
    }

// получение купона по новому (сразу по кнопе)
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_cupon17711') {

        // echo '<pre>'; print_r($_COOKIE); echo '</pre>';    exit;

        $vname = 'fio';
        if (isset($_REQUEST[$vname]{0})) {
            $$vname = $_REQUEST[$vname];
        } elseif (isset($_COOKIE[$vname]{0})) {
            $$vname = $_COOKIE[$vname];
        }

        $vname = 'tel';
        if (isset($_REQUEST[$vname]{0})) {
            $$vname = $_REQUEST[$vname];
        } elseif (isset($_COOKIE[$vname]{0})) {
            $$vname = $_COOKIE[$vname];
        }

        $vname = 'email';
        if (isset($_REQUEST[$vname]{0})) {
            $$vname = $_REQUEST[$vname];
        } elseif (isset($_COOKIE[$vname]{0})) {
            $$vname = $_COOKIE[$vname];
        }

        $vname = 'kupon';
        if (isset($_REQUEST[$vname]{0})) {
            $$vname = $_REQUEST[$vname];
        }

        if (
                isset($fio{0}) &&
                isset($tel{0}) &&
                isset($email{0}) &&
                isset($kupon{0})
        ) {

            require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.site' . DS . 'exe' . DS . 'kupons' . DS . 'class.php' );
            require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.all/f/txt.2.php' );

            $get['fio'] = $fio;
            $get['phone'] = f\translit($tel, 'cifr');
            $get['kupon'] = $kupon;
            $get['email'] = trim(strtolower($email));

            //получаем менюшку
            if (1 == 1) {
                $folder = Nyos\nyos::getFolder($db);
                $mnu = Nyos\nyos::creat_menu($folder);
                // f\pa($mnu);

                foreach ($mnu[1] as $k => $v) {
                    //f\pa($v);
                    if ($v['type'] == 'kupons') {
                        $get['now_level'] = $v;
                        break;
                    }
                }
            }

            //f\pa($get);

            $res = Nyos\mod\kupons::addPoluchatel($db, $get, $folder);
            // f\pa($res);

            if ($res['status'] == 'error') {
                f\end2($res['html'], 'error', array('line' => __LINE__));
            }

            // echo '<pre>'; print_r($res); echo '</pre>';

            foreach ($_COOKIE as $k => $v) {
                if ($k == 'fio' || $k == 'tel' || $k == 'email')
                    setcookie($k, $v, time() + 24 * 31 * 3600, '/');
            }

            //setcookie("cupon" . $get['kupon'], $res['number_kupon'], time() + 24 * 31 * 3600, '/');

            if (isset($res['number_kupon']{0})) {

                // отправяляем письмо сданными липона пользователю
                // $vars = Nyos\mod\kupons::getItem($folder, $db, $res['number_kupon'], null);

                setcookie("cupon" . $kupon, $res['number_kupon'], time() + 24 * 31 * 3600, '/');

                //f\pa($vars);

                foreach ($_COOKIE as $k => $v) {
                    if ($k == 'fio' || $k == 'tel' || $k == 'email')
                        $vars[$k] = $v;
                }

                /*
                  require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.all/class/mail.2.php' );
                  //require_once( $_SERVER['DOCUMENT_ROOT'] . '/0.all/f/smarty.php' );
                  // Nyos\mod\mailpost::$body = f\compileSmarty( 'lipon_get_lipon.smarty.htm', $vars, $_SERVER['DOCUMENT_ROOT'].DS.'template-mail' );
                  Nyos\mod\mailpost::$sendpulse_id = $_ss['sendpulse_id'];
                  Nyos\mod\mailpost::$sendpulse_id = '1';
                  Nyos\mod\mailpost::$sendpulse_key = $_ss['sendpulse_key'];
                  Nyos\mod\mailpost::sendNow($db, $_ss['mail_from'], $email, ( isset($_ss['mail_head_newcupon']{2}) ? $_ss['mail_head_newcupon'] : 'Получен купон'), 'lipon_get_lipon.smarty.htm', $vars);
                 */

                // sleep(3);
                // f\pa($res);
                f\end2('<h3>Липон получен !<br/><br/>№' . $res['number_kupon'] . '</h3>'
                        . '<Br/>'
                        . '<p>Сообщите номер липона в магазине и воспользуйтесь скидкой!</p>'
                        . '<Br/>'
                        . '<Br/>'
                        , 'ok', array('number_kupon' => $res['number_kupon'])
                );
            }
        }
        else {

            //require_once($_SERVER['DOCUMENT_ROOT'] . '/0.all/f/smarty.php');
            //f\end2(f\compileSmarty('ajax_form_enter.htm', array(), dirname(__FILE__) . '/../../lk/3/tpl_smarty/')
            /*
              f\end2( '1111111111111'
              , 'ok', array(
              'need_reg' => 'yes',
              'line' => __LINE__
              ));
             */

            //return false;
        }

        f\end2('Нужно войти в лк или зарегистрироваться'
                . '<Br/>'
                . '<Br/>'
                , 'error', array(
            'need_reg' => 'yes',
            'line' => __LINE__
        ));
    }

//<input type='hidden' name='get_cupon' value='da' />
    elseif (isset($_REQUEST['reg']) && $_REQUEST['reg'] == 'da') {

        require( $_SERVER['DOCUMENT_ROOT'] . DS . '0.site' . DS . 'exe' . DS . 'kupons' . DS . 'class.php' );
        require( $_SERVER['DOCUMENT_ROOT'] . '/0.all/f/txt.2.php' );

        $get = $_REQUEST;

        // $get['kupon'] = $get['id'];
        $get['name'] = $get['fio'];
        $get['mail'] = trim(strtolower($get['email']));
        $get['phone'] = f\translit($get['phone'], 'cifr');
        $get['pass'] = Nyos\nyos::creat_pass(5, 2);

        // $res = Nyos\mod\kupons::addPoluchatel($db, $get);

        setcookie("fio", $get['fio'], $_SERVER['REQUEST_TIME'] + 24 * 31 * 3600, '/');
        setcookie("tel", $get['phone'], $_SERVER['REQUEST_TIME'] + 24 * 31 * 3600, '/');
        setcookie("email", $get['mail'], $_SERVER['REQUEST_TIME'] + 24 * 31 * 3600, '/');

        // setcookie("cupon" . $get['kupon'], $get['number_kupon'], $_SERVER['REQUEST_TIME'] + 24 * 31 * 3600, '/');
        // шлём майл, шаблон такой-то
        // $get['send_reg_mail'] = 'kupon_reg';

        require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.site' . DS . 'exe' . DS . 'lk' . DS . 'class.php' );
        require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '0.all' . DS . 'f' . DS . 'db.2.php' );

        /*
         * $indb['reg_mail_head'] - тема письма о регистрации,
         * $indb['reg_mail_template'] - шаблон письма о регистрации
         * $indb['reg_mail_from_mail'] - майл отправителя
         * $indb['reg_mail_sendpulse_id'] - id sendpulse api
         * $indb['reg_mail_sendpulse_key'] - key sendpulse api
         */


        require_once( DirAll . 'class' . DS . 'nyos.2.php' );
        $now = Nyos\nyos::domain($db, $_SERVER['HTTP_HOST']);

        require_once( $_SERVER['DOCUMENT_ROOT'] . DS . '9.site' . DS . $now['folder'] . DS . 'index.php' );

        foreach ($_ss as $k => $v) {
            if (!isset($get[$k]))
                $get[$k] = $v;
        }

        $get['head'] = 'Регистрация';
        $ee = Nyos\mod\lk::regUser($db, $now['folder'], $get, 'array');

        if (isset($ee['reg_mail_sendpulse_id']))
            unset($ee['reg_mail_sendpulse_id']);

        if (isset($ee['reg_mail_sendpulse_key']))
            unset($ee['reg_mail_sendpulse_key']);

        if ($ee['status'] == 'ok') {
            f\end2($ee['html'], 'ok', $ee);
        } else {
            f\end2($ee['html'], $ee['status'], $ee);
        }
    }

// удалить город
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'del_city') {

        //$status = '';
        $db->sql_query('UPDATE `g_city` SET `show` = \'no\' WHERE `id` = \'' . $_REQUEST['id'] . '\' LIMIT 1 ;');
        // $db->sql_query('DELETE FROM `mpeticii_cat` WHERE `id` = 2 LIMIT 1;');

        f\end2('Город удалён');
    }

// удаляем каталог в дидрайве
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'del1') {

        //$status = '';
        $db->sql_query('UPDATE `gm_katalogi` SET `status` = \'hide\' WHERE `id` = \'' . $_REQUEST['id'] . '\' LIMIT 1 ;');
        // $db->sql_query('DELETE FROM `mpeticii_cat` WHERE `id` = 2 LIMIT 1;');

        f\end2('Каталог удалён');
    }
//
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'del_item') {

        $db->sql_query('UPDATE `mpeticii_item` SET `status` = \'cancel\' WHERE `id` = \'' . $_REQUEST['id'] . '\' LIMIT 1 ;');
        // $db->sql_query('DELETE FROM `mpeticii_cat` WHERE `id` = 2 LIMIT 1;');

        f\end2('Петиция удалёна');
    }
//
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'activated') {

        $db->sql_query('UPDATE `gm_katalogi` SET `status` = \'show\' WHERE `id` = \'' . $_REQUEST['id'] . '\' LIMIT 1 ;');
        // $db->sql_query('DELETE FROM `mpeticii_cat` WHERE `id` = 2 LIMIT 1;');

        f\end2('Восстановлен');
    }
    /**
     * удаление каталога совсем
     */ elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'del2') {

        $db->sql_query('DELETE FROM `gm_katalogi` WHERE `id` = \'' . $_REQUEST['id'] . '\' LIMIT 1;');

        f\end2('Каталог удалён совсем');
    }
}

f\end2('Произошла неописуемая ситуация #' . __LINE__ . ' обратитесь к администратору', 'error');
exit;
