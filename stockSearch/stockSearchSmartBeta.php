<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<style>
.chart{
    width:100%;
}
</style>
<div class="container">
    <div class="chart">
        <br>
        <br>
        <br>
        <br>
        <canvas id="myChart"></canvas>
    </div>
</div>
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["獲利", "成長", "股利", "穩健", "品質"],
        datasets: [{
            label: "Smart Beta 分數",
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
            data: [
            <?php
if ($_GET['code'] != '') {
	$code = $_GET['code'];
	$data = mysql_query("select * from sb_score where code = '$code' ");
	$rs = mysql_fetch_row($data);
	echo $rs[5];
	echo ",";
	echo $rs[6];
	echo ",";
	echo $rs[7];
	echo ",";
	echo $rs[8];
	echo ",";
	echo $rs[9];
}
?>
            ],

        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    max: 100,
                    min: 50,
                    stepSize: 5
                }
            }]
        }
    }
});
</script>
