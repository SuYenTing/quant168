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
<?php if ($_POST['fundRankType'] == 'Return3m') {
    echo "<h1>近3月賺很大</h1>";
}   elseif ($_POST['fundRankType'] == 'Return6m') {
    echo "<h1>近6月賺很大</h1>";
}   elseif ($_POST['fundRankType'] == 'Return1y') {
    echo "<h1>近1年賺很大</h1>";
}   elseif ($_POST['fundRankType'] == 'Return3y') {
    echo "<h1>近3年賺很大</h1>";
}   elseif ($_POST['fundRankType'] == 'Return5y') {
    echo "<h1>近5年賺很大</h1>";
}   elseif ($_POST['fundRankType'] == 'Returnall') {
    echo "<h1>全期間賺很大</h1>";
}   else  {
    echo "<h1>近1月賺很大</h1>";
}
?>
    <p align="right"><a href="javascript:rankPerformTypeSubmit('Return1m');" >近1月</a>  <a href="javascript:rankPerformTypeSubmit('Return3m');">近3月</a>  <a href="javascript:rankPerformTypeSubmit('Return6m');">近6月</a>  <a href="javascript:rankPerformTypeSubmit('Return1y');">近1年</a>  <a href="javascript:rankPerformTypeSubmit('Return3y');">近3年</a>  <a href="javascript:rankPerformTypeSubmit('Return5y');">近5年</a>  <a href="javascript:rankPerformTypeSubmit('Returnall');">全期間</a></p>
    <table align="center" >
        <tr>
            <th>名次</th>
            <th>基金名稱</th>
            <th>近三年報酬率</th>
            <th>近一年報酬率</th>
        </tr>
<?php if ($_POST['fundRankType'] == 'Return3m') {
    $result=mysql_query("SELECT all_fund_performance.name,Return3m,Return1y FROM web_data.all_fund_performance where not Return3m='999999' and not Return1y='999999' order by Return3m desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'Return6m') {
    $result=mysql_query("SELECT all_fund_performance.name,Return6m,Return1y FROM web_data.all_fund_performance where not Return6m='999999' and not Return1y='999999' order by Return6m desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'Return1y') {
    $result=mysql_query("SELECT all_fund_performance.name,Return1y,Return1y FROM web_data.all_fund_performance where not Return1y='999999' and not Return1y='999999' order by Return1y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'Return3y') {
    $result=mysql_query("SELECT all_fund_performance.name,Return3y,Return1y FROM web_data.all_fund_performance where not Return3y='999999' and not Return1y='999999' order by Return3y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'Return5y') {
    $result=mysql_query("SELECT all_fund_performance.name,Return5y,Return1y FROM web_data.all_fund_performance where not Return5y='999999' and not Return1y='999999' order by Return5y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'Returnall') {
    $result=mysql_query("SELECT all_fund_performance.name,Returnall,Return1y FROM web_data.all_fund_performance where not Returnall='999999' and not Return1y='999999' order by Returnall desc limit 20;");
}   else  {
    $result=mysql_query("SELECT all_fund_performance.name,Return1m,Return1y FROM web_data.all_fund_performance where not Return1m='999999' and not Return1y='999999' order by Return1m desc limit 20;");
}
    for($i=1;$i<=mysql_num_rows($result);$i++){
        $rs=mysql_fetch_row($result);
?>
                    <tr class="tr">
                        <td class="td"><?php echo $i;?></td>
                        <td class="td"><?php echo $rs[0];?></td>
                        <td class="td"><?php echo $rs[1];?></td>
                        <td class="td"><?php echo $rs[2];?></td>
                    </tr>
<?php } ?>        
    </table>
</div>
<form id="fundRankForm" name="fundRankForm" method="post" action="fundsearch.php">
    <input type="hidden" name="searchType" id="searchType" value="detailRank">
    <input type="hidden" name="fundRankType" id="fundRankType">
    <input type="hidden" name="rankValue" id="rankValue">  
    <input type="hidden" name="rankType" id="rankType">  
</form>  
<script>
function rankPerformTypeSubmit(type) {
    document.getElementById("fundRankType").value = type;
    document.getElementById("rankType").value = "advance";
    document.getElementById("rankValue").value = "fundSearch/fundRank/fundRankType3.php";
    document.getElementById("fundRankForm").submit();
}
</script>