<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 2017/10/9
 * Time: 下午 05:30
 */


require '../conn/dbconnection.php';
$trackindex=$_GET['trkidx'];

if($trackindex=="SZ100"){
    $inFactor= 'momentum';
}
else{
    $inFactor='equity';
}


$sql = 'SELECT date, portfolio_method, cum_ret FROM epdr_portfolio.history_ret where tracking_index=\''.$trackindex.'\' and epdr_factor=\''.$inFactor.'\'';
//print_r($sql);
$result = mysqli_query($conn, $sql);

$bln = array();
$bln['name'] = 'date';
$rows['name'] = 'DW';
$rows2['name'] = 'EW';
$rows3['name'] = 'factor_0.9';
$rows4['name'] = 'factor_0.95';
$rows5['name'] = 'factor_0.99';
while ($r = mysqli_fetch_array($result)) {
    $bln['data'][] = substr($r['date'],0,4);
    switch ($r['portfolio_method']){
        case 'DW':
            $rows['data'][] = $r['cum_ret'];
            break;
        case 'EW':
            $rows2['data'][] = $r['cum_ret'];
            break;
        case 'factor_0.9':
            $rows3['data'][] = $r['cum_ret'];
            break;
        case 'factor_0.95':
            $rows4['data'][] = $r['cum_ret'];
            break;
        case 'factor_0.99':
            $rows5['data'][] = $r['cum_ret'];
            break;

    }

}
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
array_push($rslt, $rows2);
array_push($rslt, $rows3);
array_push($rslt, $rows4);
array_push($rslt, $rows5);

print json_encode($rslt, JSON_NUMERIC_CHECK);

