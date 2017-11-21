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
$FundTrendData = mysql_query("SELECT date,revenue_growth_year FROM stock_market.revenue_data where code = '$code';");
for ($i = 1; $i <= mysql_num_rows($FundTrendData); $i++) {
  $rs = mysql_fetch_row($FundTrendData);
  ?>
<?php echo $rs[0] ?>,
<?php
}
?>],
    datasets: [{
      label: '月營收年增率',
      data: [<?php
$FundTrendData = mysql_query("SELECT date,revenue_growth_year FROM stock_market.revenue_data where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($FundTrendData); $i++) {
  $rs = mysql_fetch_row($FundTrendData);
  $tmp = $tmp + $rs[1];
  ?>
<?php echo $rs[1] ?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(153,255,51,1)"
    }
    ]
  }
});
</script>
