<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("stock_market"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$code = $_GET['code'];
//$FundTrendData = mysql_query("SELECT date,revenue FROM stock_market.revenue_data where code = '$code';");
//$stock = mysql_query("SELECT name,max(date),close FROM stock_market.stock_price_data where code='$code' ;");
//$rs = mysql_fetch_row($stock);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
<script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<div class="container">
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data:
  {
    labels: [
    <?php
$total_asset = mysql_query("SELECT date,total_asset FROM stock_market.Financial_report where code = '$code';");
for ($i = 1; $i <= mysql_num_rows($total_asset); $i++) {
  $rs = mysql_fetch_row($total_asset);
  ?>
<?php echo $rs[0] ?>,
<?php
}
?>],
    datasets: [{
      label: '總資產',
      data: [<?php
$total_asset = mysql_query("SELECT date,total_asset FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($total_asset); $i++) {
  $rs = mysql_fetch_row($total_asset);
  $tmp = $tmp + $rs[1];
  ?>
<?php echo $rs[1] ?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(153,255,51,1)"
    },
    {
      label: '固定資產',
      data: [<?php
$fixed_asset = mysql_query("SELECT date,fixed_asset FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($fixed_asset); $i++) {
  $rs = mysql_fetch_row($fixed_asset);
  $tmp = $tmp + $rs[1];
  ?>
<?php echo $rs[1] ?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(255,0,0,1)"
    },
    {
      label: '流動資產',
      data: [<?php
$Current_asset = mysql_query("SELECT date,Current_asset FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($Current_asset); $i++) {
  $rs = mysql_fetch_row($Current_asset);
  $tmp = $tmp + $rs[1];
  ?>
<?php echo $rs[1] ?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(255,255,0,1)"
    },
    {
      label: '長期投資',
      data: [<?php
$long_term_investment = mysql_query("SELECT date,long_term_investment FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($long_term_investment); $i++) {
  $rs = mysql_fetch_row($long_term_investment);
  $tmp = $tmp + $rs[1];
  ?>
<?php echo $rs[1] ?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(0,0,255,1)"
    }
    ]
  }
});
</script>
