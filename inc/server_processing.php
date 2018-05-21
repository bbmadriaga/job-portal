<?php
date_default_timezone_set("Asia/Bangkok");
// SQL server connection information
$sql_details = array(
    'user' => 'apache1',
    'pass' => 'QdSp4&NWMZ6tD/&j',
    'db'   => 'csc_jportaldb',
    'host' => '192.168.3.201'
);
$table = 'jtbl_jobs';
$primaryKey = 'id';
$table = 'jtbl_jobs';
if (isset($_GET['region'])){ 
    $condition = "&& region_name='". $_GET['region']."'";
} else {
    $condition = "";
}
 
$columns = array(
    array('db' => 'agency_name', 'dt' => 0),
    array('db' => 'region_name', 'dt' => 1),
    array('db' => 'position_title', 'dt' => 2),
    array('db' => 'plantilla_item_no', 'dt' => 3),
    array(
        'db' => 'posting_date',
        'dt' => 4,
        'formatter' => function($d, $row){
            return date('m-d-Y', strtotime($d));
        }),
    array(
        'db' => 'closing_date',
        'dt' => 5,
        'formatter' => function($d, $row){
            return date('m-d-Y', strtotime($d));
        }),
    array(
        'db' => 'id',
        'dt' => 6,
        'formatter' => function($d, $row){
            return '<button id="info_'.$d.'" class="btn btn-success info" >view details</button>';
        })
);

require('ssp.class.php');
// echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns));
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "datediff(current_date,closing_date) <= 120 ".$condition));