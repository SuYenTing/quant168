<form id="fundRankForm" name="fundRankForm" method="post" action="fundsearch.php">
    <input type="hidden" name="rankType" id="rankType">
    <input type="hidden" name="rankValue" id="rankValue">
</form>
<div style="background-color:#f1eaee;;padding:10px;margin-bottom:5px;text-align:center;">
    <p style="text-align:center;"><img src="img/fundsearch/fundRankTitle.png" height="70"></p>
    <table align="center" style="width:80%;">
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">今日
                            <select class="selectOption" name="rankPerform" id="rankPerform" onchange="rankPerformSubmit()">
                                <option value="best">最佳</option>
                                <option value="worst">最差</option>
                            </select>表現</th>
                        <th class="th">今日漲幅</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result1=mysql_query("SELECT all_fund_performance.name,roc,Return1y FROM web_data.all_fund_performance order by roc desc limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;">更多...</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">
                            <select class="selectOption" name="invest_type" id="invest_type">
                                <option>近1月</option>
                                <option>近3月</option>
                                <option>近6月</option>
                                <option>近1年</option>
                                <option>近1年</option>
                                <option>近3年</option>
                                <option>近5年</option>
                                <option>全期間</option>
                            </select>波動最小</th>
                        <th class="th">全期間標準差</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result2=mysql_query("SELECT all_fund_performance.name,std1m,Return1y FROM web_data.all_fund_performance order by std1m desc limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;">更多...</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">
                            <select class="selectOption" name="invest_type" id="invest_type">
                                <option>近1月</option>
                                <option>近3月</option>
                                <option>近6月</option>
                                <option>近1年</option>
                                <option>近1年</option>
                                <option>近3年</option>
                                <option>近5年</option>
                                <option>全期間</option>
                            </select>賺很大</th>
                        <th class="th">近三年報酬率</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result3=mysql_query("SELECT all_fund_performance.name,Return1m,Return1y FROM web_data.all_fund_performance order by Return1m desc limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;">更多...</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table" align="center" style="width:80%;">
                    <tr class="tr">
                        <th class="th thBigWord">
                            <select class="selectOption" name="invest_type" id="invest_type">
                                <option>夏普指數</option>
                                <option>調整後夏普(adjSharpe)</option>
                                <option>索提諾指數(Sortino)</option>
                                <option>最大回落(MaxDrawdown)</option>
                                <option>Upside Potential Ratio</option>
                                <option>Burke Ratio</option>
                            </select>
                        </th>
                        <th class="th">年化Sharpe</th>
                        <th class="th">近一年報酬率</th>
                    </tr>
<?php
$result4=mysql_query("SELECT all_fund_performance.name,sr1y,Return1y FROM web_data.all_fund_performance order by sr1y desc limit 3;");
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
                        <td colspan="3" style="text-align:right;color: orange;">更多...</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<p align="center"><img src="img/fundsearch/fundSubTitle.png" height="70"></p>
<table align="center" style="width:80%;">
    <tr>
        <td><img src="img/fundsearch/fund1.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund2.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund3.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund4.png" height="210" width="210"></td>
    </tr>
    <tr>
        <td><img src="img/fundsearch/fund5.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund6.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund7.png" height="210" width="210"></td>
        <td><img src="img/fundsearch/fund8.png" height="210" width="210"></td>
    </tr>
</table>
<script type="text/javascript">
function rankPerformSubmit() {
    document.getElementById("rankType").value = "advance";
    document.getElementById("rankType").value = "advance";
    document.getElementById("fundRankForm").submit();
}
</script>