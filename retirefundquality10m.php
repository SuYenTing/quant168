<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$FundTrendData=mysql_query("select date, nav/10000000 from web_data.strategies_nav where name = 'quality.10m' ");//從contact資料庫中選擇所有的資料表

$IndexTrendData=mysql_query("select date, close/(select close from stock_market.y9997 where date = 20050503) from stock_market.y9997 where date >= 20050503 ");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<style>
.container {
    width: 80%;
    
}
td {
    text-align: center;
    vertical-align: middle;
    height: 30px;
}

.header {
    background-color: #409ad5
}

.subheader {
    background-color: #AAD1E4
}

.content {
    background-color: #D9EDF7
}
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
<div class="container">
    <div>
        <p></p>
    </div>
    <div>
        <h2>淨值走勢圖</h2>
        <canvas id="myChart"></canvas>
    </div>
    <div>
        <div>
            <table>
                <tr class="header">
                    <td></td>
                    <td>基金</td>
                    <td>調整後台灣加權指數</td>
                </tr>
<?php
$stock1=mysql_query("SELECT * FROM web_data.strategies_performance where code='quality.10m';");
$stock2=mysql_query("SELECT * FROM web_data.strategies_performance where code='y9997';");
$rs1=mysql_fetch_row($stock1);
$rs2=mysql_fetch_row($stock2);
?>
                <tr class="content">
                    <td>年化報酬率(%)</td>
                    <td><?php echo $rs1[9]?></td>
                    <td><?php echo $rs2[9]?></td>
                </tr>
                <tr class="content">
                    <td>年化標準差(%)</td>
                    <td><?php echo $rs1[10]?></td>
                    <td><?php echo $rs2[10]?></td>
                </tr>
                <tr class="content">
                    <td>年化夏普指標</td>
                    <td><?php echo $rs1[11]?></td>
                    <td><?php echo $rs2[11]?></td>
                </tr>
                <tr class="content">
                    <td>Maximum Drawdown(%)</td>
                    <td><?php echo $rs1[12]?></td>
                    <td><?php echo $rs2[12]?></td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <h4>淨值比較表</h4>
        <div>
            <table>
                <tr class="header">
                    <td>期間報酬(%)</td>
                    <td>近1個月</td>
                    <td>近3個月</td>
                    <td>近6個月</td>
                    <td>近1年</td>
                    <td>近3年</td>
                    <td>近5年</td>
                    <td>全期間</td>             
                </tr>
                <tr class="content">
                    <td>獲利基金</td>
                    <td><?php echo $rs1[2]?></td>
                    <td><?php echo $rs1[3]?></td>
                    <td><?php echo $rs1[4]?></td>
                    <td><?php echo $rs1[5]?></td>
                    <td><?php echo $rs1[6]?></td>
                    <td><?php echo $rs1[7]?></td>
                    <td><?php echo $rs1[8]?></td>
                </tr>
                <tr class="content">
                    <td>調整後台灣加權指數</td>
                    <td><?php echo $rs2[2]?></td>
                    <td><?php echo $rs2[3]?></td>
                    <td><?php echo $rs2[4]?></td>
                    <td><?php echo $rs2[5]?></td>
                    <td><?php echo $rs2[6]?></td>
                    <td><?php echo $rs2[7]?></td>
                    <td><?php echo $rs2[8]?></td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <h4>最新持股</h4>
        <div>
            <table>
                <tr class="header">
                    <td>股票代碼</td>
                    <td>購入日期</td>
                    <td>權重</td>
                </tr>
<?php
$stock=mysql_query("SELECT * FROM web_data.strategies_holding where start_date=(select max(start_date) from web_data.strategies_holding where name='quality.10m') and name='quality.10m';");
for($i=1;$i<=mysql_num_rows($stock);$i++){
$rs=mysql_fetch_row($stock);
?>
                <tr class="content">
                    <td><?php echo $rs[3]?></td>
                    <td><?php echo $rs[1]?></td>
                    <td><?php echo $rs[4]?></td>
                </tr>
<?php
}
?>
            </table>
        </div>
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
for($i=1;$i<=mysql_num_rows($FundTrendData);$i++){
$rs=mysql_fetch_row($FundTrendData);
?>
<?php echo $rs[0]?>,
<?php
}
?>],
    datasets: [{
      label: '基金走勢圖',
      data: [<?php
$FundTrendData=mysql_query("select date, nav/10000000 from web_data.strategies_nav where name = 'quality.10m' ");
$tmp = 0;
for($i=1;$i<=mysql_num_rows($FundTrendData);$i++){
$rs=mysql_fetch_row($FundTrendData);
$tmp = $tmp+$rs[1];
?>
<?php echo $rs[1]?>,
<?php
}
?>],
    backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(153,255,51,1)"
    },
{
      label: '指數走勢圖',
      data: [<?php
$IndexTrendData=mysql_query("select date, close/(select close from stock_market.y9997 where date = 20050503) from stock_market.y9997 where date >= 20050503 ");
$tmp = 0;
for($i=1;$i<=mysql_num_rows($IndexTrendData);$i++){
$rs=mysql_fetch_row($IndexTrendData);
$tmp = $tmp+$rs[1];
?>
<?php echo $rs[1]?>,
<?php
}
?>],
    backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(255,153,0,1)"
    }
    ]
  }
});
</script>
