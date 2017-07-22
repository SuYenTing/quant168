<?php
include("navbar.html");
?>
<?php
set_time_limit(0);
mysql_connect("140.119.86.174","nccu","nccu");//連結伺服器
mysql_select_db("web_data");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
//從contact資料庫中選擇所有的資料表
function classify($x) {
    $y="classC";
    switch ($x){
        case 1:
            $y = "classB";
            break;
        case 3:
            $y = "classB";
            break;
        case 9:
            $y = "classB";
            break;
        case 11:
            $y = "classB";
            break; 
        case 6:
            $y = "classA";
            break;
        case 8:
            $y = "classA";
            break;
        case 14:
            $y = "classA";
            break;
        case 16:
            $y = "classA";
            break; 
    }
    return $y;
}
?>
<style>
.container {
    width: 80%;
}

.frame {
    display: none;
}

table {
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}
.tabletitle{
    background-color:#75b3f0;
}
.tablesubtit{
    background-color:#d1e6fa;
}

</style>
<div class="container">
    <h1>個股診斷 技術分析</h1>
    <form id="stock-techForm" name="stock-techForm" method="post" action="stock-tech.php">
        <div>
            股票代碼
            <input type="text" name="code" value="<?php echo $_POST['code'];?>" placeholder="請輸入股票代碼，進行技術分析">
            <input type="hidden" id="stocktechtype" name="stocktechtype" >
            <input type="button" name="button" value="查詢開始"  onclick="formSubmit('stocktech1')">
        </div>
        <div>
            <p></p>
        </div>
    </form>

    <div>
        <button onclick="formSubmit('stocktech1')">格局</button>
        <button onclick="formSubmit('stocktech2')">均線排列</button>
        <button onclick="formSubmit('stocktech3')">價量關係-背離現象</button>
        <button onclick="formSubmit('stocktech4')">強弱勢</button>
        <button onclick="formSubmit('stocktech5')">支撐壓力-關鍵價</button>
        <button onclick="formSubmit('stocktech6')">支撐壓力-未來五天切線價位</button>
        <button onclick="formSubmit('stocktech7')">支撐壓力-黃金切割率</button>
        <button onclick="formSubmit('stocktech8')">特殊K棒組合型態</button>
    </div>
    <div>
        <p></p>
    </div>
    <?php
            if(isset($_POST['code'])){
            $code=$_POST['code'];
            $data=mysql_query("SELECT * FROM web_data.stock_tech where code = '$code' and date = (select max(date) FROM web_data.stock_tech where code = '$code');");
            $rs=mysql_fetch_row($data);
            
            }
            ?>
            
    <?PHP
    if( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech1') ) { ?>
    <div>
        <table>
            <col width="420">
            <col width="420">
            <tr>
                <th colspan="2" height="100" class="tabletitle">
                    <h2>格局</h2></th>
            </tr>
            <tr>
                <td rowspan="2"><img src="img/stocktech/stocktech1/<?php echo $rs[2];?>.PNG" width="420"></td>
                <td align="center" class="tablesubtit">
                    <h3>波浪型態</h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h4><?php echo $rs[3];?></h4></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech2') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="10" height="100" class="tabletitle">
                    <h2>均線排列</h2></th>
            </tr>
            <tr>
                <td rowspan="2"><img src="img/stocktech/stocktech2/0.PNG" width="420"></td>
                <td align="center" class="tablesubtit">
                    <h3>今日股價</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>3MA</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>5MA</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>10MA</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>20MA</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>60MA</h3></td>
                <td align="center"  class="tablesubtit">
                    <h3>120MA</h3></td>
                <td align="center" class="tablesubtit">
                    <h3>240MA</h3></td>
                <td align="center"  class="tablesubtit">
                    <h3>均線排列格局</h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h2><?php echo $rs[4];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[5];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[6];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[7];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[8];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[9];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[10];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[11];?></h2></td>
                <td align="center">
                    <h2><?php echo $rs[12];?></h2></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech3') ) { ?>
    <div>
        <table>
            <col width="420">
            <col width="420">
            <tr>
                <th colspan="2" height="100" class="tabletitle">
                    <h2>價量關係-價vs.量 </h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech3/correlation_sign_vol/<?php 
                if (($rs[13]=='無背離')&&($rs[2]%2==1)) {
                    echo "ND";
                } elseif ($rs[13]=='頂背離') {
                    echo "T";
                } elseif ($rs[13]=='底背離') {
                    echo "B";
                }?>.PNG" width="420"></td>
                <td align="center" class="tablesubtit">
                    <h4>價量關係[背離]</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4>價 vs. 量</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4><?php echo $rs[13];?></h4></td>
            </tr>
        </table>
        <table>
            <col width="420">
            <col width="420">
            <tr>
                <th colspan="2" height="100" class="tabletitle">
                    <h2>價量關係-價vs.RSI </h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech3/correlation_sign_RSI/<?php 
                if (($rs[14]=='無背離')&&($rs[2]%2==1)) {
                    echo "NU";
                } elseif (($rs[14]=='無背離')&&($rs[2]%2==1)) {
                    echo "ND";
                } elseif ($rs[14]=='頂背離') {
                    echo "T";
                } elseif ($rs[14]=='底背離') {
                    echo "B";
                }?>.PNG" width="420"></td>
                <td align="center" class="tablesubtit">
                    <h4>價量關係[背離]</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4>價vs.RSI</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4><?php echo $rs[14];?></h4></td>
            </tr>
        </table>
        <table>
            <col width="420">
            <col width="420">
            <tr>
                <th colspan="2" height="100" class="tabletitle">
                    <h2>價量關係-價vs.KD </h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech3/correlation_sign_KD/<?php 
                if (($rs[15]=='無背離')&&($rs[2]%2==1)) {
                    echo "NU";
                } elseif (($rs[15]=='無背離')&&($rs[2]%2==1)) {
                    echo "ND";
                } elseif ($rs[15]=='頂背離') {
                    echo "T";
                } elseif ($rs[15]=='底背離') {
                    echo "B";
                }?>.PNG" width="420"></td>
                <td align="center" class="tablesubtit">
                    <h4>價量關係[背離]</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4>價vs.KD</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4><?php echo $rs[15];?></h4></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech4') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="6" height="100" class="tabletitle">
                    <h2>強弱勢</h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech4/<?php echo $rs[2];?>.PNG" width="420"></td>
                
            </tr>
            <tr class="tablesubtit">
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "斜率(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "斜率(T35)";
                } else {
                    echo "斜率(T35)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "斜率(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "斜率(T15)";
                } else {
                    echo "斜率(B46)";
                } ?></h3></td>
                <td align="center">
                    <h3>角度(T35)</h3></td>
                <td align="center">
                    <h3>角度(B46)</h3></td>
                <td align="center">
                    <h3>強勢排名</h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[36];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[38];
                } else{
                    echo $rs[36];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[37];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[39];
                } else{
                    echo $rs[36];
                } ?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[51];?>度</h3></td>
                <td align="center">
                    <h3><?php echo $rs[52];?>度</h3></td>
                <td align="center">
                    <h3><?php echo $rs[53];?>/1602</h3></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech5') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="7" height="100" class="tabletitle">
                    <h2>支撐壓力-關鍵價</h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech5/<?php echo $rs[2];?>.PNG" width="420"></td>
                
            </tr>
            <tr class="tablesubtit">
                <td align="center" width="10%">
                    <h3>T13</h3></td>
                <td align="center" width="10%">
                    <h3>B24</h3></td>
                <td align="center" width="10%">
                    <h3>Top1</h3></td>
                <td align="center" width="10%">
                    <h3>Top3</h3></td>
                <td align="center" width="10%">
                    <h3>Bottom4</h3></td>
                <td align="center" width="10%">
                    <h3>Bottom6</h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h3><?php echo $rs[40];?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[41];?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[42];?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[43];?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[44];?></h3></td>
                <td align="center">
                    <h3><?php echo $rs[45];?></h3></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech6') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="7" height="100" class="tabletitle">
                    <h2>支撐壓力-未來五天切線價</h2></th>
            </tr>
            <tr>
                <td rowspan="5"><img src="img/stocktech/stocktech6/<?php echo $rs[2];?>.PNG" width="420"></td>
                
            </tr>
            <tr class="tablesubtit">
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day1(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day1(T35)";
                } else{
                    echo "Day1(B26)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day2(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day2(T35)";
                } else{
                    echo "Day2(B26)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day3(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day3(T35)";
                } else{
                    echo "Day3(B26)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day4(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day4(T35)";
                } else{
                    echo "Day4(B26)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day5(B46)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day5(T35)";
                } else{
                    echo "Day5(B26)";
                } ?></h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[16];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[26];
                } else{
                    echo $rs[21];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[17];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[27];
                } else{
                    echo $rs[22];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[18];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[28];
                } else{
                    echo $rs[23];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[19];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[29];
                } else{
                    echo $rs[24];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[20];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[30];
                } else{
                    echo $rs[25];
                } ?></h3></td>
               
            </tr>
            <tr class="tablesubtit">
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day1(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day1(T15)";
                } else{
                    echo "Day1(T15)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day2(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day2(T15)";
                } else{
                    echo "Day2(T15)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day3(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day3(T15)";
                } else{
                    echo "Day3(T15)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day4(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day4(T15)";
                } else{
                    echo "Day4(T15)";
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo "Day5(B26)";
                } elseif (classify($rs[2])=="classA") {
                    echo "Day5(T15)";
                } else{
                    echo "Day5(T15)";
                } ?></h3></td>
            </tr>
            <tr>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[21];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[31];
                } else{
                    echo $rs[31];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[22];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[32];
                } else{
                    echo $rs[32];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[23];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[33];
                } else{
                    echo $rs[33];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[24];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[34];
                } else{
                    echo $rs[34];
                } ?></h3></td>
                <td align="center">
                    <h3><?php 
                if (classify($rs[2])=="classB") {
                    echo $rs[25];
                } elseif (classify($rs[2])=="classA") {
                    echo $rs[35];
                } else{
                    echo $rs[35];
                } ?></h3></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech7') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="7" height="100" class="tabletitle">
                    <h2>黃金切割率-算價</h2></th>
            </tr>
            <tr>
                <td rowspan="3"><img src="img/stocktech/stocktech7/<?php if ($rs[2]<9) {
                    echo 1;
                } else{
                    echo 2;
                } ?>.PNG" width="420"></td>
                
            </tr>
            <tr class="tablesubtit">
                <td align="center" width="10%">
                    <h4>High</h4></td>
                <td align="center" width="10%">
                    <h4>0.618價位</h4></td>
                <td align="center" width="10%">
                    <h4>0.5價位</h4></td>
                <td align="center" width="10%">
                    <h4>0.382價位</h4></td>
                <td align="center" width="10%">
                    <h4>Low</h4></td>
            </tr>
            <tr>
                <td align="center">
                    <h4><?php echo $rs[46];?></h4></td>
                <td align="center">
                    <h4><?php echo $rs[47];?></h4></td>
                <td align="center">
                    <h4><?php echo $rs[48];?></h4></td>
                <td align="center">
                    <h4><?php echo $rs[49];?></h4></td>
                <td align="center">
                    <h4><?php echo $rs[50];?></h4></td>
            </tr>
        </table>
    </div>
    <?PHP }elseif( isset($_POST['code'])&&($_POST['stocktechtype']=='stocktech8') ) { ?>
    <div>
        <table>
            <tr>
                <th colspan="7" height="100" class="tabletitle">
                    <h2>特殊K棒組合型態</h2></th>
            </tr>
            <tr>
                <td ><img src="img/stocktech/stocktech8/<?php if ($rs[54]=="長黑長紅") {
                    echo 1;
                } elseif($rs[54]=="長紅貫穿"){
                    echo 2;
                }  elseif($rs[54]=="長紅遭遇"){
                    echo 3;
                }  elseif($rs[54]=="強旭日東昇"){
                    echo 4;
                }  elseif($rs[54]=="弱旭日東昇"){
                    echo 5;
                }  elseif($rs[54]=="光明在望"){
                    echo 6;
                }  elseif($rs[54]=="長紅吞噬"){
                    echo 7;
                }  elseif($rs[54]=="長紅長黑"){
                    echo 8;
                }  elseif($rs[54]=="長黑貫穿"){
                    echo 9;
                }  elseif($rs[54]=="長黑遭遇"){
                    echo 10;
                }  elseif($rs[54]=="強烏雲罩頂"){
                    echo 11;
                }  elseif($rs[54]=="弱烏雲罩頂"){
                    echo 12;
                }  elseif($rs[54]=="不懷好意"){
                    echo 13;
                }  elseif($rs[54]=="長黑吞噬"){
                    echo 14;
                }  else{
                    echo 0;
                } ?>.PNG" width="420"></td>
                
           
                <td align="center" width="20%">
                    <h4><?php if ($rs[54]=="NA") {
                    echo "無";
                } else{
                    echo $rs[54];
                }?></h4></td>
            </tr>
        </table>
    </div>
    <?PHP }?>
</div>
<script type="text/javascript">
function formSubmit(stocktechtype)
{
    document.getElementById("stocktechtype").value = stocktechtype;
    document.getElementById("stock-techForm").submit();
} 



</script>

