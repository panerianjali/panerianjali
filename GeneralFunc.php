<?php
date_default_timezone_set('Asia/Kolkata');
echo date('d-m-Y', strtotime('+ 365 days'));

echo strtolower('KJLKJLKJLKJL');
echo strtoupper('adfjakljf;lk'). '<br>';
echo ucwords('dafadf adsfasdfa adfasdf'). '<br>';
echo ucfirst('dafadf adsfasdfa adfasdf');

echo '<br>';

echo round('12.2121');
echo '<br>';
echo number_format('1232132132.212112321', 1);
//========== Session =========//
session_start();
$_SESSION['emp_id'] = "1";


?>