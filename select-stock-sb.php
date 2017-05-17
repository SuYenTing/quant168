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
<style>
.container {
    width: 80%;
}

.tabletitle {
    background-color: #75b3f0;
}

.tablesubtit {
    background-color: #d1e6fa;
}
</style>
<div class="container">
    <h1>精選個股</h1>
    <table>
        <tr class="tabletitle">
            <th width="30%">選擇條件</th>
            <th width="30%">搜尋條件</th>
            <th width="30%">
                <button onclick="selectStockSbFormSubmit()">確定送出</button>
            </th>
        </tr>
        <tr>
            <td valign="top">
                <table>
                    <tr>
                        <th colspan="2" class="tablesubtit">
                            <h3>基本面</h3></th>
                    </tr>
                    <tr>
                        <td>
                            <select id="sbtype">
                                <option value="profitability " selected>獲利</option>
                                <option value="safety ">成長</option>
                                <option value="payout ">股利</option>
                                <option value="growth ">穩健</option>
                                <option value="quality ">品質</option>
                            </select>
                            分數
                            <select id="sbbigsmall">
                                <option value="> " selected>大於</option>
                                <option value="< ">小於</option>
                            </select>
                            <select id="sbscore">
                                <option value="55 " selected>55</option>
                                <option value="60 ">60</option>
                                <option value="65 ">65</option>
                                <option value="70 ">70</option>
                                <option value="75 ">75</option>
                                <option value="80 ">80</option>
                                <option value="85 ">85</option>
                                <option value="90 ">90</option>
                                <option value="95 ">95</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="addcondition('sb')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="tablesubtit">
                            <h3>技術面</h3></th>
                    </tr>
                    <tr>
                        <td>波浪型態
                            <select id="typeSignal">
                                <option value="1" selected>持續多頭</option>
                                <option value="2">多頭轉發散三角</option>
                                <option value="3">發散三角轉多頭</option>
                                <option value="4">持續發散三角</option>
                                <option value="5">持續三角收斂</option>
                                <option value="6">三角收斂轉空頭</option>
                                <option value="7">空頭轉三角收斂</option>
                                <option value="8">持續空頭</option>
                                <option value="9">持續多頭回檔</option>
                                <option value="10">多頭轉三角收斂回檔</option>
                                <option value="11">三角收斂轉多頭回檔</option>
                                <option value="12">持續三角收斂回檔</option>
                                <option value="13">持續發散三角回檔</option>
                                <option value="14">發散三角轉空頭回檔</option>
                                <option value="15">空頭轉發散三角回檔</option>
                                <option value="16">持續空頭回檔</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="addcondition('typeSignal')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="MA1">
                                <option value="today_price" selected>當日收盤價</option>
                                <option value="MA3">MA3</option>
                                <option value="MA5">MA5</option>
                                <option value="MA10">MA10</option>
                                <option value="MA20">MA20</option>
                                <option value="MA60">MA60</option>
                                <option value="MA120">MA120</option>
                                <option value="MA240">MA240</option>
                            </select>
                            分數
                            <select id="maBigSmall">
                                <option value=">" selected>大於</option>
                                <option value="<">小於</option>
                            </select>
                            <select id="MA2">
                                <option value="today_price" selected>當日收盤價</option>
                                <option value="MA3">MA3</option>
                                <option value="MA5">MA5</option>
                                <option value="MA10">MA10</option>
                                <option value="MA20">MA20</option>
                                <option value="MA60">MA60</option>
                                <option value="MA120">MA120</option>
                                <option value="MA240">MA240</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="addcondition('ma')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>價與
                            <select id="correlation">
                                <option value="correlation_sign_vol" selected>成交量</option>
                                <option value="correlation_sign_RSI">RSI</option>
                                <option value="correlation_sign_KD">KD</option>
                            </select>
                            的背離關係為
                            <select id="sign">
                                <option value="無背離" selected>無背離</option>
                                <option value="底背離">底背離</option>
                                <option value="頂背離">頂背離</option>
                            </select>
                        <td>
                            <button onclick="addcondition('correlation_sign')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>K棒組合
                            <select id="kbar">
                                <option value="長黑長紅" selected>長黑長紅</option>
                                <option value="長紅貫穿">長紅貫穿</option>
                                <option value="長紅遭遇">長紅遭遇</option>
                                <option value="強旭日東昇">強旭日東昇</option>
                                <option value="弱旭日東昇">弱旭日東昇</option>
                                <option value="光明在望">光明在望</option>
                                <option value="長紅吞噬">長紅吞噬</option>
                                <option value="長紅長黑">長紅長黑</option>
                                <option value="長黑貫穿">長黑貫穿</option>
                                <option value="長黑遭遇">長黑遭遇</option>
                                <option value="強烏雲罩頂">強烏雲罩頂</option>
                                <option value="弱烏雲罩頂">弱烏雲罩頂</option>
                                <option value="不懷好意">不懷好意</option>
                                <option value="長黑吞噬">長黑吞噬</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="addcondition('kbar')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>強勢股排名
                            <select id="order">
                                <option value="0" selected>前</option>
                                <option value="1">後</option>
                            </select>
                            <select id="percent">
                                <option value="0.05" selected>5%</option>
                                <option value="0.1">10%</option>
                                <option value="0.15">15%</option>
                                <option value="0.2">20%</option>
                                <option value="0.25">25%</option>
                                <option value="0.3">30%</option>
                                <option value="0.35">35%</option>
                                <option value="0.4">40%</option>
                                <option value="0.45">45%</option>
                                <option value="0.5">50%</option>
                            </select>
                        </td>
                        <td>
                            <button  onclick="addcondition('order_angle')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="tablesubtit">
                            <h3>籌碼面</h3></th>
                    </tr>
                    <!--<tr>
                        <td>
                            <select id="chip1Type">
                                <option value="f_net_buy_" selected>外資</option>
                                <option value="t_net_buy_">投信</option>
                                <option value="d_net_buy_">自營商</option>
                            </select>
                            今日
                            <select id="chip1SellBuy">
                                <option value="> 0" selected>買超</option>
                                <option value="< 0">賣超</option>
                            </select>
                            <select id="chip1Vtype">
                                <option value="volume" selected>張數</option>
                                <option value="value">金額</option>
                            </select>
                            前
                            <input type="text" id="chip1Number" size="4">
                            名個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip1')">新增</button>
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            <select id="chip2Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日連續
                            <select id="chip2SellBuy">
                                <option value="con_buy_days" selected>買超</option>
                                <option value="con_sell_days">賣超</option>
                            </select>
                            過
                            <input type="text" id="chip2Day" size="4">
                            日以上個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip2')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip3Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip3Num">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>
                            個交易日
                            <select id="chip3SellBuy">
                                <option value="buy_days" selected>買超</option>
                                <option value="sell_days">賣超</option>
                            </select>
                            過
                            <input type="text" id="chip3Day" size="4">
                            日以上個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip3')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip4Type">
                                <option value="f_cum_volume" selected>外資</option>
                                <option value="t_cum_volume">投信</option>
                                <option value="d_cum_volume">自營商</option>
                            </select>
                            今日的近
                            <select id="chip4Day">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>
                            個交易日
                            <select id="chip4SellNum">
                                <option value="> " selected>買超</option>
                                <option value="< ">賣超</option>
                            </select>
                            累積張數超過
                            <input type="text" id="chip4Num" size="4">
                            張個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip4')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip5Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip5Day">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>
                            個交易日
                            <select id="chip5SellBuy">
                                <option value="> " selected>買超</option>
                                <option value="< ">賣超</option>
                            </select>
                            累積成交金額超過
                            <input type="text" id="chip5Num" size="5">
                            百萬元個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip5')">新增</button>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>
                            <select id="chip1Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip1Type">
                                <option value="f_" selected>1</option>
                                <option value="t_">2</option>
                                <option value="d_">3</option>
                                <option value="f_">5</option>
                                <option value="t_">10</option>
                                <option value="d_">20</option>
                                <option value="f_">30</option>
                                <option value="t_">60</option>
                            </select>
                            個交易日累積
                            <select id="chip1SellBuy">
                                <option value="net_buy_" selected>買超</option>
                                <option value="">賣超</option>
                            </select>
                            張數除上流通在外股數之比率前
                            <input type="text" id="chip1Number" size="4">
                            名個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip1')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip1Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip1Type">
                                <option value="f_" selected>1</option>
                                <option value="t_">2</option>
                                <option value="d_">3</option>
                                <option value="f_">5</option>
                                <option value="t_">10</option>
                                <option value="d_">20</option>
                                <option value="f_">30</option>
                                <option value="t_">60</option>
                            </select>
                            個交易日累積
                            <select id="chip1SellBuy">
                                <option value="net_buy_" selected>買超</option>
                                <option value="">賣超</option>
                            </select>
                            張數除上累積成交量之比率前
                            <input type="text" id="chip1Number" size="4">
                            名個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip1')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip1Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip1Type">
                                <option value="f_" selected>1</option>
                                <option value="t_">2</option>
                                <option value="d_">3</option>
                                <option value="f_">5</option>
                                <option value="t_">10</option>
                                <option value="d_">20</option>
                                <option value="f_">30</option>
                                <option value="t_">60</option>
                            </select>
                            個交易日累積
                            <select id="chip1SellBuy">
                                <option value="net_buy_" selected>買超</option>
                                <option value="">賣超</option>
                            </select>
                            金額除上市直之比率前
                            <input type="text" id="chip1Number" size="4">
                            名個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip1')">新增</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="chip1Type">
                                <option value="f_" selected>外資</option>
                                <option value="t_">投信</option>
                                <option value="d_">自營商</option>
                            </select>
                            今日的近
                            <select id="chip1Type">
                                <option value="f_" selected>1</option>
                                <option value="t_">2</option>
                                <option value="d_">3</option>
                                <option value="f_">5</option>
                                <option value="t_">10</option>
                                <option value="d_">20</option>
                                <option value="f_">30</option>
                                <option value="t_">60</option>
                            </select>
                            個交易日累積
                            <select id="chip1SellBuy">
                                <option value="net_buy_" selected>買超</option>
                                <option value="">賣超</option>
                            </select>
                            金額除上累積成交金額之比率前
                            <input type="text" id="chip1Number" size="4">
                            名個股
                        </td>
                        <td>
                            <button onclick="addcondition('chip1')">新增</button>
                        </td>
                    </tr>-->
                </table>
            </td>
            <td valign="top">
                <div id="rightDiv">
                    <table id="rightTable">
                    </table>
                </div>
            </td>
            <td valign="top">
                <div id="resultDiv">
                    <table id="resultTable">
                        <?php
                            if(isset($_POST['sql'])){
                                $sql=$_POST['sql'];
                                $sql="SELECT DISTINCT stock_tech.code FROM web_data.stock_tech INNER JOIN sb_score ON stock_tech.code=sb_score.code INNER JOIN ins_bs_con ON stock_tech.code=ins_bs_con.code  INNER JOIN ins_bs_interval ON stock_tech.code=ins_bs_interval.code where 1=1 ".$sql." order by stock_tech.code";
                                $data=mysql_query($sql);
                        ?>
                        <tr>
                            <td colspan="5">股票代碼</td>
                        </tr>
                        <?php
                            for($i=1;$i<=mysql_num_rows($data);$i=$i+5){
                                
                        ?>
                        <tr class="content">
                        <?php
                            for($j=1;$j<=5;$j++){
                                $rs=mysql_fetch_row($data);
                        ?>
                            <td><?php echo $rs[0]?>&nbsp</td>
                        <?php
                                }
                        ?>
                        </tr>
                        <?php
                                
                            }
                        }
                        ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <form id="selectStockSbForm" name="selectStockSbForm" method="post" action="select-stock-sb.php">
        <input type="hidden" id="sql" name="sql">
    </form>
</div>
<script type="text/javascript">
var condition = [];
var sqlarr = [];

function addcondition(type) {
    if (type == 'sb') {
        condition.push(document.getElementById("sbtype").options[document.getElementById("sbtype").selectedIndex].text + document.getElementById("sbbigsmall").options[document.getElementById("sbbigsmall").selectedIndex].text + document.getElementById("sbscore").options[document.getElementById("sbscore").selectedIndex].text);
        sqlarr.push("sb_score." + document.getElementById("sbtype").value + document.getElementById("sbbigsmall").value + document.getElementById("sbscore").value);
    }else if(type == 'typeSignal'){
        condition.push("波浪型態-"+document.getElementById("typeSignal").options[document.getElementById("typeSignal").selectedIndex].text);
        sqlarr.push("stock_tech.Type_signal="+document.getElementById("sbtype").value);
    }else if(type == 'ma'){
        condition.push("價與"+document.getElementById("MA1").options[document.getElementById("MA1").selectedIndex].text+document.getElementById("maBigSmall").options[document.getElementById("maBigSmall").selectedIndex].text+document.getElementById("MA2").options[document.getElementById("MA2").selectedIndex].text);
        sqlarr.push("stock_tech."+document.getElementById("MA1").value+" "+document.getElementById("maBigSmall").value+"  stock_tech."+document.getElementById("MA2").value);
    }else if(type == 'correlation_sign'){
        condition.push(document.getElementById("correlation").options[document.getElementById("correlation").selectedIndex].text+"的背離關係為"+document.getElementById("sign").options[document.getElementById("sign").selectedIndex].text);
        sqlarr.push("stock_tech."+document.getElementById("correlation").value+"=\""+document.getElementById("sign").value+"\"");
    }else if(type == 'kbar'){
        condition.push("K棒組合"+document.getElementById("kbar").options[document.getElementById("kbar").selectedIndex].text);
        sqlarr.push("stock_tech.KBar_combination"+"=\""+document.getElementById("kbar").value+"\"");
    }else if(type == 'order_angle'){
        condition.push("強勢股排名"+document.getElementById("order").options[document.getElementById("order").selectedIndex].text+document.getElementById("percent").options[document.getElementById("percent").selectedIndex].text);
        if (document.getElementById("order").value<1) {
            sqlarr.push("stock_tech.order_angle/1602"+" < "+document.getElementById("percent").value+" ");
            alert("stock_tech.order_angle/1602"+" < "+document.getElementById("percent").value+" ");
        } else {
            sqlarr.push("stock_tech.order_angle/1602"+" > (1-"+document.getElementById("percent").value+") ");
            alert("stock_tech.order_angle/1602"+" > (1-"+document.getElementById("percent").value+") ");
        }
    }else if (type == 'chip2') {
        condition.push(document.getElementById("chip2Type").options[document.getElementById("chip2Type").selectedIndex].text + "今日連續"+document.getElementById("chip2SellBuy").options[document.getElementById("chip2SellBuy").selectedIndex].text + " 過"+document.getElementById("chip2Day").value+"日以上個股");
        sqlarr.push("ins_bs_con." + document.getElementById("chip2Type").value+ document.getElementById("chip2SellBuy").value + " >" + document.getElementById("chip2Day").value);
    }else if (type == 'chip3') {
        condition.push(document.getElementById("chip3Type").options[document.getElementById("chip3Type").selectedIndex].text + "今日的近"+document.getElementById("chip3Num").options[document.getElementById("chip3Num").selectedIndex].text + "個交易日"+document.getElementById("chip3SellBuy").options[document.getElementById("chip3SellBuy").selectedIndex].text+"過"+document.getElementById("chip3Day").value+"日以上個股");
        sqlarr.push("(ins_bs_interval." + document.getElementById("chip3Type").value+ document.getElementById("chip3SellBuy").value + " >" + document.getElementById("chip3Day").value+"and ins_bs_interval.interval_days = "+document.getElementById("chip3Num").value+")");
    }else if (type == 'chip4') {
        condition.push(document.getElementById("chip4Type").options[document.getElementById("chip4Type").selectedIndex].text + "今日的近"+document.getElementById("chip4Day").options[document.getElementById("chip4Day").selectedIndex].text + "個交易日累積"+document.getElementById("chip4SellBuy").options[document.getElementById("chip4SellBuy").selectedIndex].text+"過"+document.getElementById("chip4Num").value+"日以上個股");
        sqlarr.push("(ins_bs_interval." + document.getElementById("chip4Type").value+ document.getElementById("chip4SellBuy").value  + document.getElementById("chip4Num").value+"and ins_bs_interval.interval_days = "+document.getElementById("chip4Day").value+")");
    }else if (type == 'chip5') {
        condition.push(document.getElementById("chip5Type").options[document.getElementById("chip5Type").selectedIndex].text + "今日的近"+document.getElementById("chip5Day").options[document.getElementById("chip5Day").selectedIndex].text + "個交易日累積"+document.getElementById("chip5SellBuy").options[document.getElementById("chip4SellBuy").selectedIndex].text+"金額過"+document.getElementById("chip5Num").value+"百萬元個股");
        sqlarr.push("(ins_bs_interval." + document.getElementById("chip5Type").value+ document.getElementById("chip5SellBuy").value  + document.getElementById("chip5Num").value+"and ins_bs_interval.interval_days = "+document.getElementById("chip5Day").value+")");
    }
    createTable();
}

function createTable() {
    document.getElementById("rightTable").remove();
    table = document.getElementById("rightDiv").appendChild(document.createElement("table"));
    table.id = "rightTable";
    for (var i = 0; i < condition.length; i++) {
        thRow = document.getElementById("rightTable").appendChild(document.createElement("tr"));
        thRow.appendChild(document.createElement("td")).innerText = condition[i];
        button = document.createElement("button");
        button.innerText = "移除";
        button.setAttribute("onClick", "javascript: deletecondition(" + i + ");");
        thRow.appendChild(button);
    }
}

function deletecondition(i) {
    condition.splice(i, 1);
    sqlarr.splice(i, 1);
    createTable();
}

function selectStockSbFormSubmit(){
    sql = "";
    for (var i = 0; i < sqlarr.length; i++) {
        sql = sql + " and " + sqlarr[i];
    }
    document.getElementById("sql").value = sql;
    alert(sql);
    document.getElementById("selectStockSbForm").submit();
}
</script>
