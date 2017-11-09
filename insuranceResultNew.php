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
    <h1 align="center"><?php echo $company?></h1>
    <hr>
    <form id="productSearch" name="productSearch" method="post" action="productResultNew.php">
        <table>
            <tr>
                <th>商品名稱</th>
            </tr>
    <?php
    $sql=$_POST['sql'];
    $result=mysql_query("$sql");
    for($i=0;$i<mysql_num_rows($result);$i++){
    $rs=mysql_fetch_row($result);
    ?>
            <tr class="content" onclick="productInfo('<?php echo $rs[0]?>')">
              <td><?php echo $rs[0]?></td>
            </tr>
    <?php
    }
    ?>
        </table>
    <input type="hidden" id="product" name="product">
    <input type="hidden" id="company" name="company">
    <input type="hidden" name="sql" id="sql">
    </form>
</div>
<script type="text/javascript">
    
function productInfo(product){
    document.getElementById('product').value = product;
    document.getElementById('company').value = "<?php echo $company ?>";
    // alert(document.getElementById('product').value);
    // alert(document.getElementById('company').value);
    // alert(ya);

    sql = "";

    sql = sql + "and insurance_premium.company = '" + document.getElementById('company').value + "' ";
    sql = sql + "and insurance_premium.name = '" + document.getElementById('product').value + "' ";

    // alert(sql);

    document.getElementById("sql").value = "SELECT insurance_premium.company,insurance_premium.name,insurance_premium.type,insurance_premium.currency,insurance_premium.condition,insurance_premium.unit,insurance_premium.gender,insurance_premium.age,insurance_premium.premium,insurance_premium.length FROM web_data.insurance_premium where 1=1 "+sql;

    document.getElementById("productSearch").action = "productResult.php";
    document.getElementById("productSearch").submit();

}

</script>








