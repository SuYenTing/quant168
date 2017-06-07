<?php

include("navbar.html");

?>

<html>
<head>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>
    <meta charset="UTF-8">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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
        
    </style>
</head>

<body>
    <style>
        .container {
            width: 50%;
        }
    </style>

    <div class="container">
        
        <p>input</p>
        <table>
            <tr>
                <td>現在年齡</td>
                <td>
                    <select name="currentAge" id="currentAge">
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30"selected>30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                    </select>
                    歲</td>
                </tr>
                <tr>
                        <td>性別</td>
                        <td>
                            <input type="radio" name="gender" id="gender" value="male" checked onchange="genderFunc('male')"> 男
                            <input type="radio" name="gender" id="gender" value="female" onchange="genderFunc('female')"> 女
                            <input type="hidden" name="genders" id="genders" value="male">
                        </td>
                </tr>
                <tr>
                    <td>預計退休年齡</td>
                <td>
                    <select id="retireAge" onchange="lifeLeftFunc()">
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65"selected>65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                    </select>
                歲</td>
                
                <tr>
                        <td>現在每月生活費</td>
                        <td>$
                            <input type="number" id="livingCost" value=10000>
                        </td>
                </tr>
                <tr>
                        <td>預估生活費用每年上漲率</td>
                        <td>
                            <select id="livingCostGrowth" >
                            <option value="0.5">0.5%</option>
                            <option value="1.0">1.0%</option>
                            <option value="1.5">1.5%</option>
                            <option value="2.0">2.0%</option>
                            <option value="2.5">2.5%</option>
                            <option value="3.0">3.0%</option>
                            <option value="3.5">3.5%</option>
                            <option value="4.0">4.0%</option>
                            <option value="4.5">4.5%</option>
                            <option value="5.0"selected>5.0%</option>
                        </select>
                        </td>
                </tr>
                <tr>
                    <td>退休時平均餘命</td>
                    <td>
                    <input type="number" id="lifeLeft" value=13 readonly>歲</td>
                </tr>
                <tr>
                    <td>年利率</td>
                    <td>
                            <select id="annualInterestRate" >
                            <option value="0.5">0.5%</option>
                            <option value="1.0"selected>1.0%</option>
                            <option value="1.5">1.5%</option>
                            <option value="2.0">2.0%</option>
                            <option value="2.5">2.5%</option>
                            <option value="3.0">3.0%</option>
                            <option value="3.5">3.5%</option>
                            <option value="4.0">4.0%</option>
                            <option value="4.5">4.5%</option>
                            <option value="5.0">5.0%</option>
                    </select>
                    </td>
                </tr>
                
            </table>
            <button onclick="calculate()" class="button button4">計算需多少退休金</button>

            <p>output</p>
            <table>
                <tr>
                    <td>退休後總生活費用</td>
                    <td>
                        <p id="totalLivingCost">$0</p>
                    </td>
                </tr>
                <tr>
                    <td>每月需準備退休金</td>
                    <td>
                        <p id="monthlyRetirementPay">$0</p>
                    </td>
                </tr>
            </table>

           </body>


<script type="text/javascript">

function genderFunc(gender) {
    document.getElementById("genders").value = gender;
}

function calculate(){

    var currentAge = parseInt(document.getElementById("currentAge").value);
    var retireAge = parseInt(document.getElementById("retireAge").value);
    var gender = document.getElementById("genders").value;
    var livingCost = document.getElementById("livingCost").value;
    var livingCostGrowth = parseFloat(document.getElementById("livingCostGrowth").value) / 100;
    var annualInterestRate = parseFloat(document.getElementById("annualInterestRate").value) / 100;
    var lifeLeft = parseInt(document.getElementById("lifeLeft").value);

    var A = currentAge;
    var B = retireAge;
    var C = B + lifeLeft;
    var N = (C - B) * 12;
    var M = (B - A) * 12;
    var I = annualInterestRate / 100;
    var G = livingCostGrowth / 100;
    var P = livingCost;
    var J = Math.pow((1 + I), (1 / 12)) - 1;
    var K = Math.pow((1 + G), (1 / 12)) - 1;
    var D = J / (1 + J);
    // var totalLivingCost = Math.round( P * (1 - ((1 + K)/(1 + J)) ^ N)/(1 - (1 + K)/(1 + J)) , 2 );
    var totalLivingCost = P * Math.pow((1 - ((1 + K)/(1 + J))), N)/(1 - (1 + K)/(1 + J));
    var monthlyRetirementPay = Math.round(totalLivingCost * D/((1+J)^M-1),2)


    document.getElementById("totalLivingCost").innerHTML = "$" + Math.round(totalLivingCost);
    document.getElementById("monthlyRetirementPay").innerHTML = "$" + Math.round(monthlyRetirementPay);

    alert(J);
    alert(K);
    alert(D);

    alert(Math.pow((1 - ((1 + K)/(1 + J))), N));
    alert(1 - ((1 + K)/(1 + J)));


}

function lifeLeftFunc() {
        var retireAge = parseInt(document.getElementById("retireAge").value);
        var gender = document.getElementById("gender").value;
        var lifeLeft = 0;
        if (gender == "male") {
        if(retireAge==0){lifeLeft = 76;}
        else if(retireAge==1){lifeLeft = 75;}
        else if(retireAge==2){lifeLeft = 74;}
        else if(retireAge==3){lifeLeft = 73;}
        else if(retireAge==4){lifeLeft = 72;}
        else if(retireAge==5){lifeLeft = 71;}
        else if(retireAge==6){lifeLeft = 70;}
        else if(retireAge==7){lifeLeft = 69;}
        else if(retireAge==8){lifeLeft = 68;}
        else if(retireAge==9){lifeLeft = 67;}
        else if(retireAge==10){lifeLeft = 66;}
        else if(retireAge==11){lifeLeft = 66;}
        else if(retireAge==12){lifeLeft = 65;}
        else if(retireAge==13){lifeLeft = 64;}
        else if(retireAge==14){lifeLeft = 63;}
        else if(retireAge==15){lifeLeft = 62;}
        else if(retireAge==16){lifeLeft = 61;}
        else if(retireAge==17){lifeLeft = 60;}
        else if(retireAge==18){lifeLeft = 59;}
        else if(retireAge==19){lifeLeft = 58;}
        else if(retireAge==20){lifeLeft = 57;}
        else if(retireAge==21){lifeLeft = 56;}
        else if(retireAge==22){lifeLeft = 55;}
        else if(retireAge==23){lifeLeft = 54;}
        else if(retireAge==24){lifeLeft = 53;}
        else if(retireAge==25){lifeLeft = 52;}
        else if(retireAge==26){lifeLeft = 51;}
        else if(retireAge==27){lifeLeft = 50;}
        else if(retireAge==28){lifeLeft = 49;}
        else if(retireAge==29){lifeLeft = 48;}
        else if(retireAge==30){lifeLeft = 47;}
        else if(retireAge==31){lifeLeft = 46;}
        else if(retireAge==32){lifeLeft = 46;}
        else if(retireAge==33){lifeLeft = 45;}
        else if(retireAge==34){lifeLeft = 44;}
        else if(retireAge==35){lifeLeft = 43;}
        else if(retireAge==36){lifeLeft = 42;}
        else if(retireAge==37){lifeLeft = 41;}
        else if(retireAge==38){lifeLeft = 40;}
        else if(retireAge==39){lifeLeft = 39;}
        else if(retireAge==40){lifeLeft = 38;}
        else if(retireAge==41){lifeLeft = 37;}
        else if(retireAge==42){lifeLeft = 36;}
        else if(retireAge==43){lifeLeft = 35;}
        else if(retireAge==44){lifeLeft = 34;}
        else if(retireAge==45){lifeLeft = 34;}
        else if(retireAge==46){lifeLeft = 33;}
        else if(retireAge==47){lifeLeft = 32;}
        else if(retireAge==48){lifeLeft = 31;}
        else if(retireAge==49){lifeLeft = 30;}
        else if(retireAge==50){lifeLeft = 29;}
        else if(retireAge==51){lifeLeft = 28;}
        else if(retireAge==52){lifeLeft = 27;}
        else if(retireAge==53){lifeLeft = 27;}
        else if(retireAge==54){lifeLeft = 26;}
        else if(retireAge==55){lifeLeft = 25;}
        else if(retireAge==56){lifeLeft = 24;}
        else if(retireAge==57){lifeLeft = 23;}
        else if(retireAge==58){lifeLeft = 22;}
        else if(retireAge==59){lifeLeft = 22;}
        else if(retireAge==60){lifeLeft = 21;}
        else if(retireAge==61){lifeLeft = 20;}
        else if(retireAge==62){lifeLeft = 19;}
        else if(retireAge==63){lifeLeft = 19;}
        else if(retireAge==64){lifeLeft = 18;}
        else if(retireAge==65){lifeLeft = 17;}
        else if(retireAge==66){lifeLeft = 16;}
        else if(retireAge==67){lifeLeft = 16;}
        else if(retireAge==68){lifeLeft = 15;}
        else if(retireAge==69){lifeLeft = 14;}
        else if(retireAge==70){lifeLeft = 13;}
        else if(retireAge==71){lifeLeft = 13;}
        else if(retireAge==72){lifeLeft = 12;}
        else if(retireAge==73){lifeLeft = 11;}
        else if(retireAge==74){lifeLeft = 11;}
        else if(retireAge==75){lifeLeft = 10;}
        else if(retireAge==76){lifeLeft = 10;}
        else if(retireAge==77){lifeLeft = 9;}
        else if(retireAge==78){lifeLeft = 8;}
        else if(retireAge==79){lifeLeft = 8;}
        else if(retireAge==80){lifeLeft = 7;}
        else if(retireAge==81){lifeLeft = 7;}
        else if(retireAge==82){lifeLeft = 6;}
        else if(retireAge==83){lifeLeft = 6;}
        else if(retireAge==84){lifeLeft = 5;}
        else if(retireAge==85){lifeLeft = 5;}
        else if(retireAge==86){lifeLeft = 5;}
        else if(retireAge==87){lifeLeft = 4;}
        else if(retireAge==88){lifeLeft = 4;}
        else if(retireAge==89){lifeLeft = 3;}
        else if(retireAge==90){lifeLeft = 3;}
        else if(retireAge==91){lifeLeft = 3;}
        else if(retireAge==92){lifeLeft = 3;}
        else if(retireAge==93){lifeLeft = 2;}
        else if(retireAge==94){lifeLeft = 2;}
        else if(retireAge==95){lifeLeft = 2;}
        else if(retireAge==96){lifeLeft = 2;}
        else if(retireAge==97){lifeLeft = 1;}
        else if(retireAge==98){lifeLeft = 1;}
        else if(retireAge==99){lifeLeft = 1;}
        else if(retireAge==100){lifeLeft = 1;}
        else if(retireAge==101){lifeLeft = 1;}
        else if(retireAge==102){lifeLeft = 1;}
        else if(retireAge==103){lifeLeft = 1;}
        else {lifeLeft = 0;}
        } else {
        if(retireAge==0){lifeLeft = 80;}
        else if(retireAge==1){lifeLeft = 80;}
        else if(retireAge==2){lifeLeft = 79;}
        else if(retireAge==3){lifeLeft = 78;}
        else if(retireAge==4){lifeLeft = 77;}
        else if(retireAge==5){lifeLeft = 76;}
        else if(retireAge==6){lifeLeft = 75;}
        else if(retireAge==7){lifeLeft = 74;}
        else if(retireAge==8){lifeLeft = 73;}
        else if(retireAge==9){lifeLeft = 72;}
        else if(retireAge==10){lifeLeft = 71;}
        else if(retireAge==11){lifeLeft = 70;}
        else if(retireAge==12){lifeLeft = 69;}
        else if(retireAge==13){lifeLeft = 68;}
        else if(retireAge==14){lifeLeft = 67;}
        else if(retireAge==15){lifeLeft = 66;}
        else if(retireAge==16){lifeLeft = 65;}
        else if(retireAge==17){lifeLeft = 64;}
        else if(retireAge==18){lifeLeft = 63;}
        else if(retireAge==19){lifeLeft = 62;}
        else if(retireAge==20){lifeLeft = 61;}
        else if(retireAge==21){lifeLeft = 60;}
        else if(retireAge==22){lifeLeft = 59;}
        else if(retireAge==23){lifeLeft = 58;}
        else if(retireAge==24){lifeLeft = 57;}
        else if(retireAge==25){lifeLeft = 56;}
        else if(retireAge==26){lifeLeft = 55;}
        else if(retireAge==27){lifeLeft = 54;}
        else if(retireAge==28){lifeLeft = 53;}
        else if(retireAge==29){lifeLeft = 52;}
        else if(retireAge==30){lifeLeft = 51;}
        else if(retireAge==31){lifeLeft = 50;}
        else if(retireAge==32){lifeLeft = 49;}
        else if(retireAge==33){lifeLeft = 48;}
        else if(retireAge==34){lifeLeft = 47;}
        else if(retireAge==35){lifeLeft = 46;}
        else if(retireAge==36){lifeLeft = 45;}
        else if(retireAge==37){lifeLeft = 44;}
        else if(retireAge==38){lifeLeft = 43;}
        else if(retireAge==39){lifeLeft = 43;}
        else if(retireAge==40){lifeLeft = 42;}
        else if(retireAge==41){lifeLeft = 41;}
        else if(retireAge==42){lifeLeft = 40;}
        else if(retireAge==43){lifeLeft = 39;}
        else if(retireAge==44){lifeLeft = 38;}
        else if(retireAge==45){lifeLeft = 37;}
        else if(retireAge==46){lifeLeft = 36;}
        else if(retireAge==47){lifeLeft = 35;}
        else if(retireAge==48){lifeLeft = 34;}
        else if(retireAge==49){lifeLeft = 33;}
        else if(retireAge==50){lifeLeft = 32;}
        else if(retireAge==51){lifeLeft = 31;}
        else if(retireAge==52){lifeLeft = 30;}
        else if(retireAge==53){lifeLeft = 29;}
        else if(retireAge==54){lifeLeft = 28;}
        else if(retireAge==55){lifeLeft = 28;}
        else if(retireAge==56){lifeLeft = 27;}
        else if(retireAge==57){lifeLeft = 26;}
        else if(retireAge==58){lifeLeft = 25;}
        else if(retireAge==59){lifeLeft = 24;}
        else if(retireAge==60){lifeLeft = 23;}
        else if(retireAge==61){lifeLeft = 22;}
        else if(retireAge==62){lifeLeft = 21;}
        else if(retireAge==63){lifeLeft = 20;}
        else if(retireAge==64){lifeLeft = 20;}
        else if(retireAge==65){lifeLeft = 19;}
        else if(retireAge==66){lifeLeft = 18;}
        else if(retireAge==67){lifeLeft = 17;}
        else if(retireAge==68){lifeLeft = 16;}
        else if(retireAge==69){lifeLeft = 16;}
        else if(retireAge==70){lifeLeft = 15;}
        else if(retireAge==71){lifeLeft = 14;}
        else if(retireAge==72){lifeLeft = 13;}
        else if(retireAge==73){lifeLeft = 13;}
        else if(retireAge==74){lifeLeft = 12;}
        else if(retireAge==75){lifeLeft = 11;}
        else if(retireAge==76){lifeLeft = 11;}
        else if(retireAge==77){lifeLeft = 10;}
        else if(retireAge==78){lifeLeft = 9;}
        else if(retireAge==79){lifeLeft = 9;}
        else if(retireAge==80){lifeLeft = 8;}
        else if(retireAge==81){lifeLeft = 8;}
        else if(retireAge==82){lifeLeft = 7;}
        else if(retireAge==83){lifeLeft = 7;}
        else if(retireAge==84){lifeLeft = 6;}
        else if(retireAge==85){lifeLeft = 6;}
        else if(retireAge==86){lifeLeft = 5;}
        else if(retireAge==87){lifeLeft = 5;}
        else if(retireAge==88){lifeLeft = 5;}
        else if(retireAge==89){lifeLeft = 4;}
        else if(retireAge==90){lifeLeft = 4;}
        else if(retireAge==91){lifeLeft = 3;}
        else if(retireAge==92){lifeLeft = 3;}
        else if(retireAge==93){lifeLeft = 3;}
        else if(retireAge==94){lifeLeft = 3;}
        else if(retireAge==95){lifeLeft = 2;}
        else if(retireAge==96){lifeLeft = 2;}
        else if(retireAge==97){lifeLeft = 2;}
        else if(retireAge==98){lifeLeft = 2;}
        else if(retireAge==99){lifeLeft = 1;}
        else if(retireAge==100){lifeLeft = 1;}
        else if(retireAge==101){lifeLeft = 1;}
        else if(retireAge==102){lifeLeft = 1;}
        else if(retireAge==103){lifeLeft = 1;}
        else if(retireAge==104){lifeLeft = 1;}
        else if(retireAge==105){lifeLeft = 1;}
        else {lifeLeft = 0;}
        }
        document.getElementById("lifeLeft").value = lifeLeft;
        }


</script>
</html>







