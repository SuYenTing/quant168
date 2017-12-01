<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 2017/11/26
 * Time: 下午 08:31
 */


include "navbar.html";
include 'conn/dbconnection.php';

?>


        <div id="containerSmt" style="max-width: 80%; height: 600px; margin: 0 auto"></div>

        <br><br>
        <div class="tabbable boxed parentTabs center-block"  style="max-width: 80%">
            <ul class="nav nav-tabs nav-justified ">
                <li class="active">
                    <a  id="A50" onClick="updateSmt(this.id,'0')">中國A50指數價值投資組合</a></li>
                <li><a  id="SH50" onClick="updateSmt(this.id,'0')">中國上證50指數價值投資組合</a></li>
                <li><a  id="SZ100" onClick="updateSmt(this.id,'0')">中國深證100指數動能投資組合</a></li>
                <li><a  id="HS300" onClick="updateSmt(this.id,'0')">中國滬深300指數價值投資組合</a></li>


            </ul>
            <div class="tab-content" id="smt_tbl_1">
                    <div class="table-responsive text-nowrap" >
                        <table class="table table-striped table-bordered">
　
                            <tr>
                                <th class="text-center"></th>
                                <th class="text-center">等權重<br>投資組合</th>
                                <th class="text-center">市值權重<br>投資組合</th>
                                <th class="text-center">效率維度縮減<br>獲利因子 α=0.9</th>
                                <th class="text-center">效率維度縮減<br>獲利因子 α=0.95</th>
                                <th class="text-center">效率維度縮減<br>獲利因子 α=0.99</th>
                            </tr>
　

                            <?php
                            $sql = 'SELECT  indicator, equal_weight, mv_weight, `factor_0.9`, `factor_0.95`, `factor_0.99` FROM epdr_portfolio.performance_analysis where tracking_index="A50" and epdr_factor="equity"';
                            $query = mysqli_query($conn, $sql);

                            if (!$query) {
                                //die ('SQL Error: ' . mysqli_error($conn));
                                die ('SQL Error:');
                            }


                            while ($row = mysqli_fetch_array($query)) {
                                echo '<tr>

                                    <td data-th="">' . $row['indicator'] . '</td>
                                    <td data-th="等權重投資組合">' . $row['equal_weight'] . '</td>
                                    <td data-th="市值權重投資組合">' . $row['mv_weight'] . '</td>
                                    <td data-th="效率維度縮減獲利因子 α=0.9">' . $row['factor_0.9'] . '</td>
                                    <td data-th="效率維度縮減獲利因子 α=0.95">' . $row[ 'factor_0.95'] . '</td>
                                    <td data-th="效率維度縮減獲利因子 α=0.99">' . $row['factor_0.99'] . '</td>
                                    
                                    
                                    </tr>';


                            } ?> 　


</table>

</div>
<p class="text-right"">回測起始期間為2005年1月至今</p>
<br><br><br>

<ul class="nav nav-tabs nav-justified">
    <li class="active">
        <a  id="EW" onClick="updateSmt('A50',this.id)">等權重投資組合</a></li>
    <li><a  id="DW" onClick="updateSmt('A50',this.id)">市值權重投資組合</a></li>
    <li><a  id="factor_0.9" onClick="updateSmt('A50',this.id)">效率維度縮減α=0.9投資組合</a></li>
    <li><a  id="factor_0.95" onClick="updateSmt('A50',this.id)">效率維度縮減α=0.95投資組合</a></li>
    <li><a  id="factor_0.99" onClick="updateSmt('A50',this.id)">效率維度縮減α=0.99投資組合</a></li>                           </li>
</ul>
<div class="table-responsive text-nowrap" id="smt_tbl_2">
    <table class="table table-striped table-bordered">
        　
        <tr>
            <th class="text-center">編號</th>
            <th class="text-center">股票名稱</th>
            <th class="text-center">投資代碼</th>
            <th class="text-center">投資權重</th>
            <th class="text-center">進場日期</th>
            <th class="text-center">進場價格</th>
            <th class="text-center">當前日期</th>
            <th class="text-center">當前價格</th>
            <th class="text-center">當前報酬<br>(未含交易成本)</th>
        </tr>
        　

        <?php
        $sql = 'SELECT number, stock_code, stock_name, inv_weight, in_date, in_price, today_date, today_price, today_ret FROM epdr_portfolio.latest_holdinfor_gainloss where tracking_index="A50" and epdr_factor="equity" and portfolio_method="EW"';
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            //die ('SQL Error: ' . mysqli_error($conn));
            die ('SQL Error:');
        }


        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>

                                                <td data-th="編號">' . $row['number'] . '</td>
                                                <td data-th="股票名稱">' . $row['stock_code'] . '</td>
                                                <td data-th="投資代碼">' . $row['stock_name'] . '</td>
                                                <td data-th="投資權重">' . $row['inv_weight'] . '</td>
                                                 <td data-th="進場日期">' . $row['in_date'] . '</td>
                                                  <td data-th="進場價格">' . $row['in_price'] . '</td>
                                                   <td data-th="當前日期">' . $row['today_date'] . '</td>
                                                    <td data-th="當前價格">' . $row['today_price'] . '</td>
                                                    <td data-th="當前報酬(未含交易成本)">' . $row['today_ret'] . '</td>
                                                    </tr>';
        } ?>

    </table>
</div>
</div>
</div>