<?php

/**
  определение функций для TWIG
 */
//creatSecret

//$function = new Twig_SimpleFunction('getJobmansOnSP', function ( $db, $sp = null, $module_jobman = '070.jobman', $module_sp = 'sale_point', $module_send_jobman_to_sp = 'jobman_send_on_sp'  ) {
//
//        $ff = $db->prepare('SELECT 
//            
//                    mi.id, 
//                    mid.value iiko_id,
//                    mi3.head sp
//                    
//                FROM 
//                    mitems mi
//                    
//                INNER JOIN `mitems-dops` mid ON mid.id_item = mi.id AND mid.name = \'iiko_id\'
//                
//                LEFT JOIN `mitems` mi2 ON mi2.module = :mod_send_jobman_to_sp
//                LEFT JOIN `mitems-dops` mid21 ON mid21.id_item = mi2.id AND mid21.name = \'jobman\' AND mid21.value = mi.id
//                LEFT JOIN `mitems-dops` mid22 ON mid22.id_item = mi2.id AND mid22.name = \'sale_point\' 
//                LEFT JOIN `mitems-dops` mid23 ON mid23.id_item = mi2.id AND mid23.name = \'date\' 
//                
//                LEFT JOIN `mitems` mi3 ON mi3.module = :mod_sp AND mi3.id = mid22.value
//
//                WHERE
//
//                    mi.module = :mod_jobman AND
//                    mi.status = \'show\' 
//        ');
//
//        $ff->execute(array(
//            ':id_user' => $user_id,
//            ':mod_jobman' => $module_jobman,
//            ':mod_send_jobman_to_sp' => $mod_send_jobman_to_sp,
//            ':mod_sp' => $mod_sp,
//                //':date' => ' date(\'' . date('Y-m-d', $_SERVER['REQUEST_TIME'] - 3600*24*100 ) .'\') ',
//                // ':dates' => $start_date //date( 'Y-m-d', ($_SERVER['REQUEST_TIME'] - 3600 * 24 * 14 ) )
//        ));
//        $user = $ff->fetch();
//        // \f\pa($user, 2, null, 'user');
//
//        
//    return \Nyos\Nyos::creatSecret($text);
//});
//$twig->addFunction($function);
