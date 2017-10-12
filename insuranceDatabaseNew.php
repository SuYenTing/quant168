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
<table align="center">
    <tr>
    </tr>
    
</table>    
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