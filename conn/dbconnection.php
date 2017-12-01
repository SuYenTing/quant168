<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 2017/8/10
 * Time: 下午 03:43
 */


$db_host = '140.119.86.174'; // Server Name
$db_user = 'nccu'; // Username
$db_pass = 'nccu'; // Password
$db_name = 'web_data'; // Database Name


$conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($conn,"utf8");
if (!$conn) {
    /*die ('Failed to connect to MySQL: ' . mysqli_connect_error());*/
    die ('DB connecting error');
}


