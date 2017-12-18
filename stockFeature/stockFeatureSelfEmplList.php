<div class="tab" >
  <h3><img src="img/stock-feature-good.jpg" height="30">自營商動向排行榜</h3>
</div>

  <div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">連續買超</th>
                        <th class="th">天數</th>
                        <th class="th">淨買超金額</th>
                    </tr>
<?php
$result1=mysql_query("SELECT ins_bs_con.code,d_con_buy_days,d_net_buy_value FROM web_data.ins_bs_con where  ins_bs_con.date=(select max(ins_bs_con.date) from web_data.ins_bs_con) order by d_con_buy_days desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs1=mysql_fetch_row($result1);
?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs[0] ?>"><?php echo $rs[0] ?></td>
                        <td class="td"><?php echo $rs1[1];?></td>
                        <td class="td"><?php echo $rs1[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureSelfEmpl/stockFeatureSelfEmpl1.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">淨買超張數</th>
                        <th class="th">張數</th>
                        <th class="th">淨買超金額</th>
                    </tr>
<?php
$result2=mysql_query("SELECT ins_bs_con.code,d_net_buy_volume,d_net_buy_value FROM web_data.ins_bs_con where  ins_bs_con.date=(select max(ins_bs_con.date) from web_data.ins_bs_con) order by d_net_buy_volume desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs2=mysql_fetch_row($result2);
?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs[0] ?>"><?php echo $rs[0] ?></td>
                        <td class="td"><?php echo $rs2[1];?></td>
                        <td class="td"><?php echo $rs2[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureSelfEmpl/stockFeatureSelfEmpl2.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">連續賣超</th>
                        <th class="th">天數</th>
                        <th class="th">淨買超金額</th>
                    </tr>
<?php
$result3=mysql_query("SELECT ins_bs_con.code,d_con_sell_days,d_net_buy_value FROM web_data.ins_bs_con where  ins_bs_con.date=(select max(ins_bs_con.date) from web_data.ins_bs_con) order by d_con_sell_days desc limit 3;");
    for($i=1;$i<=3;$i++){
        $rs3=mysql_fetch_row($result3);
?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs[0] ?>"><?php echo $rs[0] ?></td>
                        <td class="td"><?php echo $rs3[1];?></td>
                        <td class="td"><?php echo $rs3[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureSelfEmpl/stockFeatureSelfEmpl3.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">淨賣超張數</th>
                        <th class="th">張數</th>
                        <th class="th">淨買超金額</th>
                    </tr>
<?php
$result4=mysql_query("SELECT ins_bs_con.code,d_net_buy_volume,d_net_buy_value FROM web_data.ins_bs_con where  ins_bs_con.date=(select max(ins_bs_con.date) from web_data.ins_bs_con) order by d_net_buy_volume  limit 3;");
    for($i=1;$i<=3;$i++){
        $rs4=mysql_fetch_row($result4);
?>
                    <tr class="tr">
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs[0] ?>"><?php echo $rs[0] ?></td>
                        <td class="td"><?php echo $rs4[1];?></td>
                        <td class="td"><?php echo $rs4[2];?></td>
                    </tr>
<?php } ?>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;"><a href="javascript:moreInformSubmit('stockFeature/stockFeatureSelfEmpl/stockFeatureSelfEmpl4.php');">更多...</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        
        
    </table>
</div>