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
<?php if ($_POST['fundRankType'] == 'std3m') {
    echo "<h1>近3月波動最小</h1>";
}   elseif ($_POST['fundRankType'] == 'std6m') {
    echo "<h1>近6月波動最小</h1>";
}   elseif ($_POST['fundRankType'] == 'std1y') {
    echo "<h1>近1年波動最小</h1>";
}   elseif ($_POST['fundRankType'] == 'std3y') {
    echo "<h1>近3年波動最小</h1>";
}   elseif ($_POST['fundRankType'] == 'std5y') {
    echo "<h1>近5年波動最小</h1>";
}   elseif ($_POST['fundRankType'] == 'stdall') {
    echo "<h1>全期間波動最小</h1>";
}   else  {
    echo "<h1>近1月波動最小</h1>";
}
?>
    <p align="right"><a href="javascript:rankPerformTypeSubmit('std1m');" >近1月</a>  <a href="javascript:rankPerformTypeSubmit('std3m');">近3月</a>  <a href="javascript:rankPerformTypeSubmit('std6m');">近6月</a>  <a href="javascript:rankPerformTypeSubmit('std1y');">近1年</a>  <a href="javascript:rankPerformTypeSubmit('std3y');">近3年</a>  <a href="javascript:rankPerformTypeSubmit('std5y');">近5年</a>  <a href="javascript:rankPerformTypeSubmit('stdall');">全期間</a></p>
    <table align="center" >
        <tr>
            <th>名次</th>
            <th>基金名稱</th>
            <th>全期間標準差</th>
            <th>近一年報酬率</th>
        </tr>
<?php if ($_POST['fundRankType'] == 'std3m') {
    $result=mysql_query("SELECT all_fund_performance.name,std3m,Return1y FROM web_data.all_fund_performance where not std3m='999999' and not Return1y='999999' order by std3m desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'std6m') {
    $result=mysql_query("SELECT all_fund_performance.name,std6m,Return1y FROM web_data.all_fund_performance where not std6m='999999' and not Return1y='999999' order by std6m desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'std1y') {
    $result=mysql_query("SELECT all_fund_performance.name,std1y,Return1y FROM web_data.all_fund_performance where not std1y='999999' and not Return1y='999999' order by std1y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'std3y') {
    $result=mysql_query("SELECT all_fund_performance.name,std3y,Return1y FROM web_data.all_fund_performance where not std3y='999999' and not Return1y='999999' order by std3y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'std5y') {
    $result=mysql_query("SELECT all_fund_performance.name,std5y,Return1y FROM web_data.all_fund_performance where not std5y='999999' and not Return1y='999999' order by std5y desc limit 20;");
}   elseif ($_POST['fundRankType'] == 'stdall') {
    $result=mysql_query("SELECT all_fund_performance.name,stdall,Return1y FROM web_data.all_fund_performance where not stdall='999999' and not Return1y='999999' order by stdall desc limit 20;");
}   else  {
    $result=mysql_query("SELECT all_fund_performance.name,std1m,Return1y FROM web_data.all_fund_performance where not std1m='999999' and not Return1y='999999' order by std1m desc limit 20;");
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
    document.getElementById("rankValue").value = "fundSearch/fundRank/fundRankType2.php";
    document.getElementById("fundRankForm").submit();
}
</script>