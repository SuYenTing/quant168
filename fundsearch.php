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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
</style>
<div class="container">
 
<div class="ui-widget">
  <form id="fundsearch" name="fundsearch" method="post" action="fundsearch.php">
    <input id="tags" placeholder="請輸入欲搜尋之基金名稱" name="name" value="<?php echo $_POST['name'];?>">
    <input type="submit" name="button" value="搜尋">
  </form>
  <?php
    if($_POST['name']!=''){
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





    <?php
    }
    ?>
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
      label: '基金走勢圖',
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