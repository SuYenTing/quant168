<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("stock_market"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$code = $_GET['code'];
$stock = mysql_query("SELECT name,max(date),close FROM stock_market.stock_price_data where code='$code' ;");
$rs = mysql_fetch_row($stock);
?>
<div>
    <span style="font-size:xx-large;"><?php echo $code . " " . $rs[0] . " " . $rs[1] . " 收盤價:" . $rs[2] . "元"; ?></span>
</div>