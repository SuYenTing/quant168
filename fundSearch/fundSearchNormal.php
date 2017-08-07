<?php
      $name=$_POST['name'];
      $data=mysql_query("select * from web_data.fund_performance where name = '$name' ");
      $rs=mysql_fetch_row($data);
      echo "<h2>".$rs[1]."</h2>";
    ?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
<table>
    <tr>
        <th>淨值</th>
        <th>漲跌</th>
        <th>漲跌幅(%)</th>
        <th>淨值日</th>
    </tr>
    <tr>
        <td>
            <?php  echo $rs[13].$rs[12]; ?>
        </td>
        <td>
            <?php  echo $rs[15]; ?>
        </td>
        <td>
            <?php  echo $rs[14]; ?>
        </td>
        <td>
            <?php  echo $rs[11]; ?>
        </td>
    </tr>
</table>
<div>
    <h2>淨值走勢圖</h2>
    <canvas id="myChart"></canvas>
</div>
<div>
    <h2>績效表現</h2>
    <table>
        <tr>
            <th>期間</th>
            <th>累積報酬率</th>
            <th>期間</th>
            <th>累積報酬率</th>
        </tr>
        <tr>
            <td>近一個月</td>
            <td>
                <?php  echo $rs[16]; ?>
            </td>
            <td>近一年</td>
            <td>
                <?php  echo $rs[25]; ?>
            </td>
        </tr>
        <tr>
            <td>近三個月</td>
            <td>
                <?php  echo $rs[19]; ?>
            </td>
            <td>近三年</td>
            <td>
                <?php  echo $rs[28]; ?>
            </td>
        </tr>
        <tr>
            <td>近六個月</td>
            <td>
                <?php  echo $rs[22]; ?>
            </td>
            <td>近五年</td>
            <td>
                <?php  echo $rs[31]; ?>
            </td>
        </tr>
        <tr>
            <td>成立至今</td>
            <td>
                <?php  echo $rs[34]; ?>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <div>
        <table>
            <tr>
                <th colspan="2">風險評等</th>
                <th colspan="4">基金績效衡量指標</th>
            </tr>
            <tr>
                <td>報酬日期</td>
                <td>
                    <?php  echo $rs[11]; ?>
                </td>
                <td>Adjust Sharpe</td>
                <td>
                    <?php  echo $rs[38]; ?>
                </td>
                <td>Omega Sharpe</td>
                <td>
                    <?php  echo $rs[42]; ?>
                </td>
            </tr>
            <tr>
                <td>一年年化Sharpe</td>
                <td>
                    <?php  echo $rs[27]; ?>
                </td>
                <td>Burke Ratio</td>
                <td>
                    <?php  echo $rs[37]; ?>
                </td>
                <td>Pain Ratio</td>
                <td>
                    <?php  echo $rs[43]; ?>
                </td>
            </tr>
            <tr>
                <td>一年年化標準差</td>
                <td>
                    <?php  echo $rs[26]; ?>
                </td>
                <td>BernardoLedoit Ratio Ratio</td>
                <td>
                    <?php  echo $rs[39]; ?>
                </td>
                <td>Skewnesskurtosis Ratio</td>
                <td>
                    <?php  echo $rs[44]; ?>
                </td>
            </tr>
            <tr>
                <td>三年年化標準差</td>
                <td>
                    <?php  echo $rs[29]; ?>
                </td>
                <td>D Ratio</td>
                <td>
                    <?php  echo $rs[40]; ?>
                </td>
                <td>Sortino Ratio</td>
                <td>
                    <?php  echo $rs[45]; ?>
                </td>
            </tr>
            <tr>
                <td>風險評等</td>
                <td>
                    <?php  echo $rs[7]; ?>
                </td>
                <td>MaxDrawdown</td>
                <td>
                    <?php  echo $rs[41]; ?>
                </td>
                <td>Upsidepotential Ratio</td>
                <td>
                    <?php  echo $rs[46]; ?>
                </td>
            </tr>
        </table>
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
mysql_select_db("fund_market");
$FundTrendData=mysql_query("select date, net_value from fund_market.domestic_fund where name = '$name' ");
for($i=1;$i<=mysql_num_rows($FundTrendData);$i++){
$rsFundTrendData=mysql_fetch_row($FundTrendData);
?>
<?php echo $rsFundTrendData[0]?>,
<?php
}
?>],
    datasets: [{
      label: '淨值走勢圖',
      data: [<?php
mysql_select_db("fund_market");
$FundTrendData=mysql_query("select date, net_value from fund_market.domestic_fund where name = '$name' ");
for($i=1;$i<=mysql_num_rows($FundTrendData);$i++){
$rsFundTrendData=mysql_fetch_row($FundTrendData);
?>
<?php echo $rsFundTrendData[1]?>,
<?php
}
?>],
      backgroundColor: "rgba(0,0,0,0)",
      borderColor: "rgba(153,255,51,1)"
    },
    ]
  }
});
</script>