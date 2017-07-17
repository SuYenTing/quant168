<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>JavaScript Shield UI Demos</title>
    <link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</head>

<body class="theme-light">
    <div id="chart"></div>
    <script type="text/javascript">
    $(function() {
        $("#chart").shieldChart({
            theme: "light",
            axisX: {
                title: {
                    text: "Budget"
                },
                endOffset: 0.05,
                startOffset: 0.05
            },
            axisY: {
                title: {
                    text: "Revenue"
                }
            },
            primaryHeader: {
                text: "Ad Budget VS Revenue"
            },
            chartLegend: {
                align: "right",
                verticalAlign: "right",
                renderDirection: "vertical"
            },
            dataSeries: [{
                    seriesType: "bubble",
                    collectionAlias: "水泥工業",
                    data: [
<?php
      $data1=mysql_query("SELECT * FROM web_data.bubble_chart where industry=1 ;");
      for($i=1;$i<=mysql_num_rows($data1);$i++){
      $rs1=mysql_fetch_row($data1);
      echo "{x:".$rs1[10].",y:".$rs1[14].",size: ".$rs1[15].",pointName: '".$rs1[1]."'},";
}
?> ]            }, {
                    seriesType: "bubble",
                    collectionAlias: "食品工業",
                    data: [
<?php
      $data2=mysql_query("SELECT * FROM web_data.bubble_chart where industry=2 ;");
      for($i=1;$i<=mysql_num_rows($data2);$i++){
      $rs2=mysql_fetch_row($data2);
      echo "{x:".$rs2[10].",y:".$rs2[14].",size: ".$rs2[15].",pointName: '".$rs2[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "塑膠工業",
                    data: [
<?php
      $data3=mysql_query("SELECT * FROM web_data.bubble_chart where industry=3 ;");
      for($i=1;$i<=mysql_num_rows($data3);$i++){
      $rs3=mysql_fetch_row($data3);
      echo "{x:".$rs3[10].",y:".$rs3[14].",size: ".$rs3[15].",pointName: '".$rs3[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "紡織纖維",
                    data: [
<?php
      $data4=mysql_query("SELECT * FROM web_data.bubble_chart where industry=4 ;");
      for($i=1;$i<=mysql_num_rows($data4);$i++){
      $rs4=mysql_fetch_row($data4);
      echo "{x:".$rs4[10].",y:".$rs4[14].",size: ".$rs4[15].",pointName: '".$rs4[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電機機械",
                    data: [
<?php
      $data5=mysql_query("SELECT * FROM web_data.bubble_chart where industry=5 ;");
      for($i=1;$i<=mysql_num_rows($data5);$i++){
      $rs5=mysql_fetch_row($data5);
      echo "{x:".$rs5[10].",y:".$rs5[14].",size: ".$rs5[15].",pointName: '".$rs5[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電器電纜",
                    data: [
<?php
      $data6=mysql_query("SELECT * FROM web_data.bubble_chart where industry=6 ;");
      for($i=1;$i<=mysql_num_rows($data6);$i++){
      $rs6=mysql_fetch_row($data6);
      echo "{x:".$rs6[10].",y:".$rs6[14].",size: ".$rs6[15].",pointName: '".$rs6[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "化學生技醫療",
                    data: [
<?php
      $data21=mysql_query("SELECT * FROM web_data.bubble_chart where industry=21 or industry=22;");
      for($i=1;$i<=mysql_num_rows($data21);$i++){
      $rs21=mysql_fetch_row($data21);
      echo "{x:".$rs21[10].",y:".$rs21[14].",size: ".$rs21[15].",pointName: '".$rs21[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "玻璃陶瓷",
                    data: [
<?php
      $data8=mysql_query("SELECT * FROM web_data.bubble_chart where industry=8 ;");
      for($i=1;$i<=mysql_num_rows($data8);$i++){
      $rs8=mysql_fetch_row($data8);
      echo "{x:".$rs8[10].",y:".$rs8[14].",size: ".$rs8[15].",pointName: '".$rs8[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "造紙工業",
                    data: [
<?php
      $data9=mysql_query("SELECT * FROM web_data.bubble_chart where industry=9 ;");
      for($i=1;$i<=mysql_num_rows($data9);$i++){
      $rs9=mysql_fetch_row($data9);
      echo "{x:".$rs9[10].",y:".$rs9[14].",size: ".$rs9[15].",pointName: '".$rs9[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "鋼鐵工業",
                    data: [
<?php
      $data10=mysql_query("SELECT * FROM web_data.bubble_chart where industry=10 ;");
      for($i=1;$i<=mysql_num_rows($data10);$i++){
      $rs10=mysql_fetch_row($data10);
      echo "{x:".$rs10[10].",y:".$rs10[14].",size: ".$rs10[15].",pointName: '".$rs10[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "橡膠工業",
                    data: [
<?php
      $data11=mysql_query("SELECT * FROM web_data.bubble_chart where industry=11 ;");
      for($i=1;$i<=mysql_num_rows($data11);$i++){
      $rs11=mysql_fetch_row($data11);
      echo "{x:".$rs11[10].",y:".$rs11[14].",size: ".$rs11[15].",pointName: '".$rs11[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "汽車工業",
                    data: [
<?php
      $data12=mysql_query("SELECT * FROM web_data.bubble_chart where industry=12 ;");
      for($i=1;$i<=mysql_num_rows($data12);$i++){
      $rs12=mysql_fetch_row($data12);
      echo "{x:".$rs12[10].",y:".$rs12[14].",size: ".$rs12[15].",pointName: '".$rs12[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "電子工業",
                    data: [
<?php
      $data24=mysql_query("SELECT * FROM web_data.bubble_chart where industry=24 or industry=25 or industry=26 or industry=27 or industry=28 or industry=29 or industry=30 or industry=31 ;");
      for($i=1;$i<=mysql_num_rows($data24);$i++){
      $rs24=mysql_fetch_row($data24);
      echo "{x:".$rs24[10].",y:".$rs24[14].",size: ".$rs24[15].",pointName: '".$rs24[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "建材營造",
                    data: [
<?php
      $data14=mysql_query("SELECT * FROM web_data.bubble_chart where industry=14 ;");
      for($i=1;$i<=mysql_num_rows($data14);$i++){
      $rs14=mysql_fetch_row($data14);
      echo "{x:".$rs14[10].",y:".$rs14[14].",size: ".$rs14[15].",pointName: '".$rs14[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "航運業",
                    data: [
<?php
      $data15=mysql_query("SELECT * FROM web_data.bubble_chart where industry=15 ;");
      for($i=1;$i<=mysql_num_rows($data15);$i++){
      $rs15=mysql_fetch_row($data15);
      echo "{x:".$rs15[10].",y:".$rs15[14].",size: ".$rs15[15].",pointName: '".$rs15[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "觀光事業",
                    data: [
<?php
      $data16=mysql_query("SELECT * FROM web_data.bubble_chart where industry=16 ;");
      for($i=1;$i<=mysql_num_rows($data16);$i++){
      $rs16=mysql_fetch_row($data16);
      echo "{x:".$rs16[10].",y:".$rs16[14].",size: ".$rs16[15].",pointName: '".$rs16[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "金融保險",
                    data: [
<?php
      $data17=mysql_query("SELECT * FROM web_data.bubble_chart where industry=17 ;");
      for($i=1;$i<=mysql_num_rows($data17);$i++){
      $rs17=mysql_fetch_row($data17);
      echo "{x:".$rs17[10].",y:".$rs17[14].",size: ".$rs17[15].",pointName: '".$rs17[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "貿易百貨",
                    data: [
<?php
      $data18=mysql_query("SELECT * FROM web_data.bubble_chart where industry=18 ;");
      for($i=1;$i<=mysql_num_rows($data18);$i++){
      $rs18=mysql_fetch_row($data18);
      echo "{x:".$rs18[10].",y:".$rs18[14].",size: ".$rs18[15].",pointName: '".$rs18[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "綜合",
                    data: [
<?php
      $data19=mysql_query("SELECT * FROM web_data.bubble_chart where industry=19 ;");
      for($i=1;$i<=mysql_num_rows($data19);$i++){
      $rs19=mysql_fetch_row($data19);
      echo "{x:".$rs19[10].",y:".$rs19[14].",size: ".$rs19[15].",pointName: '".$rs19[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "其他產業",
                    data: [
<?php
      $data20=mysql_query("SELECT * FROM web_data.bubble_chart where industry=20 ;");
      for($i=1;$i<=mysql_num_rows($data20);$i++){
      $rs20=mysql_fetch_row($data20);
      echo "{x:".$rs20[10].",y:".$rs20[14].",size: ".$rs20[15].",pointName: '".$rs20[1]."'},";
}
?> ]            },{
                    seriesType: "bubble",
                    collectionAlias: "-",
                    data: [
<?php
      $data23=mysql_query("SELECT * FROM web_data.bubble_chart where industry=23 ;");
      for($i=1;$i<=mysql_num_rows($data23);$i++){
      $rs23=mysql_fetch_row($data23);
      echo "{x:".$rs23[10].",y:".$rs23[14].",size: ".$rs23[15].",pointName: '".$rs23[1]."'},";
}
?> ]            }
            ]
        });
    });
    </script>
</body>


</html>
