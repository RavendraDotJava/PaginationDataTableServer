<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See https://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - https://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = '';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'name','dt' => 3 ),
    array( 'db' => 'mob','dt' => 4 ),
    array( 'db' => 'response','dt' => 5 ),
    array('db'        => 'date', 'dt'        => 9,'formatter' => function( $d, $row ) 
          {
            return date( 'Y-m-d', strtotime($d));
          }
    ),
);

// SQL server connection information
$sql_details = array(
    'user' =>'',
    'pass' => '',
    'db'   => '',
    'host' => ''
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
   SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

//if you want to modify the data 

// $data=SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns );

// foreach ($data['data'] as $key => $value) {
//    // $data['data'][$key][1]
//     if ($data['data'][$key][1] == '1') {
//         $data['data'][$key][1]='FB/Insta';
//     } elseif ($data['data'][$key][1] == '2') {
//               $data['data'][$key][1]='Magic Bricks';
//     } elseif ($data['data'][$key][1] == '3') {
//         $data['data'][$key][1]='99 Acers';
//     } elseif ($data['data'][$key][1] == '4') {
//         $data['data'][$key][1]= 'Web';
//     }elseif ($data['data'][$key][1] == '5') {
//         $data['data'][$key][1]= 'IVR';
//     }

//     if ($data['data'][$key][5] == '1') {
//         $data['data'][$key][5] ='Qualified';
//     } elseif ($data['data'][$key][5] == '2') {
//         $data['data'][$key][5] ='Not Qualified';
//     } elseif ($data['data'][$key][5] == '3') {
//         $data['data'][$key][5] ='Dead';
//     } else {
//         $data['data'][$key][5] ='Visit Done';
//     }

//     if ($data['data'][$key][6] == '1') {
//         $data['data'][$key][6] = 'Flats';
//     } elseif ($data['data'][$key][6] == '2') {
//         $data['data'][$key][6] = 'Villa';
//     } elseif ($data['data'][$key][6] == '3') {
//         $data['data'][$key][6] = 'None';
//     }

//     switch ($data['data'][$key][7]) {
//         case 1:
//             $reasonofremark = 'Call Back';
//             break;
//         case 2:
//             $reasonofremark = 'Visit Soon';
//             break;
//         case 3:
//             $reasonofremark = 'Low Budget';
//             break;
//         case 4:
//             $reasonofremark = 'location Issue';
//             break;
//         case 5:
//             $reasonofremark = 'Invalid Number';
//             break;
//         case 6:
//             $reasonofremark = 'No Requirement';
//             break;
//         case 7:
//             $reasonofremark = 'Already Visited';
//             break;
//         case 8:
//             $reasonofremark = 'Language barrier';
//             break;
//         case 9:
//             $reasonofremark = 'Call Not Received';
//             break;
//         case 10:
//             $reasonofremark = 'Other Requirement';
//             break;
//         case 11:
//             $reasonofremark = 'Already Booked';
//             break;
//         case 12:
//             $reasonofremark = 'Ready To Move';
//             break;
//         default:
//             $reasonofremark = "Blank";
//             break;
//     }

//     $data['data'][$key][7]=$reasonofremark;


//     $data['data'][$key][8]=$data['data'][$key][11] == '2' ? $data['data'][$key][8] : '';


// }
// echo json_encode($data);exit;
