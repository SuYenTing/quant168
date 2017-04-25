<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表

?>
<style>
.container {
    width: 80%;
}
</style>
<div class="container">
    <h1>個股診斷 籌碼分析</h1>
    <form id="chip-anal" name="chip-anal" method="post" action="chip-anal.php">
    <div>
        股票代碼
        <input type="text" name="code" value="<?php echo $_POST['code'];?>">
    </div>
    <div>
        <input type="submit" name="button" value="查詢開始">
    </div>
    </form>
    <?php
            if(isset($_POST['code'])){
            $code=$_POST['code'];
            $data=mysql_query("Select * from web_data.ins_bs_con where code= '$code'  ");
            $fiveday=mysql_query("SELECT * FROM web_data.ins_bs_interval where interval_days=5 and code= '$code' ");
            $rs=mysql_fetch_row($data);
            $rsFiveday=mysql_fetch_row($fiveday);
            }
            ?>
    <div>
    <?PHP
    if( isset($_POST['code'])) { ?>
        <table>
            <tr>
                <td><h3>外資動態<h3></td>
            </tr>
            <tr>
                <td>外資今日淨買超張數為 <?php echo $rs[3];?> 張</td>
            </tr>
            <tr>
                <td>外資今日淨買超金額為 <?php echo $rs[6];?> 百萬元</td>
            </tr>
            <tr>
                <td>外資已連續買超 <?php echo $rs[9];?> 日</td>
            </tr>
            <tr>
                <td>外資已連續賣超 <?php echo $rs[10];?> 日</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，外資買超 <?php echo $rsFiveday[4];?> 日</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，外資賣超 <?php echo $rsFiveday[5];?> 日</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，累積淨買超張數除上流通在外股數之比率為 <?php echo $rsFiveday[11];?> %</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，累積淨買超張數除上累積成交量之比率為 <?php echo $rsFiveday[12];?> %</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，累積淨買超金額除上市值之比率為 <?php echo $rsFiveday[20];?> %</td>
            </tr>
            <tr>
                <td>外資在近5日交易日內，累積淨買超金額除上累積成交金額之比率為 <?php echo $rsFiveday[21];?> %</td>
            </tr>
            <tr>
                <td><h3>投信動態<h3></td>
            </tr>
            <tr>
                <td>投信今日淨買超張數為 <?php echo $rs[4];?> 張</td>
            </tr>
            <tr>
                <td>投信今日淨買超金額為 <?php echo $rs[7];?> 百萬元</td>
            </tr>
            <tr>
                <td>投信已連續買超 <?php echo $rs[11];?> 日</td>
            </tr>
            <tr>
                <td>投信已連續賣超 <?php echo $rs[12];?> 日</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，外資買超 <?php echo $rsFiveday[6];?> 日</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，外資賣超 <?php echo $rsFiveday[7];?> 日</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，累積淨買超張數除上流通在外股數之比率為 <?php echo $rsFiveday[14];?> %</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，累積淨買超張數除上累積成交量之比率為 <?php echo $rsFiveday[15];?> %</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，累積淨買超金額除上市值之比率為 <?php echo $rsFiveday[23];?> %</td>
            </tr>
            <tr>
                <td>投信在近5日交易日內，累積淨買超金額除上累積成交金額之比率為 <?php echo $rsFiveday[24];?> %</td>
            </tr>
            <tr>
                <td><h3>自營商動態<h3></td>
            </tr>
            <tr>
                <td>自營商今日淨買超張數為 <?php echo $rs[5];?> 張</td>
            </tr>
            <tr>
                <td>自營商今日淨買超金額為 <?php echo $rs[8];?> 百萬元</td>
            </tr>
            <tr>
                <td>自營商已連續買超 <?php echo $rs[13];?> 日</td>
            </tr>
            <tr>
                <td>自營商已連續賣超 <?php echo $rs[14];?> 日</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，外資買超 <?php echo $rsFiveday[8];?> 日</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，外資賣超 <?php echo $rsFiveday[9];?> 日</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，累積淨買超張數除上流通在外股數之比率為 <?php echo $rsFiveday[17];?> %</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，累積淨買超張數除上累積成交量之比率為 <?php echo $rsFiveday[18];?> %</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，累積淨買超金額除上市值之比率為 <?php echo $rsFiveday[26];?> %</td>
            </tr>
            <tr>
                <td>自營商在近5日交易日內，累積淨買超金額除上累積成交金額之比率為 <?php echo $rsFiveday[27];?> %</td>
            </tr>
        </table>
        <?PHP }?>
    </div>
    <div>
        <p></p>
    </div>
</div>