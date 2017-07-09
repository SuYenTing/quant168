<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表

?>
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  <script>
  $( function() {
    var availableTags = [
<?php
$fundName=mysql_query("SELECT * FROM web_data.fund_performance;");
for($i=1;$i<=mysql_num_rows($fundName);$i++){
$rsfundName=mysql_fetch_row($fundName);
?>
<?php echo "\"".$rsfundName[1]."\""?>,
<?php
}
?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
</head>
<style>
.container {
    width: 80%;
}
.chart{
  width:50%;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<div class="container">
<div>
  
</div>
<div class="ui-widget">
  <form id="fundsearch" name="fundsearch" method="post" action="fundsearch.php">
    <input id="tags" placeholder="請輸入欲搜尋之基金名稱" name="name" value="<?php echo $_POST['name'];?>">
    <input  class="button" type="button" name="button" id="name" onclick="normalSearch()" value="搜尋" >
    <button class="button" type="button" >進階搜尋</button>
    <input  type="hidden" name="searchType" id="searchType" >
  </form>
<?php
    if($_POST['searchType']=='advance'){
   
      
      
    ?>

  <table>
      <tr>
        <th colspan="2">基金類型</th>
        <th colspan="2">基金風險評等</th> 
      </tr>
      <tr>
        <td>境內/境外</td>
        <td>
        <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td> 
        <td>一年年化標準差</td>
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>基金標的</td>
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
        <td>一年年化Sharp Ratio</td> 
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>投資區域</td>
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
        <td>晨星評等</td> 
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>計價幣別</td>
        <td>
          <select name="cars">
          <option value="volvo">全部基金</option>
          <option value="saab">境內</option>
          <option value="fiat">境外</option>
        </select>
        </td>
        <td></td> 
        <td></td>
      </tr>
      <tr>
        <td colspan="4"><input  class="button" type="button"  value="確認送出" ></td>
      </tr>
    </table>

    <?php
    }
    ?>
  <?php
    if($_POST['searchType']=='normal'){
      $name=$_POST['name'];
      $data=mysql_query("select * from web_data.fund_performance where name = '$name' ");
      $rs=mysql_fetch_row($data);
      echo "<h1>"."單檔基金介紹"."</h1>";
      echo "<h2>".$rs[1]."</h2>";
      echo "<h2>".$rs[13].$rs[12]."&nbsp".$rs[15]."/".$rs[14]."&nbsp".$rs[11]."</h2>";
      
    ?>
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
        <td><?php  echo $rs[16]; ?></td> 
        <td>近一年</td>
        <td><?php  echo $rs[25]; ?></td>
      </tr>
      <tr>
        <td>近三個月</td>
        <td><?php  echo $rs[19]; ?></td>
        <td>近三年</td> 
        <td><?php  echo $rs[28]; ?></td>
      </tr>
      <tr>
        <td>近六個月</td>
        <td><?php  echo $rs[22]; ?></td>
        <td>近五年</td> 
        <td><?php  echo $rs[31]; ?></td>
      </tr>
      <tr>
        <td>成立至今</td>
        <td><?php  echo $rs[34]; ?></td>
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
        <td><?php  echo $rs[11]; ?></td> 
        <td>Adjust Sharpe</td>
        <td><?php  echo $rs[38]; ?></td>
        <td>Omega Sharpe</td>
        <td><?php  echo $rs[42]; ?></td>
      </tr>
      <tr>
        <td>一年年化Sharpe</td>
        <td><?php  echo $rs[27]; ?></td>
        <td>Burke Ratio</td>
        <td><?php  echo $rs[37]; ?></td>
        <td>Pain Ratio</td>
        <td><?php  echo $rs[43]; ?></td>
      </tr>
      <tr>
        <td>一年年化標準差</td>
        <td><?php  echo $rs[26]; ?></td>
        <td>BernardoLedoit Ratio Ratio</td>
        <td><?php  echo $rs[39]; ?></td>
        <td>Skewnesskurtosis Ratio</td>
        <td><?php  echo $rs[44]; ?></td>
      </tr>
      <tr>
        <td>三年年化標準差</td>
        <td><?php  echo $rs[29]; ?></td>
        <td>D Ratio</td>
        <td><?php  echo $rs[40]; ?></td>
        <td>Sortino Ratio</td>
        <td><?php  echo $rs[45]; ?></td>
      </tr>
      <tr>
        <td>風險評等</td>
        <td><?php  echo $rs[7]; ?></td>
        <td>MaxDrawdown</td>
        <td><?php  echo $rs[41]; ?></td>
        <td>Upsidepotential Ratio</td>
        <td><?php  echo $rs[46]; ?></td>
      </tr>
    </table>
    </div>

    </div>




    <?php
    }
    ?>
</div>
 
 
</div>

<script>

function advanceSearch() {
    document.getElementById("searchType").value = "advance";
    document.getElementById("fundsearch").submit();
  }
function normalSearch() {
    document.getElementById("searchType").value = "normal";
    document.getElementById("fundsearch").submit();
  }
<?php
    if($_POST['searchType']=='normal'){
   
      
      
    ?>
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
<?php
    }
    ?>
</script>