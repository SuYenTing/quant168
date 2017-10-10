<?php 
include "navbar.html";
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("web_data"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
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
</head>

<div class="container">
    <table>
        <tr>
            <th>商品名稱</th>
            <th>險別</th>
            <th>幣別</th>
            <th>體位</th>
            <th>單位</th>
            <th>費率</th>
            <th>繳費年期</th>
        </tr>
<?php
$sql=$_POST['sql'];
$result=mysql_query("$sql");
for($i=0;$i<mysql_num_rows($result);$i++){
$rs=mysql_fetch_row($result);
?>
        <tr class="content">
          <td><?php echo $rs[1]?></td>
          <td><?php echo $rs[2]?></td>
          <td><?php echo $rs[3]?></td>
          <td><?php echo $rs[4]?></td>
          <td><?php echo $rs[5]?></td>
          <td><?php echo $rs[8]?></td>
          <td><?php echo $rs[9]?></td>
        </tr>
<?php
}
?>
    </table>
</div>