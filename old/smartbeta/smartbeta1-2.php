<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from sb_profitability_return_10m");//從contact資料庫中選擇所有的資料表
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<style>
.containe {
    width: 80%;
    
}
</style>
<div class="containe">
    <div>
        <h2>簡介</h2>
        <p></p>
    </div>
    <div>
        <h2>績效報酬</h2>
        <p>小資獲利型基金績效圖</p>
        <canvas id="myChart"></canvas>
    </div>
    <div>
        <h2>最新持股</h2>
        <div>
            <style type="text/css">
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
            </style>
            <table>
                <tr class="header">
                    <td>股票代碼</td>
                    <td>購入日期</td>
                    <td>購入價位</td>
                    <td>權重</td>
                </tr>
<?php
$stock=mysql_query("SELECT * FROM web_data.sb_profitability_10m where date=(select max(date) from web_data.sb_profitability_10m);");
for($i=1;$i<=mysql_num_rows($stock);$i++){
$rs=mysql_fetch_row($stock);
?>
                <tr class="content">
                    <td><?php echo $rs[1]?></td>
                    <td><?php echo $rs[0]?></td>
                    <td><?php echo $rs[3]?></td>
                    <td><?php echo $rs[2]?></td>
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
for($i=1;$i<=mysql_num_rows($data);$i++){
$rs=mysql_fetch_row($data);
?>
<?php echo $rs[0]?>,
<?php
}
?>],
    datasets: [{
      label: '近十年報酬',
      data: [<?php
$return=mysql_query("select sb_profitability_return_10m.return from sb_profitability_return_10m");
$tmp = 0;
for($i=1;$i<=mysql_num_rows($return);$i++){
$ret=mysql_fetch_row($return);
$tmp = $tmp +$ret[0];
?>
<?php echo $tmp?>,
<?php
}
?>],
      backgroundColor: "rgba(153,255,51,0.4)"
    }]
  }
});
</script>
