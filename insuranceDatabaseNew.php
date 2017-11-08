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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/fundsearch.css">
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
<form>
<table align="center">
    <tr>
        <td><button class="myButton">台銀人壽</button></td>
        <td><button class="myButton">台灣人壽</button></td>
        <td><button class="myButton">保誠人壽</button></td>
        <td><button class="myButton">國泰人壽</button></td>
        <td><button class="myButton">中國人壽</button></td>
        <td><button class="myButton">南山人壽</button></td>
    </tr>
    <tr>
        <td><button class="myButton">新光人壽</button></td>
        <td><button class="myButton">富邦人壽</button></td>
        <td><button class="myButton">遠雄人壽</button></td>
        <td><button class="myButton">安聯人壽</button></td>
        <td><button class="myButton">中華郵政</button></td>
        <td><button class="myButton">全球人壽</button></td>
    </tr>
    <tr>
        <td><button class="myButton">元大人壽</button></td>
        <td><button class="myButton">康健人壽</button></td>
        <td><button class="myButton">友邦人壽</button></td>
        <td><button class="myButton">安達人壽</button></td>
        <td><button class="myButton">第一金人壽</button></td>
        <td><button class="myButton">法國巴黎人壽</button></td>
    </tr>
    <tr>
        <td><button class="myButton">蘇黎世人壽</button></td>
        <td><button class="myButton">保德信人壽</button></td>
        <td><button class="myButton">三商美邦人壽</button></td>
    </tr>
    
</table>
</form>
</div>
<script type="text/javascript">

function insuranceSearchSubmit() {

	sql = "";

    sql = sql + "and insurance_premium.type ='" + document.getElementById("insuranceType").value + "' ";
	sql = sql + "and insurance_premium.company = '" + document.getElementById("company").value + "' ";
	sql = sql + "and insurance_premium.gender = '" + document.getElementById("gender").value + "' ";
	sql = sql + "and insurance_premium.age = '" + document.getElementById("currentAge").value + "' ";

	document.getElementById("sql").value = "SELECT insurance_premium.company,insurance_premium.name,insurance_premium.type,insurance_premium.currency,insurance_premium.condition,insurance_premium.unit,insurance_premium.gender,insurance_premium.age,insurance_premium.premium,insurance_premium.length FROM web_data.insurance_premium where 1=1 "+sql;

	document.getElementById("insuranceSearch").action = "insuranceResult.php";
	document.getElementById("insuranceSearch").submit();

	// alert(document.getElementById("sql").value);

}

</script>