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
    <input id="tags" placeholder="請輸入欲搜尋之基金名稱" name="name"  value="<?php echo $_POST['name'];?>">
    <input  class="button" type="button" name="button" id="name" onclick="normalSearch()" value="搜尋" >
    <button class="button" type="button" onclick="advanceSearch()">進階搜尋</button>
    <input  type="hidden" name="searchType" id="searchType" >
    <input type="hidden" name="sql" id="sql">
  </form>
<?php if($_POST['searchType']=='advance'){ ?>

<table>
    <tr>
        <th colspan="2">基金類型</th>
        <th colspan="2">基金風險評等</th>
    </tr>
    <tr>
        <td>境內/境外</td>
        <td>
            <select name="invest_place" id="invest_place" onchange="setSubject()">
                <option value="all">全部基金</option>
                <option value="invest_place_in">境內</option>
                <option value="invest_place_out">境外</option>
            </select>
        </td>
        <td>一年年化標準差</td>
        <td>
            <select name="std1y" id="std1y">
                <option value="all">不限</option>
                <option value="std1y1">0 &#60;=SD &#60;3</option>
                <option value="std1y2">3 &#60;=SD &#60;6</option>
                <option value="std1y3">6 &#60;=SD &#60;9</option>
                <option value="std1y4">9 &#60;=SD</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>基金標的</td>
        <td>
            <select name="subject" id="subject">
                <option value="貨幣">貨幣型</option>
                <option value="股票">股票型</option>
                <option value="平衡">平衡型</option>
                <option value="小型股">小型股</option>
                <option value="科技股">科技股</option>
                <option value="指數型基金">指數型基金</option>
            </select>
        </td>
        <td>一年年化Sharp Ratio</td>
        <td>
            <select name="sr1y" id="sr1y">
                <option value="all">不限</option>
                <option value="sr1y1">0&#60;SR</option>
                <option value="sr1y2">0 &#60;=SR&#60;1</option>
                <option value="sr1y3">1 &#60;=SR</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>投資區域</td>
        <td>
            <select name="cars">
                <option value="台灣">台灣</option>
            </select>
        </td>
        <td>晨星評等</td>
        <td>
            <select name="risk_level" id="risk_level">
                <option value="all">不限</option>
                <option value="RR5">PR5適合積極投資人</option>
                <option value="RR4">PR4適合成長投資人</option>
                <option value="RR3">PR3適合穩健投資人</option>
                <option value="RR2">PR2適合安穩投資人</option>
                <option value="RR1">PR1適合保守投資人</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>計價幣別</td>
        <td>
            <select name="cars">
                <option value="新台幣">新台幣</option>
            </select>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4">
            <input class="button" type="button" value="確認送出" onclick="fundAdvanceSearchSubmit()">
        </td>
    </tr>
</table>
<script type="text/javascript">
function setSubject() {
    if (document.getElementById("invest_place").value != "invest_place_in") {
        var x = document.getElementById("subject");
        var option1 = document.createElement("option");
        option1.text = "債券型";
        option1.value = "債券型";
        x.add(option1);
        var option2 = document.createElement("option");
        option2.text = "醫療生化型";
        option2.value = "醫療生化型";
        x.add(option2);
        var option3 = document.createElement("option");
        option3.text = "房地型";
        option3.value = "房地型";
        x.add(option3);
        var option4 = document.createElement("option");
        option4.text = "能源股票";
        option4.value = "能源股票";
        x.add(option4);
        var option5 = document.createElement("option");
        option5.text = "認股權證/轉換公司債";
        option5.value = "認股權證/轉換公司債";
        x.add(option5);
        var option6 = document.createElement("option");
        option6.text = "指數股票型基金";
        option6.value = "指數股票型基金";
        x.add(option6);
    }
}

function fundAdvanceSearchSubmit() {
    sql = "SELECT * FROM web_data.fund_performance where 1=1 ";
    sql = sql + "and subject = '" + document.getElementById("subject").value + "' ";
    if (document.getElementById("std1y").value != "all") {
        if (document.getElementById("std1y").value == "std1y1") {
            sql = sql + "and std1y >=0  and std1y <3 ";
        } else if (document.getElementById("std1y").value == "std1y2") {
            sql = sql + "and std1y >=3  and std1y <6 ";
        } else if (document.getElementById("std1y").value == "std1y3") {
            sql = sql + "and std1y >=6  and std1y <9 ";
        } else if (document.getElementById("std1y").value == "std1y4") {
            sql = sql + "and std1y >=9  ";
        }

    }
    if (document.getElementById("sr1y").value != "all") {
        if (document.getElementById("sr1y").value == "sr1y1") {
            sql = sql + "and sr1y >0 ";
        } else if (document.getElementById("sr1y").value == "sr1y2") {
            sql = sql + "and std1y >=0  and std1y <1 ";
        } else if (document.getElementById("sr1y").value == "sr1y3") {
            sql = sql + "and std1y >=1 ";
        }

    }
    if (document.getElementById("risk_level").value != "all") {
      sql = sql + "and risk_level = '" + document.getElementById("risk_level").value + "' ";
    }
    document.getElementById("sql").value = sql;
    //alert(document.getElementById("sql").value);
    document.getElementById("searchType").value = "advanceResult";
    document.getElementById("fundsearch").submit();
}

</script>

<?php } ?>

<?php if($_POST['searchType']=='advanceResult'){ ?>
<style>
/* Style the tab */

div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}


/* Style the buttons inside the tab */

div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}


/* Change background color of buttons on hover */

div.tab button:hover {
    background-color: #ddd;
}


/* Create an active/current tablink class */

div.tab button.active {
    background-color: #ccc;
}


/* Style the tab content */

.tabcontent {
    display: none;
    padding: 6px ;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">資訊總覽</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">績效表現</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">基金指標</button>
</div>
<div id="London" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>淨值/淨值日</th>
            <th>漲跌幅%/漲跌</th>
            <th>幣別</th>
            <th>標準差</th>
            <th>Sharpe值</th>
            <th>風險報籌等級/晨星評等</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[1]?></td>
          <td><?php echo $rs[13]?>/<?php echo $rs[11]?></td>
          <td><?php echo $rs[14]?>/<?php echo $rs[15]?></td>
          <td><?php echo $rs[12]?></td>
          <td><?php echo $rs[26]?></td>
          <td><?php echo $rs[27]?></td>
          <td><?php echo $rs[7]?></td>
        </tr>
<?php
}
?>
    </table>
</div>
<div id="Paris" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>近三月</th>
            <th>近六月</th>
            <th>近一年</th>
            <th>近三年</th>
            <th>近五年</th>
            <th>成立乞今</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[1]?></td>
          <td><?php echo $rs[19]?></td>
          <td><?php echo $rs[22]?></td>
          <td><?php echo $rs[25]?></td>
          <td><?php echo $rs[28]?></td>
          <td><?php echo $rs[31]?></td>
          <td><?php echo $rs[34]?></td>
        </tr>
<?php
}
?>
    </table>
</div>
<div id="Tokyo" class="tabcontent">
    <table>
        <tr>
            <th>基金名稱</th>
            <th>Adjust Sharpe</th>
            <th>Burke Ratio</th>
            <th>BernardoLedoit Ratio</th>
            <th>D Ratio</th>
            <th>MaxDrawdown</th>
            <th>Omega Sharpe</th>
            <th>Pain Ratio</th>
            <th>Skewnesskurtosis Ratio</th>
            <th>Sortino Ratio</th>
            <th>Upsidepotential Ratio</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=1;$i<=mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[1]?></td>
          <td><?php echo $rs[38]?></td>
          <td><?php echo $rs[37]?></td>
          <td><?php echo $rs[39]?></td>
          <td><?php echo $rs[40]?></td>
          <td><?php echo $rs[41]?></td>
          <td><?php echo $rs[42]?></td>
          <td><?php echo $rs[43]?></td>
          <td><?php echo $rs[44]?></td>
          <td><?php echo $rs[45]?></td>
          <td><?php echo $rs[46]?></td>
        </tr>
<?php
}
?>
    </table>
</div>






<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     




<?php } ?>




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