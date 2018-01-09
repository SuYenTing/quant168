<div class="tab" >
  <button class="tablinksKbar" onclick="openKbar(event, 'good')" id="defaultKbarOpen"><img src="img/stock-feature-good.jpg" height="30">K棒組合特色榜</button>
  <button class="tablinksKbar" onclick="openKbar(event, 'bad')"><img src="img/stock-feature-bad.jpg" height="30">K棒組合特色榜</button>
</div>

<div id="good" class="tabcontentKbar">
<div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">長紅貫穿</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result1 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%長紅貫穿%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs1 = mysql_fetch_row($result1);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs1[0] ?>"><?php echo $rs1[0] ?></a></td>
                        <td class="td"><?php echo $rs1[1]; ?></td>
                        <td class="td"><?php echo $rs1[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarGood1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">強旭日東昇</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result2 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%強旭日東昇%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs2 = mysql_fetch_row($result2);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs2[0] ?>"><?php echo $rs2[0] ?></a></td>
                        <td class="td"><?php echo $rs2[1]; ?></td>
                        <td class="td"><?php echo $rs2[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarGood2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">光明在望</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result3 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%光明在望%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs3 = mysql_fetch_row($result3);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs3[0] ?>"><?php echo $rs3[0] ?></a></td>
                        <td class="td"><?php echo $rs3[1]; ?></td>
                        <td class="td"><?php echo $rs3[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarGood3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">長紅吞噬</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result4 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%長紅吞噬%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs4 = mysql_fetch_row($result4);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs4[0] ?>"><?php echo $rs4[0] ?></a></td>
                        <td class="td"><?php echo $rs4[1]; ?></td>
                        <td class="td"><?php echo $rs4[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarGood4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>



    </table>
</div>
</div>

<div id="bad" class="tabcontentKbar">
  <div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">長黑貫穿</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result1 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%長黑貫穿%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs1 = mysql_fetch_row($result1);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs1[0] ?>"><?php echo $rs1[0] ?></a></td>
                        <td class="td"><?php echo $rs1[1]; ?></td>
                        <td class="td"><?php echo $rs1[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarBad1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">強烏雲罩頂</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result2 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%強烏雲罩頂%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs2 = mysql_fetch_row($result2);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs2[0] ?>"><?php echo $rs2[0] ?></a></td>
                        <td class="td"><?php echo $rs2[1]; ?></td>
                        <td class="td"><?php echo $rs2[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarBad2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">不懷好意</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result3 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%不懷好意%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs3 = mysql_fetch_row($result3);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs3[0] ?>"><?php echo $rs3[0] ?></a></td>
                        <td class="td"><?php echo $rs3[1]; ?></td>
                        <td class="td"><?php echo $rs3[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarBad3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">長黑吞噬</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名(  /1560)</th>
                    </tr>
<?php
$result4 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where KBar_combination like'%長黑吞噬%' and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
for ($i = 1; $i <= 3; $i++) {
	$rs4 = mysql_fetch_row($result4);
	?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs4[0] ?>"><?php echo $rs4[0] ?></a></td>
                        <td class="td"><?php echo $rs4[1]; ?></td>
                        <td class="td"><?php echo $rs4[2]; ?></td>
                    </tr>
<?php }?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureKbar/stockFeatureKbarBad4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>



    </table>
</div>
</div>





<script>
function openKbar(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontentKbar");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinksKbar");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultKbarOpen").click();
</script>