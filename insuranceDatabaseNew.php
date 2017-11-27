<?php
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {

    text-align: center;
    padding: 14px;
}

.myButton {
    -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
    -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
    box-shadow:inset 0px 1px 0px 0px #ffffff;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
    background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
    background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
    background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
    background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
    background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
    background-color:#ffffff;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    border-radius:6px;
    border:1px solid #dcdcdc;
    display:inline-block;
    cursor:pointer;
    color:#666666;
    font-family:Arial;
    font-size:15px;
    font-weight:bold;
    padding:20px 40px;
    text-decoration:none;
    text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff));
    background:-moz-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
    background:-webkit-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
    background:-o-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
    background:-ms-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
    background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff',GradientType=0);
    background-color:#f6f6f6;
}
.myButton:active {
    position:relative;
    top:1px;
}


</style>

<head>
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <!-- <link rel="stylesheet" href="css/fundsearch.css"> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>

<div class="container">
<h3 align="center"><b>保險類別</b></h3>
<br>
<hr>
<table align="center">
    <tr>
        <td><img src="/quant168/images/壽險.png" height="150" width="150"></td>
        <td><img src="/quant168/images/殘廢險.png" height="150" width="150"></td>
        <td><img src="/quant168/images/重大疾病險.png" height="150" width="150"></td>
        <td><img src="/quant168/images/癌症險.png" height="150" width="150"></td>
        <td><img src="/quant168/images/醫療險.png" height="150" width="150"></td>
        <td><img src="/quant168/images/意外險.png" height="150" width="150"></td>
    </tr>
</table>
<br>
<br>
<br>
</div>
<div class="container" style="background-color:#e0e1e2;">
<h3 align="center"><b>公司名稱</b></h3>
<br>
<hr>
<form id="insuranceSearch" name="insuranceSearch" method="post" action="insuranceResultNew.php">
<table align="center">
    <tr>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="a" onchange="companyFunc('台銀人壽');"/>台銀人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="b" onchange="companyFunc('台灣人壽');"/>台灣人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="c" onchange="companyFunc('保誠人壽');"/>保誠人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="d" onchange="companyFunc('國泰人壽');"/>國泰人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="e" onchange="companyFunc('中國人壽');"/>中國人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="f" onchange="companyFunc('南山人壽');"/>南山人壽
            </label>
        </td>
    </tr>
    <tr>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="g" onchange="companyFunc('新光人壽');"/>新光人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="h" onchange="companyFunc('富邦人壽');"/>富邦人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="i" onchange="companyFunc('遠雄人壽');"/>遠雄人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="j" onchange="companyFunc('安聯人壽');"/>安聯人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="k" onchange="companyFunc('中華郵政');"/>中華郵政
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="l" onchange="companyFunc('全球人壽');"/>全球人壽
            </label>
        </td>
    </tr>
    <tr>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="m" onchange="companyFunc('全球人壽');"/>全球人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="n" onchange="companyFunc('康健人壽');"/>康健人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="o" onchange="companyFunc('友邦人壽');"/>友邦人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="p" onchange="companyFunc('安達人壽');"/>安達人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="q" onchange="companyFunc('第一金人壽');"/>第一金人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="r" onchange="companyFunc('法國巴黎人壽');"/>法國巴黎人壽
            </label>
        </td>
    </tr>
    <tr>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="s" onchange="companyFunc('蘇黎世人壽');"/>蘇黎世人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="t" onchange="companyFunc('保德信人壽');"/>保德信人壽
            </label>
        </td>
        <td>
            <label class="myButton">
                <input class="hidden" type="radio" name="company_name" id="u" onchange="companyFunc('三商美邦人壽');"/>三商美邦人壽
            </label>
        </td>
        <td>
            <input type="hidden" id="company" name="company"/>
            <input type="hidden" name="sql" id="sql">
        </td>
    </tr>
    
</table>
</form>
</div>
<script type="text/javascript">

function companyFunc(company){
    document.getElementById('company').value = company;
    // alert(document.getElementById('company').value);

    sql = "";

    sql = sql + "and insurance_premium.company = '" + document.getElementById('company').value + "' ";

    document.getElementById("sql").value = "SELECT distinct insurance_premium.type FROM web_data.insurance_premium where 1=1 "+sql;

    // alert(document.getElementById("sql").value);

    document.getElementById("insuranceSearch").action = "insuranceResultNew.php";
    document.getElementById("insuranceSearch").submit();

}


</script>