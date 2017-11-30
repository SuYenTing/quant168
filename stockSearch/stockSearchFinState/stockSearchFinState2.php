<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("stock_market"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$code = $_GET['code'];
?>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['日期', '總資產', '固定資產' , '流動資產' , '長期投資'],
<?php
$data1 = mysql_query("SELECT date,total_asset,fixed_asset,Current_asset,long_term_investment FROM stock_market.financial_report where code='$code';");
for ($i = 1; $i <= mysql_num_rows($data1); $i++) {
	$rs = mysql_fetch_row($data1);
	echo "['" . $rs[0] . "'," . $rs[1] . "," . $rs[2] . "," . $rs[3] . "," . $rs[4] . "],";
}
?>
        ]);

        var options = {
            chartArea: {width: '60%', height: '60%'},
            title: '總資產',
            legend: { position: 'right' },
            width: 900,
            height: 500
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['日期', '流動負債', '總股東權益' , '長期負債' , '總負債和股東權益'],
<?php
$data2 = mysql_query("SELECT date,Current_liabilities,total_equity,long_term_liabilities,total_liabilities_and_equity FROM stock_market.financial_report where code='$code';");
for ($i = 1; $i <= mysql_num_rows($data2); $i++) {
	$rs = mysql_fetch_row($data2);
	echo "['" . $rs[0] . "'," . $rs[1] . "," . $rs[2] . "," . $rs[3] . "," . $rs[4] . "],";
}
?>
        ]);

        var options = {
            chartArea: {width: '60%', height: '60%'},
            title: '負債和股東權益',
            legend: { position: 'right' },
            width: 900,
            height: 500
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
    }
    </script>
</head>
<style>
th, td { border: 1px solid black;}
.container {
    width: 95%;
}
</style>

<body>
    <div class="container">
        <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button" onclick="openCity('London')">總資產</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Paris')">負債和股東權益</button>
        </div>
        <div id="London" class="city">
            <div>
                <div id="curve_chart" style="width: 900px; height: 500px"></div>
            </div>
        </div>
        <div id="Paris" class="city" style="display:none">
            <div>
                <div id="curve_chart2" style="width: 900px; height: 500px"></div>
            </div>
        </div>
<table>
<tr>
<td>日期</td>
<?php
$date1 = mysql_query("SELECT distinct(date) FROM web_data.fin_report_bs where code='$code' ;");
for ($i = 1; $i <= mysql_num_rows($date1); $i++) {
	$date1rs = mysql_fetch_row($date1);
	echo "<td>" . $date1rs[0] . "</td>";
}
$subject_seq1 = mysql_query("SELECT distinct(subject_seq),subject FROM web_data.fin_report_bs where code='$code' ;");
for ($i = 1; $i <= mysql_num_rows($subject_seq1); $i++) {
	$subject_seq1rs = mysql_fetch_row($subject_seq1);
	echo "<tr>";
	echo "<td>" . $subject_seq1rs[1] . "</td>";
	$amount = mysql_query("SELECT amount FROM web_data.fin_report_bs where code='$code' and subject_seq='$i' ;");
	for ($j = 1; $j <= mysql_num_rows($amount); $j++) {
		$amountrs = mysql_fetch_row($amount);
		echo "<td>" . $amountrs[0] . "</td>";
	}
	echo "</tr>";
}
?>

</table>
    </div>
</body>
<script>
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(cityName).style.display = "block";
}
</script>