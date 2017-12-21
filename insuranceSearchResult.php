<?php
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$company = $_POST['company'];
?>

<style>
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
div.tab button:hover {
    background-color: #ddd;
}
div.tab button.active {
    background-color: #ccc;
}
.tabcontent {
    display: none;
    padding: 6px ;
    border: 1px solid #ccc;
    border-top: none;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: center;
    padding: 8px;
}
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
</head>

<div class="container">
    <h1 align="center"><?php echo $company ?></h1>
    <hr>
    <form id="productSearch" name="productSearch" method="post" action="productResultNew.php">
        <table>
            <tr>
                <th colspan="4">險種類別</th>
            </tr>
            <tr>
                <td colspan="2">人壽保險</td>
                <td class="content" onclick="typeInfo2('人壽保險','定期壽險')">定期壽險</td>
                <td class="content" onclick="typeInfo2('人壽保險','終身壽險')">終身壽險</td>
            </tr>
            <tr class="content" onclick="typeInfo('儲蓄型保險')">
                <td colspan="4">儲蓄型保險</td>
            </tr>
            <tr>
                <td>健康醫療保險</td>
                <td class="content" onclick="typeInfo2('健康醫療保險','/特定傷病（重疾、重大傷病放這）')">特定傷病（重疾、重大傷病放這）</td>
                <td class="content" onclick="typeInfo2('健康醫療保險','/長期照護（殘扶、長照放這）')">長期照護（殘扶、長照放這）</td>
                <td class="content" onclick="typeInfo2('健康醫療保險','/住院醫療（住院、手術、blablabla放這）')">住院醫療（住院、手術、blablabla放這）</td>
            </tr>
            <tr class="content" onclick="typeInfo('意外傷害險')">
                <td colspan="4">意外傷害險</td>
            </tr>
            <tr class="content" onclick="typeInfo('投資型保險')">
                <td colspan="4">投資型保險</td>
            </tr>
            <tr class="content" onclick="typeInfo('年金')">
                <td colspan="4">年金</td>
            </tr>
            <tr class="content" onclick="typeInfo('附約')">
                <td colspan="4">附約</td>
            </tr>
            <tr class="content" onclick="typeInfo('其他')">
                <td colspan="4">其他</td>
            </tr>
        </table>
        <input type="hidden" id="type" name="type">
        <input type="hidden" id="company" name="company">
        <input type="hidden" name="sql" id="sql">
        <input type="hidden" name="detail" id="detail">
    </form>
</div>
<script type="text/javascript">
function typeInfo(type) {
    document.getElementById('type').value = type;
    document.getElementById('company').value = "<?php echo $company ?>";
    // alert(document.getElementById('product').value);
    // alert(document.getElementById('company').value);
    // alert(ya);

    sql = "";

    sql = sql + "and insurance_premium.company = '" + document.getElementById('company').value + "' ";
    sql = sql + "and insurance_premium.type = '" + document.getElementById('type').value + "' ";

    // alert(sql);
    document.getElementById("detail").value="null";
    //document.getElementById("sql").value = "SELECT distinct insurance_premium.name FROM web_data.insurance_premium where 1=1 " + sql;
    document.getElementById("productSearch").action = "insuranceSearchResult2.php";
    document.getElementById("productSearch").submit();

}
function typeInfo2(type,detail) {
    document.getElementById('type').value = type;
    document.getElementById('company').value = "<?php echo $company ?>";
    // alert(document.getElementById('product').value);
    // alert(document.getElementById('company').value);
    // alert(ya);

    sql = "";

    sql = sql + "and insurance_premium.company = '" + document.getElementById('company').value + "' ";
    sql = sql + "and insurance_premium.type = '" + document.getElementById('type').value + "' ";

    // alert(sql);
    document.getElementById("detail").value=detail;
    //document.getElementById("sql").value = "SELECT distinct insurance_premium.name FROM web_data.insurance_premium where 1=1 " + sql;
    document.getElementById("productSearch").action = "insuranceSearchResult2.php";
    document.getElementById("productSearch").submit();

}
</script>








