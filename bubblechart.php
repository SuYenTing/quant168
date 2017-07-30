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
     <?php
            if(isset($_POST['bubblesizechose'])&&isset($_POST['xaxischose'])){
            $bubblesizechose=$_POST['bubblesizechose'];
            $xaxischose=$_POST['xaxischose'];
            $industry=$_POST['industry'];
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {
        var data = google.visualization.arrayToDataTable([
            ['ID', '<?php echo xaxisclassify($xaxischose) ; ?>', '1年年化索提諾值', '產業代碼', '<?php echo bubblesizeclassify($bubblesizechose) ; ?>'],
<?php
      $funddata=mysql_query("SELECT $xaxischose,adjSortino,$bubblesizechose,name,industry FROM web_data.bubble_chart $industry");
      for($i=1;$i<=mysql_num_rows($funddata);$i++){
      $rs=mysql_fetch_row($funddata);
      echo "['".$rs[3]."',".$rs[0].",".$rs[1].",'".classify($rs[4])."',".$rs[2]."],";
}

?>
            //['CAN',    80.66,              1.67,      'North America',  33739900]
        ]);
        var options = {
            //title: 'Correlation between life expectancy, fertility rate ' +'and population of some world countries (2010)',
            chartArea: { left: 50, top: 0, width: '92%', height: '90%' },
            hAxis: { title: '<?php echo xaxisclassify($xaxischose) ; ?>' },
            vAxis: { title: '1年年化索提諾值' },
            //explorer:{},
            bubble: { textStyle: { fontSize: 0.1 } },
            legend: { position: 'none' },
            //tooltip:{trigger:'selection'},
            series: {
                '水泥工業': { color: '#444444' },
                '食品工業': { color: '#A20055' },
                '塑膠工業': { color: '#AA0000' },
                '紡織纖維': { color: '#CC6600' },
                '電機機械': { color: '#BBBB00' },
                '電器電纜': { color: '#88AA00' },
                '化學生技醫療': { color: '#66DD00' },
                '玻璃陶瓷': { color: '#668800' },
                '造紙工業': { color: '#55AA00' },
                '鋼鐵工業': { color: '#00AA55' },
                '橡膠工業': { color: '#00AAAA' },
                '汽車工業': { color: '#007799' },
                '電子工業': { color: '#003C9D' },
                '建材營造': { color: '#5500FF' },
                '航運業': { color: '#2200AA' },
                '觀光事業': { color: '#3A0088' },
                '金融保險': { color: '#66009D' },
                '貿易百貨': { color: '#660077' },
                '綜合': { color: '#5500FF' },
                '其他產業': { color: '#7700FF' },
                '-': { color: '#9900FF' },
            }
            //colorAxis:{legend:{position: 'bottom'}}
        };
        var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
        chart.draw(data, options);
    }
    </script>
    <?php
        }
    ?>
</head>
<style>
.container {
    width: 80%;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

select option {
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
            <input type="hidden" id="industry" name="industry">
            <input type="button" name="searchType" id="searchType" value="送出" class="button" onclick="submitbubblechartselectForm()">
        </form>
    <?php
            if(isset($_POST['bubblesizechose'])&&isset($_POST['xaxischose'])){
    ?>
        <table>
            <td>
                <div id="series_chart_div" style="width: 700px; height: 600px;"></div>
            </td>
            <td style="width:20%;">
                <p style="color:#444444;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter1" value="industry=1 or ">水泥工業</p>
                <p style="color:#A20055;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter2" value="industry=2 or ">食品工業</p>
                <p style="color:#AA0000;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter3" value="industry=3 or ">塑膠工業</p>
                <p style="color:#CC6600;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter4" value="industry=4 or ">紡織纖維</p>
                <p style="color:#BBBB00;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter5" value="industry=5 or ">電機機械</p>
                <p style="color:#88AA00;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter6" value="industry=6 or ">電器電纜</p>
                <p style="color:#66DD00;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter7" value="industry=21 or industry=22 or ">化學生技醫療</p>
                <p style="color:#668800;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter8" value="industry=8 or ">玻璃陶瓷</p>
                <p style="color:#55AA00;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter9" value="industry=9 or ">造紙工業</p>
                <p style="color:#00AA55;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter10" value="industry=10 or ">鋼鐵工業</p>
                <p style="color:#00AAAA;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter11" value="industry=11 or ">橡膠工業</p>
                <p style="color:#007799;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter12" value="industry=12 or ">汽車工業</p>
                <p style="color:#003C9D;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter13" value="industry=24 or industry=25 or industry=26 or industry=27 or industry=28 or industry=29 or industry=30 or industry=31 or ">電子工業</p>
                <p style="color:#5500FF;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter14" value="industry=14 or ">建材營造</p>
                <p style="color:#2200AA;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter15" value="industry=15 or ">航運業</p>
                <p style="color:#3A0088;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter16" value="industry=16 or ">觀光事業</p>
                <p style="color:#66009D;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter17" value="industry=17 or ">金融保險</p>
                <p style="color:#660077;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter18" value="industry=18 or ">貿易百貨</p>
                <p style="color:#5500FF;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter19" value="industry=19 or ">綜合</p>
                <p style="color:#7700FF;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter20" value="industry=20 or ">其他產業</p>
                <p style="color:#9900FF;font-weight:bolder;line-height:1px;">
                    <input type="checkbox" id="filter21" value="industry=23 or ">-</p>
                <p style="font-weight:bolder;">
                    <input type="button" id="filter" value="篩選" onclick="submitFilterselectForm()">
                </p>
            </td>
        </table>
<script type="text/javascript">
function submitFilterselectForm(){
    industrySql="";
    for (var i = 1; i < 22; i++) {
        if (document.getElementById("filter"+i).checked) {
            //alert("test"+document.getElementById("filter"+i).value);
            industrySql=industrySql+document.getElementById("filter"+i).value;
        }
    }
    if (industrySql.length>1) {
        industrySql=industrySql.substr(0, industrySql.length-3);
        industrySql="where "+industrySql;
    }
    document.getElementById("industry").value=industrySql;
    document.getElementById("xaxischose").value="<?php echo $xaxischose ;?>";
    document.getElementById("bubblesizechose").value="<?php echo $bubblesizechose ; ?>";
    //alert(industrySql);
    document.getElementById("bubblechartselect").submit();
}
</script>
    <?php
        }
    ?>
    </div>
</body>
<script type="text/javascript">
function submitbubblechartselectForm(){
    document.getElementById("industry").value="";
    document.getElementById("bubblechartselect").submit();
}
</script>
</html>
