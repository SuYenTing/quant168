<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
function xaxisclassify($x) {
    $y="";
if ($x == "profitability") {
    $y = "獲利性分數";
} elseif ($x == "safety") {
    $y = "安全性分數";
} elseif ($x == "payout") {
    $y = "股利性分數";
} elseif ($x == "growth") {
    $y = "成長性分數";
} elseif ($x == "quality") {
    $y = "品質性分數";
} 
    return $y;
}
function bubblesizeclassify($x) {
    $y="";
if ($x == "cum_return_1m") {
    $y = "1個月累積報酬";
} elseif ($x == "cum_return_3m") {
    $y = "3個月累積報酬";
} elseif ($x == "cum_return_6m") {
    $y = "6個月累積報酬";
} elseif ($x == "cum_return_1y") {
    $y = "1年累積報酬";
} 
    return $y;
}
?>
<html>

<head>
    <meta charset="utf-8" />
    <link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</head>
<style>
.container {
    width: 80%;
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
select option{
    font-size: 13pt;
}
</style>
<body class="theme-light">
<div class="container">
<form id="bubblechartselect" name="bubblechartselect" method="post" action="bubblechart.php">
    <select name="xaxischose" id="xaxischose" class="button" >
        <option disabled selected value> X軸 </option>
        <option value="profitability">獲利性分數</option>
        <option value="safety">安全性分數</option>
        <option value="payout">股利性分數</option>
        <option value="growth">成長性分數</option>
        <option value="quality">品質性分數</option>
    </select>
    <select name="bubblesizechose" id="bubblesizechose" class="button" >
        <option disabled selected value> Bubble Size </option>
        <option value="cum_return_1m">1個月累積報酬</option>
        <option value="cum_return_3m">3個月累積報酬</option>
        <option value="cum_return_6m">6個月累積報酬</option>
        <option value="cum_return_1y">1年累積報酬</option>
    </select>
    <input type="submit" name="searchType" id="searchType" value="送出" class="button">
</form>
    <?php
            if(isset($_POST['bubblesizechose'])&&isset($_POST['xaxischose'])){
            $bubblesizechose=$_POST['bubblesizechose'];
            $xaxischose=$_POST['xaxischose'];
    ?>
    <div id="chart"></div>
    <script type="text/javascript">
    $(function() {
        $("#chart").shieldChart({
            theme: "light",
            axisX: {
                title: {
                    text: "<?php echo xaxisclassify($xaxischose) ; ?>"
                },
                endOffset: 0.05,
                startOffset: 0.05
            },
            axisY: {
                title: {
                    text: "1年年化索提諾值"
                }
            },
            primaryHeader: {
                text: "<?php echo xaxisclassify($xaxischose) ; ?> / 1年年化索提諾值"
            },
            chartLegend: {
                align: "right",
                verticalAlign: "right",
                renderDirection: "vertical"
            },
            tooltipSettings: {
                customHeaderText: '{point.pointName}',
                customPointText: function (point, chart) {
                    return shield.format(
                        '<span style="color:{color}"><?php echo xaxisclassify($xaxischose) ; ?>: <b>{point.x}</b><br/>1年年化索提諾值:<b>{point.y}</b><br/><?php echo bubblesizeclassify($bubblesizechose) ; ?>:<b>{point.size}</b></span>',
                        {
                            point: point,
                            color: point.y > 87 ? 'red' : 'green'
                        }
                    );
                }
            },
            dataSeries: [{
                    seriesType: "bubble",
                    collectionAlias: "水泥工業",
                    data: [
<?php
      $data1=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=1 ;");
      for($i=1;$i<=mysql_num_rows($data1);$i++){
      $rs1=mysql_fetch_row($data1);
      echo "{x:".$rs1[0].",y:".$rs1[1].",size: ".$rs1[2].",pointName: '".$rs1[3]."'},";
}
?> ]            }, {
                    seriesType: "bubble",
                    collectionAlias: "食品工業",
                    data: [
<?php
      $data2=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=2 ;");
      for($i=1;$i<=mysql_num_rows($data2);$i++){
      $rs2=mysql_fetch_row($data2);
      echo "{x:".$rs2[0].",y:".$rs2[1].",size: ".$rs2[2].",pointName: '".$rs2[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "塑膠工業",
                    data: [
<?php
      $data3=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=3 ;");
      for($i=1;$i<=mysql_num_rows($data3);$i++){
      $rs3=mysql_fetch_row($data3);
      echo "{x:".$rs3[0].",y:".$rs3[1].",size: ".$rs3[2].",pointName: '".$rs3[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "紡織纖維",
                    data: [
<?php
      $data4=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=4 ;");
      for($i=1;$i<=mysql_num_rows($data4);$i++){
      $rs4=mysql_fetch_row($data4);
      echo "{x:".$rs4[0].",y:".$rs4[1].",size: ".$rs4[2].",pointName: '".$rs4[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電機機械",
                    data: [
<?php
      $data5=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=5 ;");
      for($i=1;$i<=mysql_num_rows($data5);$i++){
      $rs5=mysql_fetch_row($data5);
      echo "{x:".$rs5[0].",y:".$rs5[1].",size: ".$rs5[2].",pointName: '".$rs5[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電器電纜",
                    data: [
<?php
      $data6=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=6 ;");
      for($i=1;$i<=mysql_num_rows($data6);$i++){
      $rs6=mysql_fetch_row($data6);
      echo "{x:".$rs6[0].",y:".$rs6[1].",size: ".$rs6[2].",pointName: '".$rs6[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "化學生技醫療",
                    data: [
<?php
      $data21=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=21 or industry=22;");
      for($i=1;$i<=mysql_num_rows($data21);$i++){
      $rs21=mysql_fetch_row($data21);
      echo "{x:".$rs21[0].",y:".$rs21[1].",size: ".$rs21[2].",pointName: '".$rs21[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "玻璃陶瓷",
                    data: [
<?php
      $data8=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=8 ;");
      for($i=1;$i<=mysql_num_rows($data8);$i++){
      $rs8=mysql_fetch_row($data8);
      echo "{x:".$rs8[0].",y:".$rs8[1].",size: ".$rs8[2].",pointName: '".$rs8[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "造紙工業",
                    data: [
<?php
      $data9=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=9 ;");
      for($i=1;$i<=mysql_num_rows($data9);$i++){
      $rs9=mysql_fetch_row($data9);
      echo "{x:".$rs9[0].",y:".$rs9[1].",size: ".$rs9[2].",pointName: '".$rs9[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "鋼鐵工業",
                    data: [
<?php
      $data10=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=10 ;");
      for($i=1;$i<=mysql_num_rows($data10);$i++){
      $rs10=mysql_fetch_row($data10);
      echo "{x:".$rs10[0].",y:".$rs10[1].",size: ".$rs10[2].",pointName: '".$rs10[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "橡膠工業",
                    data: [
<?php
      $data11=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=11 ;");
      for($i=1;$i<=mysql_num_rows($data11);$i++){
      $rs11=mysql_fetch_row($data11);
      echo "{x:".$rs11[0].",y:".$rs11[1].",size: ".$rs11[2].",pointName: '".$rs11[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "汽車工業",
                    data: [
<?php
      $data12=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=12 ;");
      for($i=1;$i<=mysql_num_rows($data12);$i++){
      $rs12=mysql_fetch_row($data12);
      echo "{x:".$rs12[0].",y:".$rs12[1].",size: ".$rs12[2].",pointName: '".$rs12[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電子工業",
                    data: [
<?php
      $data24=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=24 or industry=25 or industry=26 or industry=27 or industry=28 or industry=29 or industry=30 or industry=31 ;");
      for($i=1;$i<=mysql_num_rows($data24);$i++){
      $rs24=mysql_fetch_row($data24);
      echo "{x:".$rs24[0].",y:".$rs24[1].",size: ".$rs24[2].",pointName: '".$rs24[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "建材營造",
                    data: [
<?php
      $data14=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=14 ;");
      for($i=1;$i<=mysql_num_rows($data14);$i++){
      $rs14=mysql_fetch_row($data14);
      echo "{x:".$rs14[0].",y:".$rs14[1].",size: ".$rs14[2].",pointName: '".$rs14[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "航運業",
                    data: [
<?php
      $data15=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=15 ;");
      for($i=1;$i<=mysql_num_rows($data15);$i++){
      $rs15=mysql_fetch_row($data15);
      echo "{x:".$rs15[0].",y:".$rs15[1].",size: ".$rs15[2].",pointName: '".$rs15[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "觀光事業",
                    data: [
<?php
      $data16=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=16 ;");
      for($i=1;$i<=mysql_num_rows($data16);$i++){
      $rs16=mysql_fetch_row($data16);
      echo "{x:".$rs16[0].",y:".$rs16[1].",size: ".$rs16[2].",pointName: '".$rs16[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "金融保險",
                    data: [
<?php
      $data17=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=17 ;");
      for($i=1;$i<=mysql_num_rows($data17);$i++){
      $rs17=mysql_fetch_row($data17);
      echo "{x:".$rs17[0].",y:".$rs17[1].",size: ".$rs17[2].",pointName: '".$rs17[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "貿易百貨",
                    data: [
<?php
      $data18=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=18 ;");
      for($i=1;$i<=mysql_num_rows($data18);$i++){
      $rs18=mysql_fetch_row($data18);
      echo "{x:".$rs18[0].",y:".$rs18[1].",size: ".$rs18[2].",pointName: '".$rs18[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "綜合",
                    data: [
<?php
      $data19=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=19 ;");
      for($i=1;$i<=mysql_num_rows($data19);$i++){
      $rs19=mysql_fetch_row($data19);
      echo "{x:".$rs19[0].",y:".$rs19[1].",size: ".$rs19[2].",pointName: '".$rs19[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "其他產業",
                    data: [
<?php
      $data20=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=20 ;");
      for($i=1;$i<=mysql_num_rows($data20);$i++){
      $rs20=mysql_fetch_row($data20);
      echo "{x:".$rs20[0].",y:".$rs20[1].",size: ".$rs20[2].",pointName: '".$rs20[3]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "-",
                    data: [
<?php
      $data23=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name FROM web_data.bubble_chart where industry=23 ;");
      for($i=1;$i<=mysql_num_rows($data23);$i++){
      $rs23=mysql_fetch_row($data23);
      echo "{x:".$rs23[0].",y:".$rs23[1].",size: ".$rs23[2].",pointName: '".$rs23[3]."'},";
}
?> ]            }
            ]
        });
    });
    </script>
        <?PHP }?>
</div>
</body>


</html>
