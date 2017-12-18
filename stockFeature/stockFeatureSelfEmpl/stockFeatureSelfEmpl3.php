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
    <h1>連續賣超</h1>
    <table align="center" >
        <tr>
            <th>名次</th>
            <th>股票代碼</th>
            <th>天數</th>
            <th>淨買超金額</th>
        </tr>
<?php
$result = mysql_query("SELECT ins_bs_con.code,d_con_sell_days,d_net_buy_value FROM web_data.ins_bs_con where  ins_bs_con.date=(select max(ins_bs_con.date) from web_data.ins_bs_con) order by d_con_sell_days desc limit 20;");
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