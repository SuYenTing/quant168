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
                <option value="invest_place_in">境內</option>
                <option value="all">全部基金</option>
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
            <select name="country" id="country">
                <option value="taiwan">台灣</option>
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
            <select id="currency" name="currency">
                <option value="NTD">新台幣</option>
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
        //subject add
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
        //currency add
        var currency = document.getElementById("currency");
        var currency1 = document.createElement("option");
        currency1.text = "英鎊";
        currency1.value = "英鎊";
        currency.add(currency1);
        var currency2 = document.createElement("option");
        currency2.text = "美元";
        currency2.value = "美元";
        currency.add(currency2);
        var currency3 = document.createElement("option");
        currency3.text = "紐幣  ";
        currency3.value = "紐幣  ";
        currency.add(currency3);
        var currency4 = document.createElement("option");
        currency4.text = "瑞法郎";
        currency4.value = "瑞法郎";
        currency.add(currency4);
        var currency5 = document.createElement("option");
        currency5.text = "瑞典幣";
        currency5.value = "瑞典幣";
        currency.add(currency5);
        var currency6 = document.createElement("option");
        currency6.text = "澳幣  ";
        currency6.value = "澳幣  ";
        currency.add(currency6);
        var currency7 = document.createElement("option");
        currency7.text = "港幣  ";
        currency7.value = "港幣  ";
        currency.add(currency7);
        var currency8 = document.createElement("option");
        currency8.text = "歐元  ";
        currency8.value = "歐元  ";
        currency.add(currency8);
        var currency9 = document.createElement("option");
        currency9.text = "日圓  ";
        currency9.value = "日圓  ";
        currency.add(currency9);
        var currency10 = document.createElement("option");
        currency10.text = "南非幣";
        currency10.value = "南非幣";
        currency.add(currency10);
        var currency11 = document.createElement("option");
        currency11.text = "加幣  ";
        currency11.value = "加幣  ";
        currency.add(currency11);
        //add country
        var country = document.getElementById("country");
        var country1 = document.createElement("option");
        country1.text = "全球                ";
        country1.value = "全球                ";
        country.add(country1);
        var country2 = document.createElement("option");
        country2.text = "已開發歐洲          ";
        country2.value = "已開發歐洲          ";
        country.add(country2);
        var country3 = document.createElement("option");
        country3.text = "美國                ";
        country3.value = "美國                ";
        country.add(country3);
        var country4 = document.createElement("option");
        country4.text = "日本                ";
        country4.value = "日本                ";
        country.add(country4);
        var country5 = document.createElement("option");
        country5.text = "歐洲                ";
        country5.value = "歐洲                ";
        country.add(country5);
        var country6 = document.createElement("option");
        country6.text = "亞太(不含日本)      ";
        country6.value = "亞太(不含日本)      ";
        country.add(country6);
        var country7 = document.createElement("option");
        country7.text = "歐盟國家            ";
        country7.value = "歐盟國家            ";
        country.add(country7);
        var country8 = document.createElement("option");
        country8.text = "新興市場            ";
        country8.value = "新興市場            ";
        country.add(country8);
        var country9 = document.createElement("option");
        country9.text = "拉丁美洲            ";
        country9.value = "拉丁美洲            ";
        country.add(country9);
        var country10 = document.createElement("option");
        country10.text = "印度                ";
        country10.value = "印度                ";
        country.add(country10);
        var country11 = document.createElement("option");
        country11.text = "新興拉丁美洲        ";
        country11.value = "新興拉丁美洲        ";
        country.add(country11);
        var country12 = document.createElement("option");
        country12.text = "中國大陸及香港      ";
        country12.value = "中國大陸及香港      ";
        country.add(country12);
        var country13 = document.createElement("option");
        country13.text = "已開發市場          ";
        country13.value = "已開發市場          ";
        country.add(country13);
        var country14 = document.createElement("option");
        country14.text = "亞洲不含日本        ";
        country14.value = "亞洲不含日本        ";
        country.add(country14);
        var country15 = document.createElement("option");
        country15.text = "澳洲                ";
        country15.value = "澳洲                ";
        country.add(country15);
        var country16 = document.createElement("option");
        country16.text = "英國                ";
        country16.value = "英國                ";
        country.add(country16);
        var country17 = document.createElement("option");
        country17.text = "亞洲太平洋(含日本)  ";
        country17.value = "亞洲太平洋(含日本)  ";
        country.add(country17);
        var country18 = document.createElement("option");
        country18.text = "新興歐洲            ";
        country18.value = "新興歐洲            ";
        country.add(country18);
        var country19 = document.createElement("option");
        country19.text = "北美                ";
        country19.value = "北美                ";
        country.add(country19);
        var country20 = document.createElement("option");
        country20.text = "亞洲                ";
        country20.value = "亞洲                ";
        country.add(country20);
        var country21 = document.createElement("option");
        country21.text = "印尼                ";
        country21.value = "印尼                ";
        country.add(country21);
        var country22 = document.createElement("option");
        country22.text = "香港                ";
        country22.value = "香港                ";
        country.add(country22);
        var country23 = document.createElement("option");
        country23.text = "歐元國家            ";
        country23.value = "歐元國家            ";
        country.add(country23);
        var country24 = document.createElement("option");
        country24.text = "泰國                ";
        country24.value = "泰國                ";
        country.add(country24);
        var country25 = document.createElement("option");
        country25.text = "韓國                ";
        country25.value = "韓國                ";
        country.add(country25);
        var country26 = document.createElement("option");
        country26.text = "星馬                ";
        country26.value = "星馬                ";
        country.add(country26);
        var country27 = document.createElement("option");
        country27.text = "新加坡              ";
        country27.value = "新加坡              ";
        country.add(country27);
        var country28 = document.createElement("option");
        country28.text = "馬來西亞            ";
        country28.value = "馬來西亞            ";
        country.add(country28);
        var country29 = document.createElement("option");
        country29.text = "北歐                ";
        country29.value = "北歐                ";
        country.add(country29);
        var country30 = document.createElement("option");
        country30.text = "南歐                ";
        country30.value = "南歐                ";
        country.add(country30);
        var country31 = document.createElement("option");
        country31.text = "德國                ";
        country31.value = "德國                ";
        country.add(country31);
        var country32 = document.createElement("option");
        country32.text = "法國                ";
        country32.value = "法國                ";
        country.add(country32);
        var country33 = document.createElement("option");
        country33.text = "義大利              ";
        country33.value = "義大利              ";
        country.add(country33);
        var country34 = document.createElement("option");
        country34.text = "瑞士                ";
        country34.value = "瑞士                ";
        country.add(country34);
        var country35 = document.createElement("option");
        country35.text = "歐洲不含英國        ";
        country35.value = "歐洲不含英國        ";
        country.add(country35);
        var country36 = document.createElement("option");
        country36.text = "亞太                ";
        country36.value = "亞太                ";
        country.add(country36);
        var country37 = document.createElement("option");
        country37.text = "巴西                ";
        country37.value = "巴西                ";
        country.add(country37);
        var country38 = document.createElement("option");
        country38.text = "俄羅斯              ";
        country38.value = "俄羅斯              ";
        country.add(country38);
        var country39 = document.createElement("option");
        country39.text = "東協                ";
        country39.value = "東協                ";
        country.add(country39);
        var country40 = document.createElement("option");
        country40.text = "菲律賓              ";
        country40.value = "菲律賓              ";
        country.add(country40);
        var country41 = document.createElement("option");
        country41.text = "亞澳                ";
        country41.value = "亞澳                ";
        country.add(country41);
        var country42 = document.createElement("option");
        country42.text = "中東歐非            ";
        country42.value = "中東歐非            ";
        country.add(country42);
        var country43 = document.createElement("option");
        country43.text = "歐美                ";
        country43.value = "歐美                ";
        country.add(country43);
        var country44 = document.createElement("option");
        country44.text = "東歐                ";
        country44.value = "東歐                ";
        country.add(country44);
        var country45 = document.createElement("option");
        country45.text = "美洲                ";
        country45.value = "美洲                ";
        country.add(country45);
    }
}

function fundAdvanceSearchSubmit() {
    sql = "";
    if (document.getElementById("invest_place").value=="invest_place_in") {
      sql = sql + "SELECT * FROM web_data.fund_performance where 1=1 ";
    } else if (document.getElementById("invest_place").value=="all"){
      sql = sql + "SELECT * FROM web_data.foreign_fund_performance LEFT JOIN web_data.fund_performance ON foreign_fund_performance.code = fund_performance.code where 1=1 ";
    } else if (document.getElementById("invest_place").value=="invest_place_out"){
      sql = sql + "SELECT * FROM web_data.foreign_fund_performance where 1=1 ";
    }
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

    if (document.getElementById("country").value == "taiwan") {
      sql = sql + "and (invest_place = '投資國內'  or invest_place='投資國內外') ";
    } else {
      sql = sql + "and invest_place = '" + document.getElementById("country").value + "' ";
    }


    sql = sql + "and currency = '" + document.getElementById("currency").value + "' ";
    

    document.getElementById("sql").value = sql;
    alert(document.getElementById("sql").value);
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


