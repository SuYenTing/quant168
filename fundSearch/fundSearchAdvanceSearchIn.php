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
<h2>境內基金</h2>
<table>
    <tr>
        <th colspan="2">基金類型</th>
        <th colspan="2">基金風險評等</th>
    </tr>
    <tr>
        <td>基金標的</td>
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
        <td>投資區域</td>
        <td>
            <select name="country" id="country">
                <option value="all">不限</option>
                <option value="taiwan">台灣</option>
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
        <td>計價幣別</td>
        <td>
            <select id="currency" name="currency">
                <option value="all">不限</option>
                <option value="NTD">NTD</option>
                <option value="RMB">RMB</option>
                <option value="USD">USD</option>
                <option value="AUD">AUD</option>
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
        <td colspan="4">
            <input class="button" type="button" value="確認送出" onclick="fundAdvanceSearchSubmit()">
        </td>
    </tr>
</table>
<script type="text/javascript">
function fundAdvanceSearchSubmit() {
    sql = "";
    if (document.getElementById("subject").value != "all") {
        sql = sql + "and subject = '" + document.getElementById("subject").value + "' ";
    }

    if (document.getElementById("currency").value != "all") {
        sql = sql + "and currency = '" + document.getElementById("currency").value + "' ";
    }
    if (document.getElementById("std1y").value != "all") {
        if (document.getElementById("std1y").value == "std1y1") {
            sql = sql + "and std1y >=0  and std1y <0.3 ";
        } else if (document.getElementById("std1y").value == "std1y2") {
            sql = sql + "and std1y >=0.3  and std1y <0.6 ";
        } else if (document.getElementById("std1y").value == "std1y3") {
            sql = sql + "and std1y >=0.6  and std1y <0.9 ";
        } else if (document.getElementById("std1y").value == "std1y4") {
            sql = sql + "and std1y >=0.9  ";
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

    document.getElementById("sql").value = "SELECT fund_performance.name,net_value,fund_performance.date,roc,fund_performance.change,currency,std1y,sr1y,risk_level,Return3m,Return6m,Return1y,Return3y,Return5y,Returnall,adjSR,BurkeRatio,BernardoLedoitRatio,DRatio,MDD,OmegaSR,PainRatio,SkewnessKurtosisRatio,SortinoRatio,UpsidePotentialRatio FROM web_data.fund_performance where 1=1 " + sql;
    //alert(document.getElementById("sql").value);
    document.getElementById("searchType").value = "advanceResult";
    document.getElementById("fundsearch").submit();
}
</script>