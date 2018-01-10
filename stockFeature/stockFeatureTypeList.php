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
$result1 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=1 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeGood1.php');">更多...</a></td>
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
$result2 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=3 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeGood2.php');">更多...</a></td>
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
$result3 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=9 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeGood3.php');">更多...</a></td>
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
$result4 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=11 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeGood4.php');">更多...</a></td>
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
                        <th class="th thBigWord">三角收斂轉空頭(M頭)</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名( / 1560)</th>
                    </tr>
<?php
$result1 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=6 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeBad1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">持續空頭 </th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名( / 1560)</th>
                    </tr>
<?php
$result2 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=8 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeBad2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">持續空頭回檔 </th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名( / 1560)</th>
                    </tr>
<?php
$result3 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=14 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeBad3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">發散三角轉空頭回檔(圓弧頂)</th>
                        <th class="th">股價</th>
                        <th class="th">強勢排名( / 1560)</th>
                    </tr>
<?php
$result4 = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=16 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureType/stockFeatureTypeBad4.php');">更多...</a></td>
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