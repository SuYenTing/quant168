<form id="fundsearch" name="fundsearch" method="post" action="fundsearch.php">
    <input id="tags" placeholder="請輸入欲搜尋之基金名稱" name="name" value="<?php echo $_POST['name'];?>">
    <input class="button" type="button" name="button" id="name" onclick="normalSearch()" value="搜尋">
    <input type="hidden" name="searchType" id="searchType">
    <input type="hidden" name="sql" id="sql">
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
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
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
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
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
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
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
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td class="td">群益店頭市場</td>
                        <td class="td">1.21</td>
                        <td class="td">17.44</td>
                    </tr>
                    <tr class="tr">
                        <td colspan="3" style="text-align:right;color: orange;">更多...</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<p><img src="img/fundsearch/fundSubTitle.png" height="70"></p>
<table align="center" style="width:100%;">
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

}
</script>