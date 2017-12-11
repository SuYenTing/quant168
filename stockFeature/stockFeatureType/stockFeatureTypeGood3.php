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
<div style="text-align:center;">
    <h1>持續多頭回檔</h1>
    <table align="center" >
        <tr>
            <th>名次</th>
            <th>股票代碼</th>
            <th>股價</th>
            <th>強勢排名</th>
        </tr>
<?php
$result = mysql_query("SELECT stock_tech.code,today_price,order_angle FROM web_data.stock_tech where Type_signal=9 and stock_tech.date=(select max(stock_tech.date) from web_data.stock_tech) order by order_angle limit 20;");
for ($i = 1; $i <= mysql_num_rows($result); $i++) {
	$rs = mysql_fetch_row($result);
	?>
                    <tr class="tr">
                        <td class="td"><?php echo $i; ?></td>
                        <td class="td"><a href="stockSearch.php?code=<?php echo $rs[0] ?>"><?php echo $rs[0] ?></td>
                        <td class="td"><?php echo $rs[1]; ?></td>
                        <td class="td"><?php echo $rs[2]; ?></td>
                    </tr>
<?php }?>
    </table>
</div>