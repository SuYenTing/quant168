 
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表

?>
<p><?php echo $_POST['code'];?></p>




           