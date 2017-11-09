<?php
set_time_limit(0);
mysql_connect("140.119.86.174", "nccu", "nccu"); //連結伺服器
mysql_select_db("stock_market"); //選擇資料庫
mysql_query("set names utf8"); //以utf8讀取資料，讓資料可以讀取中文
$code = $_GET['code'];
$stock = mysql_query("SELECT name,max(date),close FROM stock_market.stock_price_data where code='$code' ;");
$rs = mysql_fetch_row($stock);
?>
<style>
iframe {
    border: 1px solid lightgrey;
}
</style>
<div>
    <table style="width:100%" height="80%">
        <tr>
            <th colspan="3" style="text-align: center;vertical-align:middle;" height="5%">
                <span style="font-size:xx-large;"><?php echo $code . " " . $rs[0] . " " . $rs[1] . " 收盤價:" . $rs[2] . "元"; ?></span>
                <!--<iframe src="stockSearchTitle.php?code=<?php //echo $code; ?>" height="100%" width="100%"></iframe>-->
            </td>
        </tr>
        <tr>
            <td style="width:20%"><img src="img/stockSearchNewInform.png" height="42" onclick="changeIframe('NewInform')"></td>
            <td rowspan="4" style="width:60%">
                <iframe id="middleIframe" src="stockSearchNewInform.php?code=<?php echo $code; ?>" height="100%" width="100%"></iframe>
            </td>
            <td rowspan="2">
                <iframe src="stockSearchFinRpt.php?code=<?php echo $code; ?>" height="100%" width="100%"></iframe>
            </td>
        </tr>
        <tr>
            <td><img src="img/stockSearchFinState.png" height="42" onclick="changeIframe('FinState')"></td>
        </tr>
        <tr>
            <td><img src="img/stockSearchStockTech.png" height="42" onclick="changeStockTech()"></td>
            <td rowspan="2">
                <iframe src="stockSearchSmartBeta.php?code=<?php echo $code; ?>" height="100%" width="100%"></iframe>
            </td>
        </tr>
        <tr>
            <td><img src="img/stockSearchChipAnal.png" height="42" onclick="changeIframe('ChipAnal')"></td>
        </tr>
    </table>
</div>
<script>
    function changeIframe(loadFrame) {
        document.getElementById("middleIframe").src = "stockSearch"+loadFrame+".php?code=<?php echo $code; ?>";
    }
    function changeStockTech(){
        document.getElementById("middleIframe").src = "stockSearchStockTech.php?code=<?php echo $code; ?>&stocktechtype=stocktech1";
    }
</script>