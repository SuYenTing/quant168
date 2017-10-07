<style>
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
<h2>全部基金</h2>
<table>
    <tr>
        <th colspan="2">基金類型</th>
        <th colspan="2">基金風險評等</th>
    </tr>
    <tr>
        <td>境外/境內</td>
        <td>
            <select name="invest_type" id="invest_type" >
                <option value="all">全部基金</option>
                <option value="境內">境內</option>
                <option value="境外">境外</option>
            </select>
        </td>
        <td>一年年化標準差</td>
        <td>
            <select name="std1y" id="std1y">
                <option value="all">不限</option>
                <option value="std1y1">0 &#60;=SD &#60;0.3</option>
                <option value="std1y2">0.3 &#60;=SD &#60;0.6</option>
                <option value="std1y3">0.6 &#60;=SD &#60;0.9</option>
                <option value="std1y4">0.9 &#60;=SD</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>投資標的</td>
        <td>
            <select name="subject" id="subject">
                <option value="all">不限</option>
                <option value="貨幣">貨幣</option>
                <option value="股票">股票</option>
                <option value="股票+債券">股票+債券</option>
                <option value="小型股">小型股</option>
                <option value="科技股">科技股</option>
                <option value="指數型基金">指數型基金</option>
                <option value="債券">債券</option>
                <option value="基金">基金</option>
                <option value="股票型">股票型</option>
                <option value="債券型">債券型</option>
                <option value="平衡型">平衡型</option>
                <option value="醫療生化股">醫療生化股</option>
                <option value="房地產">房地產</option>
                <option value="能源股票">能源股票</option>
                <option value="認股權証/轉換公司債">認股權証/轉換公司債</option>
                <option value="指數股票型基金">指數股票型基金</option>
                <option value="貨幣型">貨幣型</option>
                <option value="貴重金屬股票">貴重金屬股票</option>
                <option value="其他">其他</option>
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
                <option value="all">不限</option>
                <option value="台灣">台灣</option>
                <option value="全球">全球</option>
                <option value="已開發歐洲">已開發歐洲</option>
                <option value="美國">美國</option>
                <option value="日本                ">日本                </option>
                <option value="歐洲                ">歐洲                </option>
                <option value="亞太(不含日本)      ">亞太(不含日本)      </option>
                <option value="歐盟國家            ">歐盟國家            </option>
                <option value="新興市場            ">新興市場            </option>
                <option value="拉丁美洲            ">拉丁美洲            </option>
                <option value="印度                ">印度                </option>
                <option value="新興拉丁美洲        ">新興拉丁美洲        </option>
                <option value="中國大陸及香港      ">中國大陸及香港      </option>
                <option value="已開發市場          ">已開發市場          </option>
                <option value="亞洲不含日本        ">亞洲不含日本        </option>
                <option value="澳洲                ">澳洲                </option>
                <option value="英國                ">英國                </option>
                <option value="亞洲太平洋(含日本)">亞洲太平洋(含日本)</option>
                <option value="新興歐洲            ">新興歐洲            </option>
                <option value="北美                ">北美                </option>
                <option value="亞洲                ">亞洲                </option>
                <option value="印尼                ">印尼                </option>
                <option value="香港                ">香港                </option>
                <option value="歐元國家            ">歐元國家            </option>
                <option value="泰國                ">泰國                </option>
                <option value="韓國                ">韓國                </option>
                <option value="星馬                ">星馬                </option>
                <option value="新加坡              ">新加坡              </option>
                <option value="馬來西亞            ">馬來西亞            </option>
                <option value="北歐                ">北歐                </option>
                <option value="南歐                ">南歐                </option>
                <option value="德國                ">德國                </option>
                <option value="法國                ">法國                </option>
                <option value="義大利              ">義大利              </option>
                <option value="瑞士                ">瑞士                </option>
                <option value="歐洲不含英國        ">歐洲不含英國        </option>
                <option value="亞太                ">亞太                </option>
                <option value="巴西                ">巴西                </option>
                <option value="俄羅斯              ">俄羅斯              </option>
                <option value="東協                ">東協                </option>
                <option value="菲律賓              ">菲律賓              </option>
                <option value="亞澳                ">亞澳                </option>
                <option value="中東歐非            ">中東歐非            </option>
                <option value="歐美                ">歐美                </option>
                <option value="東歐                ">東歐                </option>
                <option value="美洲                ">美洲                </option>
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
                <option value="all">不限</option>
                <option value="NTD">台幣</option>
                <option value="美元  ">美元  </option>
                <option value="歐元  ">歐元  </option>
                <option value="澳幣  ">澳幣  </option>
                <option value="日圓  ">日圓  </option>
                <option value="南非幣">南非幣</option>
                <option value="紐幣  ">紐幣  </option>
                <option value="加幣  ">加幣  </option>
                <option value="英鎊  ">英鎊  </option>
                <option value="港幣  ">港幣  </option>
                <option value="瑞典幣">瑞典幣</option>
                <option value="瑞法郎">瑞法郎</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:center;">
            <input class="button" type="button" value="確認送出" onclick="fundAdvanceSearchSubmit()">
        </td>
    </tr>
</table>
<script type="text/javascript">
function fundAdvanceSearchSubmit() {
    sql = "";
    if (document.getElementById("invest_type").value != "all") {
        sql = sql + "and all_fund_performance.classify='" + document.getElementById("invest_type").value + "' ";
    }
    if (document.getElementById("subject").value != "all") {
        sql = sql + "and all_fund_performance.subject='" + document.getElementById("subject").value + "' ";
    }
    if (document.getElementById("country").value != "all") {
        sql = sql + "and all_fund_performance.invest_place='" + document.getElementById("country").value + "' ";
    }
    if (document.getElementById("currency").value != "all") {
        sql = sql + "and all_fund_performance.currency='" + document.getElementById("currency").value + "' ";
    }
    if (document.getElementById("std1y").value != "all") {
        if (document.getElementById("std1y").value == "std1y1") {
            sql = sql + "and (all_fund_performance.std1y >=0  and all_fund_performance.std1y <0.3)";
        } else if (document.getElementById("std1y").value == "std1y2") {
            sql = sql + "and (all_fund_performance.std1y >=0.3  and all_fund_performance.std1y <0.6)";
        } else if (document.getElementById("std1y").value == "std1y3") {
            sql = sql + "and (all_fund_performance.std1y >=0.6  and all_fund_performance.std1y <0.9)";
        } else if (document.getElementById("std1y").value == "std1y4") {
            sql = sql + "and all_fund_performance.std1y >=0.9 ";
        }
    }
    if (document.getElementById("sr1y").value != "all") {
        if (document.getElementById("sr1y").value == "sr1y1") {
            sql = sql + "and all_fund_performance.sr1y <0 ";
        } else if (document.getElementById("sr1y").value == "sr1y2") {
            sql = sql + "and all_fund_performance.sr1y >=0   and all_fund_performance.sr1y <1  ";
        } else if (document.getElementById("sr1y").value == "sr1y3") {
            sql = sql + "and all_fund_performance.sr1y >=1  ";
        }
    }
    if (document.getElementById("risk_level").value != "all") {
        sql = sql + "and all_fund_performance.risk_level='" + document.getElementById("risk_level").value + "' ";
        
    }
    
    document.getElementById("sql").value = "SELECT all_fund_performance.name,all_fund_performance.net_value,all_fund_performance.date,all_fund_performance.roc,all_fund_performance.change,all_fund_performance.currency,all_fund_performance.std1y,all_fund_performance.sr1y,all_fund_performance.risk_level,all_fund_performance.Return3m,all_fund_performance.Return6m,all_fund_performance.Return1y,all_fund_performance.Return3y,all_fund_performance.Return5y,all_fund_performance.Returnall,all_fund_performance.adjSR,all_fund_performance.BurkeRatio,all_fund_performance.BernardoLedoitRatio,all_fund_performance.DRatio,all_fund_performance.MDD,all_fund_performance.OmegaSR,all_fund_performance.PainRatio,all_fund_performance.SkewnessKurtosisRatio,all_fund_performance.SortinoRatio,all_fund_performance.UpsidePotentialRatio FROM web_data.all_fund_performance where 1=1 "+sql;
    //alert(document.getElementById("sql").value);
    document.getElementById("searchType").value = "advanceResult";
    document.getElementById("fundsearch").submit();
}
</script>