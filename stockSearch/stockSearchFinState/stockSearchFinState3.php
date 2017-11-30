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
<style>
th, td { border: 1px solid black;}
.container {
    width: 95%;
}
</style>
<div class="container">
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <table>
<tr>
<td>日期</td>
<?php
$date1 = mysql_query("SELECT distinct(date) FROM web_data.fin_report_cf where code='$code' ;");
for ($i = 1; $i <= mysql_num_rows($date1); $i++) {
	$date1rs = mysql_fetch_row($date1);
	echo "<td>" . $date1rs[0] . "</td>";
}
$subject_seq1 = mysql_query("SELECT distinct(subject_seq),subject FROM web_data.fin_report_cf where code='$code' ;");
for ($i = 1; $i <= mysql_num_rows($subject_seq1); $i++) {
	$subject_seq1rs = mysql_fetch_row($subject_seq1);
	echo "<tr>";
	echo "<td>" . $subject_seq1rs[1] . "</td>";
	$amount = mysql_query("SELECT amount FROM web_data.fin_report_cf where code='$code' and subject_seq='$i' ;");
	for ($j = 1; $j <= mysql_num_rows($amount); $j++) {
		$amountrs = mysql_fetch_row($amount);
		echo "<td>" . $amountrs[0] . "</td>";
	}
	echo "</tr>";
}
?>

</table>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data:
  {
    labels: [
    <?php
$operating_cash_flow = mysql_query("SELECT date,operating_cash_flow FROM stock_market.Financial_report where code = '$code';");
for ($i = 1; $i <= mysql_num_rows($operating_cash_flow); $i++) {
	$rs = mysql_fetch_row($operating_cash_flow);
	?>
<?php echo $rs[0] ?>,
<?php
}
?>],
    datasets: [{
      label: '營業現金流',
      data: [<?php
$operating_cash_flow = mysql_query("SELECT date,operating_cash_flow FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($operating_cash_flow); $i++) {
	$rs = mysql_fetch_row($operating_cash_flow);
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
      label: '投資現金流',
      data: [<?php
$investment_cash_flow = mysql_query("SELECT date,investment_cash_flow FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($investment_cash_flow); $i++) {
	$rs = mysql_fetch_row($investment_cash_flow);
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
      label: '融資現金流',
      data: [<?php
$financing_cash_flow = mysql_query("SELECT date,financing_cash_flow FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($financing_cash_flow); $i++) {
	$rs = mysql_fetch_row($financing_cash_flow);
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
      label: '自由現金流',
      data: [<?php
$fcf = mysql_query("SELECT date,fcf FROM stock_market.Financial_report where code = '$code';");
$tmp = 0;
for ($i = 1; $i <= mysql_num_rows($fcf); $i++) {
	$rs = mysql_fetch_row($fcf);
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
