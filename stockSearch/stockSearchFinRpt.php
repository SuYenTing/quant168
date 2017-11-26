<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("stock_market"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$code = $_GET['code'];
$stock = mysql_query("SELECT code,max(date),season_pe,dividend_yield,season_pb,current_ratio,eps,roe_after_tax FROM stock_market.financial_report where code='$code';");
$rs = mysql_fetch_row($stock);
?>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(odd) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<table>
  <tr>
    <span style="font-size:x-small;"><th>本益比(倍)</th></span>
    <span style="font-size:x-small;"><th>殖利率(%)</th></span>
    <span style="font-size:x-small;"><th>股價淨值比</th></span>
  </tr>
  <tr>
    <td><?php echo $rs[2]; ?></td>
    <td><?php echo $rs[3]; ?></td>
    <td><?php echo $rs[4]; ?></td>
  </tr>
  <tr>
    <span style="font-size:x-small;"><th>流動比率</th></span>
    <span style="font-size:x-small;"><th>近1季EPS</th></span>
    <span style="font-size:x-small;"><th>近1季ROE(%)</th></span>
  </tr>
  <tr>
    <td><?php echo $rs[5]; ?></td>
    <td><?php echo $rs[6]; ?></td>
    <td><?php echo $rs[7]; ?></td>
  </tr>
</table>
</body>
