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
        //title: 'Correlation between life expectancy, fertility rate ' +'and population of some world countries (2010)',
        chartArea:{left:50,top:0,width:'92%',height:'90%'},
        hAxis: {title: '安全性分數'},
        vAxis: {title: '1年年化索提諾值'},
        explorer:{},
        bubble: {textStyle: {fontSize: 11}},
        legend :{position: 'none'},
        tooltip:{trigger:'selection'},
        series: {'其他產業': {color: '#ff0000'}}
        //colorAxis:{legend:{position: 'bottom'}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
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
  <body>
    <div class="container">
        <form id="bubblechartselect" name="bubblechartselect" method="post" action="bubblechart.php">
            <select name="xaxischose" id="xaxischose" class="button">
                <option disabled selected value> X軸 </option>
                <option value="profitability">獲利性分數</option>
                <option value="safety">安全性分數</option>
                <option value="payout">股利性分數</option>
                <option value="growth">成長性分數</option>
                <option value="quality">品質性分數</option>
            </select>
            <select name="bubblesizechose" id="bubblesizechose" class="button">
                <option disabled selected value> Bubble Size </option>
                <option value="cum_return_1m">1個月累積報酬</option>
                <option value="cum_return_3m">3個月累積報酬</option>
                <option value="cum_return_6m">6個月累積報酬</option>
                <option value="cum_return_1y">1年累積報酬</option>
            </select>
            <input type="submit" name="searchType" id="searchType" value="送出" class="button">
        </form>
        <table>
            <td>
                <div id="series_chart_div" style="width: 1000px; height: 600px;"></div>
            </td>
            <td>
                <p style="color:#ff0000;"><input type="checkbox" name="vehicle1" value="Bike" >其他產業</p>
                <p style="color:blue;"><input type="checkbox" name="vehicle1" value="Bike">化學生技醫療</p>
                <p style="color:green;"><input type="checkbox" name="vehicle1" value="Bike">其他產業</p>
                <p style="color:black;"><input type="checkbox" name="vehicle1" value="Bike">其他產業</p>
                <p style="color:orange;"><input type="checkbox" name="vehicle1" value="Bike">其他產業</p>
            </td>
        </table>
    </div>
</body>
</html>
