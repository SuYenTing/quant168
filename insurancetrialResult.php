<?php

include("navbar.html");
require_once 'reader.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('UTF-8');
$data->read('male1.xls');

$data2 = new Spreadsheet_Excel_Reader();
$data2->setOutputEncoding('UTF-8');
$data2->read('female1.xls');

$data3 = new Spreadsheet_Excel_Reader();
$data3->setOutputEncoding('UTF-8');
$data3->read('male2.xls');

$data4 = new Spreadsheet_Excel_Reader();
$data4->setOutputEncoding('UTF-8');
$data4->read('female2.xls');
// $value = $data->sheets[0]['cells'][3][8];
// echo $value;

$currentAge = $_POST['currentAge'];
$gender = $_POST['gender'];
$insuranceType = $_POST['insuranceType'];
$paymentType = $_POST['paymentType'];
$paymentSpan = $_POST['paymentSpan'];
$paymentFreqency = $_POST['paymentFreqency'];
$insuranceAmount = $_POST['insuranceAmount'];

?>

<html>
<head>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>
    <meta charset="UTF-8">
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


   

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button4 {
            background-color: white;
            color: black;
            border: 2px solid #e7e7e7;
        }

        .button4:hover {background-color: #e7e7e7;}
        </style>
        
</head>

<body onload="func()">
    <style>
        .container {
            width: 90%;
        }
    </style>

    <div class="container">

    <h1 align="center">保險試算結果</h1>
        
        <form method="post" action="" name="form" id="form">
        <table>

                <tr>
                    <td>年齡：</td>
                    <td><?php echo $currentAge ?>歲</td>
                </tr>
                <tr>
                    <td>性別：</td>
                    <td><?php  if($gender == "male"){echo "男";}elseif($gender == "female"){echo "女";} ?></td>
                </tr>
                <tr id="annualyInsuranceRow" name="annualyInsuranceRow">
                    <td>年繳保費：</td>
                    <td id="annualyInsuranceAmount">元</td>
                </tr>
                <tr id="monthlyInsuranceRow" name="monthlyInsuranceRow">
                    <td>月繳保費：</td>
                    <td id="monthlyInsuranceAmount">元</td>
                </tr>
                <tr id="survivalPayRow" name="survivalPayRow">
                    <td>生存金：</td>
                    <td id="survivalAmount">萬</td>
                </tr>
                <tr id="annualySurvivalPayRow" name="annualySurvivalPayRow">
                    <td>每年生存金：</td>
                    <td id="annualySurvivalAmount">萬</td>
                </tr>
                <tr id="insurancePayRow" name="insurancePayRow">
                    <td>保險金額：</td>
                    <td><?php echo $insuranceAmount?>元</td>
                </tr>
                <tr id="annualyAmountRow" name="annualyAmountRow">
                    <td>每年年金：</td>
                    <td id="annualyAmount">萬</td>
                </tr>
            
            </table>
            </form>
            <button onclick="calculate()" class="button button4">計算</button>
            
           </body>


<script type="text/javascript">

function func(){

    var gender = "<?php echo $gender ?>";
    var type = <?php echo $insuranceType ?>;
    var paymentType = <?php echo $paymentType ?>;
    var insuranceAmount = <?php echo $insuranceAmount?>;

    var annualyInsuranceRow = document.getElementById('annualyInsuranceRow');
    var monthlyInsuranceRow = document.getElementById('monthlyInsuranceRow');
    var survivalPayRow = document.getElementById('survivalPayRow');
    var annualySurvivalPayRow = document.getElementById('annualySurvivalPayRow');
    var insurancePayRow = document.getElementById('insurancePayRow');
    var annualyAmountRow = document.getElementById('annualyAmountRow');

    switch(type){
        case 1:

            //完成

            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            annualyAmountRow.style.display = "none";

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.25;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var G = Mx/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.25;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = Mx/(Nx-Nxs);
                    // alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.25;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var G = Mx/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.25;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = Mx/(Nx-Nxs);
                    // alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";

            break;
        case 2:

            //完成

            annualyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            annualyAmountRow.style.display = "none";

            <?php $insuranceSpan = $_POST['insuranceSpan']; ?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.45;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Mxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dx = <?php echo $data->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var G = (Mx - Mxt)/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.5;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Mxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Nx = <?php echo $data->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = (Mx-Mxt)/(Nx-Nxs);
                    // alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.45;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Mxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var G = (Mx - Mxt)/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.5;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Mxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Nx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = (Mx-Mxt)/(Nx-Nxs);
                    // alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            var monthlyInsurance = Math.floor(annualyInsurance*0.088);
            document.getElementById('monthlyInsuranceAmount').innerHTML = monthlyInsurance + "元";

            break;
        case 3:

            //  有問題 待解決 生存金給付時間&比例

            monthlyInsuranceRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            annualyAmountRow.style.display = "none";

            <?php $survivalPayTime = $_POST['survivalPayTime']; ?>
            <?php $survivalPayProportion = $_POST['survivalPayProportion']; ?>
            var a = <?php echo $survivalPayProportion?> ;

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.085;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dxn = <?php echo $data->sheets[0]['cells'][3+$currentAge+$survivalPayTime][9] ?>;
                    var G = (Mx + (a*Dxn))/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.085;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dxn = <?php echo $data->sheets[0]['cells'][3+$currentAge+$survivalPayTime][9] ?>;
                    var Nx = <?php echo $data->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = (Mx + (a*Dxn))/(Nx-Nxs);
                    // alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.085;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dxn = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$survivalPayTime][9] ?>;
                    var G = (Mx + (a*Dxn))/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.085;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dxn = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$survivalPayTime][9] ?>;
                    var Nx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var G = (Mx + (a*Dxn))/(Nx-Nxs);
                    // alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";

            var suvival = Math.floor(insuranceAmount * a);
            document.getElementById('survivalAmount').innerHTML = suvival + "元";

            break;
        case 4:

            //有問題 Nxm 不知道m是三小

            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualyAmountRow.style.display = "none";

            <?php $insuranceSpan = $_POST['insuranceSpan']; ?>
            <?php $survivalPaybackTime = $_POST['survivalPaybackTime']?>
            var b = <?php echo $_POST['yearlyPaidPropotion'];?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.085;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data->sheets[0]['cells'][3+$currentAge][9] ?>;
                    //待解決
                    var Nxm = <?php echo $data->sheets[0]['cells'][3+$currentAge+$survivalPaybackTime][11] ?>;

                    var B = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][11] ?>;
                    var G = (Mx + (b*Nxm))/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.085;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    //待解決
                    var Nxm = <?php echo $data->sheets[0]['cells'][3+$currentAge+$survivalPaybackTime][11] ?>;

                    var B = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][11] ?>;
                    var G = (Mx + (b*Nxm))/(Nx-Nxs);
                    // alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.085;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][9] ?>;
                    //待解決
                    var Nxm = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$survivalPaybackTime][11] ?>;

                    var B = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][11] ?>;
                    var G = (Mx + (b*Nxm))/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.085;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    //待解決
                    var Nxm = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$survivalPaybackTime][11] ?>;

                    var B = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][11] ?>;
                    var G = (Mx + (b*Nxm))/(Nx-Nxs);
                    // alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";

            var annualySurvival = Math.floor(insuranceAmount * b);
            document.getElementById('annualySurvivalAmount').innerHTML = annualySurvival + "元";


            break;
        case 5:

            //完成

            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            annualyAmountRow.style.display = "none";

            <?php $insuranceSpan = $_POST['insuranceSpan']; ?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.25;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Mxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Mx - Mxt + Dxt)/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.25;

                    var Mx = <?php echo $data->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var Mxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dxt = <?php echo $data->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Mx - Mxt + Dxt)/(Nx-Nxs);
                    // alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.25;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Dx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Mxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Mx - Mxt + Dxt)/Dx;
                    // alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.25;

                    var Mx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][10] ?>;
                    var Nx = <?php echo $data2->sheets[0]['cells'][3+$currentAge][11] ?>;
                    var Nxs = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$paymentSpan][11] ?>;
                    var Mxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][10] ?>;
                    var Dxt = <?php echo $data2->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Mx - Mxt + Dxt)/(Nx-Nxs);
                    // alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";

            break;
        case 6:

            //6-9數值都差一點，不知道excel為啥有兩個G

            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            insurancePayRow.style.display = "none";

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = Nx/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxs = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = Nx/(Nx-Nxs);
                    alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = Nx/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxs = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = Nx/(Nx-Nxs);
                    alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";
            document.getElementById('annualyAmount').innerHTML = <?php echo $insuranceAmount?> + "元";

            break;
        case 7:
            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            insurancePayRow.style.display = "none";

            <?php $insuranceSpan = $_POST['insuranceSpan']; ?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var Nxt = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Nx-Nxt)/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxs = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var Nxt = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Nx-Nxt)/(Nx-Nxs);
                    alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Dx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var Nxt = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Nx-Nxt)/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxs = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var Nxt = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$insuranceSpan][9] ?>;
                    var G = (Nx-Nxt)/(Nx-Nxs);
                    alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";
            document.getElementById('annualyAmount').innerHTML = <?php echo $insuranceAmount?> + "元";

            break;
        case 8:
            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            insurancePayRow.style.display = "none";

            <?php $postponeTime = $_POST['postponeTime']; ?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nxu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Dx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = Nxu/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxs = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = Nxu/(Nx-Nxs);
                    alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nxu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Dx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = Nxu/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxs = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = Nxu/(Nx-Nxs);
                    alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";
            document.getElementById('annualyAmount').innerHTML = <?php echo $insuranceAmount?> + "元";

            break;
        case 9:
            monthlyInsuranceRow.style.display = "none";
            survivalPayRow.style.display = "none";
            annualySurvivalPayRow.style.display = "none";
            insurancePayRow.style.display = "none";

            <?php $insuranceSpan = $_POST['insuranceSpan'];
                  $postponeTime = $_POST['postponeTime']; ?>

            if (gender == "male") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nxu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxtu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime+$insuranceSpan][9] ?>;
                    var Dx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = (Nxu-Nxtu)/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data3->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxtu = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$postponeTime+$insuranceSpan][9] ?>;
                    var Nxs = <?php echo $data3->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = (Nxu-Nxtu)/(Nx-Nxs);
                    alert(G);
                }
            }else if (gender == "female") {
                if (paymentType == 1) {

                    var loading = 0.09;

                    var Nxu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxtu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime+$insuranceSpan][9] ?>;
                    var Dx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][7] ?>;
                    var G = (Nxu-Nxtu)/Dx;
                    alert(G);

                } else if (paymentType == 2) {

                    var loading = 0.09;

                    var Nx = <?php echo $data4->sheets[0]['cells'][3+$currentAge][9] ?>;
                    var Nxu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime][9] ?>;
                    var Nxtu = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$postponeTime+$insuranceSpan][9] ?>;
                    var Nxs = <?php echo $data4->sheets[0]['cells'][3+$currentAge+$paymentSpan][9] ?>;
                    var G = (Nxu-Nxtu)/(Nx-Nxs);
                    alert(G);
                }
            }

            var annualyInsurance = Math.floor(G * insuranceAmount/(1-loading));
            document.getElementById('annualyInsuranceAmount').innerHTML = annualyInsurance + "元";
            document.getElementById('annualyAmount').innerHTML = <?php echo $insuranceAmount?> + "元";


            break;
    }


}

function genderFunc(gender) {
    document.getElementById("genders").value = gender;
    // alert(document.getElementById('genders').value);
}

</script>
</html>







