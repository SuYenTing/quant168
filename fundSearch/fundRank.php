<form id="fundRankForm" name="fundRankForm" method="post" action="fundsearch.php">
    <input type="hidden" name="searchType" id="searchType" value="detailRank">
    <input type="hidden" name="rankType" id="rankType">
    <input type="hidden" name="rankValue" id="rankValue">
</form>
<div style="background-color:#f1eaee;padding:10px;margin-bottom:5px;text-align:center;">
    <p style="text-align:center;"><img src="img/fundsearch/fundRankTitle.png" height="70"></p>
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
                        <th class="th thBigWord">近1月波動最小</th>
                        <th class="th">全期間標準差</th>
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
                        <th class="th thBigWord">近1月賺很大</th>
                        <th class="th">近三年報酬率</th>
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
<p align="center"><img src="img/fundsearch/fundSubTitle.png" height="70"></p>
<table align="center" style="width:80%;">
    <tr>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass1.php');"><img src="img/fundsearch/fund1.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass2.php');"><img src="img/fundsearch/fund2.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass3.php');"><img src="img/fundsearch/fund3.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass4.php');"><img src="img/fundsearch/fund4.png" height="210" width="210"></a></td>
    </tr>
    <tr>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass5.php');"><img src="img/fundsearch/fund5.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass6.php');"><img src="img/fundsearch/fund6.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass7.php');"><img src="img/fundsearch/fund7.png" height="210" width="210"></a></td>
        <td><a href="javascript:rankClassSubmit('fundSearch/fundRank/fundRankClass8.php');"><img src="img/fundsearch/fund8.png" height="210" width="210"></a></td>
    </tr>
</table>
<script type="text/javascript">
function rankPerformSubmit(classname) {
    document.getElementById("rankType").value = "advance";
    document.getElementById("rankValue").value = classname;
    document.getElementById("fundRankForm").submit();
}
function rankClassSubmit(classname) {
    //document.getElementById("rankType").value = "rankClass";
    document.getElementById("rankValue").value = classname;
    document.getElementById("fundRankForm").submit();
}
</script>