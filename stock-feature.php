<?php
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
?>
<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/fundsearch.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <style>
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
div.tab button {
    background-color: inherit;
    float: center;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
div.tab button:hover {
    background-color: #ddd;
}
div.tab button.active {
    background-color: #ccc;
}
.tabcontent {
    display: none;
    padding: 6px ;
    border: 1px solid #ccc;
    border-top: none;
}
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
</head>
<div class="container">
<div class="tab" >
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><img src="img/stock-feature-good.jpg" height="30">型態特色榜</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"><img src="img/stock-feature-bad.jpg" height="30">型態暗黑榜</button>
</div>

<div id="London" class="tabcontent">
<div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">持續多頭</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result1=mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=1 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
    for($i=1;$i<=3;$i++){
        $rs1=mysql_fetch_row($result1);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs1[0];?></td>
                        <td class="td"><?php echo $rs1[1];?></td>
                        <td class="td"><?php echo $rs1[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">發散三角轉多頭(頭肩底)</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result2=mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=3 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
    for($i=1;$i<=3;$i++){
        $rs2=mysql_fetch_row($result2);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs2[0];?></td>
                        <td class="td"><?php echo $rs2[1];?></td>
                        <td class="td"><?php echo $rs2[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">持續多頭回檔</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result3=mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=9 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
    for($i=1;$i<=3;$i++){
        $rs3=mysql_fetch_row($result3);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs3[0];?></td>
                        <td class="td"><?php echo $rs3[1];?></td>
                        <td class="td"><?php echo $rs3[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">三角收斂轉多頭回檔(W底) </th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名( / 1560)</th>
                    </tr>
<?php
$result4=mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=11 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
    for($i=1;$i<=3;$i++){
        $rs4=mysql_fetch_row($result4);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs4[0];?></td>
                        <td class="td"><?php echo $rs4[1];?></td>
                        <td class="td"><?php echo $rs4[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
        
    </table>
</div>
</div>

<div id="Paris" class="tabcontent">
  <div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">今日最佳表現</th>
                        <th class="th">今日漲幅</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result1=mysql_query("SELECT all_fund_performance.name,roc,Return1y FROM web_data.all_fund_performance where not roc='999999' and not Return1y='999999' order by roc desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs1=mysql_fetch_row($result1);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs1[0];?></td>
                        <td class="td"><?php echo $rs1[1];?></td>
                        <td class="td"><?php echo $rs1[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月波動最小</th>
                        <th class="th">近一月標準差</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result2=mysql_query("SELECT all_fund_performance.name,std1m,Return1y FROM web_data.all_fund_performance where not std1m='999999' and not Return1y='999999' order by std1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs2=mysql_fetch_row($result2);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs2[0];?></td>
                        <td class="td"><?php echo $rs2[1];?></td>
                        <td class="td"><?php echo $rs2[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月賺很大</th>
                        <th class="th">近一月報酬率</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result3=mysql_query("SELECT all_fund_performance.name,Return1m,Return1y FROM web_data.all_fund_performance where not Return1m='999999' and not Return1y='999999' order by Return1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs3=mysql_fetch_row($result3);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs3[0];?></td>
                        <td class="td"><?php echo $rs3[1];?></td>
                        <td class="td"><?php echo $rs3[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">夏普指數</th>
                        <th class="th">年化Sharpe</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result4=mysql_query("SELECT all_fund_performance.name,sr1y,Return1y FROM web_data.all_fund_performance where not sr1y='999999' and not Return1y='999999' order by sr1y desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs4=mysql_fetch_row($result4);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs4[0];?></td>
                        <td class="td"><?php echo $rs4[1];?></td>
                        <td class="td"><?php echo $rs4[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
        
    </table>
</div>
</div>




<div class="tab" >
  <button class="tablinks" onclick="openCity(event, 'good')" id="defaultOpen1"><img src="img/stock-feature-good.jpg" height="30">K棒組合特色榜</button>
  <button class="tablinks" onclick="openCity(event, 'bad')"><img src="img/stock-feature-bad.jpg" height="30">K棒組合特色榜</button>
</div>

<div id="good" class="tabcontent">
<div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">今日最佳表現</th>
                        <th class="th">今日漲幅</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result1=mysql_query("SELECT all_fund_performance.name,roc,Return1y FROM web_data.all_fund_performance where not roc='999999' and not Return1y='999999' order by roc desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs1=mysql_fetch_row($result1);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs1[0];?></td>
                        <td class="td"><?php echo $rs1[1];?></td>
                        <td class="td"><?php echo $rs1[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月波動最小</th>
                        <th class="th">近一月標準差</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result2=mysql_query("SELECT all_fund_performance.name,std1m,Return1y FROM web_data.all_fund_performance where not std1m='999999' and not Return1y='999999' order by std1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs2=mysql_fetch_row($result2);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs2[0];?></td>
                        <td class="td"><?php echo $rs2[1];?></td>
                        <td class="td"><?php echo $rs2[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月賺很大</th>
                        <th class="th">近一月報酬率</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result3=mysql_query("SELECT all_fund_performance.name,Return1m,Return1y FROM web_data.all_fund_performance where not Return1m='999999' and not Return1y='999999' order by Return1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs3=mysql_fetch_row($result3);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs3[0];?></td>
                        <td class="td"><?php echo $rs3[1];?></td>
                        <td class="td"><?php echo $rs3[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">夏普指數</th>
                        <th class="th">年化Sharpe</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result4=mysql_query("SELECT all_fund_performance.name,sr1y,Return1y FROM web_data.all_fund_performance where not sr1y='999999' and not Return1y='999999' order by sr1y desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs4=mysql_fetch_row($result4);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs4[0];?></td>
                        <td class="td"><?php echo $rs4[1];?></td>
                        <td class="td"><?php echo $rs4[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
        
    </table>
</div>
</div>

<div id="bad" class="tabcontent">
  <div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">今日最佳表現</th>
                        <th class="th">今日漲幅</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result1=mysql_query("SELECT all_fund_performance.name,roc,Return1y FROM web_data.all_fund_performance where not roc='999999' and not Return1y='999999' order by roc desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs1=mysql_fetch_row($result1);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs1[0];?></td>
                        <td class="td"><?php echo $rs1[1];?></td>
                        <td class="td"><?php echo $rs1[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月波動最小</th>
                        <th class="th">近一月標準差</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result2=mysql_query("SELECT all_fund_performance.name,std1m,Return1y FROM web_data.all_fund_performance where not std1m='999999' and not Return1y='999999' order by std1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs2=mysql_fetch_row($result2);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs2[0];?></td>
                        <td class="td"><?php echo $rs2[1];?></td>
                        <td class="td"><?php echo $rs2[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">近一月賺很大</th>
                        <th class="th">近一月報酬率</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result3=mysql_query("SELECT all_fund_performance.name,Return1m,Return1y FROM web_data.all_fund_performance where not Return1m='999999' and not Return1y='999999' order by Return1m desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs3=mysql_fetch_row($result3);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs3[0];?></td>
                        <td class="td"><?php echo $rs3[1];?></td>
                        <td class="td"><?php echo $rs3[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">夏普指數</th>
                        <th class="th">年化Sharpe</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result4=mysql_query("SELECT all_fund_performance.name,sr1y,Return1y FROM web_data.all_fund_performance where not sr1y='999999' and not Return1y='999999' order by sr1y desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs4=mysql_fetch_row($result4);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $rs4[0];?></td>
                        <td class="td"><?php echo $rs4[1];?></td>
                        <td class="td"><?php echo $rs4[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:rankPerformSubmit('fundSearch/fundRank/fundRankType4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
        
    </table>
</div>
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
</div>
