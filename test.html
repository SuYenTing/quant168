<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表
function classify($x) {
    $y="classC";
    switch ($x){
        case 1:
            $y = "水泥工業";
            break;
        case 2:
            $y = "食品工業";
            break;
        case 3:
            $y = "塑膠工業";
            break;
        case 4:
            $y = "紡織纖維";
            break;
        case 5:
            $y = "電機機械";
            break;
        case 6:
            $y = "電器電纜";
            break;
        case 21:
            $y = "化學生技醫療";
            break;
        case 22:
            $y = "化學生技醫療";
            break;
        case 8:
            $y = "玻璃陶瓷";
            break;
        case 9:
            $y = "造紙工業";
            break;
        case 10:
            $y = "鋼鐵工業";
            break;
        case 11:
            $y = "橡膠工業";
            break;
        case 12:
            $y = "汽車工業";
            break;
        case 24:
            $y = "電子工業";
            break;
        case 25:
            $y = "電子工業";
            break;
        case 26:
            $y = "電子工業";
            break;
        case 27:
            $y = "電子工業";
            break;
        case 28:
            $y = "電子工業";
            break;
        case 29:
            $y = "電子工業";
            break;
        case 30:
            $y = "電子工業";
            break;
        case 31:
            $y = "電子工業";
            break;
        case 14:
            $y = "建材營造";
            break;
        case 15:
            $y = "航運業";
            break;
        case 16:
            $y = "觀光事業";
            break;
        case 17:
            $y = "金融保險";
            break;
        case 18:
            $y = "貿易百貨";
            break;
        case 19:
            $y = "綜合";
            break;
        case 20:
            $y = "其他產業";
            break;
        default:
            $y = "-";        
    }
    return $y;
}
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', '安全性分數', '1年年化索提諾值', '產業代碼',     '1個月累積報酬'],
<?php
      $funddata=mysql_query("SELECT * FROM web_data.bubble_chart");
      for($i=1;$i<=mysql_num_rows($funddata);$i++){
      $rs=mysql_fetch_row($funddata);
      echo "['".$rs[1]."',".$rs[10].",".$rs[14].",'".classify($rs[2])."',".$rs[15]."],";
}

?>
       //['CAN',    80.66,              1.67,      'North America',  33739900]
      ]);

      var options = {
        title: 'Correlation between life expectancy, fertility rate ' +
               'and population of some world countries (2010)',
        hAxis: {title: '安全性分數'},
        vAxis: {title: '1年年化索提諾值'},
        explorer:{},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="series_chart_div" style="width: 1200px; height: 800px;"></div>
  </body>

</html>
